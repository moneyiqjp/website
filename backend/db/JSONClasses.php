<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/7/2015
 * Time: 12:18 AM
 */

namespace db;


class JSONObject {
    public $label;
    public $value;


    function JSONObject()
    {
        return $this;
    }

    public static function CREATE($_displayText, $_value)
    {
        $me = new JSONObject();
        $me->label = $_displayText;
        $me->value = $_value;
        return $me;
    }
}

class JSONCreditCard {
    public $credit_card_id;
    public $name;
    public $issuer;
    public $description;
    public $image_link;
    public $visa;
    public $master;
    public $jcb;
    public $amex;
    public $diners;
    public $affiliate_link;
    public $affiliate_id;
    public $affiliate;
    public $update_time;
    public $update_user;

    function JSONCreditCard()
    {
        return this;
    }

    public static function CREATE_DB($ccs)
    {
        $myself = new JSONCreditCard();
        $myself->credit_card_id = $ccs->getCreditCardId();
        $myself->name = $ccs->getName();
        $myself->issuer = array("id" => $ccs->getIssuerId(), "name" => $ccs->getIssuer()->getIssuerName());
        $myself->description = $ccs->getDescription();
        $myself->image_link = $ccs->getImageLink();
        $myself->visa = $ccs->getVisa();
        $myself->master = $ccs->getMaster();
        $myself->jcb = $ccs->getJcb();
        $myself->amex = $ccs->getAmex();
        $myself->diners = $ccs->getDiners();
        $myself->affiliate_link = $ccs->getAfilliateLink();
        $myself->affiliate_id = $ccs->getAffiliateId();
        $myself->affiliate = array("id" => $ccs->getAffiliateId(), "name" => $ccs->getAffiliateCompany()->getName());
        $myself->update_time = $ccs->getUpdateTime()->format("Y-m-d");
        $myself->update_user = $ccs->getUpdateUser();
        return $myself;
    }
}

class JSONCreditCardFeatureType {
    public $feature;
    public $category;


    function JSONCreditCardFeatureType()
    {
        return $this;
    }

    public static function fromCardFeatureTypeObject(\CardFeatureType $ft)
    {
        $mine = new JSONCreditCardFeatureType();
        $mine->feature = $ft->getName();
        $mine->category = $ft->getCategory();
        return $mine;
    }
}

class JSONStore
{
    public $storeName;
    public $category;


    function JSONStore()
    {
        return $this;
    }

    public static function fromStoreObject(\Store $store)
    {
        $mystore = new JSONStore();
        $mystore->storeName = $store->getStoreName();
        $mystore->category = $store->getCategory();
        return $mystore;
    }
}
class DBAffiliateCompany
{
    public $AffiliateId;
    public $Name;
    public $Description;
    public $Website;
    public $SignedUpDate;
    public $UpdateTime;
    public $UpdateUser;
    function DBAffiliateCompany() { return $this;}
    public static function CREATE_FROM_DB(\AffiliateCompany $af)
    {
        $mine = new DBAffiliateCompany();
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
        $mine = new DBAffiliateCompany();
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

class DBIssuer
{
    public $IssuerId;
    public $IssuerName;
    public $UpdateTime;
    public $UpdateUser;
    function DBIssuer() { return $this;}
    public static function CREATE_FROM_DB(\Issuer $iss)
    {
        $mine = new DBIssuer();
        $mine->IssuerId = $iss->getIssuerId();
        $mine->IssuerName = $iss->getIssuerName();
        $mine->UpdateTime = $iss->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $iss->getUpdateUser();
        return $mine;
    }
    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new DBIssuer();
        $mine->IssuerId = $data['IssuerId'];
        $mine->IssuerName = $data['IssuerName'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];
        return $mine;

    }
    public function toDB()
    {
        $is = new \Issuer();
        return $this->updateDB($is);
    }
    public function updateDB(\Issuer &$is)
    {
        $is->setIssuerName($this->IssuerName);
        $is->setUpdateTime(new \DateTime());
        $is->setUpdateUser($this->UpdateUser);
        return $is;
    }
}

class DBCampaign
{
    public $CampaignId;
    public $CreditCard;
    public $Name;
    public $Description;
    public $MaxPoints;
    public $ValueInYen;
    public $StartDate;
    public $EndDate;
    public $UpdateTime;
    public $UpdateUser;

    public function DBCampaign(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Campaign $item)
    {
        $mine = new DBCampaign();
        $mine->CampaignId = $item->getCampaignId();
        $mine->Name = $item->getCampaignName();
        $mine->CreditCard =  array(
            'id' => $item->getCreditCardId(),
            'name' => $item->getCreditCard()->getName()
        );
        $mine->Description = $item->getDescription();
        $mine->MaxPoints = $item->getMaxPoints();
        $mine->ValueInYen = $item->getValueInYen();
        $mine->StartDate = $item->getStartDate();
        $mine->EndDate = $item->getEndDate();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new DBCampaign();
        $mine->CampaignId = $data['CampaignId'];
        $mine->Name = $data['Name'];
        $mine->CreditCard =  array(
            'id' => $data['Id'],
            'name' => $data['Name']
        );

        $mine->Description = $data['tDescription'];
        $mine->MaxPoints = $data['MaxPoints'];
        $mine->ValueInYen = $data['ValueInYen'];
        $mine->StartDate =  new \DateTime($data['StartDate']);
        $mine->EndDate =  new \DateTime($data['EndDate']);
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \Campaign();
        return $this->updateDB($is);
    }
    public function updateDB(\Campaign &$item)
    {
        $item->setCampaignId($this->CampaignId);
        $item->setCampaignName($this->Name);
        $cc = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $cc['id']));
        $item->setDescription($this->Description);
        $item->setMaxPoints($this->MaxPoints);
        $item->setValueInYen($this->ValueInYen);
        $item->setStartDate($this->StartDate);
        $item->setEndDate($this->EndDate);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}


