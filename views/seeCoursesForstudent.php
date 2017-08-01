<?php   use App\tusar\SuperAdminProfile;
session_start();
include_once '../vendor/autoload.php';
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
?>
<?php
/*$studentobject=new \App\tusar\Student();
$student_id=$studentobject->takestudentid($_SESSION['username']);
$studentclass=new \App\tusar\Student();
$studentdata=$studentclass->loadtable($coodinatorid);*/
?>

<?php include_once('header.php');?>

<?php include_once('studentNavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
        <?php include_once('logoutrow.php');?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>
                <form method="post" action="view_courses_trimester.php">
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
<?php include_once 'message_script.php'?>

<?php include_once('footer.php');?>