<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:55 PM
 */

include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/creditcard.php");
use Db\CRUD;

/*CreditCard*/
$app->get('/display/creditcards', function () use ($app) {
    get_all($app, "CreditCard", "Db\\CRUD\\GetCreditCardForDisplay");
    /*
    // query database for all cards
    $cards = Db\CRUD\GetCreditCardForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    //$jTableResult['Result'] = "OK";
    $jTableResult['data'] = $cards;
    // return JSON-encoded response body with query results
    #echo json_encode($cards[0]);
    echo json_encode($jTableResult);
    */
});

$app->get('/crud/creditcards/by/id', function () use ($app) {
    get_by_request_id($app, "CreditCard", "Db\\CRUD\\GetCreditCardById");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();

    try {
        $jTableResult['data'] = Db\CRUD\GetCreditCardById($app->request()->get('Id'));
    } catch(\Exception $ex) {
        $jTableResult['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($jTableResult);
    */
});
$app->post('/crud/creditcards/create', function () use ($app) {
    create_per_id($app, "CreditCard", "Db\\CRUD\\CreateCreditCard");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCreditCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/creditcards/update', function () use ($app) {
    update_per_id($app, "CreditCard", "Db\\CRUD\\UpdateCreditCard");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCreditCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->delete('/crud/creditcards/delete', function () use ($app) {
    delete_per_id($app, "CreditCard", "Db\\CRUD\\DeleteCreditCard");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $request->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id)
    {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteCreditCard($id);
    }

    echo json_encode($jTableResult);
*/
});



/*Issuers*/
$app->get('/display/issuers', function () use ($app) {
    get_all($app, "PointSystem", "Db\\CRUD\\GetIssuersForDisplay");
    /*
    // query database for all cards


    $cards = Db\CRUD\GetIssuersForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
    */
});
$app->get('/crud/issuer/all', function () use ($app) {
    get_all($app, "Issuer", "Db\\CRUD\\GetIssuerForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetIssuerForCrud()));
*/
});
$app->delete('/crud/issuer/delete', function () use ($app) {
    delete_per_id($app, "Issuer", "Db\\CRUD\\DeleteIssuerForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteIssuerForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/issuer/create', function () use ($app) {
    create_per_id($app, "Issuer", "Db\\CRUD\\CreateIssuerForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateIssuerForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/issuer/update', function () use ($app) {
    update_per_id($app, "Issuer", "Db\\CRUD\\UpdateIssuerForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateIssuerForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Affiliates*/
$app->get('/display/affiliates', function () use ($app) {
    get_all($app, "Affiliate", "Db\\CRUD\\GetAffiliatesForDisplay");
    /*
    // query database for all cards


    $cards = Db\CRUD\GetAffiliatesForDisplay();
    // send response header for JSON content type
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    // return JSON-encoded response body with query results
    echo json_encode($cards);
    */
});
$app->get('/crud/affiliate/all', function () use ($app) {
    get_all($app, "Affiliate", "Db\\CRUD\\GetAffiliatesForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetAffiliatesForCrud()));
*/
});
$app->delete('/crud/affiliate/delete', function () use ($app) {
    delete_per_id($app, "Affiliate", "Db\\CRUD\\DeleteAffiliatesForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id)
    {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteAffiliatesForCrud($id);
    }

    echo json_encode($jTableResult);
*/
});
$app->post('/crud/affiliate/create', function () use ($app) {
    create_per_id($app, "Affiliate", "Db\\CRUD\\CreateAffiliatesForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateAffiliatesForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/affiliate/update', function () use ($app) {
    update_per_id($app, "Affiliate", "Db\\CRUD\\UpdateAffiliatesForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateAffiliatesForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});

/*Point Mapping*/
/*
$app->get('/crud/pointmapping/by/creditcard', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointMappingForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});
$app->delete('/crud/pointmapping/by/creditcard/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    try {
        foreach($ids as $id) {
            $app->getLog()->debug("Deleting credit card " . $id);
            //throw new \Exception("don:t support delete");
            $jTableResult['row'] = Db\CRUD\DeletePointMappingForCard($id);
        }
    } catch(\Exception $ex) {
        $jTableResult['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/pointmapping/by/creditcard/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePointMappingForCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/pointmapping/by/creditcard/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePointMappingForCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
*/




/*Insurance*/
$app->get('/crud/insurance/all', function () use ($app) {
    get_all($app, "Insurance", "Db\\CRUD\\GetInsuranceForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetInsuranceForCrud()));
*/
});
$app->get('/crud/insurance/by/creditcard', function () use ($app) {
    get_by_request_id($app, "Insurance", "Db\\CRUD\\GetInsuranceForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetInsuranceForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/insurance/delete', function () use ($app) {
    delete_per_id($app, "insurance", "Db\\CRUD\\DeleteInsuranceForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteInsuranceForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/insurance/create', function () use ($app) {
    create_per_id($app, "insurance", "Db\\CRUD\\CreateInsuranceForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateInsuranceForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/insurance/update', function () use ($app) {
    update_per_id($app, "insurance", "Db\\CRUD\\UpdateInsuranceForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $id = $app->request()->put('id');
    if(!\Db\Utility\FieldUtils::ID_IS_DEFINED($id)) throw new Exception("No id found");

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateInsuranceForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Interest*/
$app->get('/crud/interest/all', function () use ($app) {
    get_all($app, "Interest", "Db\\CRUD\\GetInterestForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetInterestForCrud()));
*/
});
$app->get('/crud/interest/by/creditcard', function () use ($app) {
    get_by_request_id($app, "Interest", "Db\\CRUD\\GetInterestForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetInterestForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/interest/delete', function () use ($app) {
    delete_per_id($app, "Interest", "Db\\CRUD\\DeleteInterestForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteInterestForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/interest/create', function () use ($app) {
    create_per_id($app, "Interest", "Db\\CRUD\\CreateInterestForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateInterestForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/interest/update', function () use ($app) {
    update_per_id($app, "Interest", "Db\\CRUD\\UpdateInterestForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $id = $app->request()->put('id');
    if(!\Db\Utility\FieldUtils::ID_IS_DEFINED($id)) throw new Exception("No id found");

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateInterestForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Fee*/
$app->get('/crud/fee/all', function () use ($app) {
    get_all($app, "Fee", "Db\\CRUD\\GetFeeForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetFeeForCrud()));
*/
});
$app->get('/crud/fee/by/creditcard', function () use ($app) {
    get_by_request_id($app, "Fee", "Db\\CRUD\\GetFeeForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetFeeForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/fee/delete', function () use ($app) {
    delete_per_id($app, "Fee", "Db\\CRUD\\DeleteFeeForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFeeForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/fee/create', function () use ($app) {
    create_per_id($app, "Fee", "Db\\CRUD\\CreateFeeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateFeeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/fee/update', function () use ($app) {
    update_per_id($app, "Fee", "Db\\CRUD\\UpdateFeeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $id = $app->request()->put('id');
    if(!\Db\Utility\FieldUtils::ID_IS_DEFINED($id)) throw new Exception("No id found");

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFeeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Feature*/
$app->get('/crud/feature/all', function () use ($app) {
    get_all($app, "Feature", "Db\\CRUD\\GetFeatureForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetFeatureForCrud()));
*/
});
$app->delete('/crud/feature/delete', function () use ($app) {
    delete_per_id($app, "Feature", "Db\\CRUD\\DeleteFeatureForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFeatureForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/feature/create', function () use ($app) {
    create_per_id($app, "Feature", "Db\\CRUD\\CreateFeatureForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateFeatureForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/feature/update', function () use ($app) {
    update_per_id($app, "Feature", "Db\\CRUD\\UpdateFeatureForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFeatureForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});


$app->get('/crud/feature/by/creditcard', function () use ($app) {
    get_by_request_id($app, "FeatureByCreditCard", "Db\\CRUD\\GetFeaturesForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetFeaturesForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/feature/by/creditcard/delete', function () use ($app) {
    delete_per_id($app, "FeatureByCreditCard", "Db\\CRUD\\DeleteFeatureForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();

    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFeatureForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/feature/by/creditcard/create', function () use ($app) {
    create_per_id($app, "FeatureByCreditCard", "Db\\CRUD\\CreateFeatureForCard");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $data = $request->put('data');
        $jTableResult['row'] = Db\CRUD\CreateFeatureForCard($data);
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/feature/by/creditcard/update', function () use ($app) {
    update_per_id($app, "FeatureByCreditCard", "Db\\CRUD\\UpdateFeatureForCard");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFeatureForCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*description */
$app->get('/crud/description/by/creditcard', function () use ($app) {
    get_by_request_id($app, "DescriptionByCreditCard", "Db\\CRUD\\GetDescriptionsForCard");
    /*

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetDescriptionsForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
$app->delete('/crud/description/by/creditcard/delete', function () use ($app) {
    delete_per_id($app, "DescriptionByCreditCard", "Db\\CRUD\\DeleteDescriptionForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();

    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteDescriptionForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/description/by/creditcard/create', function () use ($app) {
    create_per_id($app, "DescriptionByCreditCard", "Db\\CRUD\\CreateDescriptionForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $data = $request->put('data');
        $jTableResult['row'] = Db\CRUD\CreateDescriptionForCrud($data);
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/description/by/creditcard/update', function () use ($app) {
    update_per_id($app, "DescriptionByCreditCard", "Db\\CRUD\\UpdateDescriptionForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateDescriptionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Campaign*/
$app->get('/crud/campaign/all', function () use ($app) {
    get_all($app, "Campaign", "Db\\CRUD\\GetCampaignForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetCampaignForCrud()));
*/
});
$app->get('/crud/campaign/by/creditcard', function () use ($app) {
    get_by_request_id($app, "Campaign", "Db\\CRUD\\GetCampaignForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCampaignForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/campaign/delete', function () use ($app) {
    delete_per_id($app, "Campaign", "Db\\CRUD\\DeleteCampaignForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteCampaignForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/campaign/create', function () use ($app) {
    create_per_id($app, "Campaign", "Db\\CRUD\\CreateCampaignForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCampaignForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/campaign/update', function () use ($app) {
    update_per_id($app, "Campaign", "Db\\CRUD\\UpdateCampaignForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCampaignForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Discount*/
$app->get('/crud/discount/all', function () use ($app) {
    get_all($app, "Discount", "Db\\CRUD\\GetDiscountForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetDiscountForCrud()));
    */
});
$app->get('/crud/discount/by/creditcard', function () use ($app) {
    get_by_request_id($app, "Discount", "Db\\CRUD\\GetDiscountForCard");
    /*

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetDiscountForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
$app->delete('/crud/discount/delete', function () use ($app) {
    delete_per_id($app, "Discount", "Db\\CRUD\\DeleteDiscountForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteDiscountForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/discount/create', function () use ($app) {
    create_per_id($app, "Discount", "Db\\CRUD\\CreateDiscountForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateDiscountForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/discount/update', function () use ($app) {
    update_per_id($app, "Discount", "Db\\CRUD\\UpdateDiscountForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateDiscountForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
