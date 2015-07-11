<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 10:59 PM
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JDiscount implements JSONInterface{
    public $DiscountId;
    public $Percentage;
    public $StartDate;
    public $EndDate;
    public $Multiple;
    public $Conditions;
    public $CreditCard;
    public $Description;
    public $Store;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function JDiscount(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Discounts $item)
    {
        $mine = new JDiscount();
        $mine->DiscountId = $item->getDiscountId();
        $mine->CreditCard = array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store = array(
            'Id' => $item->getStoreId(),
            'Category' => $item->getStore()->getCategory(),
            'Name' => $item->getStore()->getStoreName()
        );
        $mine->Percentage = $item->getPercentage();
        $mine->Description = $item->getDescription();
        $mine->Multiple = $item->getMultiple();
        $mine->Conditions = $item->getConditions();
        if (!is_null($item->getStartDate())) {
            $mine->StartDate = $item->getStartDate()->format("Y-m-d");
        }

        if (!is_null($item->getEndDate())) {
            $mine->EndDate = $item->getEndDate()->format("Y-m-d");
        }
        $mine->Reference = $item->getReference();

        $mine->UpdateTime = $item->getUpdateTime()->format("Y-m-d");
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JDiscount();
        if(!ArrayUtils::KEY_EXISTS($data,'DiscountId')) throw new \Exception("Missing mandatory field DiscountId");
        $mine->DiscountId = $data['DiscountId'];

        if(ArrayUtils::KEY_EXISTS($data,'Percentage')) $mine->Percentage = $data['Percentage'];
        if(ArrayUtils::KEY_EXISTS($data,'StartDate')) $mine->StartDate =  new \DateTime($data['StartDate']);
        if(ArrayUtils::KEY_EXISTS($data,'EndDate')) $mine->EndDate =  new \DateTime($data['EndDate']);
        if(ArrayUtils::KEY_EXISTS($data,'Multiple')) $mine->Multiple = $data['Multiple'];
        if(ArrayUtils::KEY_EXISTS($data,'Conditions')) $mine->Conditions = $data['Conditions'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        //Credit card name is optional when saving to db
        if(!ArrayUtils::KEY_EXISTS($data,'CreditCard')) throw new \Exception("Failed to find mandatory field CreditCard");
        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Id')) throw new \Exception("Failed to find mandatory field CreditCard.Id");
        $mine->CreditCard =  array('Id' => $tmp['Id']);
        if(ArrayUtils::KEY_EXISTS($tmp,'Name')) $mine->CreditCard['Name'] = $tmp['Name'];

        //Store name and category are optional when saving to db
        if(!ArrayUtils::KEY_EXISTS($data,'Store')) throw new \Exception("Failed to find mandatory field Store");
        $tmp = $data['Store'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Id')) throw new \Exception("Failed to find mandatory field Store.Id");
        $mine->Store =  array('Id' => $tmp['Id'] );
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Store['Name'] = $tmp['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Store['Category'] = $tmp['Category'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }


    public function toDB()
    {
        $is = new \Discounts();
        return $this->updateDB($is);
    }

    public function updateDB(\Discounts &$item)
    {
        if(!is_null($this->DiscountId) && $this->DiscountId>0) {
            $item->setDiscountId($this->DiscountId);
        }

        $item->setPercentage($this->Percentage);
        if(!is_null($this->StartDate)) $item->setStartDate($this->StartDate);
        if(!is_null($this->EndDate)) $item->setEndDate($this->EndDate);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Multiple)) $item->setMultiple($this->Multiple);
        if(FieldUtils::STRING_IS_DEFINED($this->Conditions)) $item->setConditions($this->Conditions);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);

        if(!is_null($this->CreditCard)) {
            $it = $this->CreditCard;
            $item->setCreditCard((new \CreditCardQuery())->findPk($it['Id']));
        }

        if(!is_null($this->Store)) {
            $it = $this->Store;
            $item->setStore((new \StoreQuery())->findPk($it['Id']));
        }

        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}
