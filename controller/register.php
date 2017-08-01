<?php
include_once '../vendor/autoload.php';
use App\koli\Registration;
$registrtaion=new Registration();
$registrtaion->prepareData($_POST)->store_student_master();
$registrtaion->store_student_details();
header('Location:../views/login.php');