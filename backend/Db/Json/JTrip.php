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


class JTrip implements JSONInterface
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
        $item->Display = $item->getDisplay();
        $item->Unit = JUnit::CREATE_FROM_DB($item->getUnit());
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JTrip();
        if(ArrayUtils::KEY_EXISTS($data,'TripId')) $mine->TripId = $data['TripId'];
        if(ArrayUtils::KEY_EXISTS($data,'CityFrom')) $mine->CityFrom = JCity::CREATE_FROM_ARRAY($data['CityFrom']);
        if(ArrayUtils::KEY_EXISTS($data,'CityTo')) $mine->CityTo = JCity::CREATE_FROM_ARRAY($data['CityTo']);
        if(ArrayUtils::KEY_EXISTS($data,'Distance')) $mine->Distance = $data['Distance'];
        if(ArrayUtils::KEY_EXISTS($data,'Display')) $mine->Display = $data['Display'];
        if(ArrayUtils::KEY_EXISTS($data,'Unit')) $mine->Unit = JUnit::CREATE_FROM_ARRAY($data['Unit']);
        if(ArrayUtils::KEY_EXISTS($data,'Distance')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'Distance')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDb()
    {
        // TODO: Implement saveToDb() method.
    }

    public function toDB()
    {
        // TODO: Implement toDB() method.
    }
}