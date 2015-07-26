<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 13:15
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;

class JPersonaSceneMapping implements JSONInterface
{
    public $Id;
    public $Persona;
    public $Scene;
    public $UpdateTime;
    public $UpdateUser;

    public static function CREATE_FROM_DB(\MapPersonaScene $item)
    {
        $mine = new JPersonaSceneMapping();
        $mine->Id = $item->getPersona()->getPersonaId() . "_" . $item->getScene()->getSceneId();
        $mine->Persona = JPersona::CREATE_FROM_DB($item->getPersona());
        $mine->Scene = JScene::CREATE_FROM_DB($item->getScene());
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
        if (!ArrayUtils::KEY_EXISTS($data, 'Scene')) throw new \Exception("JPersonaToSceneMapping: Mandatory field Scene (!) missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Persona')) throw new \Exception("JPersonaToSceneMapping: Mandatory field Persona missing");
        return JPersonaSceneMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }


    public static function LOAD_FROM_DB($personaId, $sceneId)
    {

        foreach ( (new \MapPersonaSceneQuery())->findByPersonaId($personaId) as $item)
        {
            if($sceneId == $item->getSceneId())
            {
                return JPersonaSceneMapping::CREATE_FROM_DB($item);
            }
        }
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
        $item = JPersonaSceneMapping::LOAD_FROM_DB($this->Persona->PersonaId, $this->Scene->SceneId);
        if(is_null($item)) $item = new \MapPersonaScene();

        return $this->updateDB($item);
    }

    public function updateDB(\MapPersonaScene &$item)
    {
        $item->setSceneId($this->Scene->SceneId);
        $item->setPersonaId($this->Persona->credit_card_id);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function saveToDb()
    {
        return $this->toDB()->save();
    }
}