<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/1/2015
 * Time: 9:15 PM
 */

namespace Db\Utility;


class FieldUtils {
    public function GenerateKey($id1, $id2) {
        if(!is_null($id2)) {
            return $id1 . "_";
        }
        return $id1 . "_" . $id2;
    }

    public static function SPLIT_ID($id) {
        $ids = explode("_",$id);
        if(!is_array($ids) || count($ids) <> 2) throw new \Exception("invalid id returned, require #_# got " . $id);
        if(strlen($ids[0])<=0) throw new \Exception("No persona id specified (" . $id . ")");
        if(strlen($ids[1])<=0) throw new \Exception("No RestrictionType id specified (" . $id . ")");

        return $ids;
    }

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