<?php
include_once '../vendor/autoload.php';
use App\koli\Admin;
$obj=new Admin();
//App\tusar\Utility::dd($_POST);
$obj->update($_POST);