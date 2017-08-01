<?php

include_once '../vendor/autoload.php';
use App\koli\Course;

$courseobject=new Course();

$courseobject->prepare($_POST)->insert();
header("Location: ../views/assigncourse.php");
exit;

?>
