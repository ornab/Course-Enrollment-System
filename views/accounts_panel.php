<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;
use App\koli\Admin;
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


$accounts_panel=new \App\koli\Accounts_panel();
$alldata=$accounts_panel->preparedata($_SESSION)->view();
//$_SESSION['master_id']=$alldata['id'];
//Utility::dd($alldata);

?>


<?php include_once('header.php');?>

<?php include_once('accounts_panel_navigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
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
            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item list-group-item-warning"><img src="../resource/images/2.png" alt="image" height="100px" width="100px" class="img-responsive">
                    </li>
                    <li class="list-group-item list-group-item-info">Name:<?php echo $alldata['name']?> </li>
                    <li class="list-group-item list-group-item-info">ID: <?php echo $alldata['accounted_id']?></li>



                </ul>


            </div>

        </div>
    </div>

<?php include_once('footer.php');?>