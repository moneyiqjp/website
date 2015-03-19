<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 8:57 PM
 */

namespace Db\Json;


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
    public $update_time;
    public $update_user;

    function JCreditCard()
    {
        return this;
    }

    public static function CREATE_DB(\CreditCard $ccs)
    {
        $myself = new JCreditCard();
        $myself->credit_card_id = $ccs->getCreditCardId();
        $myself->name = $ccs->getName();
        $myself->issuer = array("id" => $ccs->getIssuerId(), "name" => $ccs->getIssuer()->getIssuerName());
        $myself->description = $ccs->getDescription();
        $myself->image_link = $ccs->getImageLink();
        $myself->visa = $ccs->getVisa();
        $myself->master = $ccs->getMaster();
        $myself->jcb = $ccs->getJcb();
        $myself->amex = $ccs->getAmex();
        $myself->diners = $ccs->getDiners();
        $myself->affiliate_link = $ccs->getAfilliateLink();
        $myself->affiliate_id = $ccs->getAffiliateId();
        $myself->affiliate = array("id" => $ccs->getAffiliateId(), "name" => $ccs->getAffiliateCompany()->getName());
        $myself->update_time = $ccs->getUpdateTime()->format("Y-m-d");
        $myself->update_user = $ccs->getUpdateUser();
        return $myself;
    }
}