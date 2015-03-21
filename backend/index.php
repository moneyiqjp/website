<?php
require_once 'vendor/autoload.php';
require_once 'Db/Core/Db.php';
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

    $db = new \Db\Core\Db();
    $cards = $db->GetAllCards();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/allstores', function () use ($app) {
    // query database for all cards

    $db = new \Db\Core\Db();
    $cards = $db->GetAllStores();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});


$app->get('/allfeatures', function () use ($app) {
    // query database for all cards

    $db = new \Db\Core\Db();
    $cards = $db->GetAllFeatures();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/display/issuers', function () use ($app) {
    // query database for all cards

    $db = new \Db\Core\Db();
    $cards = $db->GetIssuersForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});

$app->get('/display/affiliates', function () use ($app) {
    // query database for all cards

    $db = new \Db\Core\Db();
    $cards = $db->GetAffiliatesForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
});
/*
$app->post('/display/creditcards', function () use ($app) {
    // query database for all cards

    $Db = new \Db\Core\Db();
    $cards = $Db->GetCreditCardForDisplay();
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

    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetIssuerForCrud()));
});
$app->delete('/crud/issuer/delete', function () use ($app) {
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetAffiliatesForCrud()));
});
$app->delete('/crud/affiliate/delete', function () use ($app) {
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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
    $db = new \Db\Core\Db();
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


/*InsuranceType*/
$app->get('/crud/insurance/type/all', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetInsuranceTypeForCrud()));
});
$app->delete('/crud/insurance/type/delete', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = $db->DeleteInsuranceTypeForCrud($id);
    }
    echo json_encode($jTableResult);
});

$app->post('/crud/insurance/type/create', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateInsuranceTypeForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->put('/crud/insurance/type/update', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateInsuranceTypeForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});


/*FeatureType*/
$app->get('/crud/feature/type/all', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetFeatureTypeForCrud()));
});
$app->delete('/crud/feature/type/delete', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = $db->DeleteFeatureTypeForCrud($id);
    }
    echo json_encode($jTableResult);
});

$app->post('/crud/feature/type/create', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateFeatureTypeForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->put('/crud/feature/type/update', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateFeatureTypeForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});


/*Feature*/
$app->get('/crud/feature/all', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> $db->GetFeatureForCrud()));
});
$app->delete('/crud/feature/delete', function () use ($app) {
    $db = new \Db\Core\Db();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = $db->DeleteFeatureForCrud($id);
    }
    echo json_encode($jTableResult);
});

$app->post('/crud/feature/create', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->CreateFeatureForCrud($request->put('data'));
    } catch(Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->put('/crud/feature/update', function () use ($app) {
    $db = new \Db\Core\Db();
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = $db->UpdateFeatureForCrud($request->put('data'));
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