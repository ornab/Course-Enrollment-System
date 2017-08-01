<?php
session_start();
include_once '../vendor/autoload.php';

$coodinatorObject=new \App\koli\CourseCoordinator();
$coodinatorid=$coodinatorObject->getCo_id($_SESSION['username']);
$studentclass=new \App\koli\Student();
$student_data=$studentclass->takestudentid($coodinatorid);
$student_ids=implode(",",$student_data);
$status=0;
$offer_course=new \App\koli\Offer_course();
$result=$offer_course->insert($_GET['info'],$student_ids,$status);
if ($result==true){
    header('Location:../views/Co-ordinator.php');
}
else echo "kkkkkkkkkk";
/*echo $student_ids;
echo $_GET['info'];*/
