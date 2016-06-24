<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/21
 * Time: 16:06
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;



class JRewardCategory extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $RewardCategoryId;
    public $Name;
    public $SubCategory;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;

    public function JRewardCategory() {}

    public static function CREATE_FROM_DB(\RewardCategory $item) {
        $mine = new JRewardCategory();
        $mine->RewardCategoryId = $item->getRewardCategoryId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $mine->SubCategory = $item->getSubcategory();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)  {
        $mine = new JRewardCategory();
        if(ArrayUtils::KEY_EXISTS($data,'RewardCategoryId')) {
            $mine->RewardCategoryId = $data['RewardCategoryId'];
            $item=(new \RewardCategoryQuery())->findPk($mine->RewardCategoryId);
            if(!is_null($item)) $mine = JRewardCategory::CREATE_FROM_DB($item);
        }

        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'SubCategory')) $mine->SubCategory = $data['SubCategory'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDB() {
        return $this->toDB()->save();
    }

    public function toDB() {
        $usage = new \RewardCategory();
        if(FieldUtils::ID_IS_DEFINED($this->RewardCategoryId)) {
            $usage=(new \RewardCategoryQuery())->findPk($this->RewardCategoryId);
            if(is_null($usage)) $usage = new \RewardCategory();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\RewardCategory &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->RewardCategoryId)) $item->setRewardCategoryId($this->RewardCategoryId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->SubCategory)) $item->setSubcategory($this->SubCategory);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function toJObject() {
        return JObject::CREATE($this->Name, $this->RewardCategoryId);
    }

    public static function fromJObject(JObject $reward) {
        $rewq = \RewardCategoryQuery::create();

        if(!is_null($reward->value))
        {
            foreach ($rewq->findPk($reward->value) as $re) {
                return JRewardCategory::CREATE_FROM_DB($re);
            }
        }

        foreach ($rewq->findByName($reward->label) as $re) {
            return JRewardCategory::CREATE_FROM_DB($re);
        }

        throw new \Exception("No RewardCategory found for JObject");
    }

    public function getLabel() {
        return $this->Name;
    }

    public function getValue() {
        return $this->RewardCategoryId;
    }


}