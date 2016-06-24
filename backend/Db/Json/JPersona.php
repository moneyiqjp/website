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

class JPersona extends JObjectRoot implements JSONInterface
{
    public $PersonaId;
    public $Identity;
    public $Name;
    public $DescriptionLong;
    public $DescriptionShort;
    public $DefaultSpend;
    public $Sorting;
    public $RewardCategory;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\Persona $item)
    {
        $mine = new JPersona();
        $mine->PersonaId = $item->getPersonaId();
        $mine->Identity = $item->getIdentifier();
        $mine->Name = $item->getName();
        $mine->DescriptionLong = $item->getDescriptionLong();
        $mine->DescriptionShort = $item->getDescriptionShort();
        $mine->DefaultSpend = $item->getDefaultSpend();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }
        $mine->Sorting = $item->getSorting();
        if(!is_null($item->getRewardCategory())) {
            $mine->RewardCategory = JRewardCategory::CREATE_FROM_DB($item->getRewardCategory());
        }
        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JPersona();
        if(ArrayUtils::KEY_EXISTS($data,'PersonaId')) {
            $mine->PersonaId = $data['PersonaId'];
            $item=(new \PersonaQuery())->findPk($mine->PersonaId);
            if(!is_null($item)) $mine = JPersona::CREATE_FROM_DB($item);
        }

        if(ArrayUtils::KEY_EXISTS($data,'RewardCategory')) {
            $mine->RewardCategory = JRewardCategory::CREATE_FROM_ARRAY($data['RewardCategory']);
        }
        if(ArrayUtils::KEY_EXISTS($data,'RewardCategoryId')) {
            $mine->RewardCategory = JRewardCategory::CREATE_FROM_ARRAY($data);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Identity')) $mine->Identity = $data['Identity'];
        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'DescriptionShort')) $mine->DescriptionShort = $data['DescriptionShort'];
        if (ArrayUtils::KEY_EXISTS($data, 'DescriptionLong')) $mine->DescriptionLong = $data['DescriptionLong'];
        if (ArrayUtils::KEY_EXISTS($data, 'DefaultSpend')) $mine->DefaultSpend = $data['DefaultSpend'];
        if (ArrayUtils::KEY_EXISTS($data, 'Sorting')) $mine->Sorting = $data['Sorting'];
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateTime'    )) $mine->UpdateTime = new \DateTime($data['UpdateTime']);
        if (ArrayUtils::KEY_EXISTS($data, 'UpdateUser')) $mine->UpdateUser = $data['UpdateUser'];

        return $mine;
    }

    public function saveToDB() {
        return $this->toDB()->save();
    }

    public function toDB() {
        $usage = new \Persona();
        if(FieldUtils::ID_IS_DEFINED($this->PersonaId)) {
            $usage=(new \PersonaQuery())->findPk($this->PersonaId);
            if(is_null($usage)) $usage = new \Persona();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\Persona &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->PersonaId)) $item->setPersonaId($this->PersonaId);
        if(FieldUtils::STRING_IS_DEFINED($this->Identity)) $item->setIdentifier($this->Identity);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        //if(FieldUtils::STRING_IS_DEFINED($this->Description))
        $item->setDescriptionLong($this->DescriptionLong);
        $item->setDescriptionShort($this->DescriptionShort);
        if(FieldUtils::NUMBER_IS_DEFINED($this->DefaultSpend)) $item->setDefaultSpend($this->DefaultSpend);
        if(!is_null($this->RewardCategory)) $item->setRewardCategoryId($this->RewardCategory->RewardCategoryId);
        if(FieldUtils::STRING_IS_DEFINED($this->Sorting)) $item->setSorting($this->Sorting);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function getLabel() {
        return $this->Name;
    }

    public function getValue() {
        return $this->PersonaId;
    }


}