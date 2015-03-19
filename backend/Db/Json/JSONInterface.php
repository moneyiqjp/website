<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:22 PM
 */

namespace Db\Json;


interface JSONInterface {

    public static function CREATE_FROM_ARRAY($data);
}

spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }

    //$namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);
    $class=$_SERVER['DOCUMENT_ROOT'] . '/backend/'.(empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
    return true;
});