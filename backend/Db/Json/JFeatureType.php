<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:57 PM
 */

namespace Db\Json;


class JFeatureType implements JSONInterface {
    public $FeatureTypeId;
    public $Name;
    public $Description;
    public $Category;
    public $UpdateTime;
    public $UpdateUser;

    public function JFeatureType(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardFeatureType $item)
    {
        $mine = new JFeatureType();
        $mine->FeatureTypeId = $item->getFeatureTypeId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $mine->Category = $item->getCategory();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JFeatureType();
        $mine->FeatureTypeId = $data['FeatureTypeId'];
        $mine->Name = $data['Name'];
        $mine->Description = $data['Description'];
        $mine->Category = $data['Category'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB()
    {
        $is = new \CardFeatureType();
        return $this->updateDB($is);
    }

    public function updateDB(\CardFeatureType &$item)
    {
        if(!is_null($this->FeatureTypeId) && $this->FeatureTypeId>0) {
            $item->setFeatureTypeId($this->FeatureTypeId);
        }
        $item->setDescription($this->Description);
        $item->setName($this->Name);
        $item->setCategory($this->Category);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}