<?php
session_start();
use App\koli\SuperAdminProfile;
include_once '../vendor/autoload.php';
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
//Utility::dd($_SESSION);


?>

<?php include_once('header.php');?>

<?php include_once('managernavigation.php');?>

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

        </div>
        <div class="col-lg-2">

        </div>
    </div>

<?php include_once('footer.php');?>