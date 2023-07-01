<?php

Flight::route('GET /vets' , function(){
    Flight::json(Flight::vetsService()->get_all());
});

Flight::route('GET /vets/@id' , function($id){
    Flight::json(Flight::vetsService()->get_by_id($id));
});

Flight::route('GET /vets/@full_name' , function($full_name){
    Flight::json(Flight::vetsService()->getVetsByFullName($full_name));
});

Flight::route('POST /vets' , function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::vetsService()->add($data));
});

Flight::route('PUT /vets/@id' , function($id){
    $data = Flight::request()->data->getData();
    Flight::vetsService()->update($id,$data);
    Flight::json(Flight::vetsService()->get_by_id($id));
});

Flight::route('DELETE /vets/@id' , function($id){
    Flight::vetsService()->delete($id);
    Flight::json(["message" => "deleted"]);
});
?>