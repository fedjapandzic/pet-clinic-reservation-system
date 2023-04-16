<?php

ini_set('display_errors' ,1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require '../vendor/autoload.php';

require_once __DIR__ . './services/OwnersService.class.php';

Flight::register('ownersService' , 'OwnersService');

//import all routes

require_once __DIR__ . '/routes/OwnersRoutes.php';
 /*
Flight::route('GET/',function(){
    echo "Hello Sanjin Vedran Fedja";
});
*/
Flight::start();
?>