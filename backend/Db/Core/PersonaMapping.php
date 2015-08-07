<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/08/07
 * Time: 20:23
 */

namespace Db\Core;


use Base\PersonaQuery;
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

class Scene {
    public $Id;
    public $Name;
    public $Category = array();

    public function Scene(){}

    public static function CREATE(\Scene $scene)
    {
        $that = new Scene();
        $that->Name = $scene->getName();
        $that->Id = $scene->getSceneId();
        foreach($scene->getMapSceneStoreCategories() as $item) {
            array_push($that->Category,  Category::CREATE($item->getStoreCategory()));
        }
        return $that;
    }
}


class Persona {
    public $Id;
    public $Name;
    public $Scene = array();

    public function Persona(){}

    public static function CREATE(\Persona $pers)
    {
        $that = new Persona();
        $that->Id = $pers->getPersonaId();
        $that->Name= $pers->getName();
        foreach($pers->getMapPersonaScenes() as $pms) {
            array_push($that->Scene, Scene::CREATE($pms->getScene()));
        }

        return $that;
    }
}

class PersonaMapping
{
    public $Persona = array();

    public function PersonaMapping(){}

    public static function CREATE(){
        $map = new PersonaMapping();
        foreach((new \PersonaQuery())->find() as $pers)
        {
            array_push($map->Persona, Persona::CREATE($pers) );
        }
        return $map;
    }



}