<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 11/28/2015
 * Time: 1:20 PM
 */

include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/mileage.php");
use Db\CRUD;



/*City*/
$app->get('/crud/city/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetCityForCrud()));
});
$app->post('/crud/city/create', function () use ($app) {
    create_per_id($app, "City", "Db\\CRUD\\CreateCityForCrud");
});
$app->delete('/crud/city/delete', function () use ($app) {
    delete_per_id($app, "City", "Db\\CRUD\\DeleteCityForCrud");
});

$app->put('/crud/city/update', function () use ($app) {
    update_per_id($app, "City", "Db\\CRUD\\UpdateCityForCrud");
});



/*Trip*/
$app->get('/crud/trip/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetTripForCrud()));
});
$app->delete('/crud/trip/delete', function () use ($app) {
    delete_per_id($app, "Trip", "Db\\CRUD\\DeleteTripForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteTripForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/trip/create', function () use ($app) {
    create_per_id($app, "Trip", "Db\\CRUD\\CreateTripForCrud");
/*
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
*/
});
$app->put('/crud/trip/update', function () use ($app) {
    update_per_id($app, "Trip", "Db\\CRUD\\UpdateTripForCrud");
/*
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
*/
});



/*Zone*/
$app->get('/crud/zone/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetZoneForCrud()));
});
$app->delete('/crud/zone/delete', function () use ($app) {
    delete_per_id($app, "Zone", "Db\\CRUD\\DeleteZoneForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteZoneForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/zone/create', function () use ($app) {
    create_per_id($app, "Zone", "Db\\CRUD\\CreateZoneForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateZoneForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/zone/update', function () use ($app) {
    update_per_id($app, "Zone", "Db\\CRUD\\UpdateZoneForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateZoneForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});


/*ZoneTripMap*/
$app->get('/crud/zonetripmap/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetZoneTripMapForCrud()));
});
$app->delete('/crud/zonetripmap/delete', function () use ($app) {
    delete_per_id($app, "ZoneTripMap", "Db\\CRUD\\DeleteZoneTripMapForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteZoneTripMapForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/zonetripmap/create', function () use ($app) {
    create_per_id($app, "Zone", "Db\\CRUD\\CreateZoneTripMapForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateZoneTripMapForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/zonetripmap/update', function () use ($app) {
    /*
    update_per_id($app, "Zone", "Db\\CRUD\\UpdateZoneForCrud");

    $request = $app->request();
    $jTableResult = array();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    try {
        $jTableResult['row'] = Db\CRUD\UpdateZoneTripMapForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});



/*Season*/
$app->get('/crud/season/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSeasonForCrud()));
});
$app->delete('/crud/season/delete', function () use ($app) {
    delete_per_id($app, "Season", "Db\\CRUD\\DeleteSeasonForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteSeasonForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/season/create', function () use ($app) {
    create_per_id($app, "Season", "Db\\CRUD\\CreateSeasonForCrud");
/*
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
*/
});
$app->put('/crud/season/update', function () use ($app) {
    update_per_id($app, "Season", "Db\\CRUD\\UpdateSeasonForCrud");
/*
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
*/
});


/*SeasonType*/
$app->get('/crud/seasontype/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSeasonTypeForCrud()));
});
$app->delete('/crud/seasontype/delete', function () use ($app) {
    delete_per_id($app, "SeasonType", "Db\\CRUD\\DeleteSeasonTypeForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteSeasonTypeForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/seasontype/create', function () use ($app) {
    create_per_id($app, "SeasonType", "Db\\CRUD\\CreateSeasonTypeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSeasonTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/seasontype/update', function () use ($app) {
    update_per_id($app, "SeasonType", "Db\\CRUD\\UpdateSeasonTypeForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateSeasonTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});




/*SeasonDate*/
$app->get('/crud/seasondate/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetSeasonDateForCrud()));
});
$app->delete('/crud/seasondate/delete', function () use ($app) {
    delete_per_id($app, "SeasonDate", "Db\\CRUD\\DeleteSeasonDateForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');

    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting season date " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteSeasonDateForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/seasondate/create', function () use ($app) {
    create_per_id($app, "SeasonDate", "Db\\CRUD\\CreateSeasonDateForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreateSeasonDateForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});
$app->put('/crud/seasondate/update', function () use ($app) {
    update_per_id($app, "SeasonDate", "Db\\CRUD\\UpdateSeasonDateForCrud");
/*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdateSeasonDateForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
*/
});



/*Mileage Rewards*/
$app->get('/crud/mileage/reward/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageRewards()));
});



/*Mileage*/
$app->get('/crud/mileage/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageForCrud()));
});
$app->delete('/crud/mileage/delete', function () use ($app) {
    delete_per_id($app, "Mileage", "Db\\CRUD\\DeleteMileageForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteMileageForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});
$app->post('/crud/mileage/create', function () use ($app) {
    create_per_id($app, "delete", "Db\\CRUD\\CreateMileageForCrud");
/*
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
*/
});
$app->put('/crud/mileage/update', function () use ($app) {
    update_per_id($app, "delete", "Db\\CRUD\\UpdateMileageForCrud");
/*
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
*/
});



/*MileageType*/
$app->get('/crud/mileage/type/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetMileageTypeForCrud()));
});
$app->delete('/crud/mileage/type/delete', function () use ($app) {
    delete_per_id($app, "Mileage", "Db\\CRUD\\DeleteMileageForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteMileageTypeForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/mileage/type/create', function () use ($app) {
    create_per_id($app, "Mileage", "Db\\CRUD\\CreateMileageForCrud");
/*
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
*/
});
$app->put('/crud/mileage/type/update', function () use ($app) {
    update_per_id($app, "Mileage", "Db\\CRUD\\UpdateMileageForCrud");
/*
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
*/
});





/*FlightCost*/
$app->get('/crud/flightcost/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetFlightCostForCrud()));
});
$app->delete('/crud/flightcost/delete', function () use ($app) {
    delete_per_id($app, "FlightCost", "Db\\CRUD\\DeleteFlightCostForCrud");
/*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("Deleting restriction type card " . $id);
        $jTableResult['row'] = Db\CRUD\DeleteFlightCostForCrud($id);
    }
    echo json_encode($jTableResult);
*/
});
$app->post('/crud/flightcost/create', function () use ($app) {
    create_per_id($app, "FlightCost", "Db\\CRUD\\CreateFlightCostForCrud");
/*
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
*/
});
$app->put('/crud/flightcost/update', function () use ($app) {
    update_per_id($app, "FlightCost", "Db\\CRUD\\UpdateFlightCostForCrud");
/*
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
*/
});















