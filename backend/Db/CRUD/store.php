<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2/9/2016
 * Time: 6:18 PM
 */

namespace Db\CRUD;
use Db\Json\JObject;
use Db\Json\JStore;
use Db\Json\JStoreCategory;
use Db\Utility\FieldUtils;


/* Store */
function GetStoreByCategoryId($categoryId) {
    $result = array();

    $category = \StoreCategoryQuery::create()->findOneByStoreCategoryId($categoryId);
    if(is_null($category)) return $result;
    foreach($category->getStores() as $store) {
        if(!is_null($store))   array_push($result, JStore::CREATE_FROM_DB($store));
    }

    return $result;
}

function GetStoreByCategoryName($name){
    $result = array();

    $category = \StoreCategoryQuery::create()->findOneByName($name);
    if(is_null($category)) return $result;
    foreach($category->getStores() as $store) {
        if(!is_null($store))   array_push($result, JStore::CREATE_FROM_DB($store));
    }

    return $result;
}

function GetStoresForDisplay() {
    $result = array();
    foreach ((new \StoreQuery())->orderByStoreCategoryId()->orderByStoreName()->find() as $af) {
        if(!is_null($af))
            array_push($result, JStore::CREATE_FROM_DB($af));
    }
    return $result;
}

function GetStoresForCrud()
{
    return GetStoresForDisplay();
}

function UpdateStoreForCrud($data)
{
    $parsed = JStore::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Store update request");

    if(!FieldUtils::ID_IS_DEFINED($parsed->StoreId)) throw new \Exception("Failed to parse ID");

    $item = (new  \StoreQuery())->findPk($parsed->StoreId);
    if(is_null($item)) throw new \Exception ("Store with id ". $parsed->StoreId ." not found");

    //$new = $parsed->updateDB($item);
    if(!$parsed->saveToDb())   throw new \Exception("Failed to save store with id " . $parsed->StoreId);

    //TODO implement cache, then refresh
    $item = (new  \StoreQuery())->findPk($parsed->StoreId);
    return JStore::CREATE_FROM_DB($item);
}

function CreateStoreForCrud($data)
{
    $parsed = JStore::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Store update request");

    $item = $parsed->toDB();
    if(is_null($item)) throw new \Exception ("Store with id ". $parsed->StoreId ." not found");
    $item->save();
    $item->reload();

    //TODO implement cache, add to cache
    return JStore::CREATE_FROM_DB($item);
}

function DeleteStoreForCrud($id)
{
    $item = (new  \StoreQuery())->findPk($id);
    if(is_null($item)) throw new \Exception ("Store with id ". $id ." not found");
    $item->delete();
    return array();
}


/* StoreCategory */
function GetStoreCategoryForDisplay()
{
    $result = array();
    foreach ((new \StoreCategoryQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getStoreCategoryId()));
    }
    return $result;
}
function GetStoreCategoryForCrud()
{
    $result = array();
    foreach ((new \StoreCategoryQuery())->orderByName()->find() as $af) {
        array_push($result, JStoreCategory::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetStoreCategoryById($id)
{
    $result = array();
    foreach ((new \StoreCategoryQuery())->orderByName()->findPk($id) as $af) {
        array_push($result, JStoreCategory::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateStoreCategoryForCrud($data)
{
    $parsed = JStoreCategory::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse StoreCategory update request");

    $item = (new  \StoreCategoryQuery())->findPk($parsed->StoreCategoryId);
    if(is_null($item)) throw new \Exception ("StoreCategory with id ". $parsed->StoreCategoryId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \StoreCategoryQuery())->findPk($parsed->StoreCategoryId);
    return JStoreCategory::CREATE_FROM_DB($item);
}
function CreateStoreCategoryForCrud($data)
{
    $item = JStoreCategory::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JStoreCategory::CREATE_FROM_DB($item);
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