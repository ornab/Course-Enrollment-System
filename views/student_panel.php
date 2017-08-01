<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;

use App\koli\StudentProfile;
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

$profilepicture=new StudentProfile();
$allInfo=$profilepicture->view();


?>

<?php include_once('header.php');?>
<?php include('studentNavigation.php');?>

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
                    <a href="studentLogOut.php">
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
    <div class="row  border-bottom white-bg dashboard-header">





    </div>
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
            <ul class="list-group">
                <li class="list-group-item list-group-item-warning"><img src="../resource/images/<?php echo $allInfo["image"]?>" alt="image" height="100px" width="100px" class="img-responsive">
                </li>
                <li class="list-group-item list-group-item-info">Name: <?php echo $allInfo["name"]?></li>
                <li class="list-group-item list-group-item-info">Email: <?php echo $allInfo["email"]?></li>
                <li class="list-group-item list-group-item-info">Phone Number: <?php echo $allInfo["phnnumber"]?></li>


            </ul>


        </div></div>


<?php include_once('footer.php');?>