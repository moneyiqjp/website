<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/07/26
 * Time: 13:16
 */

namespace Db\Json;

use Db\Utility\ArrayUtils;
use Symfony\Component\Config\Definition\Exception\Exception;

class JSceneCategoryMapping implements JSONInterface
{

    public $Id;
    public $Scene;
    public $StoreCategory;
    public $UpdateTime;
    public $UpdateUser;

    public static function GetSceneIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>0) return $ids[0];

        throw new \Exception("$complexId is not a valid Id");
    }

    public static function GetStoreCategoryIdFromComplexId($complexId) {
        $ids = explode("_",$complexId);
        if(count($ids)>1) return $ids[1];

        throw new \Exception("$complexId is not a valid Id");
    }


    public static function CREATE_FROM_DB(\MapSceneStoreCategory $item)
    {
        $mine = new JSceneCategoryMapping();
        $mine->Id = $item->getScene()->getSceneId() . "_" . $item->getStoreCategory()->getStoreCategoryId();
        $mine->Scene = JScene::CREATE_FROM_DB($item->getScene());
        $mine->StoreCategory = JStoreCategory::CREATE_FROM_DB($item->getStoreCategory());
        $mine->UpdateTime = $item->getUpdateTime()->format(\DateTime::ISO8601);
        $mine->UpdateUser = $item->getUpdateUser();

        return $mine;
    }

    public static function CREATE_FROM_ARRAY($data)
    {
        if (ArrayUtils::KEY_EXISTS($data, 'StoreCategoryId') && ArrayUtils::KEY_EXISTS($data, 'SceneId'))
        {
            return JSceneCategoryMapping::LOAD_FROM_DB($data['StoreCategoryId'], $data['SceneId']);
        }
        if (!ArrayUtils::KEY_EXISTS($data, 'StoreCategory')) throw new \Exception("JSceneToCategoryMapping: Mandatory field StoreCategory (!) missing");
        if (!ArrayUtils::KEY_EXISTS($data, 'Scene')) throw new \Exception("JSceneToCategoryMapping: Mandatory field Scene missing");
        return JSceneCategoryMapping::CREATE_FROM_ARRAY_RELAXED($data);
    }


    public static function TRY_LOAD_FROM_DB($sceneId, $categoryId)
    {

        foreach ( (new \MapSceneStoreCategoryQuery())->findBySceneId($sceneId) as $item)
        {
            if($categoryId == $item->getStoreCategoryId())
            {
                return JSceneCategoryMapping::CREATE_FROM_DB($item);
            }
        }

        return null;
    }

    public static function LOAD_FROM_DB($sceneId, $categoryId)
    {

        $item = JSceneCategoryMapping::TRY_LOAD_FROM_DB($sceneId, $categoryId);
        if(!is_null($item)) return $item;
        throw new \Exception("JSceneToCategoryMapping: no matching mapping found for $sceneId, $categoryId");
    }

    public static function CREATE_FROM_ARRAY_RELAXED($data) {
        $mine = new JSceneCategoryMapping();
        if (ArrayUtils::KEY_EXISTS($data, 'CategoryId') && ArrayUtils::KEY_EXISTS($data, 'SceneId'))
        {
            $mine = JSceneCategoryMapping::LOAD_FROM_DB($data['CategoryId'], $data['SceneId']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'Scene')) {
            $mine->Scene = JScene::CREATE_FROM_ARRAY($data['Scene']);
        }
        if (ArrayUtils::KEY_EXISTS($data, 'StoreCategory')) {
            $mine->StoreCategory = JStoreCategory::CREATE_FROM_ARRAY($data['StoreCategory']);
        }
        return $mine;
    }

    public function isValid()
    {
        return !is_null($this->StoreCategory) && !is_null($this->Scene) &&
        !is_null($this->StoreCategory->StoreCategoryId) && !is_null($this->Scene->SceneId);
    }

    public function toDB() {
        if(!$this->isValid()) throw new \Exception("Invalid JSceneToCategoryMappiong, can't save");
        $item = JSceneCategoryMapping::TRY_LOAD_FROM_DB($this->Scene->SceneId, $this->StoreCategory->StoreCategoryId);
        if(is_null($item)) $item = new \MapSceneStoreCategory();

        return $this->updateDB($item);
    }

    public function updateDB(\MapSceneStoreCategory &$item)
    {
        $item->setStoreCategoryId($this->StoreCategory->StoreCategoryId);
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