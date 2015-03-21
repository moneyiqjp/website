<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 11:32 PM
 */

namespace Db\Json;


class JInsuranceType {
    public $InsuranceTypeId;
    public $TypeName;
    public $SubtypeName;
    public $Description;
    public $Region;
    public $UpdateTime;
    public $UpdateUser;

    public function JInsuranceType(){
        return $this;
    }

    public static function CREATE_FROM_DB(\InsuranceType $item)
    {
        $mine = new JInsuranceType();
        $mine->InsuranceTypeId = $item->getInsuranceTypeId();
        $mine->TypeName = $item->getTYpeName();
        $mine->SubtypeName = $item->getSubtypeName();
        $mine->Description = $item->getDescription();
        $mine->Region = $item->getRegion();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JInsuranceType();
        $mine->InsuranceTypeId = $data['InsuranceTypeId'];
        $mine->TypeName = $data['TypeName'];
        $mine->SubtypeName = $data['SubtypeName'];
        $mine->Description = $data['Description'];
        $mine->Region = $data['Region'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function toDB()
    {
        $is = new \InsuranceType();
        return $this->updateDB($is);
    }

    public function updateDB(\InsuranceType &$item)
    {
        if(!is_null($this->InsuranceTypeId) && $this->InsuranceTypeId>0) {
            $item->setInsuranceTypeId($this->InsuranceTypeId);
        }
        $item->setTypeName($this->TypeName);
        $item->setSubtypeName($this->SubtypeName);
        $item->setDescription($this->Description);
        $item->setRegion($this->Region);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

}