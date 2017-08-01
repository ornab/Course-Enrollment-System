<?php
include_once '../vendor/autoload.php';
session_start();
use App\koli\SuperAdminProfile;
use App\koli\Login;
use App\koli\Utility;
use App\koli\Message;

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

//var_dump($_SESSION);






?>

<?php include_once('header.php');?>

<?php include_once('studentNavigation_without_permission.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <div id="message">

                <?
                if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                    echo Message::message();
                }
                ?>
            </div>
            <br><br>
            <div class="alert alert-danger">
                <strong>Restrited user!</strong> You are not accesible for accounts resons,,please contact Accounts department.
            </div>

        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="container">
        <div class="col-lg-8 col-md-8">




        </div>
        <div class="col-lg-4 col-md-4">
           <!-- <img src="../../img/profile_small.jpg" class="img-rounded img-responsive img-thumbnail" alt="Cinque Terre" width="304" height="236">-->
        </div>
    </div>


<?php include_once('footer.php');?>