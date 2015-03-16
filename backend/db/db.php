<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:02 PM
 */
namespace DB;

// setup the autoloading
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/vendor/autoload.php';
// setup Propel
require_once $_SERVER['DOCUMENT_ROOT'] . '/backend/generated-conf/config.php';
require 'CreditCard.php';
require 'JSONClasses.php';

use CreditCard\CreditCard;
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

class DB
{
    function db()
    {

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
            array_push($result, JSONStore::fromStoreObject($store));
        }

        return $result;
    }


    function GetAllFeatures()
    {
        $result = array();
        foreach( (new \CardFeatureTypeQuery())->orderByCategory()->find() as $ft)
        {
            array_push($result, JSONCreditCardFeatureType::fromCardFeatureTypeObject($ft));
        }

        return $result;
    }

    function GetIssuersForDisplay()
    {
        $result = array();
        foreach( (new \IssuerQuery())->orderByIssuerName()->find() as $issuer)
        {
            array_push($result, JSONObject::CREATE($issuer->getIssuerName(), $issuer->getIssuerId()));
        }
        return $result;
    }

    function GetAffiliatesForDisplay()
    {
        $result = array();
        foreach( (new \AffiliateCompanyQuery())->orderByName()->find() as $issuer)
        {
            array_push($result, JSONObject::CREATE($issuer->getName(), $issuer->getAffiliateId()));
        }
        array_push($result,JSONObject::CREATE("None",-1));
        return $result;
    }

    function GetCreditCardForDisplay()
    {
        $result = array();
        $q = new  \CreditCardQuery();

        foreach($q->orderByCreditCardId()->find() as $ccs)
        {
            array_push($result, JSONCreditCard::CREATE_DB($ccs));
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
        return JSONCreditCard::CREATE_DB($ccs);
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
        return JSONCreditCard::CREATE_DB($ccs);
    }

    function DeleteCreditCard($id)
    {
        $ccs = (new  \CreditCardQuery())->findPk($id);

        if(is_null($ccs)) throw new Exception ("Credit card with id ". $id ." not found");
        $ccs->delete();
        return array();
    }

    function GetAffiliatesForCrud()
    {
        $result = array();
        foreach ((new \AffiliateCompanyQuery())->orderByName()->find() as $af) {
            array_push($result, DBAffiliateCompany::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateAffiliatesForCrud($data)
    {
        $parsed = DBAffiliateCompany::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

        $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
        if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \AffiliateCompanyQuery())->findPk($parsed->AffiliateId);
        return DBAffiliateCompany::CREATE_FROM_DB($item);
    }
    function CreateAffiliatesForCrud($data)
    {
        $parsed = DBAffiliateCompany::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse AffiliateCompany update request");

        $item = $parsed->toDB();
        if(is_null($item)) throw new \Exception ("AffiliateCompany with id ". $parsed->AffiliateId ." not found");
        $item->save();

        //TODO implement cache, add to cache
        return DBAffiliateCompany::CREATE_FROM_DB($item);
    }
    function DeleteAffiliatesForCrud($id)
    {
        $item = (new  \AffiliateCompanyQuery())->findPk($id);
        if(is_null($item)) throw new Exception ("Affiliate Company with id ". $id ." not found");
        $item->delete();
        return array();
    }

    function GetIssuerForCrud()
    {
        $result = array();
        foreach ((new \IssuerQuery())->orderByIssuerName()->find() as $af) {
            array_push($result, DBIssuer::CREATE_FROM_DB($af));
        }
        return $result;
    }
    function UpdateIssuerForCrud($data)
    {
        $parsed = DBIssuer::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse issuer update request");

        $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
        if(is_null($item)) throw new \Exception ("Issuer with id ". $parsed->IssuerId ." not found");

        $item = $parsed->updateDB($item);
        $item->save();

        //TODO implement cache, then refresh
        $item = (new  \IssuerQuery())->findPk($parsed->IssuerId);
        return DBIssuer::CREATE_FROM_DB($item);
    }
    function CreateIssuerForCrud($data)
    {
        $item = DBIssuer::CREATE_FROM_ARRAY($data)->toDB();
        $item->save();

        //TODO implement cache, add to cache
        return DBIssuer::CREATE_FROM_DB($item);
    }
    function DeleteIssuerForCrud($id)
    {
        $item = (new  \IssuerQuery())->findPk($id);
        if(is_null($item)) {
                throw new Exception ("Issuer with id ". $id ." not found");
        }
        $item->delete();
        return array();
    }

}