<?php
include_once '../vendor/autoload.php';
use App\koli\Course;

$courseobject=new Course();
//App\tusar\Utility::dd($_POST);
$courseobject->prepare($_POST)->update();
//header('Location:../../views/assigncourse.php');
