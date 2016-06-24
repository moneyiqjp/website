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


class JSeason extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $SeasonId;
    public $PointSystem;
    public $Name;
    public $Type;
    public $Display;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JSeason("
            . $this->SeasonId . "|"
            . $this->Name . "|"
            . $this->Type . "|"
            . $this->UpdateTime  . "/"
            . $this->PointSystem . "|"
        . ") ";
    }

    public static function CREATE_FROM_DB(\Season $item) {
        $mine = new JSeason();
        $mine->SeasonId     = $item->getSeasonId();
        $mine->PointSystem  = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
        $mine->Name         = $item->getName();
        $mine->Type         = JSeasonType::CREATE_FROM_DB($item->getSeasonType());
        $mine->Display      = $item->getDisplay();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->Reference = $item->getReference();
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }


    public static function VALIDATE(JSeason $mine) {
        if(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId))
            throw new JSONException("Did not receive 'PointSystem' field, which is required" . $mine);

        return $mine;
    }

    public function isValid(JSeason $mine) {
        return !(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId));
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JSeason();
        if(ArrayUtils::KEY_EXISTS($data,'SeasonId')) {
                $mine->SeasonId = $data['SeasonId'];
                $item = $mine->tryLoadFromDB();
                if(!is_null($item)) {
                    $mine = JSeason::CREATE_FROM_DB($item);
                }
        }
        if(ArrayUtils::KEY_EXISTS($data,'PointSystem')) {
                $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(is_null($mine->PointSystem)) throw new JSONException("Invalid point system specified " . json_encode($data));
        if(ArrayUtils::KEY_EXISTS($data,'Type')) {
            $mine->Type = JSeasonType::CREATE_FROM_ARRAY($data['Type']);
        }

        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JSeason::VALIDATE($mine);
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

        if(FieldUtils::ID_IS_DEFINED($this->SeasonId)) {
            $item = \SeasonQuery::create()->findOneBySeasonId($this->SeasonId);
            return $item;
        }
        return null;
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();
        if(is_null($item)) $item = new \Season();
        return $this->updateDB($item);
    }

    public function updateDB(\Season &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->SeasonId)) $item->setSeasonId($this->SeasonId);

        if(!is_null($this->PointSystem) && FieldUtils::ID_IS_DEFINED($this->PointSystem->PointSystemId)) {
            $item->setPointSystemId($this->PointSystem->PointSystemId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::IS_STRING($this->Display)) $item->setDisplay($this->Display);

        if(!is_null($this->Type) && FieldUtils::ID_IS_DEFINED($this->Type->SeasonTypeId)) {
            $item->setSeasonTypeId($this->Type->SeasonTypeId);
        }

        if(FieldUtils::IS_STRING($this->Reference)) $item->setReference($this->Reference);

        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getDisplay() {
        $display = FieldUtils::STRING_IS_DEFINED($this->Display)?$this->Display:"%SEASONTYPE%";

        return $this->parseForDisplay($display);
    }

    public function parseForDisplay($display) {
        if(!is_null($this->Type) && FieldUtils::ID_IS_DEFINED($this->Type->SeasonTypeId)) {
            $display = $this->Type->parseForDisplay($display);
            $display = FieldUtils::replaceIfAvailable($display, "%SEASONTYPE%", $this->Type->getDisplay());
        }

        $display = FieldUtils::replaceIfAvailable($display, "%SEASONNAME%", $this->Name);

        return $display;
    }

    public function getLabel() {
        return $this->Name;
    }

    public function getValue() {
        return $this->SeasonId;
    }
}