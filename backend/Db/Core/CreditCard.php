<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:03 PM
 */

namespace Db\Core;

include_once(__DIR__ . "/../Json/JInsurance.php");
use Db\Json\JInsurance;
use Db\Json\JFeatureType;
use Db\Json\JCreditCardRestriction;
use Db\Utility\FieldUtils;


class CardRestriction { //TODO merge with PersonaMapping
    public $FeatureRestriction = array();
    public $GeneralRestriction = array();

    public function Restriction(){}

    public static function CREATE(\CreditCard $card)
    {
        $that = new CardRestriction();

        foreach($card->getMapCardFeatureConstraints() as $item) {
            array_push($that->FeatureRestriction,  JFeatureType::CREATE_FROM_DB($item->getCardFeatureType()));
        }


        foreach($card->getCardRestrictions() as $item) {
            array_push($that->GeneralRestriction,  JCreditCardRestriction::CREATE_FROM_DB($item)->getRestriction());
        }

        return $that;
    }
}

class Interest{
    public $Type;
    public $Display;
    public $Description;
    public $MinInterest;
    public $MaxInterest;

    function Interest()
    {

    }

    function UpdateFromDB(\Interest $ins)
    {
        $type = $ins->getPaymentType();
        if(!is_null($type)) {
            $this->Display     = $type->getDisplay();
            $this->Type  = $type->getType();
            $this->Description = $type->getDescription();
        }
        $this->MinInterest = $ins->getMinInterest();
        $this->MaxInterest = $ins->getMaxInterest();
        return $this;
    }

    static function CREATE_FROM_DB(\Interest $rew)
    {
        $mine = new Interest();
        $mine->UpdateFromDB($rew);
        return $mine;
    }

    static function CREATE_FROM_CREDIT_CARD(\CreditCard $cc) {
        $items = array();

        foreach($cc->getInterests() as $ins) {
            array_push($items,Interest::CREATE_FROM_DB($ins));
        }

        return $items;
    }

}


class Insurance{
    public $Type;
    public $TypeDisplay;
    public $SubType;
    public $SubTypeDisplay;
    public $Region;
    public $Description;
    public $MaxInsuredAmount;
    public $GuaranteedPeriod;

    function Insurance()
    {

    }

    function UpdateFromDB(\Insurance $ins)
    {
        $type = $ins->getInsuranceType();
        if(!is_null($type)) {
            $this->Type     = $type->getTypeName();
            $this->SubType  = $type->getSubtypeName();
            $this->TypeDisplay     = FieldUtils::STRING_IS_DEFINED($type->getTypeDisplay())? $type->getTypeDisplay():$type->getTypeName();
            $this->SubTypeDisplay  = FieldUtils::STRING_IS_DEFINED($type->getSubtypeDisplay())? $type->getSubtypeDisplay():$type->getSubtypeName();
            $this->Region   = $type->getRegion();
            $this->Description = $type->getDescription();
        }
        $this->MaxInsuredAmount = $ins->getMaxInsuredAmount();
        $this->GuaranteedPeriod = $ins->getGuaranteedPeriod();
        return $this;
    }

    static function CREATE_FROM_DB(\Insurance $rew)
    {
        $mine = new Insurance();
        $mine->UpdateFromDB($rew);
        return $mine;
    }

    static function CREATE_FROM_CREDIT_CARD(\CreditCard $cc) {
        $items = array();

        foreach($cc->getInsurances() as $ins) {
            array_push($items,Insurance::CREATE_FROM_DB($ins));
        }

        return $items;
    }
}


class Reward{
    public $category;
    public $type;
    public $title;
    public $description;
    public $icon;
    public $yenPerPoint;
    public $pricePerUnit;
    public $minPoints;
    public $maxPoints;
    public $requiredPoints;
    public $maxPeriod;
    public $pointSystemName;
    public $pointMultiplier;
    public $isFinite = 0;

    function PointsData()
    {
        $this->pointMultiplier = 1;
    }

    function UpdateFromDB(\Reward $rew)
    {
        if(!is_null($rew->getPointMultiplier())) $this->pointMultiplier = $rew->getPointMultiplier();
        $this->category = $rew->getRewardCategory()->getName();
        $this->type    = $rew->getRewardType()->getName();
        $this->title = $rew->getTitle();
        $this->description = $rew->getDescription();
        $this->icon = $rew->getIcon();
        $this->yenPerPoint = $rew->getYenPerPoint() / $this->pointMultiplier;
        $this->pricePerUnit = $rew->getPricePerUnit();
        $this->minPoints = $rew->getMinPoints() * $this->pointMultiplier;
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

    function SetInsurance(\Insurance $ins) {
        $in = JInsurance::CREATE_FROM_DB($ins);
        $this->category = $in->getCategory();
        $this->feature = $in->getFeature();

    }


    public function __toString()
    {
        return $this->category . "-" . $this->feature;
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
    public $campaignYenValue;
    public $annualFeeFirstYear;
    public $annualFeeSubseqYear;
    public $interestShopping;
    public $interest;
    public $pointsToMoneyConversionRate;
    public $affiliateUrl;
    public $shortDescription;
    public $issue_period;
    public $credit_limit_bottom;
    public $credit_limit_upper;
    public $debit_date;
    public $cutoff_date;
    public $features = array();
    public $insurances = array();
    public $pointsData = array();
    public $discountData = array();
    public $supportedBrands = array();
    public $rewards = array();
    public $restriction;

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

    function getAffiliateLink($link) {
        return urldecode($link);
    }

    function AddInsuranceAsFeature(\Insurance $type)
    {
        $feat = new Feature();
        $feat->SetInsurance($type);
        if(!FieldUtils::STRING_IS_DEFINED($feat->category)) return $this; //only add if we actually created a feature

        if(!is_array($this->insurances) || empty($this->insurances))
        {
            $this->insurances = Array($feat);
            return $this;
        }

        array_push($this->features, $feat);

        $this->features = array_unique($this->features);  //easier to avoid duplicates instead of checking each time
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
        $mine->affiliateUrl = $mine->getAffiliateLink($cc->getAfilliateLink());

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



        foreach($cc->getInsurances() as $insurance ) {
            $mine->AddInsuranceAsFeature($insurance);
        }

        $mine->insurances = Insurance::CREATE_FROM_CREDIT_CARD($cc);

        $now = new \DateTime('NOW');
        foreach($cc->getCampaigns() as $camp) {
            if( $camp->getEndDate()> $now) {
                $mine->campaignPoints = $camp->getMaxPoints();
                $mine->campaignYenValue = $camp->getValueInYen();
                $mine->campaignText = $camp->getDescription();
            }
        }

        $mine->pointsToMoneyConversionRate = $cc->getPointsToMoneyConversionRate();
        $mine->interestShopping = $cc->getShoppingInterestRate();
        $mine->interest = Interest::CREATE_FROM_CREDIT_CARD($cc);
        $mine->shortDescription = $cc->getShortDescription();
        if(!is_null($cc->getPointexpirymonths())) {
            $mine->pointsExpiryPeriod=$cc->getPointexpirymonths()/12;
        }


        foreach($cc->getCardPointSystems() as $pcs) {
            $ps = $pcs->getPointSystem();
            foreach($ps->getRewards() as $rew) {
                $mine->AddReward($rew);
            }

            foreach($ps->getPointAcquisitions() as $use) {
                $mine->AddPointsData($use->getStore()->getStoreName(),
                                     $use->getStore()->getCategory(),
                                     $use->getPointsPerYen(), 1.0);
            }
        }

        $mine->restriction = CardRestriction::CREATE($cc);
        $mine->issue_period = $cc->getIssuePeriod();
        $mine->credit_limit_bottom = $cc->getCreditLimitBottom();
        $mine->credit_limit_upper = $cc->getCreditLimitUpper();
        $mine->debit_date = $cc->getDebitDate();
        $mine->cutoff_date = $cc->getCutoffDate();

        return $mine;
    }
}
