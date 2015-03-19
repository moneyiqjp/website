<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:26 PM
 */

namespace Db\Json;


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
        $mine->AffiliateId = $data['AffiliateId'];
        $mine->Name = $data['Name'];
        $mine->Description = $data['Description'];
        $mine->Website = $data['Website'];
        $mine->SignedUpDate = new \DateTime($data['SignedUpDate']);
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];
        return $mine;

    }
    public function toDB()
    {
        $af = new \AffiliateCompany();
        return $this->updateDB($af);
    }
    public function updateDB(\AffiliateCompany &$item)
    {
        $item->setName($this->Name);
        $item->setDescription($this->Description);
        $item->setName($this->Description);
        $item->setWebsite($this->Website);
        $item->setSignedUpDate($this->SignedUpDate);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}