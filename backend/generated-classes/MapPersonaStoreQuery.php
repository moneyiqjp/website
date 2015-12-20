<?php

use Base\MapPersonaStoreQuery as BaseMapPersonaStoreQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'map_persona_store' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class MapPersonaStoreQuery extends BaseMapPersonaStoreQuery
{
    /**
     * @param $personaId
     * @param $sceneId
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findByPersonaIdStoreId($personaId, $storeId) {
        return $this->filterByPersonaId($personaId)->filterByStoreId($storeId)->find();
    }

} // MapPersonaStoreQuery
