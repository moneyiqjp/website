<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:20 PM
 */

include_once(__DIR__ . "/../../Db/CRUD/restrictions.php");
use Db\CRUD;

/*RestrictionType*/
$app->get('/crud/restriction/type/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRestrictionTypeForCrud()));
});
$app->delete('/crud/restriction/type/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteRestrictionTypeForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/restriction/type/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateRestrictionTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/restriction/type/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateRestrictionTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});


/*GeneralRestriction*/
$app->get('/crud/restriction/general/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetAllGeneralRestrictions()));
});
$app->get('/crud/restriction/general/by/persona/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetGeneralRestrictionByPersonaId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});
$app->get('/crud/restriction/general/by/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetGeneralRestrictionById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});
$app->delete('/crud/restriction/general/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteGeneralRestrictionForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/restriction/general/create', function () use ($app) {
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateGeneralRestrictionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/restriction/general/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateGeneralRestrictionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

/*FeatureRestriction*/
$app->get('/crud/restriction/feature/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetAllFeatureRestrictions()));
});
$app->get('/crud/restriction/feature/by/persona/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetFeatureRestrictionForPersona($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});
$app->delete('/crud/restriction/feature/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFeatureRestrictionForPersona($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/restriction/feature/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateFeatureRestrictionForPersona($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/restriction/feature/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFeatureRestrictionForPersona($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});



/*Credit Card Restriction*/
$app->get('/crud/restriction/credit/card/general/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetAllCreditCardRestrictions()));
});

$app->get('/crud/restriction/credit/card/general/by/credit/card/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCreditCardRestrictionByCreditCardId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});

$app->get('/crud/restriction/credit/card/general/by/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCreditCardRestrictionById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});

$app->delete('/crud/restriction/credit/card/general/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteCreditCardRestrictionForCrud($id);
    }
    echo json_encode($jTableResult);
});

$app->post('/crud/restriction/credit/card/general/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCreditCardRestrictionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->put('/crud/restriction/credit/card/general/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCreditCardRestrictionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});



/*FeatureRestriction*/
$app->get('/crud/restriction/credit/card/feature/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetAllCardFeatureRestrictions()));
});
$app->get('/crud/restriction/credit/card/feature/by/credit/card/id', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCardFeatureRestrictionForCreditCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
});
$app->delete('/crud/restriction/credit/card/feature/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteCardFeatureRestrictionForCreditCard($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/restriction/credit/card/feature/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCardFeatureRestrictionForCreditCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/restriction/credit/card/feature/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCardFeatureRestrictionForCreditCard($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

?>