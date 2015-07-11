<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 11:14 PM
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JPointAcquisition implements JSONInterface
{
    public $PointAcquisitionId;
    public $PointSystemId;
    public $PointAcquisitionName;
    public $PointsPerYen;
    public $Store;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointAcquisition(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointAcquisition $item)
    {
        $mine = new JPointAcquisition();

        $mine->PointAcquisitionId = $item->getPointAcquisitionId();
        $mine->PointSystemId = $item->getPointSystemId();
        $mine->PointAcquisitionName = $item->getPointAcquisitionName();
        $mine->PointsPerYen = $item->getPointsPerYen();
        $mine->Store = JStore::CREATE_FROM_DB($item->getStore());
        $mine->Reference = $item->getReference();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (!ArrayUtils::KEY_EXISTS($data, 'PointAcquisitionId')) throw new \Exception("JPointAcquisitionId: Mandatory field PointAcquisitionId missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Store'))throw new \Exception("JPointAcquisitionId: Mandatory field Store missing");
        return JPointAcquisition::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JPointAcquisition();

        if(ArrayUtils::KEY_EXISTS($data, 'PointAcquisitionId')) $mine->PointAcquisitionId = $data['PointAcquisitionId'];
        if(ArrayUtils::KEY_EXISTS($data, 'PointSystemId')) $mine->PointSystemId = $data['PointSystemId'];
        if(ArrayUtils::KEY_EXISTS($data,'PointAcquisitionName')) $mine->PointAcquisitionName = $data['PointAcquisitionName'];
        if(ArrayUtils::KEY_EXISTS($data,'PointsPerYen')) $mine->PointsPerYen = $data['PointsPerYen'];
        if(ArrayUtils::KEY_EXISTS($data,'Store')) $mine->Store = JStore::CREATE_FROM_ARRAY($data['Store']);
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function updateStore(JStore $store) {
        if(FieldUtils::ID_IS_DEFINED($store->StoreId)) $this->Store['Id']=$store->StoreId;
        if(FieldUtils::STRING_IS_DEFINED($store->StoreName)) $this->Store['Name']=$store->StoreName;
        return $this;
    }


    public function isEmpty() {
        return is_null($this->Store) || is_null($this->PointsPerYen);
    }

    public function isValid() {
        //Mandatory fields + some data fields
        return (!$this->isEmpty());
    }

    public function saveToDb() {
        if($this->isValid()) { //only save if valid object
            $dbo = $this->toDB();
            if($dbo->save() <=0) return false;
            if(!FieldUtils::ID_IS_DEFINED($this->PointAcquisitionId))
            { //reload $ids on save, in case it was actually a create
                $tmp = JPointAcquisition::CREATE_FROM_DB($dbo);
                $this->PointAcquisitionId = $tmp->PointAcquisitionId;
            }
            return true;
        }

        return false;
    }

    public function toDB() {
        $usage = new \PointAcquisition();
        if(FieldUtils::ID_IS_DEFINED($this->PointAcquisitionId)) {
            $usage=(new \PointAcquisitionQuery())->findPk($this->PointAcquisitionId);
            if(is_null($usage)) $usage = new \PointAcquisition();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\PointAcquisition &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->PointAcquisitionId)) $item->setPointAcquisitionId($this->PointAcquisitionId);
        if(FieldUtils::ID_IS_DEFINED($this->PointSystemId)) $item->setPointSystemId($this->PointSystemId);
        if(FieldUtils::ID_IS_DEFINED($this->PointsPerYen)) $item->setPointsPerYen($this->PointsPerYen);
        if(!is_null($this->Store)) {
            $tmp = $this->Store;
            if(is_null($tmp->StoreId)) throw new \Exception("JPointAcquisition: Attempted to save down without StoreId");
            $item->setStoreId($tmp->StoreId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->PointAcquisitionName)) $item->setPointAcquisitionName($this->PointAcquisitionName);
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }


}