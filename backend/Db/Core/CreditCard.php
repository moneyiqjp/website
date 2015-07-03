<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:03 PM
 */

namespace Db\Core;

class Reward{
    public $category;
    public $type;
    public $description;
    public $icon;
    public $yenPerPoint;
    public $pricePerUnit;
    public $minPoints;
    public $maxPoints;
    public $requiredPoints;
    public $maxPeriod;
    public $pointSystemName;
    public $isFinite = 0;

    function PointsData()
    {
    }

    function UpdateFromDB(\Reward $rew)
    {
        $this->category = $rew->getRewardCategory()->getName();
        $this->type    = $rew->getRewardType()->getName();
        $this->description = $rew->getDescription();
        $this->icon = $rew->getIcon();
        $this->yenPerPoint = $rew->getYenPerPoint();
        $this->pricePerUnit = $rew->getPricePerUnit();
        $this->minPoints = $rew->getMinPoints();
        $this->maxPoints = $rew->getMaxPoints();
        $this->requiredPoints = $rew->getRequiredPoints();
        $this->maxPeriod = $rew->getMaxPeriod();
        $this->pointSystemName = $rew->getPointSystem()->getPointSystemName();
        $this->isFinite = $rew->getRewardType()->getIsFinite();
        return $this;
    }

    static function CREATE_FROM_DB(\Reward $rew)
    {
        $mine = new Reward();
        $mine->UpdateFromDB($rew);
        return $mine;
    }
}

class Feature {
    public $category;
    public $feature;
    public $backgroundColor;
    public $foregroundColor;

    function Feature()
    {
        return $this;
    }


    function SetFeature(\CardFeatureType $feattype)
    {

        $this->category = $feattype->getCategory();
        $this->feature = $feattype->getName();
        $this->backgroundColor = $feattype->getBackgroundColor();
        $this->foregroundColor = $feattype->getForegroundColor();
    }
}

class PointsData {
    public $store;
    public $storeCategory;
    public $points;
    public $multiple;

    function PointsData()
    {
        return $this;
    }


    function SetPointsData($store,$storeCategory, $points,$multiple)
    {
        $this->store = $store;
        $this->storeCategory = $storeCategory;
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
    public $rewards = array();

    function CreditCard()
    {
        return $this;
    }

    function AddPaymentNetwork($text_)
    {
        array_push($this->supportedBrands, $text_);
        $this->supportedBrands = array_unique($this->supportedBrands, SORT_STRING);

        return $this;
    }

    function AddFeature(\CardFeatureType $type)
    {
        $feat = new Feature();
        $feat->SetFeature($type);

        if(!is_array($this->features) || empty($this->features))
        {
            $this->features = Array($feat);
            return $this;
        }

        array_push($this->features, $feat);

        return $this;
    }

    function _addPoints($array, $store, $storeCategory, $pointValue,$multiple_)
    {
        $points = new PointsData();
        $points->SetPointsData($store, $storeCategory, $pointValue,$multiple_);

        if(!is_array($array) || empty($array))
        {
            $array = Array($points);
            return $array;
        }

        array_push($array, $points);
        return $array;
    }


    function AddPointsData($store, $storeCategory, $points,$multiple_)
    {
        $this->pointsData = $this->_addPoints($this->pointsData,$store,$storeCategory,$points,$multiple_);
    }

    function AddDiscountData($store,$storeCategory,$points,$multiple_)
    {
        $this->discountData = $this->_addPoints($this->discountData,$store,$storeCategory,$points,$multiple_);
    }

    function AddReward(\Reward $rew)
    {
        $key = $rew->getRewardCategory()->getName();
        if (!array_key_exists($key,$this->rewards))
        {
            $this->rewards[$key] = array();
        }
        array_push($this->rewards[$key],Reward::CREATE_FROM_DB($rew));
    }


    public static function fromCreditCardObject(\CreditCard $cc)
    {
        $mine = new CreditCard();
        $mine->cardId = $cc->getCreditCardId();
        $mine->cardName = $cc->getName();
        $issuer=$cc->getIssuer();
        if(!is_null($issuer)) {
            $mine->cardIssuer = $issuer->getIssuerName();
        }
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
            if($fee->getFeeType()==1) {
                $mine->annualFeeFirstYear = $fee->getFeeAmount();
            }

            if($fee->getFeeType()>1) {
                $mine->annualFeeSubseqYear = $fee->getFeeAmount();
            }
        }


        foreach($cc->getDiscountss() as $disc)
        {
            $mine->AddDiscountData( $disc->getStore()->getStoreName(),$disc->getStore()->getCategory(),$disc->getPercentage(),$disc->getMultiple());
        }

        foreach($cc->getCardFeaturess() as $feature) {
           $feattype = $feature->getCardFeatureType();
            if(strtoupper($feattype->getCategory())!=strtoupper("Network")) {//TODO remove hard coded netowrk
                $mine->AddFeature($feattype);
            }
        }

        /*
        foreach($cc->getInsurances() as $insurance )
        {
           #$insurance->get
            //TODO add insurance data
        }
        */

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




        //TODO how are we handling interest
        foreach($cc->getInterests() as $int) {
            if($int->getPaymentType()->getPaymentType()=="ikkai") {
                $mine->interestShopping = $int->getMinInterest();
            }
        }

        //todo points expiry period
        $mine->pointsExpiryPeriod = 1;
        $mine->pointsToMoneyConversionRate = 0;

        foreach($cc->getCardPointSystems() as $pcs)
        {
            $ps = $pcs->getPointSystem();
            foreach($ps->getRewards() as $rew)
            {
                $mine->AddReward($rew);
            }

            $mine->pointsToMoneyConversionRate = max ($ps->getDefaultYenPerPoint(),$mine->pointsToMoneyConversionRate);
            foreach($ps->getPointAcquisitions() as $use)
            {
                $mine->AddPointsData($use->getStore()->getStoreName(),$use->getStore()->getCategory(), $use->getPointsPerYen(),1.0);


                /* $mine->pointsToMoneyConversionRate = max ($use->getYenPerPoint(),$mine->pointsToMoneyConversionRate); */
            }
        }


        #$this->AddPointsData("標準ポイント",0.005,1.0);
        #$this->AddPointsData("ローソン",0.012,1.0);
        #$this->AddPointsData("イーオン",0.02,1.0);

        return $mine;
    }
}
