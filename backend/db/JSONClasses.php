<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/7/2015
 * Time: 12:18 AM
 */

namespace db;


class JSONCreditCardFeatureType {
    public $feature;
    public $category;


    function JSONCreditCardFeatureType()
    {
        return $this;
    }

    public static function fromCardFeatureTypeObject(\CardFeatureType $ft)
    {
        $mine = new JSONCreditCardFeatureType();
        $mine->feature = $ft->getName();
        $mine->category = $ft->getCategory();
        return $mine;
    }
}

class JSONStore
{
    public $storeName;
    public $category;


    function JSONStore()
    {
        return $this;
    }

    public static function fromStoreObject(\Store $store)
    {
        $mystore = new JSONStore();
        $mystore->storeName = $store->getStoreName();
        $mystore->category = $store->getCategory();
        return $mystore;
    }
}