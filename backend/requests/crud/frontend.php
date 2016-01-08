<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:44 PM
 */
include_once(__DIR__ . "/../../Db/CRUD/frontend.php");
use Db\CRUD;



$app->get('/allscenes', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    try {
        $jTableResult['data'] = Db\CRUD\GetAllScenes();
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }


    echo json_encode($jTableResult);

});


$app->get('/allpersonas', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    try {
        $jTableResult['data'] = Db\CRUD\GetAllPersonas();
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }


    echo json_encode($jTableResult);

});





//Define a HTTP GET route:
// handle GET requests for /articles
$app->get('/allcards', function () use ($app) {
    // query database for all cards

    
    $cards = Db\CRUD\GetAllCards();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/allstores', function () use ($app) {
    // query database for all cards

    
    $cards = Db\CRUD\GetAllStores();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});


$app->get('/allfeatures', function () use ($app) {
    // query database for all cards

    
    $cards = Db\CRUD\GetAllFeatures();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});


$app->get('/mailchimp', function () use ($app) {
    
    $GLOBALS['LOG'] = $app->getLog();
    // query database for all cards
    echo json_encode(Db\CRUD\AddEmailToMailingList("benfries@gmail.com"));
    $chimp = new  \Db\Utility\MailChimp();
    echo  $chimp->subscribe("benfries@gmail.com");
});


$app->post('/mailinglist/add', function () use ($app) {
    
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult = Db\CRUD\AddEmailToMailingList($request->put('email'));
    } catch(\Exception $e) {
        $jTableResult['status'] = "ERROR";
        $jTableResult['message'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});


?>