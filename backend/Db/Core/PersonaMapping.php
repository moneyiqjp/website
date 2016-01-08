<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2015/08/07
 * Time: 20:23
 */

namespace Db\Core;


use Db\Json\JFeatureType;
use Db\Json\JGeneralRestriction;

class Store {
    public $Id;
    public $Name;
    public $IsMajor;
    public $Allocation;

    public static function CREATE(\Store $store) {
        $that = new Store();
        $that->Id = $store->getStoreId();
        $that->Name = $store->getStoreName();
        $that->IsMajor = $store->getIsMajor();
        if(!is_null($store->getAllocation())) {
            $that->Allocation = $store->getAllocation() * 0.01;
        } else {
            $that->Allocation = 10 * 0.01;
        }
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
    public $SubCategory;
    public $Description;

    public static function CREATE(\RewardCategory $cat) {
        if(strtolower($cat->getName()) == "none") return null;
        $mine = new RewardCategory();
        $mine->Id =$cat->getRewardCategoryId();
        $mine->Name = $cat->getName();
        $mine->Description = $cat->getDescription();
        $mine->SubCategory = $cat->getSubcategory();
        return $mine;
    }

}

class SceneWithPersona extends Scene{
    public $Persona;

    private function AddStoresFromPersona(\Persona $pers) {
        $addList = array(); $removeList = array();
        foreach($pers->getMapPersonaStores() as $map) {
            $store = $map->getStore();
            $store->setIsMajor(1);
            $store->setAllocation($map->getPercentage());

            foreach($store->getStoreCategory()->getMapSceneStoreCategories() as $ssmap) {
                if($ssmap->getSceneId() != $this->Id) continue;
                if($map->getNegative()) {
                    array_push($removeList, $store);
                } else {
                    array_push($addList, $store);
                }
            }
        }

        $this->AddStoresToScene($addList);
        $this->RemoveStoresFromScene($removeList);
    }

    public function UpdateFromScene(\Scene $scene) {
        parent::UpdateFromScene($scene);
        $this->Persona = array();

        foreach($scene->getMapPersonaScenes() as $map) {
            array_push($this->Persona, Persona::CREATE($map->getPersona()));
            $this->AddStoresFromPersona($map->getPersona());
        }

        return $this;
    }

    public static function
     CREATE(\Scene $scene)
    {
        $that = new SceneWithPersona();
        return $that->UpdateFromScene($scene);
    }
}


class Scene {
    public $Id;
    public $Name;
    public $RewardTypes = array();
    public $Stores = array();

    public function Scene(){}


    public function UpdateFromScene(\Scene $scene)
    {
        $this->Name = $scene->getName();
        $this->Id = $scene->getSceneId();
        foreach ($scene->getMapSceneStoreCategories() as $item) {
            $this->Stores = array_merge($this->Stores, Category::CREATE($item->getStoreCategory())->Store);
        }

        foreach($scene->getMapSceneRewcats() as $item) {
            array_push($this->RewardTypes,  RewardCategory::CREATE($item->getRewardCategory()));
        }

        return $this;
    }

    public static function CREATE(\Scene $scene)
    {
        $that = new Scene();
        return $that->UpdateFromScene($scene);
    }
/*
    public static function CREATE_PERSONA_SCENE(\Persona $pers) {
        $that = new Scene();
        $that->Name = $pers->getName();
        $that->Id = $pers->getPersonaId() * 1000;
        return $that;
    }

    public function AddStore($store) {
        $this->AddStoresToScene(Array($store));
    }

    public function RemoveStore($store) {
        $this->RemoveStoresFromScene(Array($store));
    }
*/
    public function AddStoresToScene($stores) {
        //New stores are always added
        $newStores = array(); $storeIds = array();
        foreach($stores as $store) {
            array_push($storeIds,$store->getStoreId());
            array_push($newStores, Store::CREATE($store) );
        }

        //existing stores that are not in the new store list are added
        foreach($this->Stores as $store) {
            if(!in_array($store->Id, $storeIds)) {
                array_push($newStores, $store);
            }
        }

        $this->Stores = $newStores;
        return $this;
    }


    public function RemoveStoresFromScene($stores) {
        $storeIds = array(); $scenStores = array();
        foreach($stores as $store) {
            array_push($storeIds,$store->getStoreId());
        }


        foreach($this->Stores as $store) {
            if(!in_array($store->Id,$storeIds)) {
                array_push($scenStores, $store);
            } else {
                $store->IsMajor = 0;
            }
        }

        $this->Stores = $scenStores;

        return $this;
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
            $feat = JFeatureType::CREATE_FROM_DB($item->getCardFeatureType());
            $feat->Negative = $item->getNegative();
            array_push($that->FeatureRestriction,  $feat);
        }

        foreach($persona->getPersonaRestrictions() as $item) {
            array_push($that->GeneralRestriction,  JGeneralRestriction::CREATE_FROM_DB($item)->getRestriction());
        }

        return $that;
    }
}


class PersonaWithScene extends Persona {
    public $Scene = Array();

/*
    private function AddSceneWithStores($sceneId, $stores, $storesRemove) {

        $dbscene = \SceneQuery::create()->findPk($sceneId);
        if(is_null($dbscene)) return;
        $scene = Scene::CREATE($dbscene);
        $scene->AddStoresToScene($stores);
        $scene->RemoveStoresFromScene($storesRemove);
        array_push($this->Scene, $scene);
    }

    private function StoreToScene($sceneStoreMap) {

        $newScenes = array(); $sceneIds = array();
        foreach($this->Scene as $lsc) {
           array_push($sceneIds, $lsc->Id);
           if(array_key_exists($lsc->Id, $sceneStoreMap)){
               if(array_key_exists(0, $sceneStoreMap[$lsc->Id])) {
                   $lsc->AddStoresToScene($sceneStoreMap[$lsc->Id][0]);
               }
               if(array_key_exists(1, $sceneStoreMap[$lsc->Id])) {
                   $lsc->RemoveStoresFromScene($sceneStoreMap[$lsc->Id][1]);
               }
               array_push($newScenes, $lsc);
           } else {
               array_push($newScenes, $lsc);
           }
        }



        foreach(array_keys($sceneStoreMap) as $SId) {
            if(!in_array($SId,$sceneIds)) {
                $add = array(); $remove = array();
                if(!array_key_exists(0, $sceneStoreMap[$SId])) {
                    continue;
                }

                $add = $sceneStoreMap[$SId][0];
                if(array_key_exists(1, $sceneStoreMap[$SId])) {
                    $remove =$sceneStoreMap[$SId][1];
                }
                $this->AddSceneWithStores($SId, $add, $remove );
            }
        }
    }

    public function RemoveStoresFromScene($stores, Scene &$scene) {
        print("Not yet implemented RemoveStoresFromScene" . count($stores) . "-" . $scene->Name);
        return $scene;
    }

    public function GenerateScenesFromStores(\Persona $pers) {
        $store = null;
        $sceneStoreMap = array();
        $sceneId=null;

        $scene = SceneWithPersona::CREATE_PERSONA_SCENE($pers);
        foreach($pers->getMapPersonaStores() as $map) {
            $store = $map->getStore();
            $store->setIsMajor(1);
            $store->setAllocation($map->getPercentage());
            if(!$map->getNegative()) $scene->AddStore($store);
            foreach($store->getStoreCategory()->getMapSceneStoreCategories() as $ssmap)  {
                $sceneId = $ssmap->getSceneId() ;

               if(!array_key_exists($sceneId, $sceneStoreMap)) {
                   $sceneStoreMap[$sceneId] = array();
               }

               if(!array_key_exists($map->getNegative(), $sceneStoreMap[$sceneId])) {
                   $sceneStoreMap[$sceneId][$map->getNegative()] = array();
               }

               array_push($sceneStoreMap[$sceneId][$map->getNegative()], $store);
            }
        }

        array_push($this->Scene,$scene);


        $this->StoreToScene($sceneStoreMap);
    }
*/
    public function UpdateFromPersona(\Persona $pers) {
        parent::UpdateFromPersona($pers);
        foreach ($pers->getMapPersonaScenes() as $pms) {
            array_push($this->Scene, Scene::CREATE($pms->getScene()));
        }
        //$this->GenerateScenesFromStores($pers);

    }

    public static function CREATE(\Persona $pers) {
        $that = new PersonaWithScene();
        $that->Scene = array();
        $that->UpdateFromPersona($pers);
        return $that;
    }
}


class Persona {
    public $Id;
    public $Identifier;
    public $Name;
    public $Restriction;
    public $DefaultSpend;
    public $Sorting;
    public $RewardCategory;

    public function Persona(){}

    public function UpdateFromPersona(\Persona $pers) {
        $this->Id = $pers->getPersonaId();
        $this->Identifier = $pers->getIdentifier();
        $this->Name= $pers->getName();
        $this->Restriction = Restriction::CREATE($pers);
        $this->DefaultSpend = $pers->getDefaultSpend();
        $this->Sorting = $pers->getSorting();
        $this->RewardCategory = RewardCategory::CREATE($pers->getRewardCategory());
    }


    public static function CREATE(\Persona $pers) {
        $that = new Persona();
        $that->UpdateFromPersona($pers);
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
            array_push($map->Scene, SceneWithPersona::CREATE($scene) );
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
            array_push($map->Persona, PersonaWithScene::CREATE($pers) );
        }
        return $map;
    }

    public static function CREATESCENEMAPPING(){
        return SceneMapping::CREATE();
    }
}
