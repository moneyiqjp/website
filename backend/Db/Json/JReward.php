<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/20
 * Time: 20:34
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JReward {

    public $RewardId;
    public $PointSystemId;
    public $Type;
    public $Category;
    public $Title;
    public $Description;
    public $Icon;
    public $YenPerPoint;
    public $PricePerUnit;
    public $MinPoints;
    public $MaxPoints;
    public $RequiredPoints;
    public $MaxPeriod;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointAcquisition(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Reward $item)
    {
        $mine = new JReward();

        $mine->RewardId = $item->getRewardId();
        $mine->PointSystemId = $item->getPointSystemId();
        $mine->Type = $item->getType();
        $mine->Category = $item->getCategory();
        $mine->Title = $item->getTitle();
        $mine->Description = $item->getDescription();
        $mine->Icon = $item->getIcon();
        $mine->YenPerPoint = $item->getYenPerPoint();
        $mine->PricePerUnit = $item->getPricePerUnit();
        $mine->MinPoints = $item->getMinPoints();
        $mine->MaxPoints = $item->getMaxPoints();
        $mine->RequiredPoints = $item->getRequiredPoints();
        $mine->MaxPeriod = $item->getMaxPeriod();
        $mine->UpdateTime = $item->getUpdateTime();
        $mine->UpdateUser = $item->getUpdateUser();
        
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (!ArrayUtils::KEY_EXISTS($data, 'RewardId')) throw new \Exception("JReward: Mandatory field RewardId missing");
        return JReward::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JReward();

        if(ArrayUtils::KEY_EXISTS($data,'RewardId')) $mine->RewardId = $data['RewardId'];
        if(ArrayUtils::KEY_EXISTS($data,'PointSystemId')) $mine->PointSystemId = $data['PointSystemId'];
        if(ArrayUtils::KEY_EXISTS($data,'Type')) $mine->Type = $data['Type'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Category = $data['Category'];
        if(ArrayUtils::KEY_EXISTS($data,'Title')) $mine->Title = $data['Title'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'Icon')) $mine->Icon = $data['Icon'];
        if(ArrayUtils::KEY_EXISTS($data,'YenPerPoint')) $mine->YenPerPoint = $data['YenPerPoint'];
        if(ArrayUtils::KEY_EXISTS($data,'PricePerUnit')) $mine->PricePerUnit = $data['PricePerUnit'];
        if(ArrayUtils::KEY_EXISTS($data,'MinPoints')) $mine->MinPoints = $data['MinPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxPoints')) $mine->MaxPoints = $data['MaxPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'RequiredPoints')) $mine->RequiredPoints = $data['RequiredPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxPeriod')) $mine->MaxPeriod = $data['MaxPeriod'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function isEmpty() {
        return is_null($this->PointSystemId) || is_null($this->Category) || is_null($this->YenPerPoint);
    }

    public function isValid() {
        //Mandatory fields + some data fields
        return (!$this->isEmpty());
    }

    public function saveToDb() {
        if($this->isValid()) { //only save if valid object
            $dbo = $this->toDB();
            if($dbo->save() <=0) return false;
            if(!FieldUtils::ID_IS_DEFINED($this->RewardId))
            { //reload $ids on save, in case it was actually a create
                $tmp = JReward::CREATE_FROM_DB($dbo);
                $this->RewardId = $tmp->RewardId;
            }
            return true;
        }

        return false;
    }

    public function toDB() {
        $usage = new \Reward();
        if(FieldUtils::ID_IS_DEFINED($this->RewardId)) {
            $usage=(new \RewardQuery())->findPk($this->RewardId);
            if(is_null($usage)) $usage = new \Reward();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\Reward &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->RewardId)) $item->setRewardId($this->RewardId);
        if(FieldUtils::ID_IS_DEFINED($this->PointSystemId)) $item->setPointSystemId($this->PointSystemId);
        if(FieldUtils::STRING_IS_DEFINED($this->Type)) $item->setType($this->Type);
        if(FieldUtils::STRING_IS_DEFINED($this->Category)) $item->setCategory($this->Category);
        if(FieldUtils::STRING_IS_DEFINED($this->Title)) $item->setTitle($this->Title);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->Icon)) $item->setIcon($this->Icon);
        if(FieldUtils::NUMBER_IS_DEFINED($this->YenPerPoint)) $item->setYenPerPoint($this->YenPerPoint);
        if(FieldUtils::NUMBER_IS_DEFINED($this->PricePerUnit)) $item->setPricePerUnit($this->PricePerUnit);
        if(FieldUtils::NUMBER_IS_DEFINED($this->MinPoints)) $item->setMinPoints($this->MinPoints);
        if(FieldUtils::NUMBER_IS_DEFINED($this->MaxPoints)) $item->setMaxPoints($this->MaxPoints);
        if(FieldUtils::NUMBER_IS_DEFINED($this->RequiredPoints)) $item->setRequiredPoints($this->RequiredPoints);
        if(FieldUtils::STRING_IS_DEFINED($this->MaxPeriod)) $item->setMaxPeriod($this->MaxPeriod);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}