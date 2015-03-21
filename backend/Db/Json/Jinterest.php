<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:01 PM
 */

namespace Db\Json;


class Jinterest {
    public $InterestId;
    public $CreditCard;
    public $PaymentType;
    public $MinInterest;
    public $MaxInterest;
    public $UpdateTime;
    public $UpdateUser;

    public function Jinterest(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Interest $item)
    {
        $mine = new Jinterest();
        $mine->$InterestId = $item->getInterestId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->PaymentType=  array(
            'Id' => $item->getPaymentTypeId(),
            'Name' => $item->getPaymentType()->getPaymentType()
        );
        $mine->MinInterest = $item->getMinInterest();
        $mine->MaxInterest = $item->getMaxInterest();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new Jinterest();
        $mine->InterestId = $data['InterestId'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );
        $tmp = $data['PaymentType'];
        $mine->PaymentType =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->MinInterest = $data['MinInterest'];
        $mine->MaxInterest = $data['MaxInterest'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \Interest();
        return $this->updateDB($is);
    }
    public function updateDB(\Interest &$item)
    {
        if(!is_null($this->InterestId) && $this->InterestId>0) {
            $item->setInterestId($this->InterestId);
        }
        $item->setMinInterest($this->MinInterest);
        $item->setMaxInterest($this->MaxInterest);

        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $it = $this->PaymentType;
        $item->setPaymentType((new \PaymentTypeQuery())->findPk( $it['Id']));

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}