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
//Utility::d($_POST);
$coodinatorObject=new \App\koli\CourseCoordinator();
$dept_id=$coodinatorObject->getDeptid($_SESSION['username']);
//Utility::dd($coodinatorid);
$_POST['dept']=$dept_id;
//Utility::dd($_POST);
$course=new \App\koli\Course();
$alldata=$course->prepare($_POST)->loadCourseTrimisterWise();//fetch as object
$ad=array();
//$_SESSION['table']=$alldata;


?>

<?php include_once('header.php');?>

<?php include_once('managernavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <div class="form-group">
                <form method="post" action="loadCourseTrimister.php">
                <div class="form-group"><label>Semister</label> <select class="form-control" name="trim">
                        <?php
                        for($count=1;$count<=10;$count++){?>
                            <option value="<?php echo $count;?>"
                                <?php if ($_POST['trim']==$count){
                                echo "selected";
                            }
                            ?> >Semister<?php echo $count?></option>
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
                        <th>Semister</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0;foreach ($alldata as $data){$sl++;?>
                        <tr>
                            <td><?php echo $sl?></td>
                            <td><?php echo $data->c_code?></td>
                            <td><?php echo $data->c_title ?></td>
                            <td><?php echo $data->credit?></td>
                            <td><?php echo "Semister".$data->trimister?></td>

                        </tr>

                    <?php $ad[]=$data->id;}?>
                     <?php $ids=implode(",",$ad);

                     ?>

                    </tbody>
                </table>
               <!-- <a href="../controller/assignForstudent.php?info=<?php /*echo $ids;*/?>" class="btn btn-primary" role="button">Assign For Student</a>-->

                
            </div>

            
        </div>
        <div class="col-lg-2">

        </div>
    </div>

<?php include_once('footer.php');?>