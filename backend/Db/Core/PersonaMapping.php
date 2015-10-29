<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/08/07
 * Time: 20:23
 */

namespace Db\Core;


use Base\PersonaQuery;
use Db\Json\JFeatureType;
use Db\Json\JGeneralRestriction;
use Db\Json\JStore;

class Store {
    public $Id;
    public $Name;
    public $IsMajor;
    public static function CREATE(\Store $store) {
        $that = new Store();
        $that->Id = $store->getStoreId();
        $that->Name = $store->getStoreName();
        $that->IsMajor = $store->getIsMajor();
        return $that;
    }
}

class Category {
    public $Id;
    public $Name;
    public $Store = array();
    public function Category(){}

    public static function CREATE(\StoreCategory $cat) {
        $that = new Category();
        $that->Id = $cat->getStoreCategoryId();
        $that->Name = $cat->getName();
        foreach($cat->getStores() as $item) {
            array_push($that->Store, Store::CREATE($item));
        }
        return $that;
    }
}



class RewardCategory {
    public $Id;
    public $Name;
    public $Description;

    public static function CREATE(\RewardCategory $cat) {
        $mine = new RewardCategory();
        $mine->Id =$cat->getRewardCategoryId();
        $mine->Name = $cat->getName();
        $mine->Description = $cat->getDescription();
        return $mine;
    }

}

class Scene {
    public $Id;
    public $Name;
    public $RewardTypes = array();
    public $Stores = array();

    public function Scene(){}

    public static function CREATE(\Scene $scene)
    {
        $that = new Scene();
        $that->Name = $scene->getName();
        $that->Id = $scene->getSceneId();
        foreach($scene->getMapSceneStoreCategories() as $item) {
            $that->Stores=array_merge($that->Stores,  Category::CREATE($item->getStoreCategory())->Store);
        }

        foreach($scene->getMapSceneRewcats() as $item) {
            array_push($that->RewardTypes,  RewardCategory::CREATE($item->getRewardCategory()));
        }

        return $that;
    }

    public static function CREATE_INCLUDING_PERSONA(\Scene $scene)
    {
        $that = Scene::CREATE($scene);
        $that->Persona = array();

        foreach($scene->getMapPersonaScenes() as $map) {
            array_push($that->Persona, Persona::CREATE($map->getPersona()));
        }

        return $that;
    }
}

class Restriction {
    public $FeatureRestriction = array();
    public $GeneralRestriction = array();

    public function Restriction(){}

    public static function CREATE(\Persona $persona)
    {
        $that = new Restriction();
        foreach($persona->getMapPersonaFeatureConstraints() as $item) {
            array_push($that->FeatureRestriction,  JFeatureType::CREATE_FROM_DB($item->getCardFeatureType()));
        }

        foreach($persona->getPersonaRestrictions() as $item) {
            array_push($that->GeneralRestriction,  JGeneralRestriction::CREATE_FROM_DB($item)->toKeyValueType());
        }

        return $that;
    }
}


class Persona {
    public $Id;
    public $Name;
    public $Restriction;

    public function Persona(){}

    public static function CREATE(\Persona $pers) {
        $that = new Persona();
        $that->Id = $pers->getPersonaId();
        $that->Name= $pers->getName();
        $that->Restriction = Restriction::CREATE($pers);

        return $that;
    }

    public static function CREATE_INCLUDING_SCENES(\Persona $pers) {
        $that = Persona::CREATE($pers);
        $that->Scene = array();
        foreach ($pers->getMapPersonaScenes() as $pms) {
            array_push($that->Scene, Scene::CREATE($pms->getScene()));
        }
        return $that;
    }
}


class SceneMapping {
    public $Scene = array();

    public function SceneMapping(){}

    public static function CREATE(){
        $map = new SceneMapping();
        foreach((new \SceneQuery())->find() as $scene)
        {
            array_push($map->Scene, Scene::CREATE_INCLUDING_PERSONA($scene) );
        }
        return $map;
    }
}


class PersonaMapping {
    public $Persona = array();

    public function PersonaMapping(){}

    public static function CREATE(){
        $map = new PersonaMapping();
        foreach((new \PersonaQuery())->find() as $pers)
        {
            array_push($map->Persona, Persona::CREATE_INCLUDING_SCENES($pers) );
        }
        return $map;
    }

    public static function CREATESCENEMAPPING(){
        return SceneMapping::CREATE();
    }
}
