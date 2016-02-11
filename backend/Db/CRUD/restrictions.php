<?php
namespace Db\CRUD;


/* PaymentType */
use Db\Json\JGeneralRestriction;
use Db\Json\JRestrictionType;
use Db\Json\JFeatureType;
use Db\Json\JCreditCardRestriction;
use Db\Utility\FieldUtils;
use Db\Utility\ArrayUtils;



/* RestrictionType */
function GetRestrictionTypeForCrud()
{
    $result = array();
    foreach ((new \RestrictionTypeQuery())->orderByName()->find() as $item) {
        array_push($result, JRestrictionType::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateRestrictionTypeForCrud($data)
{
    $parsed = JRestrictionType::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse restriction type update request");

    $item = (new  \RestrictionTypeQuery())->findPk($parsed->RestrictionTypeId);
    if(is_null($item)) throw new \Exception ("Restriction type with id ". $parsed->RestrictionTypeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \RestrictionTypeQuery())->findPk($parsed->RestrictionTypeId);
    return JRestrictionType::CREATE_FROM_DB($item);
}
function CreateRestrictionTypeForCrud($data)
{
    $item = JRestrictionType::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JRestrictionType::CREATE_FROM_DB($item);
}
function DeleteRestrictionTypeForCrud($id)
{
    $item = (new  \RestrictionTypeQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("restriction type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* GeneralRestriction */
function GetAllGeneralRestrictions()
{
    $result = array();
    foreach ((new \PersonaRestrictionQuery())->orderByRestrictionTypeId()->find() as $af) {
        array_push($result, JGeneralRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetGeneralRestrictionById($id)
{
    $result = array();
    foreach ((new \PersonaRestrictionQuery())->findPk($id) as $af) {
        array_push($result, JGeneralRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetGeneralRestrictionByPersonaId($id)
{
    $result = array();
    foreach ((new \PersonaRestrictionQuery())->orderByRestrictionTypeId()->findByPersonaId($id) as $af) {
        array_push($result, JGeneralRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}

function UpdateGeneralRestrictionForCrud($data)
{
    $parsed = JGeneralRestriction::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse GeneralRestriction update request");
    if(!$parsed->saveToDb()) throw new \Exception("Error saving object to database");

    //TODO implement cache, then refresh
    return JGeneralRestriction::CREATE_FROM_DB($parsed->tryLoadFromDB());
}

function CreateGeneralRestrictionForCrud($data)
{
    $parsed = JGeneralRestriction::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse GeneralRestriction update request");
    if(!$parsed->saveToDb()) throw new \Exception("Error saving object to database");


    //TODO implement cache, add to cache
    return $parsed;
}
function DeleteGeneralRestrictionForCrud($id)
{
    $item = JGeneralRestriction::LOAD_FROM_ID($id);
    $dbitem = $item->toDB();
    $dbitem->delete();
    return array();
}


/* FeatureRestriction */
function GetAllFeatureRestrictions(){
    $personaFeatures = array();

    foreach ((new \MapPersonaFeatureConstraintQuery())->find() as $item) {
        $stuff = JFeatureType::CREATE_FROM_DB($item->getCardFeatureType());
        $stuff->Active = true;
        array_push($personaFeatures, $stuff);
    }


    return $personaFeatures;
}

function GetFeatureRestrictionForPersona($id) {
    $personaFeatures = array();
    $existingIds = array();
    foreach ((new \MapPersonaFeatureConstraintQuery())->findByPersonaId($id) as $item) {
        $stuff  = JFeatureType::CREATE_FROM_DB($item->getCardFeatureType());
        $stuff->Active = 1;
        $stuff->PersonaId = $id;
        $stuff->FeatureId = $id . "_" . $stuff->FeatureTypeId;
        $stuff->Negative = $item->getNegative();
        array_push($personaFeatures, $stuff);
        array_push($existingIds, $stuff->FeatureTypeId);
    }

    $allFeatures = array();
    foreach ((new \CardFeatureTypeQuery())->orderByFeatureTypeId()->find() as $item) {
        $stuff  = JFeatureType::CREATE_FROM_DB($item);
        $stuff->Active = 0;
        $stuff->PersonaId = $id;
        $stuff->FeatureId = $id . "_" . $stuff->FeatureTypeId;
        $stuff->Negative = 0;
        array_push($allFeatures, $stuff);
    }

    $diff = array();
    foreach($allFeatures as $type) {
        if(!in_array($type->FeatureTypeId,$existingIds)) {
            array_push($personaFeatures, $type);
        }
    }

    return $personaFeatures;
}

function UpdateFeatureRestrictionForPersona($data) {
    if(!array_key_exists('FeatureId',$data)) throw new \Exception('FeatureId not defined');
    if(!array_key_exists('Active',$data)) throw new \Exception('Key Active not defined');

    if(array_key_exists('Active',$data) && !is_null($data['Active'])){
        DeleteFeatureRestrictionForPersona($data['FeatureId']);
        //throw new \Exception('DeleteFeatureRestrictionForPersona');
    }

    if($data['Active']) {
        //throw new \Exception('CreateFeatureRestrictionForPersona');
        return CreateFeatureRestrictionForPersona($data);
    }

    return UpdateFeatureRestrictionForPersona($data);
}

function UpdateFeatureRestriction($data) {
    $ids = FieldUtils::SPLIT_ID($data['FeatureId']);
    if(is_null($ids)||count($ids)<=1) return array();
    foreach( (new  \MapPersonaFeatureConstraintQuery())->findByPersonaId($ids[0]) as $item){
        if($item->getFeatureTypeId() == $ids[1]) {
            if(ArrayUtils::KEY_EXISTS($data,'PersonaId'))  $item->setPersonaId($data['PersonaId']);
            if(ArrayUtils::KEY_EXISTS($data, 'Negative'))$item->setNegative($data['Negative']);
            return $item;
        }
    }
    return $data;
}

function CreateFeatureRestrictionForPersona($data) {
    if(!array_key_exists('PersonaId',$data)) throw new \Exception("Required field PersonaId not found for deleting row");
    if(!array_key_exists('FeatureTypeId',$data)) throw new \Exception("Required field FeatureTypeId not found for deleting row");

    $item = new \MapPersonaFeatureConstraint();
    $item->setPersonaId($data['PersonaId']);
    $item->setFeatureTypeId($data['FeatureTypeId']);
    if(ArrayUtils::KEY_EXISTS($data, 'Negative'))$item->setNegative($data['Negative']);
    //$item->setUpdateTime(new DateTime());
    if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $item->setUpdateUser($data['UpdateUser']);
    $item->save();

    $data['Active'] = 1;

    return $data;
}

function DeleteFeatureRestrictionForPersona($id) {
    $ids = FieldUtils::SPLIT_ID($id);
    if(is_null($ids)||count($ids)<=1) return array();
    foreach( (new  \MapPersonaFeatureConstraintQuery())->findByPersonaId($ids[0]) as $item){
        if($item->getFeatureTypeId() == $ids[1]) {
            $item->delete();
        }
    }
    return array();
}


/* CreditCardRestriction */
function GetAllCreditCardRestrictions()
{
    $result = array();
    foreach ((new \CardRestrictionQuery())->orderByRestrictionTypeId()->find() as $af) {
        array_push($result, JCreditCardRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetCreditCardRestrictionById($id)
{
    $result = array();
    foreach ((new \CardRestrictionQuery())->findPk($id) as $af) {
        array_push($result, JCreditCardRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetCreditCardRestrictionByCreditCardId($id)
{
    $result = array();
    foreach ((new \CardRestrictionQuery())->orderByRestrictionTypeId()->findByCreditCardId($id) as $af) {
        array_push($result, JCreditCardRestriction::CREATE_FROM_DB($af));
    }
    return $result;
}

function UpdateCreditCardRestrictionForCrud($data)
{
    $parsed = JCreditCardRestriction::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse GeneralRestriction update request");
    if(!$parsed->saveToDb()) throw new \Exception("Error saving object to database");

    //TODO implement cache, then refresh
    return JCreditCardRestriction::CREATE_FROM_DB($parsed->tryLoadFromDB());
}

function CreateCreditCardRestrictionForCrud($data)
{
    $parsed = JCreditCardRestriction::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse GeneralRestriction update request");
    if(!$parsed->saveToDb()) throw new \Exception("Error saving object to database");

    //TODO implement cache, add to cache
    return $parsed;
}
function DeleteCreditCardRestrictionForCrud($id)
{
    $item = JCreditCardRestriction::LOAD_FROM_ID($id);
    $item->delete();
    return array();
}




/* CardFeatureRestriction */
function GetAllCardFeatureRestrictions(){
    $personaFeatures = array();

    foreach ((new \MapCardFeatureConstraintQuery())->find() as $item) {
        $stuff  = JFeatureType::CREATE_FROM_DB($item->getCardFeatureType());
        $stuff->Active = 1;
        array_push($personaFeatures, $stuff);
    }


    return $personaFeatures;
}

function GetCardFeatureRestrictionForCreditCard($id) {
    $personaFeatures = array();
    $existingIds = array();
    foreach ((new \MapCardFeatureConstraintQuery())->findByCreditCardId($id) as $item) {
        $stuff  = JFeatureType::CREATE_FROM_DB($item->getCardFeatureType());
        $stuff->Active = 1;
        $stuff->CreditCardId = $id;
        $stuff->FeatureId = $id . "_" . $stuff->FeatureTypeId;
        array_push($personaFeatures, $stuff);
        array_push($existingIds, $stuff->FeatureTypeId);
    }

    $allFeatures = array();
    foreach ((new \CardFeatureTypeQuery())->orderByFeatureTypeId()->find() as $item) {
        $stuff  = JFeatureType::CREATE_FROM_DB($item);
        $stuff->Active = 0;
        $stuff->CreditCardId = $id;
        $stuff->FeatureId = $id . "_" . $stuff->FeatureTypeId;
        array_push($allFeatures, $stuff);
    }

    foreach($allFeatures as $type) {
        if(!in_array($type->FeatureTypeId,$existingIds)) {
            array_push($personaFeatures, $type);
        }
    }

    return $personaFeatures;
}

function UpdateCardFeatureRestrictionForCreditCard($data) {
    if(!array_key_exists('FeatureId',$data)) throw new \Exception('FeatureId not defined');
    if(!array_key_exists('Active',$data)) throw new \Exception('Key Active not defined');

    if(array_key_exists('Active',$data) && !is_null($data['Active'])){
        DeleteCardFeatureRestrictionForCreditCard($data['FeatureId']);
        //throw new \Exception('DeleteCardFeatureRestrictionForPersona');
    }

    if($data['Active']) {
        //throw new \Exception('CreateCardFeatureRestrictionForPersona');
        return CreateCardFeatureRestrictionForCreditCard($data);
    }

    //throw new \Exception('UpdateCardFeatureRestrictionForPersona');
    return UpdateCardFeatureRestriction($data);
}

function UpdateCardFeatureRestriction($data) {
    $ids = FieldUtils::SPLIT_ID($data['FeatureId']);
    if(is_null($ids)||count($ids)<=1) return array();
    foreach( (new  \MapCardFeatureConstraintQuery())->findByCreditCardId($ids[0]) as $item){
        if($item->getFeatureTypeId() == $ids[1]) {
            if(ArrayUtils::KEY_EXISTS($data,'CreditCardId'))  $item->setCreditCardId($data['CreditCardId']);
            return $item;
        }
    }
    return $data;
}

function CreateCardFeatureRestrictionForCreditCard($data) {
    if(!array_key_exists('CreditCardId',$data)) throw new \Exception("Required field CreditCardId not found for deleting row");
    if(!array_key_exists('FeatureTypeId',$data)) throw new \Exception("Required field FeatureTypeId not found for deleting row");

    $item = new \MapCardFeatureConstraint();
    $item->setCreditCardId($data['CreditCardId']);
    $item->setFeatureTypeId($data['FeatureTypeId']);
    //$item->setUpdateTime(new DateTime());
    if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $item->setUpdateUser($data['UpdateUser']);
    $item->save();

    $data['Active'] = 1;

    return $data;
}

function DeleteCardFeatureRestrictionForCreditCard($id) {
    $ids = FieldUtils::SPLIT_ID($id);
    if(is_null($ids)||count($ids)<=1) return array();
    foreach( (new  \MapCardFeatureConstraintQuery())->findByCreditCardId($ids[0]) as $item){
        if($item->getFeatureTypeId() == $ids[1]) {
            $item->delete();
        }
    }
    return array();
}

?>