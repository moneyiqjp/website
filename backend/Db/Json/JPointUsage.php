<?php
/**
 * Created by PhpStorm.
 * User: benfr_000
 * Date: 3/20/2015
 * Time: 10:32 PM
 */

namespace Db\Json;


class JPointUsage {
    public $PointUsageId;
    public $Store;
    public $YenPerPoint;
    public $CreditCard;
    public $UpdateTime;
    public $UpdateUser;

    public function JPointUsage(){
        return $this;
    }

    public static function CREATE_FROM_DB(\PointUsage $item)
    {
        $mine = new JPointUsage();
        $mine->PointUsageId = $item->getPointUsageId();
        $mine->CreditCard =  array(
            'Id' => $item->getCreditCardId(),
            'Name' => $item->getCreditCard()->getName()
        );
        $mine->Store =  array(
            'Id' => $item->getStore(),
            'Name' => $item->getStore()->getCategory() . "-" . $item->getStore()->getStoreName()
        );
        $mine->YenPerPoint = $item->getYenPerPoint();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPointUsage();
        $mine->PointUsageId = $data['PointUsageId'];
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

        $mine->YenPerPoint = $data['YenPerPoint'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];

        return $mine;

    }
    public function toDB()
    {
        $is = new \PointUsage();
        return $this->updateDB($is);
    }
    public function updateDB(\PointUsage&$item)
    {
        if(!is_null($this->PointUsageId) && $this->PointUsageId>0) {
            $item->setPointUsageId($this->PointUsageId);
        }
        $item->setYenPerPoint($this->YenPerPoint);

        $it = $this->CreditCard;
        $item->setCreditCard((new \CreditCardQuery())->findPk( $it['Id']));
        $it = $this->Store;
        $item->setStore((new \PaymentTypeQuery())->findPk( $it['Id']));

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

}