<?php

use Base\CardRestrictionQuery as BaseCardRestrictionQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'card_restriction' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CardRestrictionQuery extends BaseCardRestrictionQuery
{
    //Base assumption - restriction type only appears once per persona
    public function findByPrimaryKeys($creditCard, $restrictionTypeId) {
        $result = array();
        foreach($this->findByCreditCardId($creditCard) as $map) {
            if($map->getRestrictionTypeId()==$restrictionTypeId)
                array_push($result, $map);
        }

        return $result;
    }

} // CardRestrictionQuery
