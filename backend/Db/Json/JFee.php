<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 11:04 PM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JFee extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $FeeId;
    public $FeeType;
    public $FeeAmount;
    public $YearlyOccurrence;
    public $startYear;
    public $endYear;
    public $CreditCard;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function JFee(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Fees $item)
    {
        $mine = new JFee();
        $mine->FeeId = $item->getFeeId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->FeeType = $item->getFeeType();
        $mine->FeeAmount = $item->getFeeAmount();
        $mine->YearlyOccurrence = $item->getYearlyOccurrence();
        $mine->startYear = $item->getStartYear();
        $mine->endYear= $item->getEndYear();
        $mine->Reference = $item->getReference();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JFee();
        if(ArrayUtils::KEY_EXISTS($data,'FeeId')) $mine->FeeId = $data['FeeId'];
        if(ArrayUtils::KEY_EXISTS($data,'FeeType')) $mine->FeeType = $data['FeeType'];
        if(ArrayUtils::KEY_EXISTS($data,'FeeAmount')) $mine->FeeAmount = $data['FeeAmount'];
        if(ArrayUtils::KEY_EXISTS($data,'YearlyOccurrence')) $mine->YearlyOccurrence = $data['YearlyOccurrence'];
        if(ArrayUtils::KEY_EXISTS($data,'startYear')) $mine->startYear = $data['startYear'];
        if(ArrayUtils::KEY_EXISTS($data,'endYear')) $mine->endYear = $data['endYear'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];

        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Name')) $tmp['Name']="";
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function tryLoadDB() {
        if(FieldUtils::ID_IS_DEFINED($this->FeeId)) {
            $item = \FeesQuery::create()->findPk($this->FeeId);
            if(!is_null($item)) return $item;
        }
        return new \Fees();
    }

    public function toDB() {
        $is = $this->tryLoadDB();
        return $this->updateDB($is);
    }

    public function updateDB(\Fees &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->FeeId)) $item->setFeeId($this->FeeId);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        if(FieldUtils::ID_IS_DEFINED($this->FeeType)) $item->setFeeType($this->FeeType);
        if(FieldUtils::NUMBER_IS_DEFINED($this->FeeAmount)) $item->setFeeAmount($this->FeeAmount);
        if(FieldUtils::NUMBER_IS_DEFINED($this->YearlyOccurrence)) $item->setYearlyOccurrence($this->YearlyOccurrence);
        if(FieldUtils::NUMBER_IS_DEFINED($this->startYear)) $item->setStartYear($this->startYear);
        if(FieldUtils::NUMBER_IS_DEFINED($this->endYear)) $item->setEndYear($this->endYear);
        //if(FieldUtils::STRING_IS_DEFINED($this->Reference))
        $item->setReference($this->Reference);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }


    public function getLabel() {
        return  FieldUtils::getLabel($this->CreditCard) . "/" . $this->FeeType;
    }

    public function getValue()
    {
        return $this->FeeId;
    }

}