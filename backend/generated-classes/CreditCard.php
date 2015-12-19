<?php

use Base\CreditCard as BaseCreditCard;


class CreditCard extends BaseCreditCard
{

    public function getShoppingInterestRate() {
        foreach ($this->getInterests() as $int)
        {
            if ($int->getPaymentType()->getType()=="ikkai")
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


    function UpdateValue($data, $key,$value)
    {
        if(!array_key_exists($key,$data)) throw new \Exception("Failed to find key: " . $key);
        switch(strtolower($key))
        {
            case "name":
                $this->setName($value);
                break;
            case "issuer":
                $this->setIssuerId($value['id']);
                break;
            case "issuer_id":
                $this->setIssuerId($value);
                break;
            case "description":
                $this->setDescription($value);
                break;
            case "image_link":
                $this->setImageLink($value);
                break;
            case "visa":
                $this->setVisa($value>0);
                break;
            case "master":
                $this->setMaster($value>0);
                break;
            case "jcb":
                $this->setJcb($value>0);
                break;
            case "amex":
                $this->setAmex($value>0);
                break;
            case "diners":
                $this->setDiners($value>0);
                break;
            case "affiliate_link":
                $this->setAfilliateLink($value);
                break;
            case "reference":
                $this->setReference($value);
                break;
            case "affiliate_id":
                $this->setAffiliateId($value);
                break;
            case "commission":
                $this->setCommission($value);
                break;
            case "is_active":
                $this->setIsactive($value);
                break;
            case "points_expiry_months":
                $this->setPointexpirymonths($value);
                break;

            case "points_expiry_display":
                $this->setPointexpirydisplay($value);
                break;
            case "issue_period":
                $this->setIssuePeriod($value);
                break;
            case "credit_limit_bottom":
                $this->setCreditLimitBottom($value);
                break;
            case "credit_limit_upper":
                $this->setCreditLimitUpper($value);
                break;
            case "debit_date":
                $this->setDebitDate($value);
                break;
            case "cutoff_date":
                $this->setCutoffDate($value);
                break;
            case "update_user":
                $this->setUpdateUser($value);
                break;
        }

        $this->setUpdateTime((new \DateTime()));

        return $this;
    }

    function UpdateFromArray($data)
    {
        while (list($key, $value) = each($data)) {
            //echo $key . "-" .  var_export($value,true) . "\n";
            $this->UpdateValue($data,$key,$value);
        }

        $this->save();

        return $this;
    }

}
