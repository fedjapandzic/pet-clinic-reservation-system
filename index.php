<?php

require 'vendor/autoload.php';


Flight::route('/',  function(){
    echo "Vedran, Fedja, Sanjin :)";
});

Flight::start();
?>