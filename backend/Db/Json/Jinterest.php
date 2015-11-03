<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:01 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class Jinterest implements JSONInterface{
    public $InterestId;
    public $CreditCard;
    public $PaymentType;
    public $MinInterest;
    public $MaxInterest;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function Jinterest(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Interest $item)
    {
        $mine = new Jinterest();
        $mine->InterestId = $item->getInterestId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->PaymentType=  array(
            'Id' => $item->getPaymentTypeId(),
            'Name' => $item->getPaymentType()->getType()
        );
        $mine->MinInterest = $item->getMinInterest();
        $mine->MaxInterest = $item->getMaxInterest();
        $mine->Reference = $item->getReference();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {

        $mine = new Jinterest();
        $mine->InterestId = $data['InterestId'];

        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Name')) $tmp['Name']="";
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        if(ArrayUtils::KEY_EXISTS($tmp,'Name'))
        $tmp = $data['PaymentType'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Name')) $tmp['Name']="";
        $mine->PaymentType =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        if(ArrayUtils::KEY_EXISTS($data,'MinInterest')) $mine->MinInterest = $data['MinInterest'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxInterest')) $mine->MaxInterest = $data['MaxInterest'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
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

        if(!is_null($this->CreditCard)) {
            $it = $this->CreditCard;
            $item->setCreditCard((new \CreditCardQuery())->findPk($it['Id']));
        }

        if(!is_null($this->PaymentType)) {
            $it = $this->PaymentType;
            $item->setPaymentType((new \PaymentTypeQuery())->findPk($it['Id']));
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}