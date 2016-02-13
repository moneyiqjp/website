<?php

namespace Db\CRUD;

use Db\Json\JObject;
use Db\Json\JCity;
use Db\Json\JReward;
use Db\Json\JTrip;
use Db\Json\JMileage;



/* City */
function GetCityForCrud()
{
    $result = array();
    foreach ((new \CityQuery())->orderByName()->find() as $item) {
        array_push($result, JCity::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateCityForCrud($data)
{
    $parsed = JCity::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse restriction type update request");

    $item = (new  \CityQuery())->findPk($parsed->CityId);
    if(is_null($item)) throw new \Exception ("Restriction type with id ". $parsed->CityId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \CityQuery())->findPk($parsed->CityId);
    return JCity::CREATE_FROM_DB($item);
}
function CreateCityForCrud($data) {
    $item = JCity::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JCity::CREATE_FROM_DB($item);
}
function DeleteCityForCrud($id)
{
    $item = (new  \CityQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("restriction type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* Trip */
function GetTripForCrud()
{
    $result = array();
    foreach ((new \TripQuery())->orderByFromCityId()->find() as $item) {
        array_push($result, JTrip::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateTripForCrud($data)
{
    $parsed = JTrip::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse restriction type update request");

    $item = (new  \TripQuery())->findPk($parsed->TripId);
    if(is_null($item)) throw new \Exception ("Restriction type with id ". $parsed->TripId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \TripQuery())->findPk($parsed->TripId);
    return JTrip::CREATE_FROM_DB($item);
}
function CreateTripForCrud($data)
{
    $parsed = JTrip::CREATE_FROM_ARRAY($data);

    $item=$parsed->toDB();

    $item->save();

    //TODO implement cache, add to cache
    return JTrip::CREATE_FROM_DB($item);
}
function DeleteTripForCrud($id)
{
    $item = (new  \TripQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("restriction type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* Mileage */
function GetMileageForCrud()
{
    $result = array();
    foreach ((new \MileageQuery())->orderByStoreId()->find() as $item) {
        array_push($result, JMileage::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateMileageForCrud($data)
{
    $parsed = JMileage::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse restriction type update request");

    $item = (new  \MileageQuery())->findPk($parsed->GetMileageId());
    if(is_null($item)) throw new \Exception ("Restriction type with id ". $parsed->getMileageId() ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \MileageQuery())->findPk($parsed->GetMileageId());
    return JMileage::CREATE_FROM_DB($item);
}

function CreateMileageForCrud($data)
{
    $item = JMileage::CREATE_FROM_ARRAY($data)->toDB();
    if(0>=$item->save()) {
        throw new \Exception("Failed to save MIleage");
    }

    //TODO implement cache, add to cache
    return JMileage::CREATE_FROM_DB($item);
}

function DeleteMileageForCrud($id)
{
    $item = (new  \MileageQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("restriction type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

function GetMileageRewards()
{
    $result = array();
    foreach ((new \MileageQuery())->orderByStoreId()->find() as $item) {
        array_push($result, JReward::CREATE_FROM_MILEAGE(JMileage::CREATE_FROM_DB($item)));
    }
    return $result;
}




