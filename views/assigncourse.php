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


$obj=new Course();
$dept=new \App\koli\DepartMentData();
$alldept=$dept->loadtable();
//\App\tusar\Utility::dd($alldept);

$alldata=$obj->loadtable();
//\App\tusar\Utility::dd($alldata);

$allItem=$obj->count();

//\App\Bitm\SEIP123473\Utility\Utility::dd($totalItem);
if(array_key_exists("itemPerPage",$_SESSION))
{
    if(array_key_exists("itemPerPage",$_GET))
    {
        $_SESSION["itemPerPage"]=$_GET["itemPerPage"];
    }
}
else
{
    $_SESSION["itemPerPage"]=5;
}
$itemPerPage=$_SESSION["itemPerPage"];
$noOfPage=ceil($allItem/$itemPerPage);
$pagination="";
if(array_key_exists("pageNumber",$_GET))
{
    $pageNo=$_GET["pageNumber"];
}
else{
    $pageNo=1;
}
for($i=1;$i<=$noOfPage;$i++)
{
    $active=($pageNo==$i)?"active":"";
    $pagination.="<li class='$active' }><a href='assigncourse.php?pageNumber=$i'>$i</a></li>";
}
$pageStartFrom=$itemPerPage*($pageNo-1);
if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
    $alldata = $obj->paginator($pageStartFrom, $itemPerPage);
}

?>

<?php include_once('header.php');?>

      
        <?php include 'SuperAdminnavigation.php' ?>

        <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content animated fadeInRight">

            <?php include_once 'logoutrow.php'?>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                            <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add New Courses</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">



                                                    <form role="form" method="post" action="../controller/course.php">
                                                        <div class="form-group"><label>CourseCode</label> <input type="text" name="c_code" placeholder="Enter CourseCode" class="form-control"></div>
                                                        <div class="form-group"><label>CourseTitle</label> <input type="text" name="c_title" placeholder="CourseTitle" class="form-control"></div>
                                                        <div class="form-group"><label>Credit</label> <input type="text" name="credit" placeholder="Credit" class="form-control"></div>
                                                        <div class="form-group"><label>semister</label> <select class="form-control" name="trim">
                                                               <?php
                                                               for($count=1;$count<=10;$count++){?>
                                                                <option value="<?php echo $count ?>">seimister<?php echo $count?></option>
                                                                <?php }?>

                                                            </select></div>
                                                        <div class="form-group"><label>Department</label> <select class="form-control" name="dept">
                                                                <?php foreach ($alldept as $itemdept){?>
                                                                    <option value="<?php echo $itemdept['id'] ?>"><?php echo $itemdept['name']?></option>
                                                                <?php }?>
                                                        </select></div>
                                                        <div class="form-group"><input type="Submit" value="Save" class="html5buttons"></div>



                                                    </form>
                                                </div>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <form role="form" action="assigncourse.php">
                            <div class="form-group">

                                <label for="sel1">Select list (select one):</label>
                                <select class="form-control"  id="sel1" name="itemPerPage" >
                                    <option <?php if($_SESSION["itemPerPage"]==5){echo "selected";}else {echo "";}?>>5</option>
                                    <option <?php if($_SESSION["itemPerPage"]==10){echo "selected";}else {echo "";}?>>10</option>
                                    <option <?php if($_SESSION["itemPerPage"]==15){echo "selected";}else {echo "";}?>>15</option>
                                    <option <?php if($_SESSION["itemPerPage"]==20){echo "selected";}else {echo "";}?>>20</option>
                                    <option <?php if($_SESSION["itemPerPage"]==25){echo "selected";}else {echo "";}?>>25</option>

                                </select><br>
                                <button class="btn btn-primary">Go!</button>

                            </div>
                        </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                    <tr>
                        <th>SL</th>
                       <!-- <th>ID</th>-->
                        <th>CourseCode</th>
                        <th>CourseTitle</th>
                        <th>Credit</th>
                        <th>Department</th>
                        <th>semister</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sl=0;foreach ($alldata as $data) { $sl++?>


                        <tr>
                            <td><? echo /*$data['c_code']*/ $sl?></td>
                            <td><? echo /*$data['c_code']*/ $data->c_code?></td>
                            <td><? echo /*$data['c_title']*/$data->c_title?></td>
                            <td><? echo /*$data['c_title']*/$data->credit?></td>
                            <td><? echo /*$data['dept']*/$data->dept_id ?></td>
                            <td><? echo /*$data['dept']*/$data->trimister ?></td>
                            <td>

                                <a href="editCourse.php?id=<?php echo $data->id?>" class="btn btn-primary" role="button">Edit</a>
                                <a href="../controller/deletecourse.php?c_code=<?php echo $data->c_code?>" class="btn btn-danger" role="button">Delete</a>
                            </td>
                        </tr>

                    <? } ?>




                    </tbody>

                </table>
                <div class="row" style="margin-bottom:20px;">
                    <div class="col-md-12">
                        <?php if((strtoupper($_SERVER['REQUEST_METHOD']=='GET'))&&(empty($_GET['search']))) { ?>
                            <ul class="pagination">
                                <li class="<?php if($pageNo==1) {echo "hidden";}?>"><a href="assigncourse.php?pageNumber=<?php echo $pageNo-1;?>">Prev</a></li>
                                <?php echo $pagination;?>
                                <li class="<?php if($noOfPage==$pageNo){echo "hidden";}?>"><a href="assigncourse.php?pageNumber=<?php echo $pageNo+1;?>">Next</a></li>
                            </ul>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">


                
            </div>

            <?php include_once 'footer.php'?>






    
