<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 11:14 PM
 */

namespace Db\Json;


class JPointSystem {

    public $PointSystemId;
    public $PointSystemName;
    public $PointsPerYen;
    public $CreditCard;
    public $Store;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointSystem(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointSystem $item)
    {
        $mine = new JPointUsage();
        $mine->PointSystemId = $item->getPointSystemId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store =  array(
            'Id' => $item->getStore(),
            'Name' => $item->getStore()->getCategory() . "-" . $item->getStore()->getStoreName()
        );
        $mine->PointsPerYen = $item->getPointsPerYen();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPointSystem();
        $mine->PointSystemId = $data['PointSystemId'];
        $tmp = $data['CreditCard'];
        $mine->CreditCard =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );
        $tmp = $data['Store'];
        $mine->Store =  array(
            'Id' => $tmp['Id'],
            'Name' => $tmp['Name']
        );

        $mine->PointsPerYen = $data['PointsPerYen'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \PointSystem();
        return $this->updateDB($is);
    }
    public function updateDB(\PointSystem&$item)
    {
        $item->setPointSystemId($this->PointSystemId);
        $item->setPointsPerYen($this->PointsPerYen);

        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $it = $this->Store;
        $item->setStore((new \PaymentTypeQuery())->findPk( $it['Id']));

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}