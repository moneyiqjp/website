<?php

use Base\MapPersonaSceneQuery as BaseMapPersonaSceneQuery;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * Skeleton subclass for performing query and update operations on the 'map_persona_scene' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class MapPersonaSceneQuery extends BaseMapPersonaSceneQuery
{

    /**
     * @param $personaId
     * @param $sceneId
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findByPersonaIdSceneId($personaId, $sceneId) {
        return $this->filterByPersonaId($personaId)->filterBySceneId($sceneId)->find();
    }

} // MapPersonaSceneQuery
