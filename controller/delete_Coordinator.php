<?php
include_once '../vendor/autoload.php';

use App\koli\CourseCoordinator;

//\App\tusar\Utility::dd($_GET['id']);

$obj=new CourseCoordinator();
$obj->prepareData($_GET)->delete();
header("Location:../views/assignco_ordinator.php");

