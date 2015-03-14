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
$app->getLog()->setEnabled(true);
$app->getLog()->setLevel(\Slim\Log::DEBUG);

//Define a HTTP GET route:
// handle GET requests for /articles
$app->get('/allcards', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetAllCards();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/allstores', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetAllStores();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});


$app->get('/allfeatures', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetAllFeatures();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/display/issuers', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetIssuersForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/display/affiliates', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetAffiliatesForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});
/*
$app->post('/display/creditcards', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetCreditCardForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    //$jTableResult['Result'] = "OK";
    $jTableResult['data'] = $cards;
    // return JSON-encoded response body with query results
    #echo json_encode($cards[0]);
    echo json_encode($jTableResult);
});
*/
$app->get('/display/creditcards', function () use ($app) {
    // query database for all cards

    $db = new \DB\DB();
    $cards = $db->GetCreditCardForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    //$jTableResult['Result'] = "OK";
    $jTableResult['data'] = $cards;
    // return JSON-encoded response body with query results
    #echo json_encode($cards[0]);
    echo json_encode($jTableResult);
});

$app->post('/crud/creditcards/create', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateCreditCard($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/creditcards/update', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateCreditCard($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->delete('/crud/creditcards/delete', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $request->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id)
    {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = $db->DeleteCreditCard($id);
    }

    echo json_encode($jTableResult);
});


/*Issuers*/
$app->get('/crud/issuer/all', function () use ($app) {
    $db = new \DB\DB();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetIssuerForCrud()));
});
$app->delete('/crud/issuer/delete', function () use ($app) {
    $db = new \DB\DB();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = $db->DeleteIssuerForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/issuer/create', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateIssuerForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/issuer/update', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateIssuerForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});


/*Affiliates*/
$app->get('/crud/affiliate/all', function () use ($app) {
    $db = new \DB\DB();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetAffiliatesForCrud()));
});
$app->delete('/crud/affiliate/delete', function () use ($app) {
    $db = new \DB\DB();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id)
    {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = $db->DeleteAffiliatesForCrud($id);
    }

    echo json_encode($jTableResult);
});
$app->post('/crud/affiliate/create', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateAffiliatesForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/affiliate/update', function () use ($app) {
    $db = new \DB\DB();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateAffiliatesForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

//Run the Slim application:
$app->run();
/**/
?>