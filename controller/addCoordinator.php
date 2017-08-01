<?php
include_once '../vendor/autoload.php';

use App\koli\CourseCoordinator;
$coordinator=new CourseCoordinator();
$coordinator->prepareData($_POST)->store();
header('Location:../views/assignco_ordinator.php');