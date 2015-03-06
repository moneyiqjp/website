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




}