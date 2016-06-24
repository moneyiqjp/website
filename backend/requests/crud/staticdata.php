<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 9:46 AM
 */

include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/staticdata.php");
use Db\CRUD;


/*Unit*/
$app->get('/crud/unit/all', function () use ($app) {
    get_all($app, "Unit", "Db\\CRUD\\GetUnitForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetUnitForCrud()));
    */
});
$app->delete('/crud/unit/delete', function () use ($app) {
    delete_per_id($app, "Unit", "Db\\CRUD\\DeleteUnitForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/unit/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteUnitForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/unit/create', function () use ($app) {
    create_per_id($app, "Unit", "Db\\CRUD\\CreateUnitForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateUnitForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->put('/crud/unit/update', function () use ($app) {
    update_per_id($app, "Unit", "Db\\CRUD\\UpdateUnitForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateUnitForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->get('/crud/unit/by/id', function () use ($app) {
    get_by_request_id($app, "Unit", "Db\\CRUD\\GetUnitById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetUnitById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});



/*FeatureType*/
$app->get('/crud/feature/type/all', function () use ($app) {
    get_all($app, "FeatureType", "Db\\CRUD\\GetFeatureTypeForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetFeatureTypeForCrud()));
    */
});
$app->delete('/crud/feature/type/delete', function () use ($app) {
    delete_per_id($app, "FeatureType", "Db\\CRUD\\DeleteFeatureTypeForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting feature type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFeatureTypeForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/feature/type/create', function () use ($app) {
    create_per_id($app, "FeatureType", "Db\\CRUD\\CreateFeatureTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateFeatureTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->put('/crud/feature/type/update', function () use ($app) {
    update_per_id($app, "FeatureType", "Db\\CRUD\\UpdateFeatureTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateFeatureTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});


/*InsuranceType*/
$app->get('/crud/insurance/type/all', function () use ($app) {
    get_all($app, "InsuranceType", "Db\\CRUD\\GetInsuranceTypeForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetInsuranceTypeForCrud()));
    */
});
$app->delete('/crud/insurance/type/delete', function () use ($app) {
    delete_per_id($app, "InsuranceType", "Db\\CRUD\\DeleteInsuranceTypeForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteInsuranceTypeForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/insurance/type/create', function () use ($app) {
    create_per_id($app, "InsuranceType", "Db\\CRUD\\CreateInsuranceTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateInsuranceTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->put('/crud/insurance/type/update', function () use ($app) {
    update_per_id($app, "InsuranceType", "Db\\CRUD\\UpdateInsuranceTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateInsuranceTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
