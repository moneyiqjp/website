<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 11:04 PM
 */

namespace Db\Json;


class JFee {
    public $FeeId;
    public $FeeType;
    public $FeeAmount;
    public $YearlyOccurrence;
    public $startYear;
    public $endYear;
    public $CreditCard;
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
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JFee();
        $mine->FeeId = $data['FeeId'];
        $mine->FeeType = $data['FeeType'];
        $mine->FeeAmount = $data['FeeAmount'];
        $mine->YearlyOccurrence = $data['YearlyOccurrence'];
        $mine->startYear = $data['startYear'];
        $mine->endYear = $data['endYear'];

        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function toDB()
    {
        $is = new \Fees();
        return $this->updateDB($is);
    }

    public function updateDB(\Fees &$item)
    {
        $item->setFeeId($this->FeeId);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setFeeType($this->FeeType);
        $item->setFeeAmount($this->FeeAmount);
        $item->setYearlyOccurrence($this->YearlyOccurrence);
        $item->setStartYear($this->startYear);
        $item->setEndYear($this->endYear);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}