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


class JPointSystem implements JSONInterface{

    public $PointSystemId;
    public $PointSystemName;
    public $PointsPerYen;
    public $CreditCard;
    public $Store;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointSystem(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointSystem $item)
    {
        $mine = new JPointSystem();
        $mine->PointSystemId = $item->getPointSystemId();
        $mine->PointSystemName = $item->getPointSystemName();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store =  array(
            'Id' => $item->getStore(),
            'Name' => $item->getStore()->getCategory() . "-" . $item->getStore()->getStoreName()
        );
        $mine->PointsPerYen = $item->getPointsPerYen();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPointSystem();
        if(!ArrayUtils::KEY_EXISTS($data,'PointSystemId')) throw new \Exception("JPointSystem: Mandatory field PointUsageId missing");
        $mine->PointSystemId = $data['PointSystemId'];
        if(!ArrayUtils::KEY_EXISTS($data,'CreditCard')) throw new \Exception("JPointSystem: Mandatory field CreditCard missing");
        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Id')) throw new \Exception("JPointSystem: Mandatory field CreditCard.Id missing");
        $mine->CreditCard =  array( 'Id' => $tmp['Id'] );
        if(ArrayUtils::KEY_EXISTS($tmp,'Name'))   $mine->CreditCard['Name'] = $tmp['Name'];

        if(ArrayUtils::KEY_EXISTS($data,'Store')) {
            $tmp = $data['Store'];
            if (!ArrayUtils::KEY_EXISTS($tmp, 'Id')) throw new \Exception("JPointSystem: Mandatory field Store.Id missing");
            $mine->Store = array('Id' => $tmp['Id']);
            if (ArrayUtils::KEY_EXISTS($tmp, 'Name')) $mine->Store['Name'] = $tmp['Name'];
        }

        if(ArrayUtils::KEY_EXISTS($data,'PointSystemName')) $mine->PointSystemName = $data['PointSystemName'];
        if(ArrayUtils::KEY_EXISTS($data,'PointsPerYen')) $mine->PointsPerYen = $data['PointsPerYen'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function updateStore(JStore $store) {
        if(FieldUtils::ID_IS_DEFINED($store->StoreId)) $this->Store['Id']=$store->StoreId;
        if(FieldUtils::STRING_IS_DEFINED($store->StoreName)) $this->Store['Name']=$store->StoreName;
    }


    public function hasData() {
        return FieldUtils::STRING_IS_DEFINED($this->PointSystemName) ||   (!is_null($this->PointsPerYen));
    }

    public function isValid() {
        //Mandatory fields + some data fields
        return $this->hasData() &&
                    ArrayUtils::KEY_EXISTS($this->CreditCard,'Id') &&
                    ArrayUtils::KEY_EXISTS($this->Store,'Id');
    }

    public function saveToDb() {
        if($this->isValid()) return $this->toDB()->save() >0;
        return false;
    }

    public function delete() {

    }

    public function toDB()
    {
        $usage = new \PointSystem();
        if(FieldUtils::ID_IS_DEFINED($this->PointSystemId)) {
            $usage=(new \PointSystemQuery())->findPk($this->PointSystemId);
            if(is_null($usage)) $usage = new \PointSystem();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\PointSystem &$item)
    {
        if (FieldUtils::ID_IS_DEFINED($this->PointSystemId)) {
            $item->setPointSystemId($this->PointSystemId);
        }

        if (FieldUtils::STRING_IS_DEFINED($this->PointSystemName)) {
            $item->setPointSystemName($this->PointSystemName);
        }


        if(FieldUtils::ID_IS_DEFINED($this->PointsPerYen)) {
            $item->setPointsPerYen($this->PointsPerYen);
        }

        if(ArrayUtils::KEY_EXISTS($this->CreditCard,'Id')){
           $item->setCreditCard((new \CreditCardQuery())->findPk($this->CreditCard['Id']));
        }

        if(ArrayUtils::KEY_EXISTS($this->Store,'Id')) {
            $item->setStore((new \StoreQuery())->findPk($this->Store['Id']));
        }

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}