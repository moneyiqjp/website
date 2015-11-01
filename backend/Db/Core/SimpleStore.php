<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 10:26 PM
 */

namespace Db\Core;


class SimpleStore {
    public $storeName;
    public $category;
    public $allocation;


    function SimpleStore()
    {
        return $this;
    }

    public static function fromStoreObject(\Store $store)
    {
        $my_store = new SimpleStore();
        $my_store->storeName = $store->getStoreName();
        $my_store->category = $store->getStoreCategory()->getName();
        $my_store->allocation = is_null($store->getAllocation())? 0.1 : $store->getAllocation() * 0.01;
        return $my_store;
    }
}