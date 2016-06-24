<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 13:15
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;

class JPersonaStoreMapping extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $Id;
    public $Persona;
    public $Store;
    public $Allocation;
    public $Negative;
    public $UpdateTime;
    public $UpdateUser;

    public static function GetStoreIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>1) return $ids[1];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function GetPersonaIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>0) return $ids[0];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function CREATE_FROM_DB(\MapPersonaStore $item)
    {
        $mine = new JPersonaStoreMapping();
        $mine->Id = $item->getPersona()->getPersonaId() . "_" . $item->getStore()->getStoreId();
        $mine->Persona = JPersona::CREATE_FROM_DB($item->getPersona());
        $mine->Store = JStore::CREATE_FROM_DB($item->getStore());
        $mine->Allocation = $item->getPercentage();
        $mine->Negative = $item->getNegative();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        if (ArrayUtils::KEY_EXISTS($data, 'StoreId') && ArrayUtils::KEY_EXISTS($data, 'PersonaId'))
        {
            return JPersonaStoreMapping::LOAD_FROM_DB($data['StoreId'], $data['PersonaId']);
        }
        if (!ArrayUtils::KEY_EXISTS($data, 'Store')) throw new \Exception("JPersonaToStoreMapping: Mandatory field Store missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Persona')) throw new \Exception("JPersonaToStoreMapping: Mandatory field Persona missing");
        return JPersonaStoreMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function TRY_LOAD_DB($personaId, $storeId)
    {
        foreach ( (new \MapPersonaStoreQuery())->findByPersonaId($personaId) as $item)
        {
            if($storeId == $item->getStoreId())
            {
                return $item;
            }
        }
        return null;
    }

    public static function TRY_LOAD_FROM_DB($personaId, $storeId)
    {
        foreach ( (new \MapPersonaStoreQuery())->findByPersonaId($personaId) as $item)
        {
            if($storeId == $item->getStoreId())
            {
                return JPersonaStoreMapping::CREATE_FROM_DB($item);
            }
        }
        return null;
    }

    public static function LOAD_FROM_DB($personaId, $storeId)
    {
        $item = JPersonaStoreMapping::TRY_LOAD_FROM_DB($personaId, $storeId);

        if(!is_null($item)) return $item;

        throw new \Exception("JPersonaToStoreMapping: no matching mapping found for $personaId, $storeId");
    }

    public static function CREATE_FROM_ARRAY_RELAXED(array $data) {
        $mine = new JPersonaStoreMapping();
        if (ArrayUtils::KEY_EXISTS($data, 'StoreId') && ArrayUtils::KEY_EXISTS($data, 'PersonaId'))
        {
            $mine = JPersonaStoreMapping::LOAD_FROM_DB($data['StoreId'], $data['PersonaId']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Persona')) {
            $mine->Persona = JPersona::CREATE_FROM_ARRAY($data['Persona']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Store')) {
            $mine->Store = JStore::CREATE_FROM_ARRAY($data['Store']);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Allocation')) $mine->Allocation = $data['Allocation'];
        if (ArrayUtils::KEY_EXISTS($data, 'Negative')) $mine->Negative = $data['Negative'];

        $mine->Id = $mine->Persona->PersonaId . "_" . $mine->Store->StoreId;
        return $mine;
    }

    public function isValid()
    {
        return !is_null($this->Store) && !is_null($this->Persona) &&
                !is_null($this->Store->StoreId) && !is_null($this->Persona->PersonaId);
    }

    public function toDB()
    {
        if(!$this->isValid()) throw new \Exception("Invalid JPersonaToStoreMappiong, can't save");
        $item = JPersonaStoreMapping::TRY_LOAD_DB($this->Persona->PersonaId, $this->Store->StoreId);
        if(is_null($item)) $item = new \MapPersonaStore();

        return $this->updateDB($item);
    }

    public function updateDB(\MapPersonaStore &$item)
    {
        $item->setStoreId($this->Store->StoreId);
        $item->setPersonaId($this->Persona->PersonaId);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Allocation)) $item->setPercentage($this->Allocation);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Negative)) $item->setNegative($this->Negative);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function saveToDb()
    {
        return $this->toDB()->save();
    }

    public function getLabel() {
        return FieldUtils::getLabel($this->Persona) . "/" . FieldUtils::getLabel($this->Store) ;
    }

    public function getValue()
    {
        return $this->Id;
    }
}