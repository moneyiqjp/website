<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:38 PM
 */

include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/persona.php");
use Db\CRUD;



/* Persona */
$app->get('/crud/persona/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPersonaForCrud()));
});
$app->delete('/crud/persona/delete', function () use ($app) {
    delete_per_id($app, "Persona", "Db\\CRUD\\DeletePersonaForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Persona/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePersonaForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/persona/create', function () use ($app) {
    create_per_id($app, "PaymentType", "Db\\CRUD\\CreatePersonaForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePersonaForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});
$app->put('/crud/persona/update', function () use ($app) {
    update_per_id($app, "Persona", "Db\\CRUD\\UpdatePersonaForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePersonaForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/persona/by/id', function () use ($app) {
    get_by_request_id($app, "Persona", "Db\\CRUD\\GetPersonaById");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPersonaById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});



/* Scene */
$app->get('/crud/scene/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSceneForCrud()));
});
$app->delete('/crud/scene/delete', function () use ($app) {
    delete_per_id($app, "Scene", "Db\\CRUD\\DeleteSceneForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Scene/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteSceneForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/scene/create', function () use ($app) {
    create_per_id($app, "Scene", "Db\\CRUD\\CreateSceneForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSceneForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/scene/update', function () use ($app) {
    update_per_id($app, "Scene", "Db\\CRUD\\UpdateSceneForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateSceneForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->get('/crud/scene/by/id', function () use ($app) {
    get_by_request_id($app, "PaymentType", "Db\\CRUD\\UpdateCityForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetSceneById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});



/* SceneToCategoryMap*/
$app->get('/crud/scene/to/category/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSceneToCategoryMap()));
});
$app->delete('/crud/scene/to/category/delete', function () use ($app) {
    delete_per_id($app, "SceneToCategoryMap", "Db\\CRUD\\DeleteSceneToCategoryMap");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Scene/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteSceneToCategoryMap($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/scene/to/category/create', function () use ($app) {
    create_per_id($app, "SceneToCategoryMap", "Db\\CRUD\\CreateSceneToCategoryMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSceneToCategoryMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/* SceneToRewardCategoryMap*/
$app->get('/crud/scene/to/reward/category/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSceneToRewardCategoryMap()));
});
$app->delete('/crud/scene/to/reward/category/delete', function () use ($app) {
    delete_per_id($app, "SceneToRewardCategoryMap", "Db\\CRUD\\DeleteSceneToRewardCategoryMap");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Scene/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeleteSceneToRewardCategoryMap($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/scene/to/reward/category/create', function () use ($app) {
    create_per_id($app, "SceneToRewardCategoryMap", "Db\\CRUD\\CreateSceneToRewardCategoryMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSceneToRewardCategoryMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/* PersonaToSceneMap*/
$app->get('/crud/persona/to/scene/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPersonaToSceneMap()));
});
$app->get('/crud/persona/to/scene/by/persona/id', function () use ($app) {
    get_by_request_id($app, "PersonaToSceneMap", "Db\\CRUD\\GetPersonaToSceneMapByPersonaId");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPersonaToSceneMapByPersonaId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/persona/to/scene/delete', function () use ($app) {
    delete_per_id($app, "PersonaToSceneMap", "Db\\CRUD\\DeletePersonaToSceneMap");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Scene/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePersonaToSceneMap($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/persona/to/scene/create', function () use ($app) {
    create_per_id($app, "PersonaToSceneMap", "Db\\CRUD\\CreatePersonaToSceneMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePersonaToSceneMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/persona/to/scene/update', function () use ($app) {
    update_per_id($app, "PersonaToSceneMap", "Db\\CRUD\\UpdatePersonaToSceneMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePersonaToSceneMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/* PersonaToStoreMap*/
$app->get('/crud/persona/to/store/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPersonaToStoreMap()));
});
$app->get('/crud/persona/to/store/by/persona/id', function () use ($app) {
    get_by_request_id($app, "PersonaToStoreMap", "Db\\CRUD\\GetPersonaToStoreMapByPersonaId");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPersonaToStoreMapByPersonaId($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
*/
});
$app->delete('/crud/persona/to/store/delete', function () use ($app) {
    delete_per_id($app, "PersonaToStoreMap", "Db\\CRUD\\DeletePersonaToStoreMap");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/Store/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePersonaToStoreMap($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/persona/to/store/create', function () use ($app) {
    create_per_id($app, "PersonaToStoreMap", "Db\\CRUD\\CreatePersonaToStoreMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePersonaToStoreMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/persona/to/store/update', function () use ($app) {
    update_per_id($app, "PersonaToStoreMap", "Db\\CRUD\\UpdatePersonaToStoreMap");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePersonaToStoreMap($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
