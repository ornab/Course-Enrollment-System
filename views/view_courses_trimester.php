<?php   use App\tusar\SuperAdminProfile;
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
//Utility::d($_POST);
$studentObject=new \App\koli\Student();
$dept_id=$studentObject->getDeptid($_SESSION['username']);
$master_id=$studentObject->getmasterid($_SESSION['username']);
//Utility::dd($master_id);
$_POST['dept']=$dept_id;
//Utility::dd($dept_id);
$course=new \App\koli\Course();
$alldata=$course->prepare($_POST)->loadCourseTrimisterWise();//fetch as object
//Utility::dd($alldata);
$ad=array();
//$_SESSION['table']=$alldata;


?>

<?php include_once('header.php');?>

<?php include_once('studentNavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <div class="form-group">
                <form method="post" action="view_courses_trimester.php">
                    <div class="form-group"><label>Trimister</label> <select class="form-control" name="trim">
                            <?php
                            for($count=1;$count<=10;$count++){?>
                                <option value="<?php echo $count;?>"
                                    <?php if ($_POST['trim']==$count){
                                        echo "selected";
                                    }
                                    ?> >Trimister<?php echo $count?></option>
                            <?php }?>

                        </select></div>
                    <input type="submit" class="btn btn-primary" value="Load">
                </form>

            </div>
            <div>
                <table class="table table-bordered table-responsive table-striped">
                    <thead>
                    <tr class="success">
                        <th>#sl</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Credit</th>
                        <th>Trimister</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0;foreach ($alldata as $data){$sl++;?>
                        <tr>
                            <td><?php echo $sl?></td>
                            <td><?php echo $data->c_code?></td>
                            <td><?php echo $data->c_title ?></td>
                            <td><?php echo $data->credit?></td>
                            <td><?php echo "Trimister".$data->trimister?></td>
                            <?php $trimister=$data->trimister?>

                        </tr>

                        <?php $ad[]=$data->id;}?>
                    <?php $ids=implode(",",$ad);

                    ?>

                    </tbody>
                </table>

                <a href="../controller/applying_registration.php?dept=<?php echo $dept_id;echo'&trim='; echo $trimister;echo '&master_id=';echo $master_id?>" class="btn btn-primary" role="button">Apply</a>


            </div>


        </div>
        <div class="col-lg-2">

        </div>
    </div>

<?php include_once('footer.php');?>