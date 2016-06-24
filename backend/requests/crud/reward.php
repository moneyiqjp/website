<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:50 PM
 */

include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/reward.php");
use Db\CRUD;

/*Reward*/
$app->get('/crud/reward/all', function () use ($app) {
    get_all($app, "Reward", "Db\\CRUD\\GetRewardForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRewardForCrud()));
*/
});
$app->delete('/crud/reward/delete', function () use ($app) {
    delete_per_id($app, "Reward", "Db\\CRUD\\DeleteRewardForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Reward/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteRewardForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/reward/create', function () use ($app) {
    create_per_id($app, "Reward", "Db\\CRUD\\CreateRewardForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateRewardForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/reward/update', function () use ($app) {
    update_per_id($app, "Reward", "Db\\CRUD\\UpdateRewardForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateRewardForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/reward/by/id', function () use ($app) {
    get_by_request_id($app, "Reward", "Db\\CRUD\\GetRewardById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetRewardById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
$app->get('/crud/reward/by/pointsystem', function () use ($app) {
    get_by_request_id($app, "Reward", "Db\\CRUD\\GetRewardByPointSystemId");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetRewardByPointSystemId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});



/*RewardTypes*/
$app->get('/display/reward/type/all', function () use ($app) {
    get_all($app, "RewardTypes", "Db\\CRUD\\GetRewardTypeForDisplay");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRewardTypeForDisplay()));
*/
});
$app->get('/crud/reward/type/all', function () use ($app) {
    get_all($app, "RewardTypes", "Db\\CRUD\\GetRewardTypeForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRewardTypeForCrud()));
*/
});
$app->delete('/crud/reward/type/delete', function () use ($app) {
    delete_per_id($app, "RewardTypes", "Db\\CRUD\\DeleteRewardTypeForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/reward/type/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteRewardTypeForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/reward/type/create', function () use ($app) {
    create_per_id($app, "RewardTypes", "Db\\CRUD\\CreateRewardTypeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateRewardTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/reward/type/update', function () use ($app) {
    update_per_id($app, "RewardTypes", "Db\\CRUD\\UpdateRewardTypeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateRewardTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/reward/type/by/id', function () use ($app) {
    get_by_request_id($app, "RewardTypes", "Db\\CRUD\\GetRewardTypeById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetRewardTypeById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});



/*RewardCategory*/
$app->get('/display/reward/category/all', function () use ($app) {
    get_all($app, "RewardCategory", "Db\\CRUD\\GetRewardCategoryForDisplay");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRewardCategoryForDisplay()));
*/
});

$app->get('/crud/reward/category/all', function () use ($app) {
    get_all($app, "RewardCategory", "Db\\CRUD\\GetRewardCategoryForCrud");
/*
    $app->response()->header('Content-Category', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetRewardCategoryForCrud()));
*/
});
$app->delete('/crud/reward/category/delete', function () use ($app) {
    delete_per_id($app, "RewardCategory", "Db\\CRUD\\DeleteRewardCategoryForCrud");
/*
    $app->response()->header('Content-Category', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/reward/category/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteRewardCategoryForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/reward/category/create', function () use ($app) {
    create_per_id($app, "RewardCategory", "Db\\CRUD\\CreateRewardCategoryForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Category', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateRewardCategoryForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/reward/category/update', function () use ($app) {
    update_per_id($app, "RewardCategory", "Db\\CRUD\\UpdateRewardCategoryForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Category', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateRewardCategoryForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/reward/category/by/id', function () use ($app) {
    get_by_request_id($app, "RewardCategory", "Db\\CRUD\\GetRewardCategoryById");
    /*

    $app->response()->header('Content-Category', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetRewardCategoryById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});