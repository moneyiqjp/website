<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/11/2015
 * Time: 7:35 AM
 */

namespace Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JInsurance  implements JSONInterface {
    public $InsuranceId;
    public $CreditCard;
    public $InsuranceType;
    public $MaxInsuredAmount;
    public $Value;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;


    public function JInsurance() {
        return $this;
    }

    public static function CREATE_FROM_DB(\Insurance $item)
    {
        $mine = new JInsurance();
        $mine->InsuranceId = $item->getInsuranceId();

        if(FieldUtils::ID_IS_DEFINED($item->getCreditCardId())) {
            $mine->CreditCard = array(
                'Id' => $item->getCreditCardId(),
                'Name' => $item->getCreditCard()->getName()
            );
        }

        if(FieldUtils::ID_IS_DEFINED($item->getInsuranceTypeId())) {
                $mine->InsuranceType = JInsuranceType::CREATE_FROM_DB($item->getInsuranceType());
        }

        if(!is_null($item->getMaxInsuredAmount())) $mine->MaxInsuredAmount = $item->getMaxInsuredAmount();
        if(!is_null($item->getValue())) $mine->Value = $item->getValue();
        $mine->Reference = $item->getReference();

        if(!is_null($item->getUpdateTime())) $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        if(FieldUtils::STRING_IS_DEFINED($item->getUpdateUser())) $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JInsurance();
        if(!ArrayUtils::KEY_EXISTS($data,'InsuranceId')) throw new \Exception("Required key InsuranceId not found");
        $mine->InsuranceId = $data['InsuranceId'];

        //Credit card name is optional when saving to db
        if(!ArrayUtils::KEY_EXISTS($data,'CreditCard')) throw new \Exception("Failed to find mandatory field CreditCard");
        $tmp = $data['CreditCard'];
        if(!ArrayUtils::KEY_EXISTS($tmp,'Id')) throw new \Exception("Failed to find mandatory field CreditCard.Id");
        $mine->CreditCard =  array('Id' => $tmp['Id']);
        if(ArrayUtils::KEY_EXISTS($tmp,'Name')) $mine->CreditCard['Name'] = $tmp['Name'];

        if(!ArrayUtils::KEY_EXISTS($data,'InsuranceType')) throw new \Exception("Failed to find mandatory field InsuranceType");
        $mine->InsuranceType = JInsuranceType::CREATE_FROM_ARRAY($data["InsuranceType"]);

        if(ArrayUtils::KEY_EXISTS($data,'MaxInsuredAmount')) $mine->MaxInsuredAmount = $data['MaxInsuredAmount'];
        if(ArrayUtils::KEY_EXISTS($data,'Value')) $mine->Value = $data['Value'];
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }


    public function toDB() {
        $item = new \Insurance();
        if(FieldUtils::ID_IS_DEFINED($this->InsuranceId)) {
            $item =(new \InsuranceQuery())->findPk($this->InsuranceId);
            if(is_null($item )) $item = new \Insurance();
        }
        return $this->updateDB($item);
    }

    public function updateDB(\Insurance &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->InsuranceId)) $item->setInsuranceId($this->InsuranceId);

        if(!is_null($this->CreditCard)) {
            if (FieldUtils::ID_IS_DEFINED($this->CreditCard["Id"])) $item->setCreditCardId($this->CreditCard["Id"]);
        }

        if(!is_null($this->InsuranceType)) {
            if(FieldUtils::ID_IS_DEFINED($this->InsuranceType->InsuranceTypeId)) {
                $item->setInsuranceTypeId($this->InsuranceType->InsuranceTypeId);
            }
        }

        if(FieldUtils::NUMBER_IS_DEFINED($this->MaxInsuredAmount)) $item->setMaxInsuredAmount($this->MaxInsuredAmount);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Value)) $item->setValue($this->Value);
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

/*
 *     public $TypeName;
    public $SubtypeName;
    public $Description;
    public $Region;
 */

    public function getCategory() {
        if(is_null($this->InsuranceType)) throw new \Exception("No Insurance Type");
        $it = $this->InsuranceType;

        if(is_null($it->TypeDisplay)) return $it->TypeName;
        return $it->TypeDisplay;

        /*
        switch(strtoupper($it->TypeName)) {
            case "TRAVEL":
                return "travel_insurance";
            case "SHOPPING":
                return "shopping_insurance";
            default:
                return "";
        }
        */
    }

    public function getFeature() {
        if(is_null($this->InsuranceType)) throw new \Exception("No Insurance Type");
        $it = $this->InsuranceType;

        if(is_null($it->SubtypeDisplay)) return $it->SubtypeName;
        return $it->SubtypeDisplay;
    }


}