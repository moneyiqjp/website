<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/19/2015
 * Time: 10:59 PM
 */

namespace Db\Json;



class JDiscount {
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

    public function JDiscount(){
        return $this;
    }

    public static function CREATE_FROM_DB(\Discounts $item)
    {
        $mine = new JDiscount();
        $mine->DiscountId = $item->getDiscountId();
        $mine->CreditCard = array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store = array(
            'Id' => $item->getStoreId(),
            'Category' => $item->getStore()->getCategory(),
            'Name' => $item->getStore()->getStoreName()
        );
        $mine->Percentage = $item->getPercentage();
        $mine->Description = $item->getDescription();
        $mine->Multiple = $item->getMultiple();
        $mine->Conditions = $item->getConditions();
        if (!is_null($item->getStartDate())) {
            $mine->StartDate = $item->getStartDate()->format("Y-m-d");
        }

        if (!is_null($item->getEndDate())) {
            $mine->EndDate = $item->getEndDate()->format("Y-m-d");
        }

        $mine->UpdateTime = $item->getUpdateTime()->format("Y-m-d");
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JDiscount();
        $mine->DiscountId = $data['DiscountId'];

        $mine->Percentage = $data['Percentage'];
        if(array_key_exists('StartDate',$data) && !is_null($data['StartDate']) && (StrLen(trim($data['StartDate'] )) > 0)) {
                $mine->StartDate =  new \DateTime($data['StartDate']);
        }
        if(array_key_exists('EndDate',$data) && !is_null($data['EndDate']) && (StrLen(trim($data['EndDate'] )) > 0) ) {
            $mine->EndDate =  new \DateTime($data['EndDate']);
        }
        $mine->Multiple = $data['Multiple'];
        $mine->Conditions = $data['Conditions'];

        //Credit card name is optional when saving to db
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array( 'Id' => $tmp['Id']);
        if(array_key_exists('Name',$tmp)) $mine->CreditCard['Name'] = $tmp['Name'];

        $mine->Description = $data['Description'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];
        $tmp = $data['Store'];

        //Store name and category are optional when saving to db
        $mine->Store =  array('Id' => $tmp['Id'] );
        if(array_key_exists('Name',$tmp)) $mine->Store['Name'] = $tmp['Name'];
        if(array_key_exists('Category',$tmp)) $mine->Store['Name'] = $tmp['Category'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \Discounts();
        return $this->updateDB($is);
    }
    public function updateDB(\Discounts &$item)
    {
        if(!is_null($this->DiscountId) && $this->DiscountId>0) {
            $item->setDiscountId($this->DiscountId);
        }

        $item->setPercentage($this->Percentage);
        if(!is_null($this->StartDate)) $item->setStartDate($this->StartDate);
        if(!is_null($this->EndDate)) $item->setEndDate($this->EndDate);
        $item->setMultiple($this->Multiple);
        $item->setConditions($this->Conditions);
        $item->setDescription($this->Description);
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $it = $this->Store;
        $item->setStore((new \StoreQuery())->findPk( $it['Id']));

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}
