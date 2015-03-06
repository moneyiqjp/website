<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:03 PM
 */

namespace CreditCard;

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;


class Feature {
    public $id;
    public $text;

    function Feature()
    {
        return $this;
    }


    function SetFeature($id_,$text_ )
    {
        $this->id = $id_;
        $this->text = $text_;
    }
}

class PointsData {
    public $store;
    public $points;
    public $multiple;

    function PointsData()
    {
        return $this;
    }


    function SetPointsData($store,$points,$multiple)
    {
        $this->store = $store;
        $this->points = $points;
        $this->multiple = $multiple;
    }
}


class CreditCard {
    public $cardId;
    public $cardName;
    public $cardIssuer;
    public $cardImg;
    public $campaignText;
    public $pointsExpiryPeriod;
    public $campaignPoints;
    public $annualFeeFirstYear;
    public $annualFeeSubseqYear;
    public $interestShopping;
    public $pointsToMoneyConversionRate;
    public $affiliateUrl;
    public $features = array();
    public $pointsData = array();
    public $discountData = array();
    public $supportedBrands = array();
    /*
        "supportedBrands": [
            "Visa",
            "Maestro",
            "JCB"
        ],


     */

    function AddPaymentNetwork($text_)
    {
        array_push($this->supportedBrands, $text_);
        $this->supportedBrands = array_unique($this->supportedBrands, SORT_STRING);

        return $this;
    }

    function AddFeature($id_, $text_)
    {
        $feat = new Feature();
        $feat->SetFeature($id_, $text_);

        if(!is_array($this->features) || empty($this->features))
        {
            $this->features = Array($feat);
            return $this;
        }

        array_push($this->features, $feat);
    }

    function _addPoints($array, $id_, $text_,$multiple_)
    {
        $points = new PointsData();
        $points->SetPointsData($id_, $text_,$multiple_);

        if(!is_array($array) || empty($array))
        {
            $array = Array($points);
            return $array;
        }

        array_push($array, $points);
        return $array;
    }


    function AddPointsData($id_, $text_,$multiple_)
    {
        $this->pointsData = $this->_addPoints($this->pointsData,$id_,$text_,$multiple_);
    }

    function AddDiscountData($id_, $text_,$multiple_)
    {
        $this->discountData = $this->_addPoints($this->discountData,$id_,$text_,$multiple_);
    }

    function CreditCard()
    {
        return $this;
    }


    public static function fromCreditCardObject(\CreditCard $cc)
    {
        $mine = new CreditCard();
        $mine->cardId = $cc->getCreditCardId();
        $mine->cardName = $cc->getName();
        $mine->cardIssuer = $cc->getIssuer()->getIssuerName();
        $mine->cardImg = $cc->getImageLink();
        $mine->affiliateUrl = $cc->getAfilliateLink();

        if($cc->getAmex()) $mine->AddPaymentNetwork("American Express");
        if($cc->getVisa()) $mine->AddPaymentNetwork("VISA");
        if($cc->getDiners()) $mine->AddPaymentNetwork("Diners");
        if($cc->getJcb()) $mine->AddPaymentNetwork("JCB");
        if($cc->getMaster()) $mine->AddPaymentNetwork("Master");

        $mine->annualFeeFirstYear = 0.0;
        $mine->annualFeeSubseqYear = 0;
        foreach($cc->getFeess() as $fee)
        {
         //TODO add fee data
        }

        foreach($cc->getDiscountss() as $disc)
        {
            $mine->AddDiscountData( $disc->getStore()->getStoreName(),$disc->getPercentage(),$disc->getMultiple());
        }

        foreach($cc->getCardFeaturess() as $feature) {
           $feattype = $feature->getCardFeatureType();
            $mine->AddFeature($feattype->getCategory(),$feattype->getName());
        }

        foreach($cc->getInsurances() as $insurance )
        {
           #$insurance->get
            //TODO add insurance data
        }

        $now = new \DateTime('NOW');
        foreach($cc->getCampaigns() as $camp)
        {
            //TODO campaign text not available in data
            if( $camp->getEndDate()> $now)
            {
                $mine->campaignPoints = $camp->getMaxPoints();
                $mine->campaignText = $camp->getDescription();
            }
        }


        $mine->pointsToMoneyConversionRate = 1;
        foreach($cc->getPointUsages() as $use)
        {
            $mine->AddPointsData($use->getStore()->getStoreName(), $use->getYenPerPoint(),1.0);

            //TODO point usage/points to money conversion rate/store where should the date go
            if($mine->pointsToMoneyConversionRate > $use->getYenPerPoint())
            {
                //todo should we return min yen per point conversion?
                $mine->pointsToMoneyConversionRate = $use->getYenPerPoint();
            }
        }

        //TODO how are we handling interest
        foreach($cc->getInterests() as $int) {
            if($int->getPaymentType()->getPaymentType()=="ikkai") {
                $mine->interestShopping = $int->getMinInterest();
            }
        }

        //todo points expiry period
        $mine->pointsExpiryPeriod = 1;



        #$this->AddPointsData("標準ポイント",0.005,1.0);
        #$this->AddPointsData("ローソン",0.012,1.0);
        #$this->AddPointsData("イーオン",0.02,1.0);

        return $mine;
    }

    /**
     * function to create dummy data
     */
    function dummy()
    {
        $this->cardId = rand();
        $this->cardName = "Rakuten Gold";
        $this->cardIssuer = "Rakuten";
        $this->cardImg = "../img/rakuten_card.png";
        $this->campaignText = "10,000円相当ポイントプレゼント11月11日まで！";
        $this->pointsExpiryPeriod = 1;
        $this->campaignPoints = 10000;
        $this->annualFeeFirstYear = 0.0;
        $this->annualFeeSubseqYear = 0;
        $this->interestShopping = 0.1225;
        $this->pointsToMoneyConversionRate = 1;
        $this->affiliateUrl = "http://www.cnn.jp";
        $this->AddFeature("etc","ETC機能");
        $this->AddFeature("travel_insurace","旅行保険200万円まで");
        $this->AddDiscountData("イトーヨーカドー",0.02,0.1);
        $this->AddDiscountData("マルイ",0.02,1);
        $this->AddPointsData("標準ポイント",0.005,1.0);
        $this->AddPointsData("ローソン",0.012,1.0);
        $this->AddPointsData("イーオン",0.02,1.0);
        $this->AddPaymentNetwork("Visa");
        $this->AddPaymentNetwork("Visa");
        $this->AddPaymentNetwork("Maestro");

        return $this;
    }
}