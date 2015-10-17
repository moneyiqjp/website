<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 13:16
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;

class JSceneRewardCategoryMapping implements JSONInterface
{

    public $Id;
    public $Scene;
    public $RewardCategory;
    public $UpdateTime;
    public $UpdateUser;

    public static function GetSceneIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>0) return $ids[0];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function GetRewardCategoryIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>1) return $ids[1];

        throw new \Exception("$complexId is not a valid Id");
    }


    public static function CREATE_FROM_DB(\MapSceneRewcat $item)
    {
        $mine = new JSceneRewardCategoryMapping();
        $mine->Id = $item->getScene()->getSceneId() . "_" . $item->getRewardCategory()->getRewardCategoryId();
        $mine->Scene = JScene::CREATE_FROM_DB($item->getScene());
        $mine->RewardCategory = JRewardCategory::CREATE_FROM_DB($item->getRewardCategory());
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (ArrayUtils::KEY_EXISTS($data, 'RewardCategoryId') && ArrayUtils::KEY_EXISTS($data, 'SceneId'))
        {
            return JSceneCategoryMapping::LOAD_FROM_DB($data['RewardCategoryId'], $data['SceneId']);
        }
        if (!ArrayUtils::KEY_EXISTS($data, 'RewardCategory')) throw new \Exception("JSceneToRewardCategoryMapping: Mandatory field RewardCategory (!) missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Scene')) throw new \Exception("JSceneToRewardCategoryMapping: Mandatory field Scene missing");
        return JSceneRewardCategoryMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }


    public static function TRY_LOAD_FROM_DB($sceneId, $categoryId)
    {

        foreach ( (new \MapSceneRewcatQuery())->findBySceneId($sceneId) as $item)
        {
            if($categoryId == $item->getRewardCategoryId())
            {
                return JSceneRewardCategoryMapping::CREATE_FROM_DB($item);
            }
        }

        return null;
    }

    public static function LOAD_FROM_DB($sceneId, $categoryId)
    {

        $item = JSceneRewardCategoryMapping::TRY_LOAD_FROM_DB($sceneId, $categoryId);
        if(!is_null($item)) return $item;
        throw new \Exception("JSceneToRewardCategoryMapping: no matching mapping found for $sceneId, $categoryId");
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JSceneRewardCategoryMapping();
        if (ArrayUtils::KEY_EXISTS($data, 'RewardCategoryId') && ArrayUtils::KEY_EXISTS($data, 'SceneId'))
        {
            $mine = JSceneRewardCategoryMapping::LOAD_FROM_DB($data['CategoryId'], $data['SceneId']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Scene')) {
            $mine->Scene = JScene::CREATE_FROM_ARRAY($data['Scene']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'RewardCategory')) {
            $mine->RewardCategory = JRewardCategory::CREATE_FROM_ARRAY($data['RewardCategory']);
        }
        return $mine;
    }

    private function categoryIsValid() {
        return !is_null($this->RewardCategory) && 
        !is_null($this->RewardCategory->RewardCategoryId);
    }
    
    private function sceneIsValid(){
        return !is_null($this->Scene) && !is_null($this->Scene->SceneId);
    }
    
    public function isValid()
    {
        return $this->categoryIsValid() && $this->sceneIsValid();
    }

    public function toDB()
    {
        if(!$this->isValid()) {
            if(!$this->sceneIsValid()) throw new \Exception("Invalid JSceneToRewardCategoryMapping (Scene)");
            else if(!$this->categoryIsValid()) throw new \Exception("Invalid JSceneToRewardCategoryMapping (Reward)");
            else throw new \Exception("Invalid JSceneToRewardCategoryMapping, can't save");
        }
        $item = JSceneRewardCategoryMapping::TRY_LOAD_FROM_DB($this->Scene->SceneId, $this->RewardCategory->RewardCategoryId);
        if(is_null($item)) $item = new \MapSceneRewcat();

        return $this->updateDB($item);
    }

    public function updateDB(\MapSceneRewcat &$item)
    {
        $item->setRewardCategoryId($this->RewardCategory->RewardCategoryId);
        $item->setSceneId($this->Scene->SceneId);
        $item->setUpdateTime(new \DateTime());
        $item->setUpdateUser($this->UpdateUser);
        return $item;
    }

    public function saveToDb()
    {
        return $this->toDB()->save();
    }
}