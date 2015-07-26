<?php

use Base\CreditCard as BaseCreditCard;


class CreditCard extends BaseCreditCard
{

    public function getShoppingInterestRate() {
        foreach ($this->getInterests() as $int)
        {
            if ($int->getPaymentType()->getPaymentType()=="ikkai")
            {
                return  $int->getMinInterest();
            }
        }

        return null;
    }

    public function getPointsToMoneyConversionRate()
    {
        $pointsToMoneyConversionRate = 0;
        foreach ($this->getCardPointSystems() as $pcs) {
            $ps = $pcs->getPointSystem();

            $pointsToMoneyConversionRate = max($ps->getDefaultYenPerPoint(), $pointsToMoneyConversionRate);
            /*
            foreach ($ps->getPointUses() as $use) {
                $pointsToMoneyConversionRate = max ($use->getYenPerPoint(),$pointsToMoneyConversionRate);
            }
            */
        }

        return $pointsToMoneyConversionRate;
    }

    public function getShortDescription() {
        /*
         *          1) If exist description with "Type" of "restriction", else
                    2) If exists description with "Type" of "general", else
                    3) If exists active campaign with highest ValueInYen, else
                    4) Any other description
         */
        $general = $campaign = $base = null;
        foreach($this->getCardDescriptions() as $desc) {
            if(strtolower($desc->getItemName()) == "restriction") return $desc->getItemDescription();
            if(strtolower($desc->getItemName()) == "restriction") {
                $general = $desc->getItemDescription();
            } else {
                $base = $desc->getItemDescription();
            }
        }

        foreach($this->getCampaigns() as $camp) {
            $campaign =  $camp->getDescription();
            if(!is_null($campaign) && is_string($campaign) && (strlen(trim($campaign))>0)) return $campaign;
        }

        if(!is_null($general) && is_string($general) && (strlen(trim($general))>0)) return $general;

        return $base;
    }
}
