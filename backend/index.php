<?php
require 'vendor/autoload.php';
require 'db/db.php';
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

//Define a HTTP GET route:
// handle GET requests for /articles
$app->get('/allcards', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetAllCards();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});


//Run the Slim application:
$app->run();
/**/
?>