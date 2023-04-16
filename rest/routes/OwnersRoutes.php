<?php

Flight::route('GET /owners' , function(){
    Flight::json(Flight::ownersService()->get_all());
});

Flight::route('GET /owners/@id' , function($id){
    Flight::json(Flight::ownersService()->get_by_id($id));
});

Flight::route('GET /owners/@full_name' , function($full_name){
    Flight::json(Flight::ownersService()->getUserByFullName($full_name));
});

Flight::route('POST /owners' , function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::ownersService()->add($data));
});

Flight::route('PUT /owners/@id' , function($id){
    $data = Flight::request()->data->getData();
    Flight::ownersService()->update($id,$data);
    Flight::json(Flight::ownersService()->get_by_id($id));
});

Flight::route('DELETE /owners/@id' , function($id){
    Flight::ownersService()->delete($id);
    Flight::json(["message" => "deleted"]);
});
?>