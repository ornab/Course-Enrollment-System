<?php
include_once '../vendor/autoload.php';

use App\koli\AddAdmin;

$obj=new Admin();
$obj->delete($_GET['td']);
header("Location:../views/assignadmin.php");

