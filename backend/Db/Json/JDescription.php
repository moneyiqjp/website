<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:58 PM
 */

namespace Db\Json;
use Base\CardDescriptionQuery;
use Db\Utility\FieldUtils;


class JDescription extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $ItemId;
    public $CreditCard;
    public $Name;
    public $Type;
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
        $mine->Type = $item->getItemType();
        $mine->Description = $item->getItemDescription();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JDescription();
        $mine->ItemId = $data['ItemId'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->Name = $data['Name'];
        $mine->Type = $data['Type'];
        $mine->Description = $data['Description'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function tryLoadDB(){
        if(FieldUtils::ID_IS_DEFINED($this->ItemId)) {
            $item = CardDescriptionQuery::create()->findPk($this->ItemId);
            if(!is_null($item)) return $item;
        }
        return new \CardDescription();
    }

    public function toDB()
    {
        $is = $this->tryLoadDB();
        return $this->updateDB($is);
    }

    public function updateDB(\CardDescription &$item)
    {
        if(!is_null($this->ItemId) && $this->ItemId>0) {
            $item->setItemId($this->ItemId);
        }
        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $item->setItemName($this->Name);
        $item->setItemType($this->Type);
        $item->setItemDescription($this->Description);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }


    public function getLabel() {
        return $this->Name;
    }

    public function getValue()
    {
        return $this->ItemId;
    }
}