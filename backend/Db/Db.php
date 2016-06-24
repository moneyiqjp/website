<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 10:02 PM
 */
namespace Db;

// setup the autoloading
use Db\Json;
use Db\Utility\ArrayUtils;
use Db\Utility\FieldUtils;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\Length;

require_once(__DIR__.'/../vendor/autoload.php');
require_once(__DIR__ . '/../generated-conf/config.php');
include_once(__DIR__ . "/Utility/ArrayUtils.php");
include_once(__DIR__ . "/Json/JSONInterface.php");

spl_autoload_register(function($className)
{
    if (0 !== strpos($className, __NAMESPACE__)) {//not my namespace
        return false;
    }
    //$namespace=str_replace("\\","/",__NAMESPACE__);
    $className=str_replace("\\","/",$className);

    $class=__DIR__ . '/../'.(empty($namespace)?"":$namespace."/")."{$className}.php";

    include_once($class);

    return true;
});


class Db
{
    //TODO convert to static
    function db()
    {
        return $this;
    }

    /* Point Mappings */
    /*
    function GetPointMappingForCard($id)
    {
        $cc = (new\CreditCardQuery())->findPk($id);
        if(is_null($cc)) return array();

        return Json\CStorePointMapping::GET_POINT_MAPPINGS_FROM_CREDIT_CARD($cc);
    }
    function UpdatePointMappingForCard($data)
    {

        $parsed = Json\CStorePointMapping::CREATE_FROM_ARRAY($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointMapping type update request");

        if(!$parsed->saveToDb()) throw new \Exception("Failed to save point mapping ");

        return $parsed->Reload();
    }
    function CreatePointMappingForCard($data)
    {
        $parsed = Json\CStorePointMapping::CREATE_FROM_ARRAY_RELAXED($data);
        if(is_null($parsed)) throw new \Exception ("Failed to parse PointMapping create request");
        if(!$parsed->saveToDb()) throw new \Exception ("Failed to save PointMapping from create request");
        return $parsed->Reload();
    }
    function DeletePointMappingForCard($id)
    {
        if(is_null($id)) throw new \Exception("No valid PointMapping id provided (was null)");

        if(!Json\CStorePointMapping::DELETE_BY_ID($id)) throw new \Exception("Failed to delete point mapping " . $id);

        return array();
    }
    */




}