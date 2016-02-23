<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 11:14 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JPointSystem implements JSONInterface, JSONDisplay
{

    public $PointSystemId;
    public $PointSystemName;
    public $PointsPerYen;
    public $YenPerPoint;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function __toString() {
        return " JPointSystem("
        . $this->PointSystemId . "|"
        . $this->PointSystemName . "|"
        . $this->PointsPerYen . "|"
        . $this->YenPerPoint . "|"
        . $this->Reference . "|"
        . $this->UpdateTime  . "|"
        . $this->UpdateUser . "|"
        . ") ";
    }

    public function JPointSystem(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointSystem $item)
    {
        $mine = new JPointSystem();
        $mine->PointSystemId = $item->getPointSystemId();
        $mine->PointSystemName = $item->getPointSystemName();
        $mine->PointsPerYen = $item->getDefaultPointsPerYen();
        $mine->YenPerPoint = $item->getDefaultYenPerPoint();
        if(!is_null($item->getUpdateTime())) {
            $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->Reference = $item->getReference();
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (!ArrayUtils::KEY_EXISTS($data, 'PointSystemId')) throw new \Exception("JPointSystem: Mandatory field PointUsageId missing");


        return JPointSystem::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data)
    {
        $item = \PointSystemQuery::create()->findPk($data['PointSystemId']);
        if (!is_null($item)) {
            $mine = self::CREATE_FROM_DB($item);
        } else {
           $mine = new JPointSystem();
        }
        if(ArrayUtils::KEY_EXISTS($data,'PointSystemId')) $mine->PointSystemId = $data['PointSystemId'];
        if(ArrayUtils::KEY_EXISTS($data,'PointSystemName')) $mine->PointSystemName = $data['PointSystemName'];
        if(ArrayUtils::KEY_EXISTS($data,'PointsPerYen')) $mine->PointsPerYen = $data['PointsPerYen'];
        if(ArrayUtils::KEY_EXISTS($data,'YenPerPoint')) $mine->YenPerPoint = $data['YenPerPoint'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime();
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function isEmpty() {
        return !FieldUtils::STRING_IS_DEFINED($this->PointSystemName) ||   (is_null($this->PointsPerYen));
    }

    public function isValid() {
        //Mandatory fields + some data fields
        return (!$this->isEmpty());
    }

    public function saveToDb() {
        if($this->isValid()) { //only save if valid object
            $dbo = $this->toDB();
            if($dbo->save() <=0) return false;
            if(!FieldUtils::ID_IS_DEFINED($this->PointSystemId))
            { //reload $ids on save, in case it was actually a create
                $tmp = JPointSystem::CREATE_FROM_DB($dbo);
                $this->PointSystemId = $tmp->PointSystemId;
            }
            return true;
        }

        return false;
    }

    public function toDB() {
        $usage = new \PointSystem();
        if(FieldUtils::ID_IS_DEFINED($this->PointSystemId)) {
            $usage=(new \PointSystemQuery())->findPk($this->PointSystemId);
            if(is_null($usage)) $usage = new \PointSystem();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\PointSystem &$item) {

        if(FieldUtils::ID_IS_DEFINED($this->PointSystemId)) $item->setPointSystemId($this->PointSystemId);
        if(FieldUtils::NUMBER_IS_DEFINED($this->PointsPerYen)) $item->setDefaultPointsPerYen($this->PointsPerYen);
        if(FieldUtils::NUMBER_IS_DEFINED($this->YenPerPoint)) $item->setDefaultYenPerPoint($this->YenPerPoint);
        if(FieldUtils::STRING_IS_DEFINED($this->PointSystemName)) $item->setPointSystemName($this->PointSystemName);
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);

        return $item;


    }

    public function getDisplay() {
        return $this->parseForDisplay("%POINTSYSTEMNAME%");
    }

    public function parseForDisplay($display)
    {
        $display = FieldUtils::replaceIfAvailable($display, "%POINTSYSTEMNAME%", $this->PointSystemName);
        $display = FieldUtils::replaceIfAvailable($display, "%DEFAULTPOINTSPERYEN%%", $this->PointsPerYen);
        $display = FieldUtils::replaceIfAvailable($display, "%DEFAULTYENPERPOINT%", $this->YenPerPoint);

        return $display;
    }
}