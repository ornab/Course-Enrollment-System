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
$coordinator=new \App\koli\CourseCoordinator();
$ordinator_id=$coordinator->getCo_id($_SESSION['username']);
$registered=new \App\koli\Registered_Course();
$alldata=$registered->loadmaster($ordinator_id);


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
            <h2>list</h2>
            <div id="message">

                <?
                if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                    echo Message::message();
                }
                ?>
            </div>
            <p>
                <a href="" class="btn btn-primary" role="button">Approved</a>
            </p>
            <table class="table table-bordered table-responsive table-striped">
                <thead>

                <tr class="success">
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>

                    <th>Trimister</th>
                    <th>Total Credit</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                <?php $sl=0;foreach ($alldata as $data){
                    $sl++;
                ?>
                <tr>
                    <td><?php echo $sl?></td>
                    <td><?php echo $data['std_id']?></td>
                    <td><?php echo $data['name']?></td>
                    <td><?php echo $data['trimster']?></td>
                    <td><?php echo $data['total_credit']?></td>
                    <td><?php echo $data['status']?></td>
                    <td>
                        <a href="aceptRegistration_details.php?id=<?php echo $data['id']?>" class="btn btn-primary" role="button">Details</a>
                        <a href="../controller/accept_registration.php?id=<?php echo $data['id']?>" class="btn btn-primary" role="button">Approved</a>

                    </td>
                </tr>
                <?php }?>


                </tbody>
            </table>
        </div>
    </div>
<?php include_once 'message_script.php'?>


<?php include_once('footer.php');?>