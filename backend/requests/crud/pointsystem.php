<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 6/4/2016
 * Time: 12:52 PM
 */

use Db\CRUD;
include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/pointsystem.php");

/*PointSystem*/
$app->get('/crud/pointsystem/all', function () use ($app) {
    get_all($app, "PointSystem", "Db\\CRUD\\GetPointSystemForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPointSystemForCrud()));
    */
});
$app->delete('/crud/pointsystem/delete', function () use ($app) {
    delete_per_id($app, "PointSystem", "Db\\CRUD\\DeletePointSystemForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/pointsystem/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePointSystemForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/pointsystem/create', function () use ($app) {
    create_per_id($app, "PointSystem", "Db\\CRUD\\CreatePointSystemForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePointSystemForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/pointsystem/update', function () use ($app) {
    update_per_id($app, "PointSystem", "Db\\CRUD\\UpdatePointSystemForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePointSystemForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/pointsystem/by/creditcard', function () use ($app) {
    get_by_request_id($app, "PointSystem", "Db\\CRUD\\GetPointSystemForCard");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointSystemForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
$app->get('/crud/pointsystem/by/id', function () use ($app) {
    get_by_request_id($app, "PointSystem", "Db\\CRUD\\GetPointSystemById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointSystemById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});




/*PointAcquisition*/
$app->get('/crud/pointacquisition/all', function () use ($app) {
    get_all($app, "PointAcquisition", "Db\\CRUD\\GetPointAcquisitionForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPointAcquisitionForCrud()));
    */
});
$app->delete('/crud/pointacquisition/delete', function () use ($app) {
    delete_per_id($app, "PointAcquisition", "Db\\CRUD\\DeletePointAcquisitionForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/PointAcquisition/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePointAcquisitionForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/pointacquisition/create', function () use ($app) {
    create_per_id($app, "PointAcquisition", "Db\\CRUD\\CreatePointAcquisitionForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePointAcquisitionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/pointacquisition/update', function () use ($app) {
    update_per_id($app, "PointAcquisition", "Db\\CRUD\\UpdatePointAcquisitionForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePointAcquisitionForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/pointacquisition/by/id', function () use ($app) {
    get_by_request_id($app, "PointAcquisition", "Db\\CRUD\\GetPointAcquisitionById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointAcquisitionById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->get('/crud/pointacquisition/by/pointsystem', function () use ($app) {
    get_by_request_id($app, "PointAcquisition", "Db\\CRUD\\GetPointAcquisitionByPointSystemId");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointAcquisitionByPointSystemId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});




/*PointUsage*/
$app->get('/crud/pointusage/all', function () use ($app) {
    get_all($app, "PointUsage", "Db\\CRUD\\GetPointUsageForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPointUsageForCrud()));
    */
});
$app->delete('/crud/pointusage/delete', function () use ($app) {
    delete_per_id($app, "PointUsage", "Db\\CRUD\\DeletePointUsageForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/PointUsage/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePointUsageForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/pointusage/create', function () use ($app) {
    create_per_id($app, "PointUsage", "Db\\CRUD\\CreatePointUsageForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePointUsageForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/pointusage/update', function () use ($app) {
    update_per_id($app, "PointUsage", "Db\\CRUD\\UpdatePointUsageForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePointUsageForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/pointusage/by/id', function () use ($app) {
    get_by_request_id($app, "PointUsage", "Db\\CRUD\\GetPointUsageById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointUsageById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->get('/crud/pointusage/by/pointsystem', function () use ($app) {
    get_by_request_id($app, "PointUsage", "Db\\CRUD\\GetPointUsageByPointSystemId");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPointUsageByPointSystemId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});




/*PointSystemMapping*/
$app->get('/crud/creditcard/pointsystem/mapping/all', function () use ($app) {
    get_all($app, "PointSystemMapping", "Db\\CRUD\\GetCardPointSystemMappingForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetCardPointSystemMappingForCrud()));
    */
});
$app->delete('/crud/creditcard/pointsystem/mapping/delete', function () use ($app) {
    delete_per_id($app, "PointSystemMapping", "Db\\CRUD\\DeleteCardPointSystemMappingForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/pointsystem/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteCardPointSystemMappingForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/creditcard/pointsystem/mapping/create', function () use ($app) {
    create_per_id($app, "PointSystemMapping", "Db\\CRUD\\CreateCardPointSystemMappingForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateCardPointSystemMappingForCrud($request->post('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->put('/crud/creditcard/pointsystem/mapping/update', function () use ($app) {
    update_per_id($app, "PointSystemMapping", "Db\\CRUD\\UpdateCardPointSystemMappingForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateCardPointSystemMappingForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->get('/crud/creditcard/pointsystem/mapping/by/creditcard', function () use ($app) {
    get_by_request_id($app, "PointSystemMapping", "Db\\CRUD\\GetCardPointSystemMappingForCard");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCardPointSystemMappingForCard($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
$app->get('/crud/creditcard/pointsystem/mapping/by/pointsystem', function () use ($app) {
    get_by_request_id($app, "PointSystemMapping", "Db\\CRUD\\GetCardPointSystemMappingForPointSystem");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetCardPointSystemMappingForPointSystem($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
