<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 2/7/2016
 * Time: 7:56 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JSeasonType implements JSONInterface, JSONDisplay
{
    public $SeasonTypeId;
    public $Name;
    public $Display;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JSeasonType("
            . $this->SeasonTypeId . "|"
            . $this->Name . "|"
            . $this->Display . "|"
            . $this->UpdateTime  . "|"
            . $this->UpdateUser
        . ") ";
    }

    public static function CREATE_FROM_DB(\SeasonType $item) {
        $mine = new JSeasonType();
        $mine->SeasonTypeId     = $item->getSeasonTypeId();
        $mine->Name         = $item->getName();
        $mine->Display      = $item->getDisplay();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }


    public static function VALIDATE(JSeasonType $mine) {
        /*
        if(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId))
            throw new JSONException("Did not receive 'PointSystem' field, which is required" . $mine);

        if(is_null($mine->From) || strlen($mine->From)<=0)
            throw new JSONException("Did not receive 'From' field, which is required" . $mine);
        if(is_null($mine->To) || strlen($mine->To)<=0)
            throw new JSONException("Did not receive 'To' field, which is required" . $mine);
        */
        return $mine;
    }
    /*
        public function isValid(JSeasonType $mine) {
            return !(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId))
                    && !(is_null($mine->From) || strlen($mine->From)<=0)
                    && !(is_null($mine->To) || strlen($mine->To)<=0);
        }
    */

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JSeasonType();
        if(ArrayUtils::KEY_EXISTS($data,'SeasonTypeId')) {
                $mine->SeasonTypeId = $data['SeasonTypeId'];
                $item = $mine->tryLoadFromDB();
                if(!is_null($item)) {
                    $mine = JSeasonType::CREATE_FROM_DB($item);
                }
        }

        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JSeasonType::VALIDATE($mine);
    }

    public function saveToDb()
    {
        $item = $this->toDB();
        try {
            return $item->save()>0;
        } catch(\Exception $ex) {
            throw new JSONException("Failed to save to database " . $this . $ex->getMessage(), 0, $ex );
        }
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->SeasonTypeId)) {
            $item = \SeasonTypeQuery::create()->findOneBySeasonTypeId($this->SeasonTypeId);
            return $item;
        }
        return null;
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();
        if(is_null($item)) $item = new \SeasonType();
        return $this->updateDB($item);
    }

    public function updateDB(\SeasonType &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->SeasonTypeId)) $item->setSeasonTypeId($this->SeasonTypeId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::IS_STRING($this->Display)) $item->setDisplay($this->Display);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getDisplay() {
        $display = FieldUtils::STRING_IS_DEFINED($this->Display)?$this->Display:"%SEASONTYPEDISPLAY%";

        return $this->parseForDisplay($display);
    }

    public function parseForDisplay($display) {
        $display = FieldUtils::replaceIfAvailable($display, "%SEASONTYPENAME%", $this->Name);
        $display = FieldUtils::replaceIfAvailable($display, "%SEASONTYPEDISPLAY", $this->Display);
        return $display;
    }
}