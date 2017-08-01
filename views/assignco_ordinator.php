<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
use App\koli\CourseCoordinator;
use App\koli\BatchData;
use App\koli\Message;

use App\koli\SuperAdminProfile;
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


/*//$codata="";
$obj=new DepartMentData();
$dept=$obj->loadtable();
//\App\tusar\Utility::dd($dept);
$coordintator=new CourseCoordinator();
$codata=$coordintator->loadtable();
$batch=new BatchData();
$batchdata=$batch->loadtable();*/

//\App\tusar\Utility::dd($codata);
//\App\tusar\Utility::dd($dept);
//echo $codata->id;
//die();
//paginition
//$codata="";
//var_dump($_SESSION);

$addadmin=new \App\koli\Admin();
$singlerowFordeptid=$addadmin->preparedata($_SESSION)->view();
$_SESSION['dept_id']=$singlerowFordeptid['dept_id'];
//Utility::dd($singlerowFordeptid);
$obj=new DepartMentData();
$dept=$obj->loadtable();
//\App\tusar\Utility::dd($dept);
$coordintator=new CourseCoordinator();
/*$codata=$coordintator->loadtable();*/
$batch=new BatchData();
$batchdata=$batch->loadtable();
$batchBydept=$batch->view($singlerowFordeptid['dept_id']);

//\App\tusar\Utility::dd($codata);
//\App\tusar\Utility::dd($dept);
//echo $codata->id;
//die();


$totalItem=$coordintator->prepareData($singlerowFordeptid)->count();
//Utility::dd($totalItem);
if(array_key_exists('itemPerPage',$_SESSION)){
    if(array_key_exists('itemPerPage',$_GET)){
        $_SESSION['itemPerPage']=$_GET['itemPerPage'];
    }
}
else{
    $_SESSION['itemPerPage']=5;
}

$itemPerPage= $_SESSION['itemPerPage'];


$noOfPage= ceil($totalItem/$itemPerPage);
//Utility::d($noOfPage);
$pagination="";
if(array_key_exists('pageNumber',$_GET)){
    $pageNo=$_GET['pageNumber'];
}
else{
    $pageNo=1;
}
for($i=1;$i<=$noOfPage;$i++){
    $active=($pageNo==$i)?"active":"";
    $pagination.="<li class='$active'><a href='assignco_ordinator.php?pageNumber=$i'>$i</a></li>";
}

$pageStartFrom=$itemPerPage*($pageNo-1);

$codata=$coordintator->paginator($pageStartFrom,$itemPerPage,$singlerowFordeptid['dept_id']);
$prev=$pageNo-1;
$next=$pageNo+1;


?>

<?php include_once('header.php');?>
    <?php include 'adminnavigation.php';?>

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="wrapper wrapper-content animated fadeInRight">
            <?php include 'logoutrow.php' ?>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add Co-ordinator</a>
                        </div>
                        <div id="modal-form" class="modal fade" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 b-r">



                                                <form role="form" method="post" action="../controller/addCoordinator.php">
                                                    <div class="form-group"><label>Co-Ordinator Id</label> <input type="text"  name="id" placeholder="Enter Co-Ordinator Id" class="form-control" ></div>
                                                    <div class="form-group"><label>Co-Ordinator Name</label> <input type="text"  name="name" placeholder="Co-Ordinator Name" class="form-control"></div>
                                                    <div class="form-group"><label>Set Password</label> <input type="password"  name="password" placeholder="Enter password" class="form-control"></div>
                                                    <input type="hidden" name="dept_id" value="<?php echo $singlerowFordeptid['dept_id'] ?>">
                                                        <!--<select class="form-control" name="dept">

                                                            <?php /*foreach ($dept as $depta){*/?>
                                                            <option value="<?php /*echo $depta['id']*/?>"><?php /*echo $depta['name']*/?></option>

                                                            <?php /*}*/?>
                                                        </select> </div>-->
                                                    <div class="form-group"><label>Assign Batch</label>
                                                        <!--<input type="number"  name="batch" placeholder="batch number" class="form-control" >-->
                                                        <select class="form-control" name="batch">

                                                            <?php foreach ($batchBydept as $batchBydept){?>
                                                            <option value="<?php echo $batchBydept['number']?>"><?php echo $batchBydept['number']?></option>

                                                            <?php }?>
                                                        </select> </div>



                                                    <div class="form-group"><input type="Submit" value="Save" class="html5buttons"></div>


                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>

                <form role="form" action="assignco_ordinator.php">
                    <div class="form-group ">
                        <!--<label for="sel1">Select list (select one):</label>-->
                        <select class="form-control" id="sel1" name="itemPerPage">
                            <option <?php  if($itemPerPage==5){echo "selected";}else{"";}?>>5</option>
                            <option <?php  if($itemPerPage==10){echo "selected";}else{"";}?>>10</option>
                            <option <?php  if($itemPerPage==15){echo "selected";}else{"";}?>>15</option>
                            <option <?php  if($itemPerPage==20){echo "selected";}else{"";}?>>20</option>
                            <option <?php  if($itemPerPage==25){echo "selected";}else{"";}?>>25</option>
                        </select>
                        <button type="submit">Go!</button>

                </form>
              

                <table class="table">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>Co-Ordinator ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Batch</th>
                      <!--  <th>Action</th> ->
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0;
                    if(isset($codata)){
                        foreach($codata as $da){$sl++;


                        //\App\tusar\Utility::dd($codata->id);
                        ?>


                        <tr>
                            <td><?php echo $sl?></td>
                            <td><?php echo $da->co_id?></td>
                            <td><?php echo $da->name?></td>
                            <td><?php echo $da->dept_id?></td>
                            <td><?php echo $da->number?></td>

                           <!--

                            <td>

                                <a href="../controller/editadmin.php?adminid=<?php echo $da->id?>" class="btn btn-primary" role="button">Edit</a>
                                <a href="../controller/delete_Coordinator.php?id=<?php echo $da->id?>" class="btn btn-danger" role="button" >Delete</a>

                            </td>

                            -->
                        </tr>


                    <? }}?>
                    </tbody>
                </table>
                <ul class="pagination">
                    <?php if(($pageNo>1)){echo "<li><a href='assignco_ordinator.php?pageNumber=$prev'>Prev</a></li>";}else{"";}?>
                    <?php echo $pagination?>
                    <?php if(($pageNo<$noOfPage)){echo "<li><a href='assignco_ordinator.php?pageNumber=$next'>Next</a></li>";}else{"";}?>
                </ul>

        </div>


            </div>

    <?php include_once('footer.php');?>