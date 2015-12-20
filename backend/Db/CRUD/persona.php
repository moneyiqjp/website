<?php
namespace Db\CRUD;
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:33 PM
 */

use Db\Json\JObject;
use Db\Json\JPersona;
use Db\Json\JScene;
use Db\Json\JSceneCategoryMapping;
use Db\Json\JSceneRewardCategoryMapping;
use Db\Json\JPersonaSceneMapping;
use Db\Json\JPersonaStoreMapping;

/* Persona */
function GetPersonaForDisplay()
{
    $result = array();
    foreach ((new \PersonaQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getPersonaId()));
    }
    return $result;
}
function GetPersonaForCrud()
{
    $result = array();
    foreach ((new \PersonaQuery())->orderByName()->find() as $af) {
        array_push($result, JPersona::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPersonaById($id)
{
    $result = array();
    foreach ((new \PersonaQuery())->orderByName()->findByPersonaId($id) as $af) {
        array_push($result, JPersona::CREATE_FROM_DB($af));

    }
    return $result;
}
function UpdatePersonaForCrud($data)
{
    $parsed = JPersona::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Persona update request");

    $item = (new  \PersonaQuery())->findPk($parsed->PersonaId);
    if(is_null($item)) throw new \Exception ("Persona with id ". $parsed->PersonaId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \PersonaQuery())->findPk($parsed->PersonaId);
    return JPersona::CREATE_FROM_DB($item);
}
function CreatePersonaForCrud($data)
{
    $item = JPersona::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPersona::CREATE_FROM_DB($item);
}
function DeletePersonaForCrud($id)
{
    $item = (new  \PersonaQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Persona with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* Scene */
function GetSceneForDisplay()
{
    $result = array();
    foreach ((new \SceneQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getSceneId()));
    }
    return $result;
}
function GetSceneForCrud()
{
    $result = array();
    foreach ((new \SceneQuery())->orderByName()->find() as $af) {
        array_push($result, JScene::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetSceneById($id)
{
    $result = array();
    foreach ((new \SceneQuery())->orderByName()->findPk($id) as $af) {
        array_push($result, JScene::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateSceneForCrud($data)
{
    $parsed = JScene::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Scene update request");

    $item = (new  \SceneQuery)->findPk($parsed->SceneId);
    if(is_null($item)) throw new \Exception ("Scene with id (". $parsed->SceneId .") not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \SceneQuery())->findPk($parsed->SceneId);
    return JScene::CREATE_FROM_DB($item);
}
function CreateSceneForCrud($data)
{
    $item = JScene::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JScene::CREATE_FROM_DB($item);
}
function DeleteSceneForCrud($id)
{
    $item = (new  \SceneQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Scene with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

/* GetSceneToCategoryMap */
function GetSceneToCategoryMap()
{
    $result = array();
    foreach ((new \MapSceneStoreCategoryQuery())->orderBySceneId()->find() as $af) {
        array_push($result,  JSceneCategoryMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function DeleteSceneToCategoryMap($complexId)
{
    $sceneId = JSceneCategoryMapping::GetSceneIdFromComplexId($complexId);
    $categoryId = JSceneCategoryMapping::GetStoreCategoryIdFromComplexId($complexId);
    foreach ((new \MapSceneStoreCategoryQuery())->findBySceneIdStoreCategoryId($sceneId, $categoryId) as $item) {
        if(!is_null($item)) {
            $item->delete();
        }
    }
    return array();
}

/*
function UpdateSceneToCategoryMap($data) {
    $complexId = $data["Id"];
    $parsed = JSceneCategoryMapping::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Scene to Category Mapping update request");
    $items = (new \MapSceneStoreCategoryQuery())->findBySceneIdStoreCategoryId($sceneId,$categoryId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");
    if(count($items)==0) throw new \Exception("Item not found for Mapping $complexId - Scene $sceneId, StoreCategory$categoryId");
    if(!is_null($items[0])) {
        $parsed->updateDB($items[0])->save();
    }

    //TODO implement cache, then refresh
    $items = (new \MapSceneStoreCategoryQuery())->findBySceneIdStoreCategoryId($sceneId, $categoryId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");


    return JSceneCategoryMapping::CREATE_FROM_DB($items[0]);
}
*/

function CreateSceneToCategoryMap($data)
{
    $item = JSceneCategoryMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JSceneCategoryMapping::CREATE_FROM_DB($item);
}



/* GetSceneToRewardCategoryMap */
function GetSceneToRewardCategoryMap()
{
    $result = array();
    foreach ((new \MapSceneRewcatQuery())->orderBySceneId()->find() as $af) {
        array_push($result,  JSceneRewardCategoryMapping::CREATE_FROM_DB($af));
    }
    return $result;
}

function DeleteSceneToRewardCategoryMap($complexId)
{
    $sceneId = JSceneRewardCategoryMapping::GetSceneIdFromComplexId($complexId);
    $categoryId = JSceneRewardCategoryMapping::GetRewardCategoryIdFromComplexId($complexId);

    foreach ((new \MapSceneRewcatQuery())->findBySceneIdRewardCategoryId($sceneId, $categoryId) as $item) {
        if(!is_null($item)) {
            $item->delete();
        } else {
            throw new \Exception("Failed to find scene (" .  $sceneId .")to reward category (" . $categoryId .")mapping");
        }
    }
    return array();
}
/*
function UpdateSceneToRewardCategoryMap($data) {
    $complexId = $data["Id"];
    $parsed = JSceneRewardCategoryMapping::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Scene to Category Mapping update request");
    $items = (new \MapSceneRewcatQuery())->findBySceneIdRewardCategoryId($sceneId,$categoryId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");
    if(count($items)==0) throw new \Exception("Item not found for Mapping $complexId - Scene $sceneId, StoreCategory$categoryId");
    if(!is_null($items[0])) {
        $parsed->updateDB($items[0])->save();
    }

    //TODO implement cache, then refresh
    $items = (new \MapSceneRewcatQuery())->findBySceneIdRewardCategoryId($sceneId, $categoryId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");


    return JSceneRewardCategoryMapping::CREATE_FROM_DB($items[0]);
}
*/

function CreateSceneToRewardCategoryMap($data)
{

    $item = JSceneRewardCategoryMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JSceneRewardCategoryMapping::CREATE_FROM_DB($item);
}


/* GetPersonaToSceneMap */
function GetPersonaToSceneMap()
{
    $result = array();
    foreach ((new \MapPersonaSceneQuery())->orderByPersonaId()->find() as $af) {
        array_push($result,  JPersonaSceneMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPersonaToSceneMapByPersonaId($personaId)
{

    $result = array();
    foreach ((new \MapPersonaSceneQuery())->orderByPersonaId()->findByPersonaId($personaId) as $af) {
        array_push($result,  JPersonaSceneMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function DeletePersonaToSceneMap($complexId)
{
    $sceneId = JPersonaSceneMapping::GetSceneIdFromComplexId($complexId);
    $personaId = JPersonaSceneMapping::GetPersonaIdFromComplexId($complexId);
    foreach ((new \MapPersonaSceneQuery())->findByPersonaIdSceneId($personaId, $sceneId) as $item) {
        if(!is_null($item)) {
            $item->delete();
        }
    }
    return array();
}
function UpdatePersonaToSceneMap($data) {
    //$complexId = $data["Id"];
    $parsed = JPersonaSceneMapping::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Scene to Category Mapping update request");
    $personaId = $parsed->Persona->PersonaId;
    $sceneId = $parsed->Scene->SceneId;
    $items = (new \MapPersonaSceneQuery())->findByPersonaIdSceneId($personaId, $sceneId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");
    if(count($items)==0) throw new \Exception("item not found for Persona $personaId, Scene $sceneId");

    if(!is_null($items[0])) {
        $parsed->updateDB($items[0])->save();
    }

    //TODO implement cache, then refresh
    $items = (new \MapPersonaSceneQuery())->findByPersonaIdSceneId($personaId, $sceneId);
    if(count($items)>1) throw new \Exception("Multiple items found for given scene and category");


    return JPersonaSceneMapping::CREATE_FROM_DB($items[0]);
}
function CreatePersonaToSceneMap($data)
{
    $item = JPersonaSceneMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPersonaSceneMapping::CREATE_FROM_DB($item);
}




/* GetPersonaToStoreMap */
function GetPersonaToStoreMap()
{
    $result = array();
    foreach ((new \MapPersonaStoreQuery())->orderByPersonaId()->find() as $af) {
        array_push($result,  JPersonaStoreMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetPersonaToStoreMapByPersonaId($personaId)
{

    $result = array();
    foreach ((new \MapPersonaStoreQuery())->orderByPersonaId()->findByPersonaId($personaId) as $af) {
        array_push($result,  JPersonaStoreMapping::CREATE_FROM_DB($af));
    }
    return $result;
}
function DeletePersonaToStoreMap($complexId)
{
    $storeId = JPersonaStoreMapping::GetStoreIdFromComplexId($complexId);
    $personaId = JPersonaStoreMapping::GetPersonaIdFromComplexId($complexId);
    foreach (\MapPersonaStoreQuery::create()->filterByPersonaId($personaId)->filterByStoreId($storeId)->find() as $item) {
        if(!is_null($item)) {
            $item->delete();
        }
    }
    return array();
}
function UpdatePersonaToStoreMap($data) {
    //$complexId = $data["Id"];
    $parsed = JPersonaStoreMapping::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Store to Category Mapping update request");
    $personaId = $parsed->Persona->PersonaId;
    $storeId = $parsed->Store->StoreId;
    $items = (new \MapPersonaStoreQuery())->findByPersonaIdStoreId($personaId, $storeId);
    if(count($items)>1) throw new \Exception("Multiple items found for given store and category");
    if(count($items)==0) throw new \Exception("item not found for Persona $personaId, Store $storeId");

    if(!is_null($items[0])) {
        $parsed->updateDB($items[0])->save();
    }

    //TODO implement cache, then refresh
    $items = (new \MapPersonaStoreQuery())->findByPersonaIdStoreId($personaId, $storeId);
    if(count($items)>1) throw new \Exception("Multiple items found for given store and category");


    return JPersonaStoreMapping::CREATE_FROM_DB($items[0]);
}

function CreatePersonaToStoreMap($data)
{
    $item = JPersonaStoreMapping::CREATE_FROM_ARRAY_RELAXED($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JPersonaStoreMapping::CREATE_FROM_DB($item);
}




?>