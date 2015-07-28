<?php

use Base\MapSceneStoreCategoryQuery as BaseMapSceneStoreCategoryQuery;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * Skeleton subclass for performing query and update operations on the 'map_scene_store_category' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class MapSceneStoreCategoryQuery extends BaseMapSceneStoreCategoryQuery
{
    /**
     * @param $sceneId
     * @param $categoryId
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findBySceneIdStoreCategoryId($sceneId, $categoryId) {
        $result = array();
        foreach($this->findBySceneId($sceneId) as $map) {
            if($map->getStoreCategoryId()==$categoryId)
                array_push($result, $map);
        }

        return $result;
    }

} // MapSceneStoreCategoryQuery
