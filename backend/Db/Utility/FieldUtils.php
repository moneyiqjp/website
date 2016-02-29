<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 4/1/2015
 * Time: 9:15 PM
 */

namespace Db\Utility;


class FieldUtils {
    public static function GENERATE_KEY($type, $id1, $id2) {
        if(!self::ID_IS_DEFINED($id2)) {
            return $type . "_" . $id1 . "_";
        }

        return $type . "_" . $id1 . "_" . $id2;
    }

    public static function SPLIT_ID($id) {
        $ids = explode("_",$id);
        if(!is_array($ids) || count($ids) <> 3) throw new \Exception("invalid id returned, require #_# got " . $id);
        $ids = array_reverse($ids);
        array_pop($ids);
        $ids = array_reverse($ids);
        if(!self::ID_IS_DEFINED($ids[0])) throw new \Exception("First ID missing (" . $id . ")");
        if(!self::ID_IS_DEFINED($ids[1])) throw new \Exception("Second id missing (" . $id . ")");

        return $ids;
    }

    public static function IS_STRING($value){
        return (!is_null($value)) && is_string($value);
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

    public static function DateTimeToISOString(\DateTime $date) {
        if(is_null($date)) return "";
        return $date->format(\DateTime::ISO8601);
    }

    public static function DateTimeToDateString(\DateTime $date) {
        if(is_null($date)) return "";
        return $date->format("Y-m-d");
    }

    public static function replaceIfAvailable($str, $from, $to) {
        return  self::STRING_IS_DEFINED($to)?str_replace($from, $to, $str):$str;
    }
}