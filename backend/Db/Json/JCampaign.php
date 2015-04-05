<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:52 PM
 */

namespace Db\Json;


class JCampaign implements JSONInterface{
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
        $mine->UpdateTime = $item->getUpdateTime()->format("Y-m-d");
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JCampaign();
        $mine->CampaignId = $data['CampaignId'];
        $mine->Name = $data['Name'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array('Id' => $tmp['Id']);
        if(array_key_exists('Name',$tmp)) $mine->CreditCard['Name'] = $tmp['Name'];

        $mine->Description = $data['Description'];
        $mine->MaxPoints = $data['MaxPoints'];
        $mine->ValueInYen = $data['ValueInYen'];
        if(array_key_exists('StartDate',$data)) $mine->StartDate =  new \DateTime($data['StartDate']);
        if(array_key_exists('EndDate',$data)) $mine->EndDate =  new \DateTime($data['EndDate']);
        $mine->UpdateTime = new \DateTime();
        if(array_key_exists('UpdateUser',$data)) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB()
    {
        $is = new \Campaign();
        return $this->updateDB($is);
    }

    public function updateDB(\Campaign &$item)
    {
        if(!is_null($this->CampaignId) && $this->CampaignId>0) {
            $item->setCampaignId($this->CampaignId);
        }
        $item->setCampaignName($this->Name);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setDescription($this->Description);
        $item->setMaxPoints($this->MaxPoints);
        $item->setValueInYen($this->ValueInYen);
        if(!is_null($this->StartDate)) $item->setStartDate($this->StartDate);
        if(!is_null($this->EndDate)) $item->setEndDate($this->EndDate);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}