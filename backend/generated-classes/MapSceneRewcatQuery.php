<?php

use Base\MapSceneRewcatQuery as BaseMapSceneRewcatQuery;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * Skeleton subclass for performing query and update operations on the 'map_scene_rewcat' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class MapSceneRewcatQuery extends BaseMapSceneRewcatQuery
{
    /**
     * @param $sceneId
     * @param $categoryId
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findBySceneIdRewardCategoryId($sceneId, $categoryId) {
        $result = array();
        foreach($this->findBySceneId($sceneId) as $map) {
            if($map->getRewardCategoryId()==$categoryId)
                array_push($result, $map);
        }

        return $result;
    }
} // MapSceneRewcatQuery
