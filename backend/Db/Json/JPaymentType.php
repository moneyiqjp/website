<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:23 PM
 */

namespace Db\Json;


class JPaymentType {
    public $PaymentTypeId;
    public $PaymentType;
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
        $mine->PaymentType = $item->getPaymentType();
        $mine->PaymentDescription = $item->getPaymentDescription();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPaymentType();
        $mine->PaymentTypeId = $data['PaymentTypeId'];
        $mine->PaymentType = $data['PaymentType'];
        $mine->PaymentDescription = $data['PaymentDescription'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function toDB()
    {
        $is = new \PaymentType();
        return $this->updateDB($is);
    }

    public function updateDB(\PaymentType &$item)
    {
        $item->setPaymentTypeId($this->PaymentTypeId);
        $item->setPaymentType($this->PaymentType);
        $item->setPaymentDescription($this->PaymentDescription);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}