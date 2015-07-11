<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/1/2015
 * Time: 9:15 PM
 */

namespace Db\Utility;


class FieldUtils {
    public static function STRING_IS_DEFINED($value){
        return (!is_null($value)) && is_string($value) && (strlen(trim($value))>0);
    }

    public static function NUMBER_IS_DEFINED($value){
        return (!is_null($value)) && is_numeric($value);
    }

    public static function ID_IS_DEFINED($value){
        return (!is_null($value)) && is_numeric($value) && $value>0;
    }
}