<?php

ini_set('display_errors' ,1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

//pozivamo sa localhost/pet-clinic-reservation-system/op.php?op=(get/insert/delete/update) i zadamo parametre koji se zahtjevaju
//op.php je sve crud operacije koje su se nalazile odvojeno u php fajlovima kao sto su insert.php delete.php itd. Nakon pravljena op svi ostali mogu biti obrisani.

require_once("rest/dao/OwnersDao.class.php");

$dao = new OwnersDao();

$op = $_REQUEST['op'];
switch($op){
    case 'insert':  
    $full_name = $_REQUEST['full_name'];
    $age = $_REQUEST['age'];
    $dao = new OwnersDao();
    $dao->insert($full_name,$age);
    break;

    case 'delete':
        $owners_id = $_REQUEST['owners_id'];
        $dao->delete($owners_id);
        echo "DELETED $owners_id";
        break;

    case 'update':  
    $owners_id = $_REQUEST['owners_id'];
     $full_name = $_REQUEST['full_name'];
    $age = $_REQUEST['age'];
    $dao->update($owners_id,$full_name,$age);
    echo "UPDATED $owners_id";
            break;
            
    case 'get':
    default:
    $results = $dao->get_all();
    print_r($results);
     break;
}


?>