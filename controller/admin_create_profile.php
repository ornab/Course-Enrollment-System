<?php
include_once ('../vendor/autoload.php');
session_start();
use App\koli\Utility;
use App\koli\Admin_details;

$_POST['master_id']=$_SESSION['master_id'];




if((isset($_FILES['image'])) && (!empty($_FILES['image']['name']))){
    $imageName= time(). $_FILES['image']['name'];
    $temporary_location= $_FILES['image']['tmp_name'];

    move_uploaded_file($temporary_location,'../resource/images/'.$imageName);


    $_POST['image']=$imageName;


}
//Utility::dd($_POST);

$obj= new Admin_details();
$obj->prepare($_POST)->store();
header('Location:../views/Admin.php');

