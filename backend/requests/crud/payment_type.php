<?php
include_once(__DIR__ . "/request_utils.php");
include_once(__DIR__ . "/../../Db/CRUD/payment_type.php");
use Db\CRUD;

/*Payment types*/
$app->get('/crud/payment/type/all', function () use ($app) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    echo json_encode(array('data'=> Db\CRUD\GetPaymentTypeForCrud()));
});

$app->delete('/crud/payment/type/delete', function () use ($app) {
    delete_per_id($app, "PaymentType", "Db\\CRUD\\DeletePaymentTypeForCrud");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $ids = $app->request()->delete('id');
    $jTableResult = array();
    //TODO handle errors
    foreach($ids as $id) {
        $app->getLog()->debug("/crud/payment/type/delete: Deleting point system " . $id);
        //TODO delete should handle also all dependent data
        $jTableResult['row'] = Db\CRUD\DeletePaymentTypeForCrud($id);
    }
    echo json_encode($jTableResult);
    */
});

$app->post('/crud/payment/type/create', function () use ($app) {
    create_per_id($app, "PaymentType", "Db\\CRUD\\CreatePaymentTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\CreatePaymentTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});

$app->put('/crud/payment/type/update', function () use ($app) {
    update_per_id($app, "PaymentType", "Db\\CRUD\\UpdatePaymentTypeForCrud");
    /*
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    try {
        $jTableResult['row'] = Db\CRUD\UpdatePaymentTypeForCrud($request->put('data'));
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
    */
});

$app->get('/crud/payment/type/by/id', function () use ($app) {
    get_by_request_id($app, "PaymentTYpe", "Db\\CRUD\\GetPaymentTypeById");
    /*
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = Db\CRUD\GetPaymentTypeById($app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
    */
});
