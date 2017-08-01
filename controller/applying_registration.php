<?php
session_start();
$_GET['std_id']=$_SESSION['username'];

include_once '../vendor/autoload.php';

$course=new \App\koli\Course();
$alldata=$course->prepare($_GET)->loadCourseTrimisterWise();//fetch as object
$totalcredit=$course->prepare($_GET)->totalcredit();


$student=new \App\koli\Student();
$coid=$student->getCoordinatorId($_GET['master_id']);

$_GET['total_credit']=$totalcredit;
$registered=new \App\koli\Registered_Course();

$_GET['co_id']=$coid;
$_GET['status']=0;
$registered->prepare($_GET)->insert_master();
$masterid=$registered->lastmasterid();

$dataall=array();
foreach ($alldata as $data){
    $dataall[]=$data->id;
}
$dataall['master_id']=$masterid;
$status=0;
//$ids=implode(",",$dataall);
$registered->insert_details($dataall,$status);
header('Location:../views/seeCoursesForstudent.php');