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


    function SimpleStore()
    {
        return $this;
    }

    public static function fromStoreObject(\Store $store)
    {
        $my_store = new SimpleStore();
        $my_store->storeName = $store->getStoreName();
        $my_store->category = $store->getStoreCategory()->getName();
        return $my_store;
    }
}