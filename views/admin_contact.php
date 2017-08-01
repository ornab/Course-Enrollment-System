<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;
//\App\koli\Utility::dd($_SESSION);
use App\tusar\Admin_details;

$obj= new Admin_details();
$alldata=$obj->prepare($_POST)->select();
//\App\tusar\Utility::dd($alldata);?>
<?php include_once('header.php');?>

<?php include_once('adminnavigation.php');?>

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

        </div>
    </div>
    <div class="col-md-12">
        <div class="row">
             <div class="col-md-6">
                 <table class="table">
                     <tbody>
                     <tr>
                         <td>Your Email: </td><td><?php echo $alldata->admin_email;?></td>
                     </tr>
                     <tr>
                         <td>Your Phone No. </td><td><?php echo $alldata->admin_phone;?></td>
                     </tr>
                     </tbody>
                 </table>
             </div>
        </div>
    </div>

<?php include_once('footer.php');?>