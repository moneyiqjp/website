<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:52 PM
 */

namespace Db\Json;
use Base\CampaignQuery;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JCampaign implements JSONInterface{
    public $CampaignId;
    public $CreditCard;
    public $Name;
    public $Description;
    public $MaxPoints;
    public $ValueInYen;
    public $StartDate;
    public $EndDate;
    public $Reference;
    public $UpdateTime;
    public $UpdateUser;

    public function JCampaign(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Campaign $item)
    {
        $mine = new JCampaign();
        $mine->CampaignId = $item->getCampaignId();
        $mine->Name = $item->getCampaignName();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Description = $item->getDescription();
        $mine->MaxPoints = $item->getMaxPoints();
        $mine->ValueInYen = $item->getValueInYen();
        if(!is_null($item->getStartDate())) {
            $mine->StartDate = $item->getStartDate()->format("Y-m-d");
        }
        if(!is_null($item->getEndDate())) {
            $mine->EndDate = $item->getEndDate()->format("Y-m-d");
        }
        $mine->Reference = $item->getReference();
        $mine->UpdateTime = $item->getUpdateTime()->format("Y-m-d");
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JCampaign();
        if(ArrayUtils::KEY_EXISTS($data,'CampaignId')) $mine->CampaignId = $data['CampaignId'];
        if(ArrayUtils::KEY_EXISTS($data,'Name')) $mine->Name = $data['Name'];
        if(ArrayUtils::KEY_EXISTS($data,'CreditCard')) {
            $tmp = $data['CreditCard'];
            $mine->CreditCard = array('Id' => $tmp['Id']);
            if(ArrayUtils::KEY_EXISTS($tmp,'Name')) $mine->CreditCard['Name'] = $tmp['Name'];
        }

        if(ArrayUtils::KEY_EXISTS($data,'Description')) $mine->Description = $data['Description'];
        if(ArrayUtils::KEY_EXISTS($data,'MaxPoints')) $mine->MaxPoints = $data['MaxPoints'];
        if(ArrayUtils::KEY_EXISTS($data,'ValueInYen')) $mine->ValueInYen = $data['ValueInYen'];
        if(ArrayUtils::KEY_EXISTS($data,'StartDate')) $mine->StartDate =  new \DateTime($data['StartDate']);
        if(ArrayUtils::KEY_EXISTS($data,'EndDate')) $mine->EndDate =  new \DateTime($data['EndDate']);
        if(ArrayUtils::KEY_EXISTS($data,'Reference')) $mine->Reference = $data['Reference'];

        $mine->UpdateTime = new \DateTime();
        if(array_key_exists('UpdateUser',$data)) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function tryLoadDB(){
        if(FieldUtils::ID_IS_DEFINED($this->CampaignId)) {
            $item = CampaignQuery::create()->findPk($this->CampaignId);
            if(!is_null($item)) return $item;
        }
        return new \Campaign();
    }

    public function toDB()
    {
        $is = $this->tryLoadDB();
        return $this->updateDB($is);
    }

    public function updateDB(\Campaign &$item)
    {
        if(!is_null($this->CampaignId) && $this->CampaignId>0) {
            $item->setCampaignId($this->CampaignId);
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setCampaignName($this->Name);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        if(FieldUtils::STRING_IS_DEFINED($this->Description)) $item->setDescription($this->Description);
        if(FieldUtils::NUMBER_IS_DEFINED($this->MaxPoints)) $item->setMaxPoints($this->MaxPoints);
        if(FieldUtils::NUMBER_IS_DEFINED($this->ValueInYen)) $item->setValueInYen($this->ValueInYen);
        if(FieldUtils::STRING_IS_DEFINED($this->StartDate)) {
            $item->setStartDate($this->StartDate);
        } else {
            $item->setStartDate(new \DateTime());
        }
        if(!is_null($this->EndDate)) {
            $item->setEndDate($this->EndDate);
        }  else {
            $item->setEndDate(new \DateTime('9999-12-31'));
        }
        if(FieldUtils::STRING_IS_DEFINED($this->Reference)) $item->setReference($this->Reference);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}