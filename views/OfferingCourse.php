<?php   use App\koli\SuperAdminProfile;
session_start();
include_once '../vendor/autoload.php';
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
$coodinatorObject=new \App\koli\CourseCoordinator();
$coodinatorid=$coodinatorObject->getCo_id($_SESSION['username']);
$studentclass=new \App\koli\Student();
$studentdata=$studentclass->loadtable($coodinatorid);
?>

<?php include_once('header.php');?>

<?php include_once('managernavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <form method="post" action="loadCourseTrimister.php">
            <div class="form-group">

                <div class="form-group"><label>semister</label> <select class="form-control" name="trim">
                        <option>Select semister</option>
                        <?php
                        for($count=1;$count<=10;$count++){?>
                            <option value="<?php echo $count ?>">semister<?php echo $count?></option>
                        <?php }?>

                    </select></div>

                <input type="submit" class="btn btn-primary" value="Load">
            </form>

            </div>
           
        </div>
        <div class="col-lg-2">

        </div>
    </div>

<?php include_once('footer.php');?>