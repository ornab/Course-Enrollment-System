<?php
include_once '../vendor/autoload.php';



$course=new \App\koli\Course();
$allCourse=$course->prepare($_POST)->loadCourseTrimisterWise();//fetch as object
//$totalcredit=$course->prepare($_GET)->totalcredit();
//\App\tusar\Utility::dd($allCourse);

$dataall=array();
$datamount=array();
foreach ($allCourse as $data){
    $dataall[]=$data->id;
    $datamount[]=$data->per;
}
//\App\tusar\Utility::d($dataall);
//\App\tusar\Utility::dd($datamount);
$accounts=new \App\koli\Accounts();
$co_id=$accounts->preparedata($_POST)->storeAdmission();
$forRegisterMaster=$accounts->storeEnrollMaster();
//\App\tusar\Utility::dd($forRegisterMaster);
$accounts->store_Enroll_details($dataall,$datamount);

$forRegisterMaster['co_id']=$co_id;
$forRegisterMaster['status']=1;
$registered=new \App\koli\Registered_Course();
$registered->prepare($forRegisterMaster)->insert_master();
$masterid=$registered->lastmasterid();
$dataall['master_id']=$masterid;
$status=1;
$registered->insert_details($dataall,$status);
use App\koli\Registration;

$_POST['std_id']=$forRegisterMaster['std_id'];

$registrtaion=new Registration();
$registrtaion->prepareData($_POST)->store_student_master();
$registrtaion->store_student_details();
header('Location:../views/accounts_panel.php');








