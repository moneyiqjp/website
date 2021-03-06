<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:33 PM
 */

namespace Db\Json;


class JIssuer extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $IssuerId;
    public $IssuerName;
    public $UpdateTime;
    public $UpdateUser;
    function JIssuer() { return $this;}

    public static function CREATE_FROM_DB(\Issuer $iss)
    {
        $mine = new JIssuer();
        $mine->IssuerId = $iss->getIssuerId();
        $mine->IssuerName = $iss->getIssuerName();
        $mine->UpdateTime = $iss->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $iss->getUpdateUser();
        return $mine;
    }
    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JIssuer();
        $mine->IssuerId = $data['IssuerId'];
        $mine->IssuerName = $data['IssuerName'];
        $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        $mine->UpdateUser = $data['UpdateUser'];
        return $mine;

    }

    public function saveToDb() {
        return $this->toDB()->save() > 0;
    }

    public function toDB()
    {
        $is = new \Issuer();
        return $this->updateDB($is);
    }

    public function updateDB(\Issuer &$is)
    {
        if(!is_null($this->IssuerId) && $this->IssuerId>0) {
            $is->setIssuerId($this->IssuerId);
        }
        $is->setIssuerName($this->IssuerName);
        $is->setUpdateTime(new \DateTime());
        $is->setUpdateUser($this->UpdateUser);
        return $is;
    }

    public function getLabel() {
        return $this->IssuerName;
    }

    public function getValue()
    {
        return $this->IssuerId;
    }
}