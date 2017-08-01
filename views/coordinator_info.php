<?php
include_once '../vendor/autoload.php';
session_start();
/*var_dump($_SESSION);
die();*/
use App\koli\Student;
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


$id['id']=$_SESSION['username'];
//\App\tusar\Utility::dd($id);


$obj=new Student();
$Coordinatorinfo=$obj->prepareData($_SESSION)->getCoordinatorName();
//var_dump($Coordinatorinfo);
//die();




?>
<?php include_once('header.php');?>
    <?php include_once 'studentNavigation.php'?>

    <div id="page-wrapper" class="gray-bg dashbard-1">
    <?php include_once 'logoutrow.php' ?>
    <div class="row  border-bottom white-bg dashboard-header">





    </div>
    <div class="row">
    <div class="col-lg-12">
    <div class="wrapper wrapper-content">


    <div class="container">
    <h2>Co ordinator Info :</h2>
<ul class="list-group">
    <li class="list-group-item list-group-item-success">Name :  <?php echo $Coordinatorinfo["co_name"]?></li>
<!--<li class="list-group-item list-group-item-info">Assign For  :  <?php //echo $Coordinatorinfo['']?></li>
<li class="list-group-item list-group-item-warning"><?//php echo "Univarsity Name:"?></li>-->
<li class="list-group-item list-group-item-danger"><?php echo "Lecturer of ".$Coordinatorinfo['dept_name']?></li>
</ul>


</div>

</div>
</div>
<?php include_once('footer.php');?>
