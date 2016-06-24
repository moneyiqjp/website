<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:55 PM
 */
namespace Db\CRUD;
use Db\Json\JObject;
use Db\Json\JAffiliateCompany;
use Db\Json\JCreditCard;
use Db\Json\JCampaign;
use Db\Json\JDescription;
use Db\Json\JDiscount;
use Db\Json\JFeature;
use Db\Json\JFee;
use Db\Json\JInsurance;
use Db\Json\JInterest;
use Db\Json\JIssuer;

/* Credit Card */
function GetCreditCardForDisplay() {
    $result = array();
    $q = new  \CreditCardQuery();

    foreach($q->orderByCreditCardId()->find() as $ccs)
    {
        array_push($result, JCreditCard::CREATE_DB($ccs));
    }
    return $result;
}
function GetCreditCardById($id) {
    $result = array();
    $q = new  \CreditCardQuery();

    foreach($q->findPk($id) as $ccs)
    {
        array_push($result, JCreditCard::CREATE_DB($ccs));
    }
    return $result;
}

function UpdateCreditCard($data) {
    $q = new  \CreditCardQuery();
    $ccs = $q->findPk($data['credit_card_id']);

    if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");

    $ccs->UpdateFromArray($data);

    //TODO implement cache, then refresh
    $q = new  \CreditCardQuery();
    $ccs = $q->findPk($data['credit_card_id']);
    if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");

    return JCreditCard::CREATE_DB($ccs);
}
function CreateCreditCard($data) {
    $ccs = new \CreditCard();
    $ccs->UpdateFromArray($data);
    if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");
    return JCreditCard::CREATE_DB($ccs);
}
function DeleteCreditCard($id) {
    $ccs = (new  \CreditCardQuery())->findPk($id);

    if(is_null($ccs)) throw new \Exception ("Credit card with id ". $id ." not found");
    $ccs->delete();
    return array();
}

/* Issuer */
function GetIssuersForDisplay() {
    $result = array();
    foreach( (new \IssuerQuery())->orderByIssuerName()->find() as $issuer)
    {
        array_push($result, JObject::CREATE($issuer->getIssuerName(), $issuer->getIssuerId()));
    }
    return $result;
}

function GetIssuerForCrud() {
    $result = array();
    foreach ((new \IssuerQuery())->orderByIssuerName()->find() as $af) {
        array_push($result, JIssuer::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateIssuerForCrud($data) {
    $parsed = JIssuer::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse issuer update request");

    $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
    if(is_null($item)) throw new \Exception ("Issuer with id ". $parsed->IssuerId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
    return JIssuer::CREATE_FROM_DB($item);
}
function CreateIssuerForCrud($data) {
    $item = JIssuer::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JIssuer::CREATE_FROM_DB($item);
}
function DeleteIssuerForCrud($id) {
    $item = (new  \IssuerQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Issuer with id ". $id ." not found");
    }
    $item->delete();
    return array();
}






/* Affiliates */
function GetAffiliatesForDisplay() {
    $result = array();
    foreach( (new \AffiliateCompanyQuery())->orderByName()->find() as $issuer)
    {
        array_push($result, JObject::CREATE($issuer->getName(), $issuer->getAffiliateId()));
    }
    //array_push($result,JObject::CREATE("None",-1));
    return $result;
}
function GetAffiliatesForCrud() {
    $result = array();
    foreach ((new \AffiliateCompanyQuery())->orderByName()->find() as $af) {
        array_push($result, JAffiliateCompany::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateAffiliatesForCrud($data) {
    $parsed = JAffiliateCompany::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

    $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
    if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
    return JAffiliateCompany::CREATE_FROM_DB($item);
}
function CreateAffiliatesForCrud($data) {
    $parsed = JAffiliateCompany::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

    $item = $parsed->toDB();
    if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");
    $item->save();

    //TODO implement cache, add to cache
    return JAffiliateCompany::CREATE_FROM_DB($item);
}
function DeleteAffiliatesForCrud($id) {
    $item = (new  \AffiliateCompanyQuery())->findPk($id);
    if(is_null($item)) throw new \Exception ("Affiliate Company with id ". $id ." not found");
    $item->delete();
    return array();
}




/* Features */
function GetFeatureForCrud()
{
    $result = array();
    foreach ((new \CardFeaturesQuery())->orderByFeatureId()->find() as $item) {
        array_push($result, JFeature::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateFeatureForCrud($data)
{
    $parsed = JFeature::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse feature type update request");

    if(!is_null($parsed->Active) && !$parsed->Active) return $parsed;

    $item = (new  \CardFeaturesQuery())->findPk($parsed->FeatureId);
    if(is_null($item)) throw new \Exception ("feature with id ". $parsed->FeatureId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \CardFeaturesQuery())->findPk($parsed->FeatureId);
    return JFeature::CREATE_FROM_DB($item);
}
function CreateFeatureForCrud($data)
{
    $item = JFeature::CREATE_FROM_ARRAY($data);
    if(!is_null($item->Active) && !$item->Active) return $item;
    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JFeature::CREATE_FROM_DB($db);
}
function DeleteFeatureForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \CardFeaturesQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("feature type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* added functionality for per credit card details */
function GetFeaturesForCard($id) {
    $cardFeatures = array();
    $creditCard = null;
    foreach ((new \CardFeaturesQuery())->findByCreditCardId($id) as $item) {
        $creditCard = $item->getCreditCard();
        $stuff = JFeature::CREATE_FROM_DB($item);
        $stuff->Active = true;
        array_push($cardFeatures, $stuff);
    }

    if(is_null($creditCard)) {
        $creditCard = (new \CreditCardQuery())->findPk($id);
        if(is_null($creditCard)) {
            throw new \Exception("Failed to find CreditCard with Id " . $id);
        }
    }

    $allFeatures = array(); $ids = -1;
    foreach ((new \CardFeatureTypeQuery())->orderByFeatureTypeId()->find() as $item) {
        $stuff = JFeature::CREATE_FROM_FEATURE_TYPE_AND_CC($item,$creditCard);
        $stuff->Active = false;
        $stuff->FeatureId = $ids--;
        //$stuff->FeatureCost = 0;
        array_push($allFeatures, $stuff);
    }

    $diff = array();
    foreach($allFeatures as $type) {
        $existing = false;
        foreach($cardFeatures as $exists)
        {
            if($exists->matchesOnType($type)) {
                $existing =true;
            }
        }
        if(!$existing) {
            array_push($diff, $type);
        }
    }

    return array_merge($cardFeatures,$diff);
}
function UpdateFeatureForCard($data) {
    if(!array_key_exists('FeatureId',$data)) throw new \Exception('FeatureId not defined');
    if($data['FeatureId'] < 0) {
        return CreateFeatureForCard($data);
    }

    if(array_key_exists('Active',$data) && !is_null($data['Active']) && !$data['Active']){
        if(!array_key_exists('FeatureId',$data)) throw new \Exception("Required field FeatureId not found for deleting row");

        return DeleteFeatureForCard($data['FeatureId']);
    }

    return UpdateFeatureForCrud($data);
}
function CreateFeatureForCard($data) {
    return CreateFeatureForCrud($data);
}
function DeleteFeatureForCard($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \CardFeaturesQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("feature type with id ". $id ." not found");
    }

    $stuff = JFeature::CREATE_FROM_FEATURE_TYPE_AND_CC($item->getCardFeatureType(),$item->getCreditCard());
    $stuff->Active = false;
    $stuff->FeatureId = (-1) * mt_rand(10000,100000);
    $stuff->IssuingFee = 0;

    $item->delete();
    return $stuff;
}



/* Descriptions */
function GetDescriptionsForCard($id)
{
    $result = array();
    foreach ((new \CardDescriptionQuery())->orderByItemId()->findByCreditCardId($id) as $item) {
        array_push($result, JDescription::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetDescriptionsForCrud()
{
    $result = array();
    foreach ((new \CardDescriptionQuery())->orderByItemId()->find() as $item) {
        array_push($result, JDescription::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateDescriptionForCrud($data)
{
    $parsed = JDescription::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Description type update request");

    $item = (new  \CardDescriptionQuery())->findPk($parsed->ItemId);
    if(is_null($item)) throw new \Exception ("Description with id ". $parsed->ItemId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \CardDescriptionQuery())->findPk($parsed->ItemId);
    return JDescription::CREATE_FROM_DB($item);
}
function CreateDescriptionForCrud($data)
{
    $item = JDescription::CREATE_FROM_ARRAY($data);
    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JDescription::CREATE_FROM_DB($db);
}
function DeleteDescriptionForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \CardDescriptionQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Description type with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* Campaigns */
function GetCampaignForCrud()
{
    $result = array();
    foreach ((new \CampaignQuery())->orderByCampaignId()->find() as $item) {
        array_push($result, JCampaign::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetCampaignForCard($id)
{
    $result = array();
    foreach ((new \CampaignQuery())->orderByCampaignId()->findByCreditCardId($id) as $item) {
        array_push($result, JCampaign::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateCampaignForCrud($data)
{
    $parsed = JCampaign::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Campaign type update request");

    $item = (new  \CampaignQuery())->findPk($parsed->CampaignId);
    if(is_null($item)) throw new \Exception ("Campaign id ". $parsed->CampaignId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \CampaignQuery())->findPk($parsed->CampaignId);
    return JCampaign::CREATE_FROM_DB($item);
}
function CreateCampaignForCrud($data)
{
    $item = JCampaign::CREATE_FROM_ARRAY($data);

    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JCampaign::CREATE_FROM_DB($db);
}
function DeleteCampaignForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \CampaignQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Campaign with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* Discounts */
function GetDiscountForCrud()
{
    $result = array();
    foreach ((new \DiscountsQuery())->orderByDiscountId()->find() as $item) {
        array_push($result, JDiscount::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetDiscountForCard($id)
{
    $result = array();
    foreach ((new \DiscountsQuery())->orderByDiscountId()->findByCreditCardId($id) as $item) {
        array_push($result, JDiscount::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateDiscountForCrud($data)
{
    $parsed = JDiscount::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Discount type update request");

    $item = (new  \DiscountsQuery())->findPk($parsed->DiscountId);
    if(is_null($item)) throw new \Exception ("Discount id ". $parsed->DiscountId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \DiscountsQuery())->findPk($parsed->DiscountId);
    return JDiscount::CREATE_FROM_DB($item);
}
function CreateDiscountForCrud($data)
{
    $item = JDiscount::CREATE_FROM_ARRAY($data);

    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JDiscount::CREATE_FROM_DB($db);
}
function DeleteDiscountForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \DiscountsQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Discount with id ". $id ." not found");
    }
    $item->delete();
    return array();
}



/* Insurance */
function GetInsuranceForCrud()
{
    $result = array();
    foreach ((new \InsuranceQuery())->orderByInsuranceId()->find() as $item) {
        array_push($result, JInsurance::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetInsuranceForCard($id)
{
    $result = array();
    foreach ((new \InsuranceQuery())->orderByInsuranceId()->findByCreditCardId($id) as $item) {
        array_push($result, JInsurance::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateInsuranceForCrud($data)
{
    $parsed = JInsurance::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Insurance type update request");

    $item = (new  \InsuranceQuery())->findPk($parsed->InsuranceId);
    if(is_null($item)) throw new \Exception ("Insurance id ". $parsed->InsuranceId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \InsuranceQuery())->findPk($parsed->InsuranceId);
    return JInsurance::CREATE_FROM_DB($item);
}
function CreateInsuranceForCrud($data)
{
    $item = JInsurance::CREATE_FROM_ARRAY($data);

    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JInsurance::CREATE_FROM_DB($db);
}
function DeleteInsuranceForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \InsuranceQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Insurance with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

/* Interest */
function GetInterestForCrud()
{
    $result = array();
    foreach ((new \InterestQuery())->orderByInterestId()->find() as $item) {
        array_push($result, JInterest::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetInterestForCard($id)
{
    $result = array();
    foreach ((new \InterestQuery())->orderByInterestId()->findByCreditCardId($id) as $item) {
        array_push($result, JInterest::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateInterestForCrud($data)
{
    $parsed = JInterest::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Interest type update request");

    $item = (new  \InterestQuery())->findPk($parsed->InterestId);
    if(is_null($item)) throw new \Exception ("Interest id ". $parsed->InterestId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \InterestQuery())->findPk($parsed->InterestId);
    return JInterest::CREATE_FROM_DB($item);
}
function CreateInterestForCrud($data)
{
    $item = JInterest::CREATE_FROM_ARRAY($data);

    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JInterest::CREATE_FROM_DB($db);
}
function DeleteInterestForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \InterestQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Interest with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* Fee */
function GetFeeForCrud()
{
    $result = array();
    foreach ((new \FeesQuery())->orderByFeeId()->find() as $item) {
        array_push($result, JFee::CREATE_FROM_DB($item));
    }
    return $result;
}
function GetFeeForCard($id)
{
    $result = array();
    foreach ((new \FeesQuery())->orderByFeeId()->findByCreditCardId($id) as $item) {
        array_push($result, JFee::CREATE_FROM_DB($item));
    }
    return $result;
}
function UpdateFeeForCrud($data)
{
    $parsed = JFee::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Fee type update request");

    $item = (new  \FeesQuery())->findPk($parsed->FeeId);
    if(is_null($item)) throw new \Exception ("Fee id ". $parsed->FeeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \FeesQuery())->findPk($parsed->FeeId);
    return JFee::CREATE_FROM_DB($item);
}
function CreateFeeForCrud($data)
{
    $item = JFee::CREATE_FROM_ARRAY($data);

    $db=$item->toDB();
    $db->save();

    //TODO implement cache, add to cache
    return JFee::CREATE_FROM_DB($db);
}
function DeleteFeeForCrud($id)
{
    if(is_null($id)||$id<=0) return array();
    $item = (new  \FeesQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Fee with id ". $id ." not found");
    }
    $item->delete();
    return array();
}
