<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/28/2015
 * Time: 2:04 PM
 */

namespace Db\Json;

/**
 * Class CStorePointMapping
 * @package Db\Json
 */
class CStorePointMapping implements JSONInterface {
    public $MappingId;
    /**
     * @var
     */
    public $Store;
    /**
     * @var
     */
    public $PointSystem;
    /**
     * @var
     */
    public $PointUsage;

    /**
     * @return $this
     */
    public function CStorePointMapping() {
        return $this;
    }

    /**
     * @param \Store $store
     * @return CStorePointMapping
     */
    public static function CREATE_FROM_STORE(\Store $store) {
        $mine = new CStorePointMapping();
        $mine->Store = JStore::CREATE_FROM_DB($store);
        $mine->PointUsage = new JPointUsage();
        $mine->PointSystem = new JPointSystem();
        $mine->MappingId = CStorePointMapping::GET_ID($mine);
        return $mine;
    }

    /**
     * @param \PointSystem $item
     * @return CStorePointMapping
     * @throws \Exception
     */
    public static function CREATE_FROM_POINT_SYSTEM(\PointSystem $item) {
        $mine = CStorePointMapping::CREATE_FROM_STORE($item->getStore());
        return $mine->UpdateFromPointSystem($item);
    }

    /**
     * @param \PointSystem $item
     * @return CStorePointMapping
     * @throws \Exception
     */
    public static function CREATE_FROM_POINT_USAGE(\PointUsage $item) {
        $mine = CStorePointMapping::CREATE_FROM_STORE($item->getStore());
        return $mine->UpdateFromPointUsage($item);
    }


    /**
     * @return mixed
     */
    public function GetStoreId(){
        return $this->Store['Id'];
    }

    /**
     * @param \PointSystem $item
     * @return $this
     * @throws \Exception
     */
    public function UpdateFromPointSystem(\PointSystem $item) {
        if(is_null($this->Store)) throw new \Exception('No store defined, can\'t update');
        if( $this->Store->StoreId != $item->getStoreId()) return $this;

        $this->PointSystem = JPointSystem::CREATE_FROM_DB($item);
        $this->MappingId = CStorePointMapping::GET_ID($this);
        return $this;
    }

    /**
     * @param \PointUsage $item
     * @return $this
     * @throws \Exception
     */
    public function UpdateFromPointUsage(\PointUsage $item) {
        if(is_null($this->Store)) throw new \Exception('No store defined, can\'t update');
        if( $this->Store->StoreId != $item->getStoreId()) return $this;

        $this->PointUsage =JPointUsage::CREATE_FROM_DB($item);
        $this->MappingId = CStorePointMapping::GET_ID($this);
        return $this;
    }

    /**
     * @throws \Exception
     */
    public function saveToDb() {
        return $this->PointSystem->saveToDb() || $this->PointUsage->saveToDb();
    }

    /**
     * @throws \Exception
     */
    public function toDB()
    {
        throw new \Exception("Unsupported Behaviour CStorePointMapping::toDB");
    }


    public function Reload() {
        $this->Store = JStore::CREATE_FROM_DB($this->Store->toDB());
        $this->PointSystem = JPointSystem::CREATE_FROM_DB($this->PointSystem->toDB());
        $this->PointUsage = JPointUsage::CREATE_FROM_DB($this->PointUsage->toDB());
        return $this;
    }


    public static function CREATE_FROM_ARRAY($data)
    {
        if (!array_key_exists('PointUsage', $data)) throw new \Exception('No PointUsage defined in request');
        if (!array_key_exists('PointSystem', $data)) throw new \Exception('No PointSystem defined in request');

        return JPointUsage::CREATE_FROM_ARRAY_RELAXED($data);
    }


    public static function CREATE_FROM_ARRAY_RELAXED($data) { //allows creating an object without being mapped to the db
        if(!array_key_exists('Store',$data)) throw new \Exception('No store defined in request, need a store to be mapped');
        $mine = new CStorePointMapping();
        if(array_key_exists('MappingId',$data)) $mine->MappingId = $data['MappingId'];

        $mine->Store = JStore::CREATE_FROM_ARRAY($data['Store']);
        $mine->PointUsage = JPointUsage::CREATE_FROM_ARRAY($data['PointUsage']);
        $mine->PointUsage->updateStore($mine->Store);
        $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        $mine->PointSystem->updateStore($mine->Store);
        $mine->MappingId = CStorePointMapping::GET_ID($mine);

        return $mine;
    }

    private static function GET_ID(CStorePointMapping $mp) {
        return $mp->Store->StoreId . "-" . $mp->PointSystem->PointSystemId . "-" . $mp->PointUsage->PointUsageId;
    }

    private static function SPLIT_ID($id) {
        $ids = explode("-",$id);
        if(!is_array($ids) || count($ids) <> 3) throw new \Exception("invalid id returned, require #-#-# got " . $id);
        if( (strlen($ids[0])<=0) ) throw new \Exception("No store id specified (" . $id . ")");
        if( (strlen($ids[1])<=0) ) throw new \Exception("No PointSystem id specified (" . $id . ")");
        if( (strlen($ids[2])<=0) ) throw new \Exception("No PointUsage id specified (" . $id . ")");
        return $ids;
    }

    public static function DELETE_BY_ID($id) {
        $ids = CStorePointMapping::SPLIT_ID($id);

        $ps = (new \PointSystemQuery)->findPk($ids[1]);
        if(!is_null($ps)) $ps->delete();

        $pu = (new \PointUsageQuery())->findPk($ids[2]);
        if(!is_null($pu)) $pu->delete();

        return true;
    }



     /**
     * @param \CreditCard $cc
     * @return array
     */
    public static function GET_POINT_MAPPINGS_FROM_CREDIT_CARD(\CreditCard $cc) {
        $store_map = array();

        foreach($cc->getPointSystems() as $ps) {
            $store_map[$ps->GetStoreId()] = CStorePointMapping::CREATE_FROM_POINT_SYSTEM($ps);
        }

        foreach($cc->getPointUsages() as $pu) {
            $id = $pu->getStoreId();
            if(array_key_exists($id,$store_map)) {
                $tmp = $store_map[$id];
                $store_map[$id] = $tmp->UpdateFromPointUsage($pu);
            } else {
                $store_map[$id] = CStorePointMapping::CREATE_FROM_POINT_USAGE($pu);
            }
        }

        return array_values($store_map);
    }


}