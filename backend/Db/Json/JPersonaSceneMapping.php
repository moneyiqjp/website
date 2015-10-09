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

class JPersonaSceneMapping implements JSONInterface
{
    public $Id;
    public $Persona;
    public $Scene;
    public $Allocation;
    public $UpdateTime;
    public $UpdateUser;

    public static function GetSceneIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>1) return $ids[1];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function GetPersonaIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>0) return $ids[0];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function CREATE_FROM_DB(\MapPersonaScene $item)
    {
        $mine = new JPersonaSceneMapping();
        $mine->Id = $item->getPersona()->getPersonaId() . "_" . $item->getScene()->getSceneId();
        $mine->Persona = JPersona::CREATE_FROM_DB($item->getPersona());
        $mine->Scene = JScene::CREATE_FROM_DB($item->getScene());
        $mine->Allocation = $item->getPercentage();
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (ArrayUtils::KEY_EXISTS($data, 'SceneId') && ArrayUtils::KEY_EXISTS($data, 'PersonaId'))
        {
            return JPersonaSceneMapping::LOAD_FROM_DB($data['SceneId'], $data['PersonaId']);
        }
        if (!ArrayUtils::KEY_EXISTS($data, 'Scene')) throw new \Exception("JPersonaToSceneMapping: Mandatory field Scene missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Persona')) throw new \Exception("JPersonaToSceneMapping: Mandatory field Persona missing");
        return JPersonaSceneMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }

    public static function TRY_LOAD_DB($personaId, $sceneId)
    {
        foreach ( (new \MapPersonaSceneQuery())->findByPersonaId($personaId) as $item)
        {
            if($sceneId == $item->getSceneId())
            {
                return $item;
            }
        }
        return null;
    }

    public static function TRY_LOAD_FROM_DB($personaId, $sceneId)
    {
        foreach ( (new \MapPersonaSceneQuery())->findByPersonaId($personaId) as $item)
        {
            if($sceneId == $item->getSceneId())
            {
                return JPersonaSceneMapping::CREATE_FROM_DB($item);
            }
        }
        return null;
    }

    public static function LOAD_FROM_DB($personaId, $sceneId)
    {
        $item = JPersonaSceneMapping::TRY_LOAD_FROM_DB($personaId, $sceneId);

        if(!is_null($item)) return $item;

        throw new \Exception("JPersonaToSceneMapping: no matching mapping found for $personaId, $sceneId");
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JPersonaSceneMapping();
        if (ArrayUtils::KEY_EXISTS($data, 'SceneId') && ArrayUtils::KEY_EXISTS($data, 'PersonaId'))
        {
            $mine = JPersonaSceneMapping::LOAD_FROM_DB($data['SceneId'], $data['PersonaId']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Persona')) {
            $mine->Persona = JPersona::CREATE_FROM_ARRAY($data['Persona']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Scene')) {
            $mine->Scene = JScene::CREATE_FROM_ARRAY($data['Scene']);
        }

        if (ArrayUtils::KEY_EXISTS($data, 'Allocation')) $mine->Allocation = $data['Allocation'];

        $mine->Id = $mine->Persona->PersonaId . "_" . $mine->Scene->SceneId;
        return $mine;
    }

    public function isValid()
    {
        return !is_null($this->Scene) && !is_null($this->Persona) &&
                !is_null($this->Scene->SceneId) && !is_null($this->Persona->PersonaId);
    }

    public function toDB()
    {
        if(!$this->isValid()) throw new \Exception("Invalid JPersonaToSceneMappiong, can't save");
        $item = JPersonaSceneMapping::TRY_LOAD_DB($this->Persona->PersonaId, $this->Scene->SceneId);
        if(is_null($item)) $item = new \MapPersonaScene();

        return $this->updateDB($item);
    }

    public function updateDB(\MapPersonaScene &$item)
    {
        $item->setSceneId($this->Scene->SceneId);
        $item->setPersonaId($this->Persona->PersonaId);
        if(FieldUtils::NUMBER_IS_DEFINED($this->Allocation)) $item->setPercentage($this->Allocation);
        $item->setUpdateTime(new \DateTime());
        if(FieldUtils::STRING_IS_DEFINED($this->UpdateUser)) $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function saveToDb()
    {
        return $this->toDB()->save();
    }
}