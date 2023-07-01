<?php

Flight::route('GET /animals' , function(){
    Flight::json(Flight::animalsService()->get_all());
});

Flight::route('GET /animals/@id' , function($animals_id){
    Flight::json(Flight::animalsService()->get_by_id($animals_id));
});

Flight::route('GET /animals/@full_name' , function($animals_id){
    Flight::json(Flight::animalsService()->getAnimalsById($animals_id));
});

Flight::route('POST /animals' , function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::animalsService()->add($data));
});

Flight::route('PUT /animals/@id' , function($id){
    $data = Flight::request()->data->getData();
    Flight::ownersService()->update($id,$data);
    Flight::json(Flight::animalsService()->get_by_id($id));
});

Flight::route('DELETE /animals/@id' , function($id){
    Flight::animalsService()->delete($id);
    Flight::json(["message" => "deleted"]);
});
?>