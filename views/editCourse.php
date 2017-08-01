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
//\App\tusar\Utility::dd($_GET)
$course=new Course();
$alldata=$course->prepare($_GET)->edit();
$departmentdata=new \App\koli\DepartMentData();
$alldept=$departmentdata->loadtable();
//\App\tusar\Utility::dd($alldata);


?>

<?php include_once('header.php');?>


<?php include 'SuperAdminnavigation.php' ?>

<div id="page-wrapper" class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">

        <?php include_once 'logoutrow.php'?>
        <div class="col-lg-6">
            <form role="form" method="post" action="../controller/updateCourse.php">
                <div class="form-group">
                    <label>CourseCode</label> <input type="text" name="c_code" value="<?php echo $alldata['c_code'] ?>" class="form-control">
                </div>
                <input type="hidden" name="id" value="<?php echo $_GET['id']?>">

                <div class="form-group">
                    <label>CourseTitle</label> <input type="text" name="c_title" value="<?php echo $alldata['c_title']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Credit</label> <input type="text" name="credit" value="<?php echo $alldata['credit']?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Trimister</label>
                    <select class="form-control" name="trim">
                        <?php for ($i=1;$i<=10;$i++){?>
                        <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php }?>
                    </select>
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







