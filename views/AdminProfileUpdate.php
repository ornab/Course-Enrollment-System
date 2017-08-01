<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\AdminProfile;
use App\koli\Message;
use App\koli\Login;
use App\koli\Utility;
//use App\tusar\Login;


$updatedata= new AdminProfile();
$updatedataprofile=$updatedata->prepare($_POST)->view();

$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}



?>

<!DOCTYPE html>
<html lang="en">
<?php include_once 'header.php'?>
<?php include('adminnavigation.php');?>

<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to PCIU OCRS</span>
                </li>









                <li>
                    <a href="AdminLogOut.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                <!-- <li>
                     <a class="right-sidebar-toggle">
                         <i class="fa fa-tasks"></i>
                     </a>
                 </li>-->
            </ul>

        </nav>
    </div>
    <?php /*include_once 'logoutrow.php'*/?>

    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="container">
            <div class="col-lg-8">
                <h2>Create Profile</h2>
                <form role="form" action="../controller/adminprofileupdate.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $updatedataprofile['name']?>">
                    </div>
                    <div class="form-group">
                        <label >Email:</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $updatedataprofile['email']?>">
                    </div>
                    <div class="form-group">
                        <label >phone Number:</label>
                        <input type="text" class="form-control" name="phnnumber" value="<?php echo $updatedataprofile['phnnumber']?>">
                    </div>
                    <div class="form-group">
                        <label title="Upload image file" for="inputImage" class="btn btn-primary">
                            <input type="file"  name="image" id="inputImage" class="hide profile_pic_input">
                            Upload new image
                        </label>
                        <div>
                            <img src="../resource/images/<?php echo $updatedataprofile["image"]?>" id="profile_pic" width="200px" height="auto;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php include_once('footer.php');?>

