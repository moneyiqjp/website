<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/21
 * Time: 16:05
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;



class JRewardType  implements JSONInterface
{
    public $RewardTypeId;
    public $Name;
    public $Description;
    public $IsFinite;
    public $UpdateTime;
    public $UpdateUser;

    public function JRewardType()
    {
    }

    public static function CREATE_FROM_DB(\RewardType $item)
    {
        $mine = new JRewardType();
        $mine->RewardTypeId = $item->getRewardTypeId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->IsFinite = $item->getIsFinite();
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JRewardType();
        if(ArrayUtils::KEY_EXISTS($data,'RewardTypeId')) {
            $mine->RewardTypeId = $data['RewardTypeId'];
            $item=(new \RewardTypeQuery())->findPk($mine->RewardTypeId);
            if(!is_null($item)) $mine = JRewardType::CREATE_FROM_DB($item);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];
        if (ArrayUtils::KEY_EXISTS($data,'IsFinite')) $mine->IsFinite = $data['IsFinite'];
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateTime'    )) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDB() {
        return $this->toDB()->save();
    }

    public function toDB() {
        $usage = new \RewardType();
        if(FieldUtils::ID_IS_DEFINED($this->RewardTypeId)) {
            $usage=(new \RewardTypeQuery())->findPk($this->RewardTypeId);
            if(is_null($usage)) $usage = new \RewardType();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\RewardType &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->RewardTypeId)) $item->setRewardTypeId($this->RewardTypeId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->IsFinite)) $item->setIsFinite($this->IsFinite);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function toJObject()
    {
        return JObject::CREATE($this->Name, $this->RewardTypeId);
    }

    public static function fromJObject(JObject $reward)
    {
        $rewq = \RewardTypeQuery::create();

        if (!is_null($reward->value)) {
            foreach ($rewq->findPk($reward->value) as $re) {
                return JRewardType::CREATE_FROM_DB($re);
            }
        }

        foreach ($rewq->findByName($reward->label) as $re) {
            return JRewardType::CREATE_FROM_DB($re);
        }

        throw new \Exception("No RewardType found for JObject");
    }
}
