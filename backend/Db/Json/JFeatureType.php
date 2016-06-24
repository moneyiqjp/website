<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:57 PM
 */

namespace Db\Json;
use Db\Utility\FieldUtils;
use Db\Utility\ArrayUtils;


class JFeatureType extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $FeatureTypeId;
    public $Name;
    public $Description;
    public $Category;
    public $ForegroundColor;
    public $BackgroundColor;
    public $UpdateTime;
    public $UpdateUser;

    public function JFeatureType(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardFeatureType $item) {
        $mine = new JFeatureType();
        $mine->FeatureTypeId = $item->getFeatureTypeId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $mine->Category = $item->getCategory();
        $mine->ForegroundColor = $item->getForegroundColor();
        $mine->BackgroundColor = $item->getBackgroundColor();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data) {
        $mine = new JFeatureType();
        if(ArrayUtils::KEY_EXISTS($data,'FeatureTypeId'))  $mine->FeatureTypeId = $data['FeatureTypeId'];
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'Category')) $mine->Category = $data['Category'];
        if(ArrayUtils::KEY_EXISTS($data,'ForegroundColor')) $mine->ForegroundColor = $data['ForegroundColor'];
        if(ArrayUtils::KEY_EXISTS($data,'BackgroundColor')) $mine->BackgroundColor = $data['BackgroundColor'];
        $mine->UpdateTime = new \DateTime();
        if(ArrayUtils::KEY_EXISTS($data,'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function tryLoadDB() {
        if(FieldUtils::ID_IS_DEFINED($this->FeatureTypeId)) {
            $item = \CardFeatureTypeQuery::create()->findPk($this->FeatureTypeId);
            if(!is_null($item)) return $item;
        }
        return new \CardFeatureType();
    }

    public function toDB() {
        $is = $this->tryLoadDB();
        return $this->updateDB($is);
    }

    public function updateDB(\CardFeatureType &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->FeatureTypeId)) $item->setFeatureTypeId($this->FeatureTypeId);

        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Category)) $item->setCategory($this->Category);
        if(FieldUtils::STRING_IS_DEFINED($this->ForegroundColor)) $item->setForegroundColor($this->ForegroundColor);
        if(FieldUtils::STRING_IS_DEFINED($this->BackgroundColor)) $item->setBackgroundColor($this->BackgroundColor);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function getLabel() {
        return $this->Name;
    }

    public function getValue()
    {
        return $this->FeatureTypeId;
    }
}