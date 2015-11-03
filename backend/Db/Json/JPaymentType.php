<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:23 PM
 */

namespace Db\Json;


use Db\Utility\ArrayUtils;

class JPaymentType implements JSONInterface{
    public $PaymentTypeId;
    public $PaymentType;
    public $Display;
    public $PaymentDescription;
    public $UpdateTime;
    public $UpdateUser;

    public function JPaymentType(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PaymentType $item)
    {
        $mine = new JPaymentType();
        $mine->PaymentTypeId = $item->getPaymentTypeId();
        $mine->PaymentType = $item->getType();
        $mine->Display = $item->getDisplay();
        $mine->PaymentDescription = $item->getDescription();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPaymentType();
        $mine->PaymentTypeId = $data['PaymentTypeId'];
        if(ArrayUtils::KEY_EXISTS($data,'PaymentType')) $mine->PaymentType = $data['PaymentType'];
        if(ArrayUtils::KEY_EXISTS($data,'Type')) $mine->PaymentType = $data['Type'];
        if(ArrayUtils::KEY_EXISTS($data,'PaymentDescription')) $mine->PaymentDescription = $data['PaymentDescription'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->PaymentDescription = $data['Description'];


        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function toDB()
    {
        $is = new \PaymentType();
        return $this->updateDB($is);
    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function updateDB(\PaymentType &$item)
    {
        if(!is_null($this->PaymentTypeId) && $this->PaymentTypeId>0) {
            $item->setPaymentTypeId($this->PaymentTypeId);
        }
        $item->setType($this->PaymentType);
        $item->setDescription($this->PaymentDescription);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}