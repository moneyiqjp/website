<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/30/2015
 * Time: 10:08 PM
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;

class JStore implements JSONInterface {
    public $StoreId;
    public $StoreName;
    public $StoreCategory;
    public $Description;
    public $IsMajor;
    public $UpdateTime;
    public $UpdateUser;

    public function JStore() {
        return $this;
    }

    public static function CREATE_FROM_DB(\Store $item)
    {
        $mine = new JStore();
        $mine->StoreId = $item->getStoreId();
        if(FieldUtils::STRING_IS_DEFINED($item->getStoreName())) $mine->StoreName = $item->getStoreName();
        if(FieldUtils::ID_IS_DEFINED($item->getStoreCategoryId())) $mine->StoreCategory = JStoreCategory::CREATE_FROM_DB($item->getStoreCategory());
        if(FieldUtils::STRING_IS_DEFINED($item->getDescription())) $mine->Description = $item->getDescription();
        if(FieldUtils::ID_IS_DEFINED($item->getIsMajor())) $mine->IsMajor = $item->getIsMajor();
        if(!is_null($item->getUpdateTime())) $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        if(FieldUtils::STRING_IS_DEFINED($item->getUpdateUser())) $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (!ArrayUtils::KEY_EXISTS($data, 'StoreId')) throw new \Exception("Required key StoreId not found");

        return JStore::CREATE_FROM_ARRAY_RELAXED($data);
    }
    public static function CREATE_FROM_ARRAY_RELAXED($data)
    {
        $mine = new JStore();
        if(ArrayUtils::KEY_EXISTS($data,'StoreId')) {
            $mine->StoreId = $data['StoreId'];
            $store =(new \StoreQuery())->findPk($mine->StoreId);
            if(!is_null($store)) $mine = JStore::CREATE_FROM_DB($store);
        }

        if(ArrayUtils::KEY_EXISTS($data,'StoreName')) $mine->StoreName = $data['StoreName'];
        if(ArrayUtils::KEY_EXISTS($data,'StoreCategory')) $mine->StoreCategory = JStoreCategory::CREATE_FROM_ARRAY($data['StoreCategory']);
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'IsMajor')) $mine->IsMajor = $data['IsMajor'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toString(){
        return  $this->StoreName . "-" . $this->StoreCategory->Name;
    }


    public function toDB() {
        $store = new \Store();
        if(FieldUtils::ID_IS_DEFINED($this->StoreId)) {
            $store =(new \StoreQuery())->findPk($this->StoreId);
            if(is_null($store )) $store = new \Store();
        }
        return $this->updateDB($store);
    }

    public function updateDB(\Store &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->StoreId)) $item->setStoreId($this->StoreId);
        if(FieldUtils::STRING_IS_DEFINED($this->StoreName)) $item->setStoreName($this->StoreName);
        if(FieldUtils::STRING_IS_DEFINED($this->StoreCategory)) {
            $item->setStoreCategoryId($this->StoreCategory->StoreCategoryId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::NUMBER_IS_DEFINED($this->IsMajor)) $item->setIsMajor($this->IsMajor);

        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}