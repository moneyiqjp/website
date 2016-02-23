<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:20 PM
 */

include_once(__DIR__ . "/../../Db/CRUD/mileage.php");
use Db\CRUD;



/*City*/
$app->get('/crud/city/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetCityForCrud()));
});
$app->delete('/crud/city/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteCityForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/city/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCityForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/city/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCityForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});




/*Trip*/
$app->get('/crud/trip/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetTripForCrud()));
});
$app->delete('/crud/trip/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteTripForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/trip/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateTripForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/trip/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateTripForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});



/*Season*/
$app->get('/crud/season/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSeasonForCrud()));
});
$app->delete('/crud/season/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteSeasonForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/season/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSeasonForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/season/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateSeasonForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});





/*Mileage*/
$app->get('/crud/mileage/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageForCrud()));
});

$app->get('/crud/mileage/reward/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageRewards()));
});

$app->delete('/crud/mileage/delete', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteMileageForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/mileage/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateMileageForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/mileage/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateMileageForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});





/*MileageType*/
$app->get('/crud/mileage/type/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageTypeForCrud()));
});
$app->delete('/crud/mileage/type/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteMileageTypeForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/mileage/type/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateMileageTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/mileage/type/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateMileageTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});





/*FlightCost*/
$app->get('/crud/flightcost/all', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetFlightCostForCrud()));
});
$app->delete('/crud/flightcost/delete', function () use ($app) {

    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFlightCostForCrud($id);
    }
    echo json_encode($jTableResult);
});
$app->post('/crud/flightcost/create', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateFlightCostForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
$app->put('/crud/flightcost/update', function () use ($app) {

    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFlightCostForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});