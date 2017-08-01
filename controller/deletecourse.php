<?php
include_once '../vendor/autoload.php';
use App\koli\Course;
$obj=new Course();
$obj->delete($_GET['c_code']);
header("Location:../views/assigncourse.php");