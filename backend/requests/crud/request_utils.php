<?php
/**
 * Created by PhpStorm.
 * User: Ben
 * Date: 6/2/2016
 * Time: 8:57 PM
 */


function get_all(\Slim\Slim $app, $type,$userFunc) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    try {
        $result = array('data' => call_user_func($userFunc));
    } catch (Exception $ex) {
        $result = array('error' => "$type: " . $ex->getMessage());
    }
    echo json_encode($result);
}



function create_per_id(\Slim\Slim $app, $type,$userFunc) {
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $jTableResult = array();
    $createdRows = array();
    try {
        $dataArray = $request->put('data');
        foreach(array_keys($dataArray) as $id) {
            $app->getLog()->debug("Create " . $type . " " . $id );
            array_push($createdRows, call_user_func($userFunc,$dataArray[$id]));
        }
        $jTableResult['data'] = $createdRows;
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
}

function delete_per_id(\Slim\Slim $app, $type, $userFunc) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');
    $jTableResult = array();
    try {
        $ids = array_keys($app->request()->get('data'));
        foreach($ids as $id) {
            $app->getLog()->debug("Deleting $type " . $id );
            call_user_func($userFunc,$id);
        }
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
}

function update_per_id(\Slim\Slim $app, $type, $userFunc) {
    $request = $app->request();
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');


    $jTableResult = array();
    $updatedRows = array();
    try {
        $dataArray = $request->put('data');
        foreach(array_keys($dataArray) as $id) {
            $app->getLog()->debug("Update $type $id");
            array_push($updatedRows,  call_user_func($userFunc,$dataArray[$id]));
        }
        $jTableResult['data'] = $updatedRows;
    } catch(\Exception $e) {
        $jTableResult['error'] = $e->getMessage();
        $app->getLog()->error($e);
    }

    echo json_encode($jTableResult);
}


function get_by_request_id(\Slim\Slim $app, $type, $userFunc) {
    $app->response()->header('Content-Type', 'application/json;charset=utf-8');

    $result = array();
    try {
        $result['data'] = call_user_func($userFunc,$app->request()->get('Id'));
    } catch (\Exception $ex) {
        $result['error'] = $ex->getMessage();
        $app->getLog()->error($ex);
    }

    echo json_encode($result);
};