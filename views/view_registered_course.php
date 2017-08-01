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
$registerd=new \App\koli\Registered_Course();
$alldata=$registerd->registeredCourseFrom_master($_SESSION['username']);
//Utility::dd($alldata);

?>

<?php include_once('header.php');?>

<?php include_once('studentNavigation.php');?>

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
            <h2>Previous semister Registered Course List</h2>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr class="success">
                    <th>#</th>

                    <th>semester</th>
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

                        <td><?php echo "Trimister ".$data['trimster']?></td>
                        <td><?php echo $data['total_credit']?></td>
                        <td><?php echo $data['status']?></td>
                        <td>
                            <a href="view_registered_course_details.php?id=<?php echo $data['id']?>" class="btn btn-primary" role="button">Details</a>
                            

                        </td>
                    </tr>
                <?php }?>
               
                </tbody>
            </table>
        </div>
    </div>


<?php include_once('footer.php');?>