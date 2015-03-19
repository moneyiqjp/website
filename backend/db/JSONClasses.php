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
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
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
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->Description = $data['Description'];
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
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
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

class DBCartFeature
{
    public $FeatureId;
    public $FeatureType;
    public $CreditCard;
    public $Description;
    public $FeatureCost;
    public $UpdateTime;
    public $UpdateUser;

    public function DBCartFeature(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardFeatures $item)
    {
        $mine = new DBCartFeature();
        $mine->FeatureId = $item->getCampaignId();
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
        $mine = new DBCartFeature();
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


class DBCardFeatureType
{
    public $FeatureTypeId;
    public $Name;
    public $Description;
    public $Category;
    public $UpdateTime;
    public $UpdateUser;

    public function DBCardFeatureType(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardFeatureType $item)
    {
        $mine = new DBCardFeatureType();
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
        $mine = new DBCardFeatureType();
        $mine->FeatureTypeId = $data['FeatureTypeId'];
        $mine->Name = $data['Name'];
        $mine->Description = $data['Description'];
        $mine->Category = $data['Category'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function toDB()
    {
        $is = new \CardFeatureType();
        return $this->updateDB($is);
    }

    public function updateDB(\CardFeatureType &$item)
    {
        $item->setFeatureTypeId($this->FeatureTypeId);
        $item->setDescription($this->Description);
        $item->setName($this->Name);
        $item->setCategory($this->Category);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}

class DBCartDescription
{
    public $ItemId;
    public $CreditCard;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;

    public function DBCartFeature(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardDescription $item)
    {
        $mine = new DBCartDescription();
        $mine->ItemId = $item->getItemId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Name = $item->getItemName();
        $mine->Description = $item->getItemDescription();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new DBCartDescription();
        $mine->ItemId = $data['ItemId'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->Name = $data['Name'];
        $mine->Description = $data['Description'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \CardDescription();
        return $this->updateDB($is);
    }
    public function updateDB(\CardDescription &$item)
    {
        $item->setItemId($this->ItemId);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setItemDescription($this->Description);
        $item->setItemName($this->Name);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}


class DBDiscount
{
    public $DiscountId;
    public $Percentage;
    public $StartDate;
    public $EndDate;
    public $Multiple;
    public $Conditions;
    public $CreditCard;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;
    public $Store;

    public function DBDiscount(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Discounts $item)
    {
        $mine = new DBDiscount();
        $mine->DiscountId = $item->getDiscountId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store=  array(
            'Id' => $item->getStoreId(),
            'Name' => $item->getStore()->getCategory() . " - " . $item->getStore()->getStoreName(),
        );
        $mine->Percentage = $item->getPercentage();
        $mine->Description = $item->getDescription();
        $mine->Multiple = $item->getMultiple();
        $mine->Conditions = $item->getConditions();
        $mine->StartDate = $item->getStartDate()->format(\DateTime::ISO8601);
        $mine->EndDate = $item->getEndDate()->format(\DateTime::ISO8601);
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new DBCartDescription();
        $mine->ItemId = $data['ItemId'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->Name = $data['Name'];
        $mine->Description = $data['Description'];
        $mine->StartDate =  new \DateTime($data['StartDate']);
        $mine->EndDate =  new \DateTime($data['EndDate']);
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \CardDescription();
        return $this->updateDB($is);
    }
    public function updateDB(\CardDescription &$item)
    {
        $item->setItemId($this->ItemId);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setItemDescription($this->Description);
        $item->setItemName($this->Name);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}