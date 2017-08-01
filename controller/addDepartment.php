<?php
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
$obj=new DepartMentData();
$obj->prepareData($_POST)->store();
header('Location:../views/addDepartment.php');