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


class JCreditCardRestriction  implements JSONInterface {
    public $CreditCardRestrictionId;
    public $CreditCard;
    public $RestrictionType;
    public $Comparator;
    public $Value;
    public $Priority;
    public $UpdateTime;
    public $UpdateUser;


    public function JCreditCardRestriction() {
        return $this;
    }

    public function GenerateKey() {
        if(!$this->isValid() && !is_null($this->CreditCard)) {
            return $this->CreditCard->credit_card_id . "_";
        }
        return $this->CreditCard->credit_card_id . "_" . $this->RestrictionType->RestrictionTypeId;
    }

    private static function SPLIT_ID($id) {
        $ids = explode("_",$id);
        if(!is_array($ids) || count($ids) <> 2) throw new \Exception("invalid id returned, require #_# got " . $id);
        if(strlen($ids[0])<=0) throw new \Exception("No CreditCard id specified (" . $id . ")");
        if(strlen($ids[1])<=0) throw new \Exception("No RestrictionType id specified (" . $id . ")");

        return $ids;
    }

    public static function LOAD_FROM_ID($id) {
        $ids = JCreditCardRestriction::SPLIT_ID($id);
        foreach( (new \CardRestrictionQuery())->findByPrimaryKeys($ids[0],$ids[1]) as $restriction)
        {
            return $restriction;
        }

        throw new \Exception ("No existing Restriction found for CreditCard " . $ids[0] . ", RestrictionType " . $ids[1]);
    }

    public static function CREATE_FROM_DB(\CardRestriction $item)
    {
        $mine = new JCreditCardRestriction();
        if(!FieldUtils::ID_IS_DEFINED($item->getCreditCardId())) throw new \Exception("JCreditCardRestriction: No CreditCardId defined");
        $mine->CreditCard = JCreditCard::CREATE_DB($item->getCreditCard());
        $mine->Priority = $item->getPriorityId();
        if(!FieldUtils::ID_IS_DEFINED($item->getRestrictionTypeId())) throw new \Exception("JCreditCardRestriction: No CreditCardId defined");
        $mine->RestrictionType = JRestrictionType::CREATE_FROM_DB($item->getRestrictionType());
        $mine->Comparator = $item->getComparator();


        $mine->CreditCardRestrictionId = $mine->GenerateKey();
        if(!is_null($item->getValue())) $mine->Value = $item->getValue();

        if(!is_null($item->getUpdateTime())) $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        if(FieldUtils::STRING_IS_DEFINED($item->getUpdateUser())) $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JCreditCardRestriction();

        if(!ArrayUtils::KEY_EXISTS($data,'CreditCard') && !ArrayUtils::KEY_EXISTS($data,'CreditCardId')) throw new \Exception("Failed to find mandatory field CreditCard");
        if(ArrayUtils::KEY_EXISTS($data,'CreditCardId')){
            $mine->CreditCard = JCreditCard::CREATE_DB( (new \CreditCardQuery())->findPk($data["CreditCardId"]));
        } else {
            $mine->CreditCard = JCreditCard::CREATE_FROM_ARRAY($data['CreditCard']);
        }
        if(!ArrayUtils::KEY_EXISTS($data,'RestrictionType') && !ArrayUtils::KEY_EXISTS($data,'RestrictionTypeId') ) throw new \Exception("Failed to find mandatory field RestrictionType");
        if(ArrayUtils::KEY_EXISTS($data,'RestrictionType')) {
            $mine->RestrictionType = JRestrictionType::CREATE_FROM_ARRAY($data["RestrictionType"]);
        } else {
            $mine->RestrictionType = JRestrictionType::CREATE_FROM_DB( (new \RestrictionTypeQuery())->findPk($data["RestrictionTypeId"]) );
        }

        if(ArrayUtils::KEY_EXISTS($data,'Comparator')) $mine->Comparator = $data['Comparator'];
        if(ArrayUtils::KEY_EXISTS($data,'Priority')) $mine->Priority = $data['Priority'];
        if(ArrayUtils::KEY_EXISTS($data,'Value')) $mine->Value = $data['Value'];

        if(ArrayUtils::KEY_EXISTS($data,'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }


    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function isValid() {
        return !is_null($this->CreditCard) && FieldUtils::ID_IS_DEFINED($this->CreditCard->credit_card_id) &&
            !is_null($this->RestrictionType) && FieldUtils::ID_IS_DEFINED($this->RestrictionType->RestrictionTypeId);
    }

    public function tryLoadFromDB() {
        if(!$this->isValid()) return new \CardRestriction();
        $this->CreditCardRestrictionId = $this->GenerateKey();

        foreach( (new \CardRestrictionQuery())->findByPrimaryKeys($this->CreditCard->credit_card_id,
            $this->RestrictionType->RestrictionTypeId) as $restriction)
        {
            return $restriction;
        }

        return new \CardRestriction();
    }

    public function toDB() {
        return $this->updateDB($this->tryLoadFromDB());
    }

    public function updateDB(\CardRestriction &$item) {
        if(!is_null($this->CreditCard)) {
            if (FieldUtils::ID_IS_DEFINED($this->CreditCard->credit_card_id)) $item->setCreditCardId($this->CreditCard->credit_card_id);
        }

        if(!is_null($this->RestrictionType)) {
            if(FieldUtils::ID_IS_DEFINED($this->RestrictionType->RestrictionTypeId)) {
                $item->setRestrictionTypeId($this->RestrictionType->RestrictionTypeId);
            }
        }

        if(FieldUtils::STRING_IS_DEFINED($this->Comparator)) $item->setComparator($this->Comparator);
        if(FieldUtils::STRING_IS_DEFINED($this->Value)) $item->setValue($this->Value);

        if(FieldUtils::NUMBER_IS_DEFINED($this->Priority)) $item->setPriorityId($this->Priority);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }



    public function getRestriction() {
        return JRestriction::CREATE_CREDITCARD($this);
    }




}