<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:53 PM
 */

namespace Db\Json;


class JFeature implements JSONInterface{
    public $FeatureId;
    public $FeatureType;
    public $CreditCard;
    public $Description;
    public $FeatureCost;
    public $Active;
    public $UpdateTime;
    public $UpdateUser;

    public function JFeature() {
        $this->Active = false;
        return $this;
    }

    public function matchesOnType(JFeature $that){
        $tt = $that->FeatureType;
        $ti = $this->FeatureType;
        return $tt['Id'] == $ti['Id'];
    }

    public function matchesType(JFeatureType $that){
        $ti = $this->FeatureType;
        return $ti['Id']==$that->FeatureTypeId;
    }

    public static function CREATE_FROM_FEATURE_TYPE(\CardFeatureType $item) {
        $mine = new JFeature();
        $mine = JFeature::UPDATE_FEATURE_TYPE($mine, $item);
        return $mine;
    }

    public static function CREATE_FROM_FEATURE_TYPE_AND_CC(\CardFeatureType $item, \CreditCard $cc) {
        $mine = new JFeature();
        $mine = JFeature::UPDATE_FEATURE_TYPE($mine, $item);
        $mine = JFeature::UPDATE_CREDIT_CARD($mine, $cc);
        return $mine;
    }

    private static function UPDATE_FEATURE_TYPE(JFeature &$mine, \CardFeatureType $item) {
        $mine->FeatureType = array(
            'Id' => $item->getFeatureTypeId(),
            'Category' => $item->getCategory(),
            'Name' => $item->getName()
        );

        //$mine->FeatureCost = 0;
        $mine->Description = $item->getDescription();
        $mine->UpdateTime = (new \DateTime())->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    private static function UPDATE_CREDIT_CARD(JFeature &$mine, \CreditCard $cc) {
        $mine->CreditCard =  array(
            'Id' => $cc->getCreditCardId(),
            'Name' => $cc->getName()
        );

        return $mine;
    }

    public static function CREATE_FROM_DB(\CardFeatures $item) {
        $mine = new JFeature();
        $mine->FeatureId = $item->getFeatureId();
        $mine->FeatureType = array(
            'Id' => $item->getFeatureTypeId(),
            'Category' => $item->getCardFeatureType()->getCategory(),
            'Name' => $item->getCardFeatureType()->getName()
        );
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Description = $item->getDescription();
        $mine->FeatureCost = $item->getFeatureCost();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        $mine->Active = true;
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data) {
        $mine = new JFeature();
        $mine->FeatureId = $data['FeatureId'];

        if(!array_key_exists('FeatureType',$data)) throw new \Exception("Required key FeatureType not found in request");
        $tmp = $data['FeatureType'];
        if(!array_key_exists('Id',$tmp)) throw new \Exception("Required key FeatureType.Id not found in request");
        if($tmp['Id'] < 0) throw new \Exception("Required key FeatureType.Id must be greater than 0");
        $mine->FeatureType = array(
            'Id' => $tmp['Id'],
            'Category' => $tmp['Category'],
            'Name' => $tmp['Name']
        );
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->FeatureCost = $data['FeatureCost'];
        $mine->Description = $data['Description'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        $mine->Active = true;
        if(array_key_exists('Active',$data)) {
            $mine->Active = $data['Active'];
        }

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB() {
        $is = new \CardFeatures();
        return $this->updateDB($is);
    }

    public function updateDB(\CardFeatures &$item) {
        if(!is_null($this->FeatureId) && $this->FeatureId>0) {
            $item->setFeatureId($this->FeatureId);
        }

        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $it = $this->FeatureType;
        $item->setCardFeatureType((new \CardFeatureTypeQuery())->findPk( $it['Id']));
        $item->setDescription($this->Description);
        $item->setFeatureCost($this->FeatureCost);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}