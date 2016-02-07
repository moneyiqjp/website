<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2/7/2016
 * Time: 6:37 PM
 */

namespace Db\Json;


class JCity implements JSONInterface
{
    public $CityId;
    public $Region;
    public $Display;
    public $RewardCategory;
    public $UpdateTime;
    public $UpdateUser;

    public static function CREATE_FROM_DB(\City $item) {
        $mine = new JCity();
        $mine->CityId = $item->getCityId();
        $mine->Region = $item->getRegion();
        $mine->Display = $item->getDisplay();
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
        // TODO: Implement CREATE_FROM_ARRAY() method.
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