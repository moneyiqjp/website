<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/30/2015
 * Time: 10:08 PM
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;

class JStore implements JSONInterface {
    public $StoreId;
    public $StoreName;
    public $Category;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;

    public function JStore() {
        return $this;
    }

    public static function CREATE_FROM_DB(\Store $item)
    {
        $mine = new JStore();
        $mine->StoreId = $item->getStoreId();
        if(!is_null($item->getStoreName())) $mine->StoreName = $item->getStoreName();
        if(!is_null($item->getCategory())) $mine->Category = $item->getCategory();
        if(!is_null($item->getDescription())) $mine->Description = $item->getDescription();
        if(!is_null($item->getUpdateTime())) $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        if(!is_null($item->getUpdateUser())) $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JStore();
        if(!ArrayUtils::KEY_EXISTS($data,'StoreId')) throw new \Exception("Required key StoreId not found");
        $mine->StoreId = $data['StoreId'];

        if(ArrayUtils::KEY_EXISTS($data,'StoreName')) $mine->StoreName = $data['StoreName'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Category = $data['Category'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }


    public function toDB()
    {
        return $this->updateDB(new \Store());
    }

    public function updateDB(\Store &$item)
    {
        if(!is_null($this->StoreId) && $this->StoreId>0) $item->setStoreId($this->StoreId);
        if(!is_null($this->StoreName)) $item->setStoreName($this->StoreName);
        if(!is_null($this->Category)) $item->setCategory($this->Category);
        if(!is_null($this->Description)) $item->setCategory($this->Description);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}