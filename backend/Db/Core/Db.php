<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:02 PM
 */
namespace Db\Core;

// setup the autoloading
use Db\Json;

require_once $_SERVER['DOCUMENT_ROOT'] .'/backend/vendor/autoload.php';
// setup Propel
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/generated-conf/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/Db/Json/JSONInterface.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/Db/Utility/ArrayUtils.php';

spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }

    //$namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);
    $class=$_SERVER['DOCUMENT_ROOT'] . '/backend/'.(empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
    return true;
});


class Db
{
    //TODO convert to static
    function db()
    {
        return $this;
    }

    function GetAllCards()
    {
        $result = array();
        $q = new  \CreditCardQuery();
        foreach($q->orderByCreditCardId()->find() as $ccs)
        {
            array_push($result,CreditCard::fromCreditCardObject($ccs));
        }
        return $result;
    }


    function GetAllStores()
    {
        $result = array();
        foreach( (new \StoreQuery())->orderByCategory()->find() as $store)
        {
            array_push($result, SimpleStore::fromStoreObject($store));
        }

        return $result;
    }


    function GetAllFeatures()
    {
        $result = array();
        foreach( (new \CardFeatureTypeQuery())->orderByCategory()->find() as $ft)
        {
            array_push($result, SimpleCardFeatureType::fromCardFeatureTypeObject($ft));
        }

        return $result;
    }

    function GetIssuersForDisplay()
    {
        $result = array();
        foreach( (new \IssuerQuery())->orderByIssuerName()->find() as $issuer)
        {
            array_push($result, Json\JObject::CREATE($issuer->getIssuerName(), $issuer->getIssuerId()));
        }
        return $result;
    }

    function GetAffiliatesForDisplay()
    {
        $result = array();
        foreach( (new \AffiliateCompanyQuery())->orderByName()->find() as $issuer)
        {
            array_push($result, Json\JObject::CREATE($issuer->getName(), $issuer->getAffiliateId()));
        }
        array_push($result,Json\JObject::CREATE("None",-1));
        return $result;
    }

    function GetCreditCardForDisplay()
    {
        $result = array();
        $q = new  \CreditCardQuery();

        foreach($q->orderByCreditCardId()->find() as $ccs)
        {
            array_push($result, Json\JCreditCard::CREATE_DB($ccs));
        }
        return $result;
    }

    function UpdateCreditCardItem(\CreditCard &$ccs, $data, $key,$value)
    {
        if(!array_key_exists($key,$data)) throw new \Exception("Failed to find key: " . $key);
        switch($key)
        {
            case "name":
                $ccs->setName($value);
                break;
            case "issuer_id":

                $ccs->setIssuerId($value);
                break;
            case "description":
                $ccs->setDescription($value);
                break;
            case "image_link":
                $ccs->setImageLink($value);
                break;
            case "visa":
                $ccs->setVisa($value>0);
                break;
            case "master":
                $ccs->setMaster($value>0);
                break;
            case "jcb":
                $ccs->setJcb($value>0);
                break;
            case "amex":
                $ccs->setAmex($value>0);
                break;
            case "diners":
                $ccs->setDiners($value>0);
                break;
            case "affiliate_link":
                $ccs->setAfilliateLink($value);
                break;
            case "affiliate_id":
                $ccs->setAffiliateId($value);
                break;
            case "update_time":
                $ccs->setUpdateTime((new \DateTime()));
                break;
            case "update_user":
                $ccs->setUpdateUser($value);
                break;
        }

        return $ccs;
    }

    function UpdateCreditCard($data)
    {
        $q = new  \CreditCardQuery();
        $ccs = $q->findPk($data['credit_card_id']);

        if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");

        while (list($key, $value) = each($data)) {
            $this->UpdateCreditCardItem($ccs,$data,$key,$value);
        }
        $ccs->save();

        //TODO implement cache, then refresh
        $q = new  \CreditCardQuery();
        $ccs = $q->findPk($data['credit_card_id']);
        return Json\JCreditCard::CREATE_DB($ccs);
    }

    function CreateCreditCard($data)
    {
        $ccs = new \CreditCard();
        while (list($key, $value) = each($data)) {
            $this->UpdateCreditCardItem($ccs,$data,$key,$value);
        }
        $ccs->save();

        //TODO implement cache, add to cache
        #$q = new  \CreditCardQuery();
        #$ccs = $q->findPk($data['credit_card_id']);
        return Json\JCreditCard::CREATE_DB($ccs);
    }

    function DeleteCreditCard($id)
    {
        $ccs = (new  \CreditCardQuery())->findPk($id);

        if(is_null($ccs)) throw new \Exception ("Credit card with id ". $id ." not found");
        $ccs->delete();
        return array();
    }

    function GetAffiliatesForCrud()
    {
        $result = array();
        foreach ((new \AffiliateCompanyQuery())->orderByName()->find() as $af) {
            array_push($result, Json\JAffiliateCompany::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateAffiliatesForCrud($data)
    {
        $parsed = Json\JAffiliateCompany::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

        $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
        if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
        return Json\JAffiliateCompany::CREATE_FROM_DB($item);
    }
    function CreateAffiliatesForCrud($data)
    {
        $parsed = Json\JAffiliateCompany::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

        $item = $parsed->toDB();
        if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");
        $item->save();

        //TODO implement cache, add to cache
        return Json\JAffiliateCompany::CREATE_FROM_DB($item);
    }
    function DeleteAffiliatesForCrud($id)
    {
        $item = (new  \AffiliateCompanyQuery())->findPk($id);
        if(is_null($item)) throw new \Exception ("Affiliate Company with id ". $id ." not found");
        $item->delete();
        return array();
    }

    /*  */
    function GetStoresForDisplay()
    {
        $result = array();
        foreach ((new \StoreQuery())->orderByCategory()->orderByStoreName()->find() as $af) {
            array_push($result, Json\JStore::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetStoresForCrud()
    {
        return $this->GetStoresForDisplay();
    }
    function UpdateStoreForCrud($data)
    {
        $parsed = Json\JStore::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Store update request");

        $item = (new  \StoreQuery())->findPk($parsed->StoreId);
        if(is_null($item)) throw new \Exception ("Store with id ". $parsed->StoreId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \StoreQuery())->findPk($parsed->StoreId);
        return Json\JStore::CREATE_FROM_DB($item);
    }
    function CreateStoreForCrud($data)
    {
        $parsed = Json\JStore::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Store update request");

        $item = $parsed->toDB();
        if(is_null($item)) throw new \Exception ("Store with id ". $parsed->StoreId ." not found");
        $item->save();

        //TODO implement cache, add to cache
        return Json\JStore::CREATE_FROM_DB($item);
    }
    function DeleteStoreForCrud($id)
    {
        $item = (new  \StoreQuery())->findPk($id);
        if(is_null($item)) throw new \Exception ("Store with id ". $id ." not found");
        $item->delete();
        return array();
    }



    /* Issuer */
    function GetIssuerForCrud()
    {
        $result = array();
        foreach ((new \IssuerQuery())->orderByIssuerName()->find() as $af) {
            array_push($result, Json\JIssuer::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateIssuerForCrud($data)
    {
        $parsed = Json\JIssuer::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse issuer update request");

        $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
        if(is_null($item)) throw new \Exception ("Issuer with id ". $parsed->IssuerId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
        return Json\JIssuer::CREATE_FROM_DB($item);
    }
    function CreateIssuerForCrud($data)
    {
        $item = Json\JIssuer::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JIssuer::CREATE_FROM_DB($item);
    }
    function DeleteIssuerForCrud($id)
    {
        $item = (new  \IssuerQuery())->findPk($id);
        if(is_null($item)) {
                throw new \Exception ("Issuer with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }

    /* InsuranceType */
    function GetInsuranceTypeForCrud()
    {
        $result = array();
        foreach ((new \InsuranceTypeQuery())->orderByTypeName()->find() as $item) {
            array_push($result, Json\JInsuranceType::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function UpdateInsuranceTypeForCrud($data)
    {
        $parsed = Json\JInsuranceType::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse insurance update request");

        $item = (new  \InsuranceTypeQuery())->findPk($parsed->InsuranceTypeId);
        if(is_null($item)) throw new \Exception ("insurance with id ". $parsed->InsuranceTypeId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \InsuranceTypeQuery())->findPk($parsed->InsuranceTypeId);
        return Json\JInsuranceType::CREATE_FROM_DB($item);
    }
    function CreateInsuranceTypeForCrud($data)
    {
        $item = Json\JInsuranceType::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JInsuranceType::CREATE_FROM_DB($item);
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
            array_push($result, Json\JFeatureType::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateFeatureTypeForCrud($data)
    {
        $parsed = Json\JFeatureType::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse feature type update request");

        $item = (new  \CardFeatureTypeQuery())->findPk($parsed->FeatureTypeId);
        if(is_null($item)) throw new \Exception ("feature type with id ". $parsed->FeatureTypeId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \CardFeatureTypeQuery())->findPk($parsed->FeatureTypeId);
        return Json\JFeatureType::CREATE_FROM_DB($item);
    }

    function CreateFeatureTypeForCrud($data)
    {
        $item = Json\JFeatureType::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JFeatureType::CREATE_FROM_DB($item);
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

    /* Features */
    function GetFeatureForCrud()
    {
        $result = array();
        foreach ((new \CardFeaturesQuery())->orderByFeatureId()->find() as $item) {
            array_push($result, Json\JFeature::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateFeatureForCrud($data)
    {
        $parsed = Json\JFeature::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse feature type update request");

        if(!is_null($parsed->Active) && !$parsed->Active) return $parsed;

        $item = (new  \CardFeaturesQuery())->findPk($parsed->FeatureId);
        if(is_null($item)) throw new \Exception ("feature with id ". $parsed->FeatureId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \CardFeaturesQuery())->findPk($parsed->FeatureId);
        return Json\JFeature::CREATE_FROM_DB($item);
    }

    function CreateFeatureForCrud($data)
    {
        $item = Json\JFeature::CREATE_FROM_ARRAY($data);
        if(!is_null($item->Active) && !$item->Active) return $item;
        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JFeature::CREATE_FROM_DB($db);
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
        $creditCard = new \CreditCard();
        foreach ((new \CardFeaturesQuery())->findByCreditCardId($id) as $item) {
            $creditCard = $item->getCreditCard();
            $stuff =Json\JFeature::CREATE_FROM_DB($item);
            $stuff->Active = true;
            array_push($cardFeatures, $stuff);
        }

        $allFeatures = array(); $ids = -1;
        foreach ((new \CardFeatureTypeQuery())->orderByFeatureTypeId()->find() as $item) {
            $stuff = Json\JFeature::CREATE_FROM_FEATURE_TYPE_AND_CC($item,$creditCard);
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
            return $this->CreateFeatureForCard($data);
        }

        if(array_key_exists('Active',$data) && !is_null($data['Active']) && !$data['Active']){
            if(!array_key_exists('FeatureId',$data)) throw new \Exception("Required field FeatureId not found for deleting row");

            return $this->DeleteFeatureForCard($data['FeatureId']);
        }

        return $this->UpdateFeatureForCrud($data);
    }

    function CreateFeatureForCard($data) {
        return $this->CreateFeatureForCrud($data);
    }

    function DeleteFeatureForCard($id)
    {
        if(is_null($id)||$id<=0) return array();
        $item = (new  \CardFeaturesQuery())->findPk($id);
        if(is_null($item)) {
            throw new \Exception ("feature type with id ". $id ." not found");
        }

        $stuff = Json\JFeature::CREATE_FROM_FEATURE_TYPE_AND_CC($item->getCardFeatureType(),$item->getCreditCard());
        $stuff->Active = false;
        $stuff->FeatureId = (-1) * mt_rand(10000,100000);
        $stuff->FeatureCost = 0;

        $item->delete();
        return $stuff;
    }

    /* Descriptions */
    function GetDescriptionsForCard($id)
    {
        $result = array();
        foreach ((new \CardDescriptionQuery())->orderByItemId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JDescription::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function GetDescriptionsForCrud()
    {
        $result = array();
        foreach ((new \CardDescriptionQuery())->orderByItemId()->find() as $item) {
            array_push($result, Json\JDescription::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateDescriptionForCrud($data)
    {
        $parsed = Json\JDescription::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Description type update request");

        $item = (new  \CardDescriptionQuery())->findPk($parsed->ItemId);
        if(is_null($item)) throw new \Exception ("Description with id ". $parsed->ItemId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \CardDescriptionQuery())->findPk($parsed->ItemId);
        return Json\JDescription::CREATE_FROM_DB($item);
    }

    function CreateDescriptionForCrud($data)
    {
        $item = Json\JDescription::CREATE_FROM_ARRAY($data);
        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JDescription::CREATE_FROM_DB($db);
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
            array_push($result, Json\JCampaign::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function GetCampaignForCard($id)
    {
        $result = array();
        foreach ((new \CampaignQuery())->orderByCampaignId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JCampaign::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateCampaignForCrud($data)
    {
        $parsed = Json\JCampaign::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Campaign type update request");

        $item = (new  \CampaignQuery())->findPk($parsed->CampaignId);
        if(is_null($item)) throw new \Exception ("Campaign id ". $parsed->CampaignId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \CampaignQuery())->findPk($parsed->CampaignId);
        return Json\JCampaign::CREATE_FROM_DB($item);
    }

    function CreateCampaignForCrud($data)
    {
        $item = Json\JCampaign::CREATE_FROM_ARRAY($data);

        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JCampaign::CREATE_FROM_DB($db);
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
            array_push($result, Json\JDiscount::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function GetDiscountForCard($id)
    {
        $result = array();
        foreach ((new \DiscountsQuery())->orderByDiscountId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JDiscount::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateDiscountForCrud($data)
    {
        $parsed = Json\JDiscount::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Discount type update request");

        $item = (new  \DiscountsQuery())->findPk($parsed->DiscountId);
        if(is_null($item)) throw new \Exception ("Discount id ". $parsed->DiscountId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \DiscountsQuery())->findPk($parsed->DiscountId);
        return Json\JDiscount::CREATE_FROM_DB($item);
    }

    function CreateDiscountForCrud($data)
    {
        $item = Json\JDiscount::CREATE_FROM_ARRAY($data);

        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JDiscount::CREATE_FROM_DB($db);
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


    /* Point Mappings */
    function GetPointMappingForCard($id)
    {
        $cc = (new\CreditCardQuery())->findPk($id);
        if(is_null($cc)) return array();

        return Json\CStorePointMapping::GET_POINT_MAPPINGS_FROM_CREDIT_CARD($cc);
    }

    function UpdatePointMappingForCard($data)
    {

        $parsed = Json\CStorePointMapping::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointMapping type update request");

        if(!$parsed->saveToDb()) throw new \Exception("Failed to save point mapping ");

        return $parsed->Reload();
    }

    function CreatePointMappingForCard($data)
    {
        $parsed = Json\CStorePointMapping::CREATE_FROM_ARRAY_RELAXED($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointMapping create request");
        if(!$parsed->saveToDb()) throw new \Exception ("Failed to save PointMapping from create request");
        return $parsed->Reload();
    }

    function DeletePointMappingForCard($id)
    {
        if(is_null($id)) throw new \Exception("No valid PointMapping id provided (was null)");

        if(!Json\CStorePointMapping::DELETE_BY_ID($id)) throw new \Exception("Failed to delete point mapping " . $id);

        return array();
    }


    /* Insurance */
    function GetInsuranceForCrud()
    {
        $result = array();
        foreach ((new \InsuranceQuery())->orderByInsuranceId()->find() as $item) {
            array_push($result, Json\JInsurance::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function GetInsuranceForCard($id)
    {
        $result = array();
        foreach ((new \InsuranceQuery())->orderByInsuranceId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JInsurance::CREATE_FROM_DB($item));
        }
        return $result;
    }

    function UpdateInsuranceForCrud($data)
    {
        $parsed = Json\JInsurance::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Insurance type update request");

        $item = (new  \InsuranceQuery())->findPk($parsed->InsuranceId);
        if(is_null($item)) throw new \Exception ("Insurance id ". $parsed->InsuranceId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \InsuranceQuery())->findPk($parsed->InsuranceId);
        return Json\JInsurance::CREATE_FROM_DB($item);
    }

    function CreateInsuranceForCrud($data)
    {
        $item = Json\JInsurance::CREATE_FROM_ARRAY($data);

        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JInsurance::CREATE_FROM_DB($db);
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


}