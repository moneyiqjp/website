<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 10/31/2015
 * Time: 2:38 PM
 */

namespace Db\Json;


class JRestriction
{
    public $Id;
    public $Attribute;
    public $Comparator;
    public $Value;
    public $Display;

    public function JRestriction(){

    }

    public static function CREATE($id, $attribute, $comparator, $value, $display){
        $that = new JRestriction();
        $that->Id = $id;
        $that->Attribute = $attribute;
        $that->Value = $value;
        $that->Comparator = $comparator;
        $that ->Display = JRestriction::GETDISPLAY($attribute, $comparator, $value, $display);
        return $that;
    }

    public static function CREATE_PERSONA(JGeneralRestriction $rest){
        return JRestriction::CREATE("G".$rest->GeneralRestrictionId,$rest->RestrictionType->Path, $rest->Comparator, $rest->Value, $rest->RestrictionType->Display);
    }

    public static function CREATE_CREDITCARD(JCreditCardRestriction $rest) {
        return JRestriction::CREATE("C".$rest->CreditCardRestrictionId, $rest->RestrictionType->Path, $rest->Comparator, $rest->Value, $rest->RestrictionType->Display);
    }

    private static function GETDISPLAY($attribute, $comparator, $value, $display) {
        $return = $display;
        $return =  str_replace("%VALUE%", $value,$return);
        $return =  str_replace("%ATTRIBUTE%", $attribute,$return);
        $return =  str_replace("%COMPARATOR%", $comparator,$return);

        return $return;
    }

}