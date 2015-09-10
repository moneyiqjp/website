<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 16:03
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JStoreCategory implements JSONInterface
{

    public $StoreCategoryId;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\StoreCategory $item)
    {
        $mine = new JStoreCategory();
        if($item==null) return $mine;
        $mine->StoreCategoryId = $item->getStoreCategoryId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }

        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JStoreCategory();
        if(ArrayUtils::KEY_EXISTS($data,'StoreCategoryId')) {
            $mine->StoreCategoryId = $data['StoreCategoryId'];
            $item=(new \StoreCategoryQuery())->findPk($mine->StoreCategoryId);
            if(!is_null($item)) $mine = JStoreCategory::CREATE_FROM_DB($item);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateTime'    )) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDB() {
        return $this->toDB()->save();
    }

    public function toDB() {
        $usage = new \StoreCategory();
        if(FieldUtils::ID_IS_DEFINED($this->StoreCategoryId)) {
            $usage=(new \StoreCategoryQuery())->findPk($this->StoreCategoryId);
            if(is_null($usage)) $usage = new \StoreCategory();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\StoreCategory &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->StoreCategoryId)) $item->setStoreCategoryId($this->StoreCategoryId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        //if(FieldUtils::STRING_IS_DEFINED($this->Description))
        $item->setDescription($this->Description);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}