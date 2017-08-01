<?php
include_once('../vendor/autoload.php');
session_start();
use App\koli\Login;
use App\koli\Utility;

$obj= new Login();
$status=$obj->logout();
if($status){
    return Utility::redirect("login.php");
}


