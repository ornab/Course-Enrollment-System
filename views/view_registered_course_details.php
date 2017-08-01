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
//Utility::dd($_GET);
$coordinator=new \App\tusar\CourseCoordinator();
$ordinator_id=$coordinator->getCo_id($_SESSION['username']);
$registered=new \App\tusar\Registered_Course();
$alldata=$registered->registeredCourseFrom_details($_GET['id']);
//Utility::dd($alldata);


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
            <p>
                <a href="view_registered_course.php" class="btn btn-primary" role="button">Go Back</a>
            </p>
            <table class="table table-bordered table-responsive table-striped">
                <thead>

                <tr class="success">
                    <th>#</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Credit</th>

                </tr>
                </thead>

                <tbody>
                <?php $sl=0;foreach ($alldata as $data){
                    $sl++;
                    ?>
                    <tr>
                        <td><?php echo $sl?></td>
                        <td><?php echo $data['course_code']?></td>
                        <td><?php echo $data['course_title']?></td>
                        <td><?php echo $data['credit']?></td>

                    </tr>
                <?php }?>


                </tbody>
            </table>
        </div>
    </div>


<?php include_once('footer.php');?>