<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/20
 * Time: 20:34
 */

namespace Db\Json;

use Base\RewardTypeQuery;
use Base\UnitQuery;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;
use Symfony\Component\Config\Definition\Exception\Exception;


class JReward  implements JSONInterface {

    public $RewardId;
    public $PointSystem;
    public $Type;
    public $Category;
    public $Store;
    public $Title;
    public $Description;
    public $Icon;
    public $YenPerPoint;
    public $PricePerUnit;
    public $MinPoints;
    public $MaxPoints;
    public $RequiredPoints;
    public $MaxPeriod;
    public $PointMultiplier;
    public $Unit;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function JReward(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Reward $item)
    {
        $mine = new JReward();
        $mine->RewardId = $item->getRewardId();
        $mine->PointSystem = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
        if (is_null($item->getRewardType())) throw new Exception("JReward: RewardType is not available for Reward " . $mine->RewardId . ": " . $item->getRewardTypeId() );
        if (is_null($item->getRewardCategory())) throw new Exception("JReward: RewardCategory is not available for Reward " . $mine->RewardId . ": " . $item->getRewardCategoryId() );
        $mine->Type = JRewardType::CREATE_FROM_DB($item->getRewardType());
        $mine->Category = JRewardCategory::CREATE_FROM_DB($item->getRewardCategory());
        if(!is_null($item->getStore())) $mine->Store = JStore::CREATE_FROM_DB($item->getStore());
        $mine->Title = $item->getTitle();
        $mine->Description = $item->getDescription();
        $mine->Icon = $item->getIcon();
        $mine->YenPerPoint = $item->getYenPerPoint();
        $mine->PricePerUnit = $item->getPricePerUnit();
        $mine->MinPoints = $item->getMinPoints();
        $mine->MaxPoints = $item->getMaxPoints();
        $mine->RequiredPoints = $item->getRequiredPoints();
        $mine->MaxPeriod = $item->getMaxPeriod();
        $mine->Reference = $item->getReference();
        $mine->PointMultiplier = $item->getPointMultiplier();
        $mine->Unit = JUnit::CREATE_FROM_DB($item->getUnit());
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (!ArrayUtils::KEY_EXISTS($data, 'RewardId')) throw new \Exception("JReward: Mandatory field RewardId missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Category')) throw new \Exception("JReward: Mandatory field Category missing");
        if (!ArrayUtils::KEY_EXISTS($data['Category'], 'RewardCategoryId')) throw new \Exception("JReward: Mandatory field Category-RewardCategoryId missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Type')) throw new \Exception("JReward: Mandatory field Type missing");
        if (!ArrayUtils::KEY_EXISTS($data['Type'], 'RewardTypeId')) throw new \Exception("JReward: Mandatory field Category-RewardTypeId missing");
        return JReward::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JReward();

        if(ArrayUtils::KEY_EXISTS($data,'RewardId')) $mine->RewardId = $data['RewardId'];
        if(ArrayUtils::KEY_EXISTS($data,'PointSystemId')) {
            $mine->PointSystem = (new \PointSystemQuery())->findPK($data['PointSystem']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'PointSystem')) $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        if(ArrayUtils::KEY_EXISTS($data,'Type')) $mine->Type = JRewardType::CREATE_FROM_ARRAY($data['Type']);
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Category = JRewardCategory::CREATE_FROM_ARRAY($data['Category']);
        if(ArrayUtils::KEY_EXISTS($data,'StoreId')) {
            $mine->Store = JStore::CREATE_FROM_DB((new \StoreQuery())->findPK($data['StoreId']));
        } else if( ArrayUtils::KEY_EXISTS($data,'Store') && ArrayUtils::KEY_EXISTS($data['Store'],'StoreId') ) {
            $mine->Store = JStore::CREATE_FROM_DB((new \StoreQuery())->findPK( $data['Store']['StoreId']));
        }
        if(ArrayUtils::KEY_EXISTS($data,'Title')) $mine->Title = $data['Title'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'Icon')) $mine->Icon = $data['Icon'];
        if(ArrayUtils::KEY_EXISTS($data,'YenPerPoint')) $mine->YenPerPoint = $data['YenPerPoint'];
        if(ArrayUtils::KEY_EXISTS($data,'PricePerUnit')) $mine->PricePerUnit = $data['PricePerUnit'];
        if(ArrayUtils::KEY_EXISTS($data,'MinPoints')) $mine->MinPoints = $data['MinPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxPoints')) $mine->MaxPoints = $data['MaxPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'RequiredPoints')) $mine->RequiredPoints = $data['RequiredPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxPeriod')) $mine->MaxPeriod = $data['MaxPeriod'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];
        if(ArrayUtils::KEY_EXISTS($data,'PointMultiplier')) $mine->PointMultiplier = $data['PointMultiplier'];
        if(ArrayUtils::KEY_EXISTS($data,'Unit')) $mine->Unit = JUnit::CREATE_FROM_ARRAY($data['Unit']);

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime();
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function isEmpty() {
        return is_null($this->PointSystem) || is_null($this->Category) || FieldUtils::ID_IS_DEFINED($this->YenPerPoint);
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
        if(!is_null($this->PointSystem)) $item->setPointSystemId($this->PointSystem->PointSystemId);
        if(!is_null($this->Type) && FieldUtils::ID_IS_DEFINED($this->Type->RewardTypeId)) {
            $item->setRewardTypeId($this->Type->RewardTypeId);
        }
        if(!is_null($this->Category) && FieldUtils::ID_IS_DEFINED($this->Category->RewardCategoryId)) {
            $item->setRewardCategoryId($this->Category->RewardCategoryId);
        }
        if(!is_null($this->Store) && FieldUtils::ID_IS_DEFINED($this->Store->StoreId)) $item->setStoreId($this->Store->StoreId);
        if(FieldUtils::STRING_IS_DEFINED($this->Title)) $item->setTitle($this->Title);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->Icon)) $item->setIcon($this->Icon);
        if(FieldUtils::NUMBER_IS_DEFINED($this->YenPerPoint)) $item->setYenPerPoint($this->YenPerPoint);
        if(FieldUtils::NUMBER_IS_DEFINED($this->PricePerUnit)) $item->setPricePerUnit($this->PricePerUnit);
        if(FieldUtils::NUMBER_IS_DEFINED($this->MinPoints)) $item->setMinPoints($this->MinPoints);
        if(FieldUtils::NUMBER_IS_DEFINED($this->MaxPoints)) $item->setMaxPoints($this->MaxPoints);
        if(FieldUtils::NUMBER_IS_DEFINED($this->RequiredPoints)) $item->setRequiredPoints($this->RequiredPoints);
        if(FieldUtils::STRING_IS_DEFINED($this->MaxPeriod)) $item->setMaxPeriod($this->MaxPeriod);
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);
        if(FieldUtils::NUMBER_IS_DEFINED($this->PointMultiplier)) $item->setPointMultiplier($this->PointMultiplier);
        if(!is_null($this->Unit)) $item->setUnit($this->Unit->toDB());
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }


    public static function CREATE_FROM_MILEAGE(JMileage $item)
    {
        $mine = new JReward();
        $mine->RewardId = "M" . $item->MileageId;
        $mine->PointSystem = $item->getPointSystem();


        $tmp = RewardTypeQuery::create()->findOneByName("exchange");
        if (is_null($tmp)) throw new \Exception("RewardType exchange not found");
        $mine->Type = JRewardType::CREATE_FROM_DB($tmp);


        $tmp = \RewardCategoryQuery::create()->findOneByName("マイレージ");
        if (is_null($tmp)) throw new \Exception("RewardCategory exchange not found");
        $mine->Category = JRewardCategory::CREATE_FROM_DB($tmp);



        if(!is_null($item->Store)) $mine->Store = $item->getStore();
        $mine->Title = $item->getDisplay();
        $mine->Description = $item->getDisplay();
        $mine->Icon = "";
        $mine->YenPerPoint = $item->getValueInYen()/$item->getRequiredMiles();
        $mine->PricePerUnit = $item->getRequiredMiles();
        $mine->MinPoints = $item->getRequiredMiles();
        $mine->MaxPoints = $item->getRequiredMiles();
        $mine->RequiredPoints = $item->getRequiredMiles();
        $mine->MaxPeriod = null;
        $mine->Reference = null;
        $mine->PointMultiplier = 1.0;
        $item = \UnitQuery ::create()->findOneByName("Miles");
        if(is_null($item)) throw new \Exception("Didn't find Unit for Miles");
        $mine->Unit = JUnit::CREATE_FROM_DB($item);
        $mine->UpdateTime = $item->getUpdateTime();
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }
}