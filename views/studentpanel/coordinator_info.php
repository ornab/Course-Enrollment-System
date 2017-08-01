<?php

session_start();
/*var_dump($_SESSION);
die();*/
$id['id']=$_SESSION['userid'];
//var_dump($id);die();
include_once '../vendor/autoload.php';
use App\koli\Student;
$obj=new Student();
$Coordinatorinfo=$obj->prepareData($_SESSION['userid'])->getCoordinatorName();
//\App\tusar\Utility::dd($Coordinatorinfo);



?>
<?php include_once('header.php');?>
    <?php include_once 'studentNavigation.php'?>

    <div id="page-wrapper" class="gray-bg dashbard-1">
    <?php include_once 'logout row.php'?>
    <div class="row  border-bottom white-bg dashboard-header">





    </div>
    <div class="row">
    <div class="col-lg-12">
    <div class="wrapper wrapper-content">


    <div class="container">
    <h2>Co ordinator Info :</h2>
<ul class="list-group">
    <li class="list-group-item list-group-item-success">Name :  <?php echo $Coordinatorinfo['name']?></li>
<li class="list-group-item list-group-item-info">Department  :  <?php echo $Coordinatorinfo['department']?></li>
<li class="list-group-item list-group-item-warning"><?php echo $Coordinatorinfo['name']?></li>
<li class="list-group-item list-group-item-danger"><?php echo $Coordinatorinfo['name']?></li>
</ul>


</div>

</div>
</div>
<?php include_once('footer.php');?>
