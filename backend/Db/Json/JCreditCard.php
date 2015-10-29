<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 8:57 PM
 */

namespace Db\Json;


use Db\Utility\ArrayUtils;

class JCreditCard {
    public $credit_card_id;
    public $name;
    public $issuer;
    public $description;
    public $image_link;
    public $visa;
    public $master;
    public $jcb;
    public $amex;
    public $diners;
    public $affiliate_link;
    public $affiliate_id;
    public $affiliate;
    public $points_expiry_months;
    public $reference;
    public $point_systems;
    public $is_active;
    public $update_time;
    public $update_user;

    function JCreditCard()
    {
        return $this;
    }

    public static function CREATE_DB(\CreditCard $ccs)
    {
        $myself = new JCreditCard();
        $myself->credit_card_id = $ccs->getCreditCardId();
        $myself->name = $ccs->getName();
        $name = "";
        if(!is_null($ccs->getIssuer())) {
            $name = $ccs->getIssuer()->getIssuerName();
        }
        $myself->issuer = array("id" => $ccs->getIssuerId(), "name" => $name);

        $myself->description = $ccs->getDescription();
        $myself->image_link = $ccs->getImageLink();
        $myself->visa = $ccs->getVisa();
        $myself->master = $ccs->getMaster();
        $myself->jcb = $ccs->getJcb();
        $myself->amex = $ccs->getAmex();
        $myself->diners = $ccs->getDiners();
        $myself->affiliate_link = $ccs->getAfilliateLink();
        $myself->affiliate_id = $ccs->getAffiliateId();
        $myself->points_expiry_months = $ccs->getPointexpirymonths();

        if(!is_null($ccs->getAffiliateCompany())) {
            $myself->affiliate = array("id" => $ccs->getAffiliateId(), "name" => $ccs->getAffiliateCompany()->getName());
        }

        $myself->is_active = $ccs->getIsactive();

        $myself->point_systems =array();
        $cpss = $ccs->getCardPointSystems();
        if(!is_null($cpss)){
            foreach($cpss as $cps) {
                if(!is_null($cps->getPointSystem())) {
                    array_push($myself->point_systems,
                            array("id" => $cps->getPointSystem()->getPointSystemId(),
                                "name" => $cps->getPointSystem()->getPointSystemName())
                    );
                }
            }
        }
        $myself->reference = $ccs->getReference();

        $myself->update_time = $ccs->getUpdateTime()->format("Y-m-d");
        $myself->update_user = $ccs->getUpdateUser();
        return $myself;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if(!ArrayUtils::KEY_EXISTS($data,'credit_card_id')) throw new \Exception("JCreditCard requires CreditCardId");

        foreach( (new \CreditCardQuery())->findByCreditCardId($data['credit_card_id']) as $item)
        {
            return JCreditCard::CREATE_DB($item);
        }

        throw new \Exception("No credit card found for CreditCardId" . $data['credit_card_id']);
    }
}