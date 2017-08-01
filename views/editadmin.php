<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;
use App\koli\Login;


use App\koli\Course;
$login= new Login();
$status=$login->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}




?>
<?php

use App\koli\Admin;
//\App\tusar\Utility::dd($_GET);

$dept=new \App\koli\DepartMentData();
$alldept=$dept->loadtable();

$obj=new Admin();
$alldata=$obj->preparedata($_GET)->edit();

//App\tusar\Utility::dd($alldata);
?>

<?php include_once('header.php');?>


<?php include 'SuperAdminnavigation.php' ?>

<div id="page-wrapper" class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">

        <?php include_once 'logoutrow.php'?>
        <div class="col-lg-6">
            <form role="form" method="post" action="../controller/updateadmin.php">
                <div class="form-group">
                    <label>AdminId</label>
                    <input type="text" name="adminid" value="<?php echo $alldata['admin_id']?>" class="form-control">

                </div>

                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

                <div class="form-group">
                    <label>AdminName</label>
                    <input type="text"  name="name" value="<?php echo $alldata['name']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Set Password</label>
                    <input type="password"  name="pass" value="<?php echo $alldata['password']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select class="form-control" name="dept">
                        <?php foreach ($alldept as $itemdept){?>
                            <option value="<?php echo $itemdept['id'] ?>"><?php echo $itemdept['name']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group"><input type="Submit" value="Update" class="html5buttons"></div>


            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="row">

        </div>
    </div>

    <?php include_once 'footer.php'?>
