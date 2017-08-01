<?php
include_once('../vendor/autoload.php');
use App\koli\SuperAdminProfile;
use App\koli\Message;
use App\koli\Login;
use App\koli\Utility;

$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}



?>


<?php

$profilePicture=new SuperAdminProfile();
$allInfo=$profilePicture->prepare($_POST)->view();


    $imageName=time().$_FILES["image"]["name"];
    $temporaryLocation=$_FILES["image"]["tmp_name"];
    unlink($_SERVER['DOCUMENT_ROOT'].'/CourseEnrollmentSystem/resource/images/'.$allInfo['image']);
    move_uploaded_file($temporaryLocation,"../resource/images/".$imageName);
    $_POST["image"]=$imageName;

    //Utility::dd($_POST);

    $profilePicture=new SuperAdminProfile();
    $profilePicture->prepare($_POST)->update();
?>