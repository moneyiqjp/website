<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 9:47 AM
 */

namespace Db\CRUD;
use Db\Json\JObject;
use Db\Json\JFeatureType;
use Db\Json\JInsuranceType;
use Db\Json\JUnit;


/* Unit */
function GetUnitForDisplay()
{
    $result = array();
    foreach ((new \UnitQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getUnitId()));
    }
    return $result;
}
function GetUnitForCrud()
{
    $result = array();
    foreach ((new \UnitQuery())->orderByName()->find() as $af) {
        array_push($result, JUnit::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetUnitById($id)
{
    $result = array();
    foreach ((new \UnitQuery())->orderByName()->findPk($id) as $af) {
        array_push($result, JUnit::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateUnitForCrud($data)
{
    $parsed = JUnit::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Unit update request");

    $item = (new  \UnitQuery())->findPk($parsed->UnitId);
    if(is_null($item)) throw new \Exception ("Unit with id ". $parsed->UnitId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \UnitQuery())->findPk($parsed->UnitId);
    return JUnit::CREATE_FROM_DB($item);
}
function CreateUnitForCrud($data)
{
    $item = JUnit::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JUnit::CREATE_FROM_DB($item);
}
function DeleteUnitForCrud($id)
{
    $item = (new  \UnitQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Unit with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* InsuranceType */
function GetInsuranceTypeForCrud()
{
    $result = array();
    foreach ((new \InsuranceTypeQuery())->orderByTypeName()->find() as $item) {
        array_push($result, JInsuranceType::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateInsuranceTypeForCrud($data)
{
    $parsed = JInsuranceType::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse insurance update request");

    $item = (new  \InsuranceTypeQuery())->findPk($parsed->InsuranceTypeId);
    if(is_null($item)) throw new \Exception ("insurance with id ". $parsed->InsuranceTypeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \InsuranceTypeQuery())->findPk($parsed->InsuranceTypeId);
    return JInsuranceType::CREATE_FROM_DB($item);
}
function CreateInsuranceTypeForCrud($data)
{
    $item = JInsuranceType::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JInsuranceType::CREATE_FROM_DB($item);
}
function DeleteInsuranceTypeForCrud($id)
{
    $item = (new  \InsuranceTypeQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("insurance with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* FeatureType */
function GetFeatureTypeForCrud()
{
    $result = array();
    foreach ((new \CardFeatureTypeQuery())->orderByName()->find() as $item) {
        array_push($result, JFeatureType::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateFeatureTypeForCrud($data)
{
    $parsed = JFeatureType::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse feature type update request");

    $item = (new  \CardFeatureTypeQuery())->findPk($parsed->FeatureTypeId);
    if(is_null($item)) throw new \Exception ("feature type with id ". $parsed->FeatureTypeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \CardFeatureTypeQuery())->findPk($parsed->FeatureTypeId);
    return JFeatureType::CREATE_FROM_DB($item);
}
function CreateFeatureTypeForCrud($data)
{
    $item = JFeatureType::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JFeatureType::CREATE_FROM_DB($item);
}
function DeleteFeatureTypeForCrud($id)
{
    $item = (new  \CardFeatureTypeQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("feature type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}