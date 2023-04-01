<?php

ini_set('display_errors' ,1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once 'dao/OwnersDao.class.php';
require_once '..\vendor\autoload.php';

Flight::register('ownersDao', 'OwnersDao');

//CRUD operations for owners entity

//List all owners
Flight::route('GET /owners',function(){
    $owners = Flight::ownersDao() ->get_all();
    Flight::json($owners);
});

//List individual owners
Flight::route('GET /owners/@owners_id',function($owners_id){
    $owner = Flight::ownersDao() ->get_by_id($owners_id);
    Flight::json($owner);
});

//Insert owners
Flight::route('POST /owners',function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::ownersDao()->insert($data));
});

//Update owners
Flight::route('PUT /owners/@owners_id',function($owners_id){
    $data = Flight::request()->data->getData();
    Flight::ownersDao()->update($owners_id,$data['full_name'],$data['age']);
    print_r($owners_id);
    Flight::json($data);
});

//Delete owners
Flight::route('DELETE /owners/@owners_id',function($owners_id){
    Flight::ownersDao()->delete($owners_id);
    Flight::json(["message" => "Deleted"]);
});

Flight::start();
?>