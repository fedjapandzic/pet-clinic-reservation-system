<?php

Flight::route('GET /visits' , function(){
    Flight::json(Flight::vetsService()->get_all());
});

Flight::route('GET /visits/@id' , function($id){
    Flight::json(Flight::visitsService()->get_by_id($id));
});

Flight::route('GET /visits/@visit_date' , function($visit_date){
    Flight::json(Flight::visitsService()->getVisitsByVisitDate($visit_date));
});

Flight::route('POST /visits' , function(){
    $data = Flight::request()->data->getData();
    Flight::json(Flight::visitsService()->add($data));
});

Flight::route('PUT /visits/@id' , function($id){
    $data = Flight::request()->data->getData();
    Flight::visitsService()->update($id,$data);
    Flight::json(Flight::visitsService()->get_by_id($id));
});

Flight::route('DELETE /visits/@id' , function($id){
    Flight::visitsService()->delete($id);
    Flight::json(["message" => "deleted"]);
});
?>