<?php
require_once 'vendor/autoload.php';
/*
require_once  'generated-classes\CardPointSystem.php';
require_once 'generated-classes\CardPointSystemQuery.php';
*/
require_once 'Db/Db.php';
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 2/19/2015
 * Time: 9:17 PM
 */

//Instantiate a Slim application:

$app = new \Slim\Slim(array(
    'debug' => true
));
$app->getLog()->setEnabled(true);
$app->getLog()->setLevel(\Slim\Log::DEBUG);
$GLOBALS['LOG'] = $app->getLog();


require_once("requests/crud/request_utils.php");
require_once 'requests/crud/creditcard.php';
require_once 'requests/crud/frontend.php';
require_once 'requests/crud/mileage.php';
require_once 'requests/crud/payment_type.php';
require_once 'requests/crud/persona.php';
require_once 'requests/crud/pointsystem.php';
require_once 'requests/crud/restrictions.php';
require_once 'requests/crud/reward.php';
require_once 'requests/crud/staticdata.php';
require_once 'requests/crud/store.php';

//Run the Slim application:
$app->run();
