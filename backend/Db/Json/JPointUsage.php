<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:32 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;

class JPointUsage implements JSONInterface {
    public $PointUsageId;
    public $Store;
    public $YenPerPoint;
    public $CreditCard;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointUsage(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointUsage $item)
    {
        $mine = new JPointUsage();
        $mine->PointUsageId = $item->getPointUsageId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store =  array(
            'Id' => $item->getStore(),
            'Name' => $item->getStore()->getCategory() . "-" . $item->getStore()->getStoreName()
        );
        $mine->YenPerPoint = $item->getYenPerPoint();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPointUsage();

        if(!ArrayUtils::KEY_EXISTS($data,'PointUsageId')) throw new \Exception("Mandatory field PointUsageId missing");
        $mine->PointUsageId = $data['PointUsageId'];
        if(!ArrayUtils::KEY_EXISTS($data,'CreditCard')) throw new \Exception("Mandatory field CreditCard missing");
        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Id'))  throw new \Exception("Mandatory field CreditCard.Id missing");
        $mine->CreditCard =  array( 'Id' => $tmp['Id'] );
        if(ArrayUtils::KEY_EXISTS($tmp,'Name'))   $mine->CreditCard['Name'] = $tmp['Name'];

        if(ArrayUtils::KEY_EXISTS($data,'Store')) {
            $tmp = $data['Store'];
            if (!ArrayUtils::KEY_EXISTS($tmp, 'Id')) throw new \Exception("Mandatory field Store.Id missing");
            $mine->Store = array('Id' => $tmp['Id']);
            if (ArrayUtils::KEY_EXISTS($tmp, 'Name')) $mine->Store['Name'] = $tmp['Name'];
        }

        if(ArrayUtils::KEY_EXISTS($data,'YenPerPoint')) $mine->YenPerPoint = $data['YenPerPoint'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];


        return $mine;
    }

    public function updateStore(JStore $store) {
        if(FieldUtils::ID_IS_DEFINED($store->StoreId)) $this->Store['Id']=$store->StoreId;
        if(FieldUtils::STRING_IS_DEFINED($store->StoreName)) $this->Store['Name']=$store->StoreName;
    }


    public function hasData() {
        return FieldUtils::STRING_IS_DEFINED($this->YenPerPoint);
    }

    public function isValid() {
        //Mandatory fields + some data fields
        return $this->hasData() &&
        ArrayUtils::KEY_EXISTS($this->CreditCard,'Id') &&
        ArrayUtils::KEY_EXISTS($this->Store,'Id');
    }

    public function saveToDb() {
        if($this->isValid()) return $this->toDB()->save() > 0;
        return false;
    }

    public function toDB()
    {
        $usage = new \PointUsage();
        if(FieldUtils::ID_IS_DEFINED($this->PointUsageId)) {
            $usage=(new \PointUsageQuery())->findPk($this->PointUsageId);
            if(is_null($usage)) $usage = new \PointUsage();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\PointUsage &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->PointUsageId)) { $item->setPointUsageId($this->PointUsageId); }
        if(FieldUtils::ID_IS_DEFINED($this->YenPerPoint)) { $item->setYenPerPoint($this->YenPerPoint); }


        if(ArrayUtils::KEY_EXISTS($this->CreditCard,'Id')){
            $item->setCreditCard((new \CreditCardQuery())->findPk( $this->CreditCard['Id']));
        }

        if(ArrayUtils::KEY_EXISTS($this->Store,'Id')) {
            $item->setStore((new \StoreQuery())->findPk($this->Store['Id']));
        }
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}