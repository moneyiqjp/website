<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 11:32 PM
 */

namespace Db\Json;


use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;

class JInsuranceType implements  JSONInterface{
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
        if(!ArrayUtils::KEY_EXISTS($data, 'InsuranceTypeId')) throw new \Exception("Required InsuranceTypeId not specified");
        $mine->InsuranceTypeId = $data['InsuranceTypeId'];
        if(ArrayUtils::KEY_EXISTS($data, 'TypeName')) $mine->TypeName = $data['TypeName'];
        if(ArrayUtils::KEY_EXISTS($data, 'SubtypeName')) $mine->SubtypeName = $data['SubtypeName'];
        if(ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data, 'Region')) $mine->Region = $data['Region'];
        if(ArrayUtils::KEY_EXISTS($data, 'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if(ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function toString(){
        return  $this->TypeName . "-" . $this->SubtypeName . " (" . $this->Region .")";
    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB()
    {
        $is = new \InsuranceType();
        return $this->updateDB($is);
    }

    public function updateDB(\InsuranceType &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->InsuranceTypeId)) $item->setInsuranceTypeId($this->InsuranceTypeId);
        if(FieldUtils::STRING_IS_DEFINED($this->TypeName)) $item->setTypeName($this->TypeName);
        if(FieldUtils::STRING_IS_DEFINED($this->SubtypeName)) $item->setSubtypeName($this->SubtypeName);
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->Region)) $item->setRegion($this->Region);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);

        return $item;
    }

}