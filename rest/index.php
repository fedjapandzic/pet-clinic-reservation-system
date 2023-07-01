<?php

ini_set('display_errors' ,1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require '../vendor/autoload.php';

require_once __DIR__ . './services/OwnersService.class.php';
require_once __DIR__ . './services/AnimalsService.class.php';
require_once __DIR__ . './services/VetsService.class.php';
require_once __DIR__ . './services/VisitsService.class.php';

Flight::register('ownersService' , 'OwnersService');
Flight::register('animalsService' , 'AnimalsService');
Flight::register('vetsService' , 'VetsService');
Flight::register('visitsService' , 'VisitsService');

//import all routes

require_once __DIR__ . '/routes/OwnersRoutes.php';
require_once __DIR__ . '/routes/AnimalsRoutes.php';
require_once __DIR__ . '/routes/VetsRoutes.php';
require_once __DIR__ . '/routes/VisitsRoutes.php';
 /*
Flight::route('GET/',function(){
    echo "Hello Sanjin Vedran Fedja";
});
*/
Flight::start();
?>