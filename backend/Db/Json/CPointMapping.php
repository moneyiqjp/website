<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/28/2015
 * Time: 2:04 PM
 */

namespace Db\Json;

public class CStorePointMapping implements JSONInterface {
    public $Store;
    public $PointSystem;
    public $PointUsage;
    public $Active;

    public function CStorePointMapping() {
        return $this;
    }

    public static function CREATE_FROM_STORE(\Store $store) {
        $mine = new CStorePointMapping();
        $mine->Store = Array(
            "Category" => $store->getCategory(),
            "Name" => $store->getStoreName(),
            "Id" => $store->getStoreId()
        );
        return $mine;
    }

    public static function CREATE_FROM_POINT_SYSTEM(\PointSystem $item) {
        $mine = CStorePointMapping::CREATE_FROM_STORE($item->getStore());
        return $mine->UpdateFromPointSystem($item);
    }

    public static function CREATE_FROM_POINT_USAGE(\PointSystem $item) {
        $mine = CStorePointMapping::CREATE_FROM_STORE($item->getStore());
        return $mine->UpdateFromPointUsage($item);
    }

    public static function GET_POINT_MAPPINGS_FROM_CREDIT_CARD(\CreditCard $cc) {
        $store_map = array();

        foreach($cc->getPointSystems() as $ps) {
            $tmp = CStorePointMapping::CREATE_FROM_POINT_SYSTEM($ps);
            $store_map[$tmp->GetStoreId()] = $tmp;
        }

        foreach($cc->getPointUsages() as $pu) {
            if(array_key_exists($pu->getStoreId(),$store_map)) {
                $store_map[$pu->getStoreId()] = $store_map[$pu->getStoreId()]->UpdateFromPointUsage($pu);
            } else {
                $tmp = CStorePointMapping::CREATE_FROM_POINT_USAGE($pu);
                $store_map[$tmp->GetStoreId()] = $tmp;
            }
        }

        return array_values($store_map);
    }

    public function GetStoreId(){
        return $this->Store['Id'];
    }

    public function UpdateFromPointSystem(\PointSystem $item) {
        $store = $this->Store;
        if(is_null($this->Store)) throw new \Exception('No store defined, can\'t update');
        if( $store['Id'] != $item->getStoreId()) return $this;

        $this->PointSystem = array(
            "Id" => $item->getPointSystemId(),
            "Name" => $item->getPointSystemName(),
            "PointsPerYen" => $item->getPointsPerYen()
        );
        $this->Active = true;
        return $this;
    }

    public function UpdateFromPointUsage(\PointUsage $item) {
        $store = $this->Store;
        if( $store['Id'] != $item->getStoreId()) return $this;

        $this->PointUsage = array(
            "Id" => $item->getPointUsageId(),
            "YenPerPoint" => $item->getYenPerPoint()
        );
        $this->Active = true;

        return $this;
    }


    public static function CREATE_FROM_ARRAY($data){
        if(!array_key_exists('Store',$data)) throw new \Exception('No store defined in request, need a store to be mapped');
    }


}