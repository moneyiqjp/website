<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:26 PM
 */

namespace Db\Json;
use Db\Utility\FieldUtils;
use Db\Utility\ArrayUtils;


class JAffiliateCompany implements JSONInterface
{
    public $AffiliateId;
    public $Name;
    public $Description;
    public $Website;
    public $SignedUpDate;
    public $UpdateTime;
    public $UpdateUser;


    function JAffiliateCompany() { return $this;}

    public static function CREATE_FROM_DB(\AffiliateCompany $af)
    {
        $mine = new JAffiliateCompany();
        $mine->AffiliateId = $af->getAffiliateId();
        $mine->Name = $af->getName();
        $mine->Description = $af->getDescription();
        $mine->Website = $af->getWebsite();
        $mine->SignedUpDate = $af->getSignedUpDate()->format('Y-m-d');
        $mine->UpdateTime = $af->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $af->getUpdateUser();
        return $mine;
    }
    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JAffiliateCompany();
        if (ArrayUtils::KEY_EXISTS($data, 'AffiliateId')) $mine->AffiliateId = $data['AffiliateId'];
        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];
        if (ArrayUtils::KEY_EXISTS($data, 'Website')) $mine->Website = $data['Website'];
        if (ArrayUtils::KEY_EXISTS($data, 'SignedUpDate')) $mine->SignedUpDate = new \DateTime($data['SignedUpDate']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateTime')) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];
        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB()
    {
        $af = new \AffiliateCompany();
        return $this->updateDB($af);
    }


    public function updateDB(\AffiliateCompany &$item)
    {
        if(FieldUtils::ID_IS_DEFINED($this->AffiliateId)) $item->setAffiliateId($this->AffiliateId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        if(FieldUtils::STRING_IS_DEFINED($this->Description))$item->setDescription($this->Description);
        if(FieldUtils::STRING_IS_DEFINED($this->Website)) $item->setWebsite($this->Website);
        if(!is_null($this->SignedUpDate)) $item->setSignedUpDate($this->SignedUpDate);
        $item->setUpdateTime(new \DateTime());
       if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser))  $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}