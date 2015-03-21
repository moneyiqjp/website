<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:52 PM
 */

namespace Db\Json;


class JCampaign {
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
        $mine->StartDate = $item->getStartDate();
        $mine->EndDate = $item->getEndDate();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JCampaign();
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
        if(!is_null($this->CampaignId) && $this->CampaignId>0) {
            $item->setCampaignId($this->CampaignId);
        }
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