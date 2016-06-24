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


class JTrip extends JObjectRoot implements JSONInterface, JSONDisplay, JObjectifiable
{
    public $TripId;
    public $CityFrom;
    public $CityTo;
    public $Distance;
    public $Display;
    public $Unit;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\Trip $item) {
        $mine = new JTrip();
        $mine->TripId = $item->getTripId();
        $mine->CityFrom = JCity::CREATE_FROM_DB($item->getCityRelatedByFromCityId());
        $mine->CityTo = JCity::CREATE_FROM_DB($item->getCityRelatedByToCityId());
        $mine->Distance = $item->getDistance();
        $mine->Display = $item->getDisplay();
        $mine->Unit = JUnit::CREATE_FROM_DB($item->getUnit());
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JTrip();
        if(ArrayUtils::KEY_EXISTS($data,'TripId')) $mine->TripId = $data['TripId'];
        if(ArrayUtils::KEY_EXISTS($data,'CityFrom')) $mine->CityFrom = JCity::CREATE_FROM_ARRAY($data['CityFrom']);
        if(ArrayUtils::KEY_EXISTS($data,'CityTo')) $mine->CityTo = JCity::CREATE_FROM_ARRAY($data['CityTo']);
        if(ArrayUtils::KEY_EXISTS($data,'Distance')) $mine->Distance = $data['Distance'];
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'Unit')) $mine->Unit = JUnit::CREATE_FROM_ARRAY($data['Unit']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDb()
    {
        return $this->toDB()->save() > 0;
    }

    private function tryLoadFromDB(){

        if(FieldUtils::ID_IS_DEFINED($this->TripId)) {
            $item = \TripQuery::create()->findOneByTripId($this->TripId);
            if(!is_null($item)) return $item;
        }
        return new \Trip();
    }

    public function toDB()
    {
        $item =$this->tryLoadFromDB();

        return $this->updateDB($item);
    }

    public function updateDB(\Trip &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->TripId)) $item->setTripId($this->TripId);

        if(!is_null($this->CityFrom) && FieldUtils::ID_IS_DEFINED($this->CityFrom->CityId)) {
            $item->setFromCityId($this->CityFrom->CityId);
        }
        if(!is_null($this->CityTo) && FieldUtils::ID_IS_DEFINED($this->CityTo->CityId)) {
            $item->setToCityId($this->CityTo->CityId);
        }
        if(FieldUtils::NUMBER_IS_DEFINED($this->Distance)) $item->setDistance($this->Distance);
        if(FieldUtils::STRING_IS_DEFINED($this->Display)) $item->setDisplay($this->Display);
        if(!is_null($this->Unit) && FieldUtils::ID_IS_DEFINED($this->Unit->UnitId)) {
            $item->setUnitId($this->Unit->UnitId);
        }
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

    public function getDisplay(){
        $display=$this->Display;

        if(is_null($display)) {
            $display = "%TRIPFROM% → %TRIPTO%";
        }

        return $this->parseForDisplay($display);
    }

    public function parseForDisplay($display) {
        $display = FieldUtils::replaceIfAvailable($display, "%TRIPFROM%", $this->CityFrom->Display);
        $display = FieldUtils::replaceIfAvailable($display, "%TRIPTO%", $this->CityTo->Display);
        $display = FieldUtils::replaceIfAvailable($display, "%TRIPUNIT%", $this->Unit->Name);
        $display = FieldUtils::replaceIfAvailable($display, "%TRIPDISTANCE%", $this->Distance);

        return $display;
    }

    public function getLabel(){
        return $this->getDisplay();
    }

    public function getValue()
    {
        return $this->TripId;
    }
}