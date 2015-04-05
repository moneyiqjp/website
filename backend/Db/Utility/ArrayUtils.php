<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/31/2015
 * Time: 9:12 PM
 */

namespace Db\Utility;

class ArrayUtils {
    public static function KEY_EXISTS($array,$key){
        return  (!is_null($array)) && (array_key_exists($key,$array)) && (!is_null($array[$key]));
    }

    public static function KEY_STRING ($array,$key) {
        return (!is_null($array)) && (array_key_exists($key, $array)) && (!is_null($array[$key])) && (strlen(trim($array[$key])) > 0);
    }
}



spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }

    $className=str_replace("\\","/",$className);
    $class=$_SERVER['DOCUMENT_ROOT'] . '/backend/'.(empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
    return true;
});