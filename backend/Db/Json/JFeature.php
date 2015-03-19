<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:53 PM
 */

namespace Db\Json;


class JFeature {
    public $FeatureId;
    public $FeatureType;
    public $CreditCard;
    public $Description;
    public $FeatureCost;
    public $UpdateTime;
    public $UpdateUser;

    public function JFeature(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardFeatures $item)
    {
        $mine = new JFeature();
        $mine->FeatureId = $item->getFeatureId();
        $mine->FeatureType = array(
            'Id' => $item->getFeatureTypeId(),
            'Name' => $item->getCardFeatureType()->getCategory() . "-" . $item->getCardFeatureType()->getName()
        );
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Description = $item->getDescription();
        $mine->FeatureCost = $item->getFeatureCost();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JFeature();
        $mine->FeatureId = $data['FeatureId'];
        $tmp = $data['FeatureType'];
        $mine->$FeatureType = array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->Description = $data['Description'];
        $mine->FeatureType = $data['FeatureType'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \CardFeatures();
        return $this->updateDB($is);
    }
    public function updateDB(\CardFeatures &$item)
    {
        $item->setFeatureId($this->FeatureId);
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