<?php
session_start();
include_once '../vendor/autoload.php';
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
//Utility::dd($_SESSION);

$coodinatorObject=new \App\koli\CourseCoordinator();
$coodinatorid=$coodinatorObject->getCo_id($_SESSION['username']);
$studentclass=new \App\koli\Student();
$studentdata=$studentclass->loadtable();



?>

<?php include_once('header.php');?>

<?php include_once('managernavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="container">
        <div class="col-lg-12">
            <h2>Student List:</h2>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr class="success">
                    <th>#sl</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Batch</th>

                </tr>
                </thead>
                <tbody>
                <?php $sl=0;foreach ($studentdata as $data){$sl++;?>
                <tr>
                    <td><?php echo $sl?></td>
                    <td><?php echo $data['std_id']?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['batch']?></td>

                </tr>

                <?php }?>
               
                </tbody>
            </table>
        </div>
    </div>

<?php include_once('footer.php');?>