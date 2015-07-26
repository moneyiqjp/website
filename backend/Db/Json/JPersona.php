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

class JPersona implements JSONInterface
{
    public $PersonaId;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\Persona $item)
    {
        $mine = new JPersona();
        $mine->PersonaId = $item->getPersonaId();
        $mine->Name = $item->getName();
        $mine->Description = $item->getDescription();
        $time = new \DateTime();
        if(!is_null($item->getUpdateTime())) {
            $time = $item->getUpdateTime()->format(\DateTime::ISO8601);
        }

        $mine->UpdateTime = $time;
        $mine->UpdateUser = $item->getUpdateUser();
        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        $mine = new JPersona();
        if(ArrayUtils::KEY_EXISTS($data,'PersonaId')) {
            $mine->PersonaId = $data['PersonaId'];
            $item=(new \PersonaQuery())->findPk($mine->PersonaId);
            if(!is_null($item)) $mine = JPersona::CREATE_FROM_DB($item);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Name')) $mine->Name = $data['Name'];
        if (ArrayUtils::KEY_EXISTS($data, 'Description')) $mine->Description = $data['Description'];
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
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        //if(FieldUtils::STRING_IS_DEFINED($this->Description))
        $item->setDescription($this->Description);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }
}