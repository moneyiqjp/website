<?php

namespace Db\Json;

use Db\Utility\ArrayUtils;

/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/06/17
 * Time: 22:15
 */

class JCreditCardToPointSystemMapping {
    public $Id;
    public $CreditCard;
    public $PointSystem;
    public $UpdateTime;
    public $UpdateUser;

    public static function CREATE_FROM_DB(\CardPointSystem $item)
    {
        $mine = new JCreditCardToPointSystemMapping();
        $mine->Id = $item->getCardPointSystemId();
        $mine->CreditCard = JCreditCard::CREATE_DB($item->getCreditCard());
        $mine->PointSystem = JPointSystem::CREATE_FROM_DB($item->getPointSystem());
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (ArrayUtils::KEY_EXISTS($data, 'PointSystemId') && ArrayUtils::KEY_EXISTS($data, 'CreditCardId'))
        {
            return JCreditCardToPointSystemMapping::LOAD_FROM_DB($data['PointSystemId'], $data['CreditCardId']);
        }
        if (!ArrayUtils::KEY_EXISTS($data, 'PointSystem')) throw new \Exception("JCreditCardToPointSystemMapping: Mandatory field PointSystem (!) missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'CreditCard')) throw new \Exception("JCreditCardToPointSystemMapping: Mandatory field CreditCard missing");
        return JCreditCardToPointSystemMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }


    public static function LOAD_FROM_DB($creditCardId, $pointSystemId)
    {

        foreach ( (new \CardPointSystemQuery())->findByCreditCardId($creditCardId) as $item)
        {
            if($pointSystemId == $item->getPointSystemId())
            {
                return JCreditCardToPointSystemMapping::CREATE_FROM_DB($item);
            }
        }
        throw new \Exception("JCreditCardToPointSystemMapping: no matching mapping found for $creditCardId, $pointSystemId");
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JCreditCardToPointSystemMapping();
        if (ArrayUtils::KEY_EXISTS($data, 'PointSystemId') && ArrayUtils::KEY_EXISTS($data, 'CreditCardId'))
        {
            $mine = JCreditCardToPointSystemMapping::LOAD_FROM_DB($data['CreditCardId'],$data['PointSystemId']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'CreditCard')) {
            $mine->CreditCard = JCreditCard::CREATE_FROM_ARRAY($data['CreditCard']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'PointSystem')) {
            $mine->PointSystem = JPointSystem::CREATE_FROM_ARRAY($data['PointSystem']);
        }
        return $mine;
    }

    public function isValid()
    {
        return !is_null($this->PointSystem) && !is_null($this->CreditCard) &&
                    !is_null($this->PointSystem->PointSystemId) &&
                    !is_null($this->CreditCard->credit_card_id);
    }

    public function toDB()
    {
        if(!$this->isValid()) throw new \Exception("Invalid JCreditCardToPointSystemMappiong, can't save");
        $is = new \CardPointSystem();
        return $this->updateDB($is);
    }

    public function updateDB(\CardPointSystem &$item)
    {
        $item->setPointSystemId($this->PointSystem->PointSystemId);
        $item->setCreditCardId($this->CreditCard->credit_card_id);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}