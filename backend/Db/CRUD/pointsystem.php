<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:51 PM
 */

namespace Db\CRUD;
use Db\Json\JCreditCardToPointSystemMapping;
use Db\Json\JPointAcquisition;
use Db\Json\JPointSystem;
use Db\Json\JPointUsage;

/* PointSystem */
function GetCardPointSystemMappingForCrud()
{
    $result = array();
    foreach ((new \CardPointSystemQuery())->find() as $af) {
        array_push($result, JCreditCardToPointSystemMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetCardPointSystemMappingForPointSystem($id)
{
    $result = array();
    foreach ((new \CardPointSystemQuery())->findByPointSystemId($id) as $item) {
        array_push($result, JCreditCardToPointSystemMapping::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetCardPointSystemMappingForCard($id)
{
    $result = array();
    foreach ((new \CardPointSystemQuery())->findByCreditCardId($id) as $item) {
        array_push($result, JCreditCardToPointSystemMapping::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetPointSystemById($id)
{
    $result = array();
    foreach ((new \PointSystemQuery())->findByPointSystemId($id) as $item) {
        array_push($result, JPointSystem::CREATE_FROM_DB($item));
    }
    return $result;

}
function UpdateCardPointSystemMappingForCrud($data)
{
    $parsed = JPointSystem::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse PointSystem update request");

    $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
    if(is_null($item)) throw new \Exception ("PointSystem with id ". $parsed->PointSystemId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
    return JPointSystem::CREATE_FROM_DB($item);
}
function CreateCardPointSystemMappingForCrud($data)
{
    $item = JCreditCardToPointSystemMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JCreditCardToPointSystemMapping::CREATE_FROM_DB($item);
}
function DeleteCardPointSystemMappingForCrud($id)
{
    $item = (new  \CardPointSystemQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("CardPointSystemMap with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* PointAcquisition */
function GetPointAcquisitionForCrud()
{
    $result = array();
    foreach ((new \PointAcquisitionQuery())->orderByPointAcquisitionName()->find() as $af) {
        array_push($result, JPointAcquisition::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPointAcquisitionById($id)
{
    $result = array();
    foreach ((new \PointAcquisitionQuery())->orderByPointAcquisitionName()->findPk($id) as $af) {
        array_push($result, JPointAcquisition::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPointAcquisitionByPointSystemId($id)
{
    $result = array();
    foreach ((new \PointAcquisitionQuery())->orderByPointAcquisitionName()->findByPointSystemId($id) as $af) {
        array_push($result, JPointAcquisition::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdatePointAcquisitionForCrud($data)
{
    $parsed = JPointAcquisition::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse PointAcquisition update request");

    $item = (new  \PointAcquisitionQuery())->findPk($parsed->PointAcquisitionId);
    if(is_null($item)) throw new \Exception ("PointAcquisition with id ". $parsed->PointAcquisitionId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PointAcquisitionQuery())->findPk($parsed->PointAcquisitionId);
    return JPointAcquisition::CREATE_FROM_DB($item);
}
function CreatePointAcquisitionForCrud($data)
{
    $item = JPointAcquisition::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPointAcquisition::CREATE_FROM_DB($item);
}
function DeletePointAcquisitionForCrud($id)
{
    $item = (new  \PointAcquisitionQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("PointAcquisition with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* PointUsage */
function GetPointUsageForCrud()
{
    $result = array();
    foreach ((new \PointUseQuery())->orderByPointUseId()->find() as $af) {
        array_push($result, JPointUsage::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPointUsageById($id)
{
    $result = array();
    foreach ((new \PointUseQuery())->orderByPointUseId()->findPk($id) as $af) {
        array_push($result, JPointUsage::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPointUsageByPointSystemId($id)
{
    $result = array();
    foreach ((new \PointUseQuery())->orderByPointUseId()->findByPointSystemId($id) as $af) {
        array_push($result, JPointUsage::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdatePointUsageForCrud($data)
{
    $parsed = JPointUsage::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse PointUsage update request");

    $item = (new  \PointUseQuery())->findPk($parsed->PointUsageId);
    if(is_null($item)) throw new \Exception ("PointUsage with id ". $parsed->PointUsageId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PointUseQuery())->findPk($parsed->PointUsageId);
    return JPointUsage::CREATE_FROM_DB($item);
}
function CreatePointUsageForCrud($data)
{
    $item = JPointUsage::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPointUsage::CREATE_FROM_DB($item);
}
function DeletePointUsageForCrud($id)
{
    $item = (new  \PointUseQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("PointUsage with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* PointSystem */
function GetPointSystemForCrud()
{
    $result = array();
    foreach ((new \PointSystemQuery())->orderByPointSystemName()->find() as $af) {
        array_push($result, JPointSystem::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPointSystemForCard($id)
{
    $result = array();
    foreach ((new \CardPointSystemQuery())->findByCreditCardId($id) as $item) {
        array_push($result, JPointSystem::CREATE_FROM_DB($item->getPointSystem()));
    }
    return $result;
}
function UpdatePointSystemForCrud($data)
{
    $parsed = JPointSystem::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse PointSystem update request");

    $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
    if(is_null($item)) throw new \Exception ("PointSystem with id ". $parsed->PointSystemId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
    return JPointSystem::CREATE_FROM_DB($item);
}
function CreatePointSystemForCrud($data)
{
    $item = JPointSystem::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPointSystem::CREATE_FROM_DB($item);
}
function DeletePointSystemForCrud($id)
{
    $item = (new  \PointSystemQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("PointSystem with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

