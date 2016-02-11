<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 2/9/2016
 * Time: 6:25 PM
 */

include_once(__DIR__ . "/../../Db/CRUD/store.php");
use Db\CRUD;


$app->get('/display/stores', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();

    try {
        $jTableResult['data'] = Db\CRUD\GetStoresForDisplay();
    } catch (\Exception $ex) {
        $jTableResult['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($jTableResult);
});


/*Store*/
$app->get('/crud/store/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetStoresForCrud()));
});

/*Store*/
$app->get('/crud/store/by/category', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    if(\Db\Utility\FieldUtils::ID_IS_DEFINED($app->request->get("categoryid"))) {
        echo json_encode(array('data'=> Db\CRUD\GetStoreByCategoryId($app->request->get("categoryid"))));
        return;
    }

    if(\Db\Utility\FieldUtils::ID_IS_DEFINED($app->request->get("categoryname"))) {
        echo json_encode(array('data'=> Db\CRUD\GetStoreByCategoryName($app->request->get("categoryname"))));
        return;
    }
});


$app->delete('/crud/store/delete', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting credit card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteStoreForCrud($id);
    }
    echo json_encode($jTableResult);
});

$app->post('/crud/store/create', function () use ($app) {
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateStoreForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});

$app->put('/crud/store/update', function () use ($app) {
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $id = $app->request()->put('id');
    if(!\Db\Utility\FieldUtils::ID_IS_DEFINED($id)) throw new Exception("No id found");

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateStoreForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
});
