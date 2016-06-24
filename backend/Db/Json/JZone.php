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


class JZone implements JSONInterface, JSONDisplay, JObjectifiable
{
    public $ZoneId;
    public $PointSystem;
    public $Name;
    public $Display;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JZone("
            . $this->ZoneId . "|"
            . $this->Name . "|"
            . $this->UpdateTime  . "|"
            . $this->PointSystem . "|"
        . ") ";
    }

    public static function CREATE_FROM_DB(\Zone $item) {
        $mine = new JZone();
        $mine->ZoneId     = $item->getZoneId();
        $mine->PointSystem  = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
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


    public static function VALIDATE(JZone $mine) {
        if(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId))
            throw new JSONException("Did not receive 'PointSystem' field, which is required" . $mine);

        return $mine;
    }

    public function isValid(JZone $mine) {
        return !(is_null($mine->PointSystem) || !FieldUtils::ID_IS_DEFINED($mine->PointSystem->PointSystemId));
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JZone();
        if(ArrayUtils::KEY_EXISTS($data,'ZoneId')) {
                $mine->ZoneId = $data['ZoneId'];
                $item = $mine->tryLoadFromDB();
                if(!is_null($item)) {
                    $mine = JZone::CREATE_FROM_DB($item);
                }
        }
        if(ArrayUtils::KEY_EXISTS($data,'PointSystem')) {
                $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(is_null($mine->PointSystem)) throw new JSONException("Invalid point system specified " . json_encode($data));

        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) {
            $mine->UpdateTime = FieldUtils::DateTimeToISOString(new \DateTime($data['UpdateTime']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return JZone::VALIDATE($mine);
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

        if(FieldUtils::ID_IS_DEFINED($this->ZoneId)) {
            $item = \ZoneQuery::create()->findOneByZoneId($this->ZoneId);
            return $item;
        }
        return null;
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();
        if(is_null($item)) $item = new \Zone();
        return $this->updateDB($item);
    }

    public function updateDB(\Zone &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->ZoneId)) $item->setZoneId($this->ZoneId);

        if(!is_null($this->PointSystem) && FieldUtils::ID_IS_DEFINED($this->PointSystem->PointSystemId)) {
            $item->setPointSystemId($this->PointSystem->PointSystemId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::IS_STRING($this->Display)) $item->setDisplay($this->Display);


        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getDisplay() {
        $display = FieldUtils::STRING_IS_DEFINED($this->Display)?$this->Display:"%ZONENAME%";

        return $this->parseForDisplay($display);
    }

    public function parseForDisplay($display) {
        if(!is_null($this->PointSystem) && FieldUtils::ID_IS_DEFINED($this->PointSystem->PointSystemId)) {
            $display = $this->PointSystem->parseForDisplay($display);
            $display = FieldUtils::replaceIfAvailable($display, "%POINTSYSTEM%", $this->PointSystem->getDisplay());
        }

        $display = FieldUtils::replaceIfAvailable($display, "%ZONENAME%", $this->Name);

        return $display;
    }

    public function toJObject() {
        JObject::CREATE( $this->getDisplay(), $this->ZoneId);
    }

    public function getLabel()
    {
        return $this->getDisplay();
    }

    public function getValue()
    {
        return $this->ZoneId;
    }
}