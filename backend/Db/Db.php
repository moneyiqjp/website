<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:02 PM
 */
namespace Db;

// setup the autoloading
use Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Length;

require_once(__DIR__.'/../vendor/autoload.php');
require_once(__DIR__ . '/../generated-conf/config.php');
include_once(__DIR__ . "/Utility/ArrayUtils.php");
include_once(__DIR__ . "/Json/JSONInterface.php");

spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }
    //$namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);

    $class=__DIR__ . '/../'.(empty($namespace)?"":$namespace."/")."{$className}.php";
    echo $class;
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
        //array_push($result,Json\JObject::CREATE("None",-1));
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
    function GetCreditCardById($id)
    {
        $result = array();
        $q = new  \CreditCardQuery();

        foreach($q->findPk($id) as $ccs)
        {
            array_push($result, Json\JCreditCard::CREATE_DB($ccs));
        }
        return $result;
    }

    function UpdateCreditCard($data)
    {
        $q = new  \CreditCardQuery();
        $ccs = $q->findPk($data['credit_card_id']);

        if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");

        $ccs->UpdateFromArray($data);

        //TODO implement cache, then refresh
        $q = new  \CreditCardQuery();
        $ccs = $q->findPk($data['credit_card_id']);
        if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");

        return Json\JCreditCard::CREATE_DB($ccs);
    }
    function CreateCreditCard($data)
    {
        $ccs = new \CreditCard();
        $ccs->UpdateFromArray($data);
        if(is_null($ccs)) throw new \Exception ("Credit card with id ". $data['credit_card_id'] ." not found");
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
        foreach ((new \StoreQuery())->orderByStoreCategoryId()->orderByStoreName()->find() as $af) {
            if(!is_null($af))
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

        if(!FieldUtils::ID_IS_DEFINED($parsed->StoreId)) throw new \Exception("Failed to parse ID");

        $item = (new  \StoreQuery())->findPk($parsed->StoreId);
        if(is_null($item)) throw new \Exception ("Store with id ". $parsed->StoreId ." not found");

        //$new = $parsed->updateDB($item);
        if(!$parsed->saveToDb())   throw new \Exception("Failed to save store with id " . $parsed->StoreId);

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
        $item->reload();

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

    /* PointSystem */
    function GetCardPointSystemMappingForCrud()
    {
        $result = array();
        foreach ((new \CardPointSystemQuery())->find() as $af) {
            array_push($result, Json\JCreditCardToPointSystemMapping::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetCardPointSystemMappingForPointSystem($id)
    {
        $result = array();
        foreach ((new \CardPointSystemQuery())->findByPointSystemId($id) as $item) {
            array_push($result, Json\JCreditCardToPointSystemMapping::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function GetCardPointSystemMappingForCard($id)
    {
        $result = array();
        foreach ((new \CardPointSystemQuery())->findByCreditCardId($id) as $item) {
            array_push($result, Json\JCreditCardToPointSystemMapping::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function GetPointSystemById($id)
    {
        $result = array();
        foreach ((new \PointSystemQuery())->findByPointSystemId($id) as $item) {
            array_push($result, Json\JPointSystem::CREATE_FROM_DB($item));
        }
        return $result;

    }
    function UpdateCardPointSystemMappingForCrud($data)
    {
        $parsed = Json\JPointSystem::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointSystem update request");

        $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
        if(is_null($item)) throw new \Exception ("PointSystem with id ". $parsed->PointSystemId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
        return Json\JPointSystem::CREATE_FROM_DB($item);
    }
    function CreateCardPointSystemMappingForCrud($data)
    {
        $item = Json\JCreditCardToPointSystemMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JCreditCardToPointSystemMapping::CREATE_FROM_DB($item);
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
            array_push($result, Json\JPointAcquisition::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetPointAcquisitionById($id)
    {
        $result = array();
        foreach ((new \PointAcquisitionQuery())->orderByPointAcquisitionName()->findPk($id) as $af) {
            array_push($result, Json\JPointAcquisition::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetPointAcquisitionByPointSystemId($id)
    {
        $result = array();
        foreach ((new \PointAcquisitionQuery())->orderByPointAcquisitionName()->findByPointSystemId($id) as $af) {
            array_push($result, Json\JPointAcquisition::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdatePointAcquisitionForCrud($data)
    {
        $parsed = Json\JPointAcquisition::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointAcquisition update request");

        $item = (new  \PointAcquisitionQuery())->findPk($parsed->PointAcquisitionId);
        if(is_null($item)) throw new \Exception ("PointAcquisition with id ". $parsed->PointAcquisitionId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \PointAcquisitionQuery())->findPk($parsed->PointAcquisitionId);
        return Json\JPointAcquisition::CREATE_FROM_DB($item);
    }
    function CreatePointAcquisitionForCrud($data)
    {
        $item = Json\JPointAcquisition::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JPointAcquisition::CREATE_FROM_DB($item);
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


    /* Reward */
    function GetRewardForCrud()
    {
        $result = array();
        foreach ((new \RewardQuery())->orderByDescription()->find() as $af) {
            array_push($result, Json\JReward::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetRewardById($id)
    {
        $result = array();
        foreach ((new \RewardQuery())->orderByDescription()->findPk($id) as $af) {
            array_push($result, Json\JReward::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetRewardByPointSystemId($id)
    {
        $result = array();
        foreach ((new \RewardQuery())->orderByDescription()->findByPointSystemId($id) as $af) {
            array_push($result, Json\JReward::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateRewardForCrud($data)
    {
        $parsed = Json\JReward::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Reward update request");

        $item = (new  \RewardQuery())->findPk($parsed->RewardId);
        if(is_null($item)) throw new \Exception ("Reward with id ". $parsed->RewardId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \RewardQuery())->findPk($parsed->RewardId);
        return Json\JReward::CREATE_FROM_DB($item);
    }
    function CreateRewardForCrud($data)
    {
        $item = Json\JReward::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JReward::CREATE_FROM_DB($item);
    }
    function DeleteRewardForCrud($id)
    {
        $item = (new  \RewardQuery())->findPk($id);
        if(is_null($item)) {
            throw new \Exception ("Reward with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }

    /* RewardType */
    function GetRewardTypeForDisplay()
    {
        $result = array();
        foreach ((new \RewardTypeQuery())->orderByName()->find() as $af) {
            array_push($result,  Json\JObject::CREATE($af->getName(),$af->getRewardTypeId()));
        }
        return $result;
    }
    function GetRewardTypeForCrud()
    {
        $result = array();
        foreach ((new \RewardTypeQuery())->orderByName()->find() as $af) {
            array_push($result, Json\JRewardType::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetRewardTypeById($id)
    {
        $result = array();
        foreach ((new \RewardTypeQuery())->orderByName()->findPk($id) as $af) {
            array_push($result, Json\JRewardType::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateRewardTypeForCrud($data)
    {
        $parsed = Json\JRewardType::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse RewardType update request");

        $item = (new  \RewardTypeQuery())->findPk($parsed->RewardTypeId);
        if(is_null($item)) throw new \Exception ("RewardType with id ". $parsed->RewardTypeId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \RewardTypeQuery())->findPk($parsed->RewardTypeId);
        return Json\JRewardType::CREATE_FROM_DB($item);
    }
    function CreateRewardTypeForCrud($data)
    {
        $item = Json\JRewardType::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JRewardType::CREATE_FROM_DB($item);
    }
    function DeleteRewardTypeForCrud($id)
    {
        $item = (new  \RewardTypeQuery())->findPk($id);
        if(is_null($item)) {
            throw new \Exception ("RewardType with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }

    
    /* RewardCategory */
    function GetRewardCategoryForDisplay()
    {

        $result = array();
        foreach ((new \RewardCategoryQuery())->orderByName()->find() as $af) {
            array_push($result,  Json\JObject::CREATE($af->getName(),$af->getRewardCategoryId()));
        }
        return $result;
    }
    function GetRewardCategoryForCrud()
    {
        $result = array();
        foreach ((new \RewardCategoryQuery())->orderByName()->find() as $af) {
            array_push($result, Json\JRewardCategory::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetRewardCategoryById($id)
    {
        $result = array();
        foreach ((new \RewardCategoryQuery())->orderByName()->findPk($id) as $af) {
            array_push($result, Json\JRewardCategory::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateRewardCategoryForCrud($data)
    {
        $parsed = Json\JRewardCategory::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse RewardCategory update request");

        $item = (new  \RewardCategoryQuery())->findPk($parsed->RewardCategoryId);
        if(is_null($item)) throw new \Exception ("RewardCategory with id ". $parsed->RewardCategoryId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \RewardCategoryQuery())->findPk($parsed->RewardCategoryId);
        return Json\JRewardCategory::CREATE_FROM_DB($item);
    }
    function CreateRewardCategoryForCrud($data)
    {
        $item = Json\JRewardCategory::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JRewardCategory::CREATE_FROM_DB($item);
    }
    function DeleteRewardCategoryForCrud($id)
    {
        $item = (new  \RewardCategoryQuery())->findPk($id);
        if(is_null($item)) {
            throw new \Exception ("RewardCategory with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }


    /* PointUsage */
    function GetPointUsageForCrud()
    {
        $result = array();
        foreach ((new \PointUseQuery())->orderByPointUseId()->find() as $af) {
            array_push($result, Json\JPointUsage::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetPointUsageById($id)
    {
        $result = array();
        foreach ((new \PointUseQuery())->orderByPointUseId()->findPk($id) as $af) {
            array_push($result, Json\JPointUsage::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetPointUsageByPointSystemId($id)
    {
        $result = array();
        foreach ((new \PointUseQuery())->orderByPointUseId()->findByPointSystemId($id) as $af) {
            array_push($result, Json\JPointUsage::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdatePointUsageForCrud($data)
    {
        $parsed = Json\JPointUsage::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointUsage update request");

        $item = (new  \PointUseQuery())->findPk($parsed->PointUsageId);
        if(is_null($item)) throw new \Exception ("PointUsage with id ". $parsed->PointUsageId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \PointUseQuery())->findPk($parsed->PointUsageId);
        return Json\JPointUsage::CREATE_FROM_DB($item);
    }
    function CreatePointUsageForCrud($data)
    {
        $item = Json\JPointUsage::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JPointUsage::CREATE_FROM_DB($item);
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
            array_push($result, Json\JPointSystem::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetPointSystemForCard($id)
    {
        $result = array();
        foreach ((new \CardPointSystemQuery())->findByCreditCardId($id) as $item) {
            array_push($result, Json\JPointSystem::CREATE_FROM_DB($item->getPointSystem()));
        }
        return $result;
    }
    function UpdatePointSystemForCrud($data)
    {
        $parsed = Json\JPointSystem::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointSystem update request");

        $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
        if(is_null($item)) throw new \Exception ("PointSystem with id ". $parsed->PointSystemId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \PointSystemQuery())->findPk($parsed->PointSystemId);
        return Json\JPointSystem::CREATE_FROM_DB($item);
    }
    function CreatePointSystemForCrud($data)
    {
        $item = Json\JPointSystem::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JPointSystem::CREATE_FROM_DB($item);
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
        $creditCard = null;
        foreach ((new \CardFeaturesQuery())->findByCreditCardId($id) as $item) {
            $creditCard = $item->getCreditCard();
            $stuff =Json\JFeature::CREATE_FROM_DB($item);
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
        $stuff->IssuingFee = 0;

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
    /*
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
    */

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

    /* Interest */
    function GetInterestForCrud()
    {
        $result = array();
        foreach ((new \InterestQuery())->orderByInterestId()->find() as $item) {
            array_push($result, Json\JInterest::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function GetInterestForCard($id)
    {
        $result = array();
        foreach ((new \InterestQuery())->orderByInterestId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JInterest::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function UpdateInterestForCrud($data)
    {
        $parsed = Json\JInterest::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Interest type update request");

        $item = (new  \InterestQuery())->findPk($parsed->InterestId);
        if(is_null($item)) throw new \Exception ("Interest id ". $parsed->InterestId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \InterestQuery())->findPk($parsed->InterestId);
        return Json\JInterest::CREATE_FROM_DB($item);
    }
    function CreateInterestForCrud($data)
    {
        $item = Json\JInterest::CREATE_FROM_ARRAY($data);

        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JInterest::CREATE_FROM_DB($db);
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
            array_push($result, Json\JFee::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function GetFeeForCard($id)
    {
        $result = array();
        foreach ((new \FeesQuery())->orderByFeeId()->findByCreditCardId($id) as $item) {
            array_push($result, Json\JFee::CREATE_FROM_DB($item));
        }
        return $result;
    }
    function UpdateFeeForCrud($data)
    {
        $parsed = Json\JFee::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Fee type update request");

        $item = (new  \FeesQuery())->findPk($parsed->FeeId);
        if(is_null($item)) throw new \Exception ("Fee id ". $parsed->FeeId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \FeesQuery())->findPk($parsed->FeeId);
        return Json\JFee::CREATE_FROM_DB($item);
    }
    function CreateFeeForCrud($data)
    {
        $item = Json\JFee::CREATE_FROM_ARRAY($data);

        $db=$item->toDB();
        $db->save();

        //TODO implement cache, add to cache
        return Json\JFee::CREATE_FROM_DB($db);
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


    /* Unit */
    function GetUnitForDisplay()
    {
        $result = array();
        foreach ((new \UnitQuery())->orderByName()->find() as $af) {
            array_push($result,  Json\JObject::CREATE($af->getName(),$af->getUnitId()));
        }
        return $result;
    }
    function GetUnitForCrud()
    {
        $result = array();
        foreach ((new \UnitQuery())->orderByName()->find() as $af) {
            array_push($result, Json\JUnit::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetUnitById($id)
    {
        $result = array();
        foreach ((new \UnitQuery())->orderByName()->findPk($id) as $af) {
            array_push($result, Json\JUnit::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateUnitForCrud($data)
    {
        $parsed = Json\JUnit::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse Unit update request");

        $item = (new  \UnitQuery())->findPk($parsed->UnitId);
        if(is_null($item)) throw new \Exception ("Unit with id ". $parsed->UnitId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \UnitQuery())->findPk($parsed->UnitId);
        return Json\JUnit::CREATE_FROM_DB($item);
    }
    function CreateUnitForCrud($data)
    {
        $item = Json\JUnit::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JUnit::CREATE_FROM_DB($item);
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


    /* StoreCategory */
    function GetStoreCategoryForDisplay()
    {
        $result = array();
        foreach ((new \StoreCategoryQuery())->orderByName()->find() as $af) {
            array_push($result,  Json\JObject::CREATE($af->getName(),$af->getStoreCategoryId()));
        }
        return $result;
    }
    function GetStoreCategoryForCrud()
    {
        $result = array();
        foreach ((new \StoreCategoryQuery())->orderByName()->find() as $af) {
            array_push($result, Json\JStoreCategory::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function GetStoreCategoryById($id)
    {
        $result = array();
        foreach ((new \StoreCategoryQuery())->orderByName()->findPk($id) as $af) {
            array_push($result, Json\JStoreCategory::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateStoreCategoryForCrud($data)
    {
        $parsed = Json\JStoreCategory::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse StoreCategory update request");

        $item = (new  \StoreCategoryQuery())->findPk($parsed->StoreCategoryId);
        if(is_null($item)) throw new \Exception ("StoreCategory with id ". $parsed->StoreCategoryId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \StoreCategoryQuery())->findPk($parsed->StoreCategoryId);
        return Json\JStoreCategory::CREATE_FROM_DB($item);
    }
    function CreateStoreCategoryForCrud($data)
    {
        $item = Json\JStoreCategory::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return Json\JStoreCategory::CREATE_FROM_DB($item);
    }
    function DeleteStoreCategoryForCrud($id)
    {
        $item = (new  \StoreCategoryQuery())->findPk($id);
        if(is_null($item)) {
            throw new \Exception ("StoreCategory with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }

}