<?php
namespace Db\CRUD;


/* PaymentType */
use Db\Json\JObject;
use Db\Json\JPaymentType;

function GetPaymentTypeForDisplay()
{
    $result = array();
    foreach ((new \PaymentTypeQuery())->orderByType()->find() as $af) {
        array_push($result, JObject::CREATE($af->getName(),$af->getPaymentTypeId()));
    }
    return $result;
}

function GetPaymentTypeForCrud()
{
    $result = array();
    foreach ((new \PaymentTypeQuery())->orderByType()->find() as $af) {
        array_push($result, JPaymentType::CREATE_FROM_DB($af));
    }
    return $result;
}

function GetPaymentTypeById($id)
{
    $result = array();
    foreach ((new \PaymentTypeQuery())->orderByType()->findPk($id) as $af) {
        array_push($result, JPaymentType::CREATE_FROM_DB($af));
    }
    return $result;
}

function UpdatePaymentTypeForCrud($data)
{
    $parsed = JPaymentType::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse PaymentType update request");

    $item = (new  \PaymentTypeQuery())->findPk($parsed->PaymentTypeId);
    if(is_null($item)) throw new \Exception ("PaymentType with id ". $parsed->PaymentTypeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PaymentTypeQuery())->findPk($parsed->PaymentTypeId);
    return JPaymentType::CREATE_FROM_DB($item);
}

function CreatePaymentTypeForCrud($data)
{
    $item = JPaymentType::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPaymentType::CREATE_FROM_DB($item);
}

function DeletePaymentTypeForCrud($id)
{
    $item = (new  \PaymentTypeQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("PaymentType with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

?>