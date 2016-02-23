<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 3/19/2015
 * Time: 9:22 PM
 */

namespace Db\Json;

function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new \ErrorException($errstr, $errno, 0, $errfile, $errline);
}

interface JSONInterface {
    public static function CREATE_FROM_ARRAY($data);
    public function saveToDb();
    public function toDB();
}

interface JSONDisplay {
    public function getDisplay();
    public function parseForDisplay($str);
}

spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }

    //$namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);
    $class=__DIR__ . '/../../' .(empty($namespace)?"":$namespace."/")."{$className}.php";
    include_once($class);
    return true;
});