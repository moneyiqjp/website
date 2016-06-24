<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 13:16
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;


class JScene extends JObjectRoot implements JSONInterface, JObjectifiable {
    public $SceneId;
    public $Name;
    public $Description;
    public $UpdateTime;
    public $UpdateUser;


    public static function CREATE_FROM_DB(\Scene $item)
    {
        $mine = new JScene();
        $mine->SceneId = $item->getSceneId();
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

    public static function CREATE_FROM_ARRAY(array $data)
    {
        $mine = new JScene();
        if(ArrayUtils::KEY_EXISTS($data,'SceneId')) {
            $mine->SceneId = $data['SceneId'];
            $item=(new \SceneQuery())->findPk($mine->SceneId);
            if(!is_null($item)) $mine = JScene::CREATE_FROM_DB($item);
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
        $usage = new \Scene();
        if(FieldUtils::ID_IS_DEFINED($this->SceneId)) {
            $usage=(new \SceneQuery())->findPk($this->SceneId);
            if(is_null($usage)) $usage = new \Scene();
        }

        return $this->updateDB($usage);
    }

    public function updateDB(\Scene &$item) {
        if(FieldUtils::ID_IS_DEFINED($this->SceneId)) $item->setSceneId($this->SceneId);
        if(FieldUtils::STRING_IS_DEFINED($this->Name)) $item->setName($this->Name);
        //if(FieldUtils::STRING_IS_DEFINED($this->Description))
        $item->setDescription($this->Description);

        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function getLabel() {
        return $this->Name;
    }

    public function getValue() {
        return $this->SceneId;
    }
}