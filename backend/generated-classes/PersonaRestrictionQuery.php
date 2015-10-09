<?php

use Base\PersonaRestrictionQuery as BasePersonaRestrictionQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'persona_restriction' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PersonaRestrictionQuery extends BasePersonaRestrictionQuery
{
    //Base assumption - restriction type only appears once per persona
    public function findByPrimaryKeys($personaId, $restrictionTypeId) {
        $result = array();
        foreach($this->findByPersonaId($personaId) as $map) {
            if($map->getRestrictionTypeId()==$restrictionTypeId)
                array_push($result, $map);
        }

        return $result;
    }

} // PersonaRestrictionQuery
