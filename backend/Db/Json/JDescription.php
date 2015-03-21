<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:58 PM
 */

namespace Db\Json;


class JDescription
{
    public $ItemId;
    public $CreditCard;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;

    public function JDescription(){
        return $this;
    }

    public static function CREATE_FROM_DB(\CardDescription $item)
    {
        $mine = new JDescription();
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
        $mine = new JDescription();
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
        if(!is_null($this->ItemId) && $this->ItemId>0) {
            $item->setItemId($this->ItemId);
        }
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setItemDescription($this->Description);
        $item->setItemName($this->Name);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}