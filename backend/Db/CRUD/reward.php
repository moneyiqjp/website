<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:50 PM
 */


namespace Db\CRUD;
use Db\Json\JObject;
use Db\Json\JReward;
use Db\Json\JRewardType;
use Db\Json\JRewardCategory;

/* Reward */
function GetRewardForCrud()
{
    $result = array();
    foreach ((new \RewardQuery())->orderByDescription()->find() as $af) {
        array_push($result, JReward::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetRewardById($id)
{
    $result = array();
    foreach ((new \RewardQuery())->orderByDescription()->findPk($id) as $af) {
        array_push($result, JReward::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetRewardByPointSystemId($id)
{
    $result = array();
    foreach ((new \RewardQuery())->orderByDescription()->findByPointSystemId($id) as $af) {
        array_push($result, JReward::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateRewardForCrud($data)
{
    $parsed = JReward::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse Reward update request");

    $item = (new  \RewardQuery())->findPk($parsed->RewardId);
    if(is_null($item)) throw new \Exception ("Reward with id ". $parsed->RewardId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \RewardQuery())->findPk($parsed->RewardId);
    return JReward::CREATE_FROM_DB($item);
}
function CreateRewardForCrud($data)
{
    $item = JReward::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JReward::CREATE_FROM_DB($item);
}
function DeleteRewardForCrud($id)
{
    $item = (new  \RewardQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("Reward with id ". $id ." not found");
    }
    $item->delete();
    return array();
}

/* RewardType */
function GetRewardTypeForDisplay()
{
    $result = array();
    foreach ((new \RewardTypeQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getRewardTypeId()));
    }
    return $result;
}
function GetRewardTypeForCrud()
{
    $result = array();
    foreach ((new \RewardTypeQuery())->orderByName()->find() as $af) {
        array_push($result, JRewardType::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetRewardTypeById($id)
{
    $result = array();
    foreach ((new \RewardTypeQuery())->orderByName()->findPk($id) as $af) {
        array_push($result, JRewardType::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateRewardTypeForCrud($data)
{
    $parsed = JRewardType::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse RewardType update request");

    $item = (new  \RewardTypeQuery())->findPk($parsed->RewardTypeId);
    if(is_null($item)) throw new \Exception ("RewardType with id ". $parsed->RewardTypeId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \RewardTypeQuery())->findPk($parsed->RewardTypeId);
    return JRewardType::CREATE_FROM_DB($item);
}
function CreateRewardTypeForCrud($data)
{
    $item = JRewardType::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JRewardType::CREATE_FROM_DB($item);
}
function DeleteRewardTypeForCrud($id)
{
    $item = (new  \RewardTypeQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("RewardType with id ". $id ." not found");
    }
    $item->delete();
    return array();
}


/* RewardCategory */
function GetRewardCategoryForDisplay()
{

    $result = array();
    foreach ((new \RewardCategoryQuery())->orderByName()->find() as $af) {
        array_push($result,  JObject::CREATE($af->getName(),$af->getRewardCategoryId()));
    }
    return $result;
}
function GetRewardCategoryForCrud()
{
    $result = array();
    foreach ((new \RewardCategoryQuery())->orderByName()->find() as $af) {
        array_push($result, JRewardCategory::CREATE_FROM_DB($af));
    }
    return $result;
}
function GetRewardCategoryById($id)
{
    $result = array();
    foreach ((new \RewardCategoryQuery())->orderByName()->findPk($id) as $af) {
        array_push($result, JRewardCategory::CREATE_FROM_DB($af));
    }
    return $result;
}
function UpdateRewardCategoryForCrud($data)
{
    $parsed = JRewardCategory::CREATE_FROM_ARRAY($data);
    if(is_null($parsed)) throw new \Exception ("Failed to parse RewardCategory update request");

    $item = (new  \RewardCategoryQuery())->findPk($parsed->RewardCategoryId);
    if(is_null($item)) throw new \Exception ("RewardCategory with id ". $parsed->RewardCategoryId ." not found");

    $item = $parsed->updateDB($item);
    $item->save();

    //TODO implement cache, then refresh
    $item = (new  \RewardCategoryQuery())->findPk($parsed->RewardCategoryId);
    return JRewardCategory::CREATE_FROM_DB($item);
}
function CreateRewardCategoryForCrud($data)
{
    $item = JRewardCategory::CREATE_FROM_ARRAY($data)->toDB();
    $item->save();

    //TODO implement cache, add to cache
    return JRewardCategory::CREATE_FROM_DB($item);
}
function DeleteRewardCategoryForCrud($id)
{
    $item = (new  \RewardCategoryQuery())->findPk($id);
    if(is_null($item)) {
        throw new \Exception ("RewardCategory with id ". $id ." not found");
    }
    $item->delete();
    return array();
}