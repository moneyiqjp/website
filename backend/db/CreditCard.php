<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:03 PM
 */

namespace CreditCard;


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
    /*
        "supportedBrands": [
            "Visa",
            "Maestro",
            "JCB"
        ],


     */

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

        return $this;
    }
}