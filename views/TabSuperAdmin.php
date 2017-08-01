<?php

session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;
use App\koli\Accounts;
use App\koli\Utility;
use App\koli\Login;
/*$acc=new Accounts();
$alldata=$acc->loadtable();*/
//before paginition
$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}


$acc=new Accounts();
$allstudentId= $acc->allStudentId();
//Utility::dd($allstudentId);
$commaSeparatedStudentId= implode('","',$allstudentId);
//Utility::dd($commaSeparatedStudentId);
$alldata=$acc->count();
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
$noOfPage=ceil($alldata/$itemPerPage);
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
    $pagination.="<li class='$active' }><a href='TabSuperAdmin.php?pageNumber=$i'>$i</a></li>";
}
$pageStartFrom=$itemPerPage*($pageNo-1);
if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {
    $alldata = $acc->paginator($pageStartFrom, $itemPerPage);
}

if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
    $alldata = $acc->loadtable();
}
$requestbyadmin=$acc->paginatorForAdminRequest();


?>
<?php include_once('header.php');?>


<?php include 'SuperAdminnavigation.php' ?>

<div id="page-wrapper" class="gray-bg">

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">


        </div>
        <div class="row">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to PCIU OCRS</span>
                    </li>









                    <li>
                        <a href="superAdminLogOut.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                    <!--   <li>
                          <a class="right-sidebar-toggle">
                              <i class="fa fa-tasks"></i>
                          </a>
                      </li> -->
                    <form role="form" action="TabSuperAdmin.php" method="post">
                        <div class="form-group">
                            <input type="text" name="filterByStudentId" value="" id="search" placeholder="Search">
                            <button type="submit" class="btn-primary"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </ul>

            </nav>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">

                    <div class="ibox-content">
                        <div class="text-center">
                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Import From Excel</a>
                        </div>
                        <div id="modal-form" class="modal fade" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12 b-r">



                                                <form role="form" method="post" action="../controller/readDataFromXl.php" enctype="multipart/form-data">
                                                    <div class="form-group"><label>CourseCode</label> <input type="file"  class="form-control" name="xl"></div>


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
        </div>

<div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1"> All Accounts</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-2" > Requested By Admins</a></li>
                                <!--<li class=""><a data-toggle="tab" href="#tab-3"> EEE</a></li>
                                <li class=""><a data-toggle="tab" href="#tab-4"> CIVIL</a></li>-->
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">

                                        <fieldset class="form-horizontal">
                                            <form role="form" action="TabSuperAdmin.php" method="get">
                                            <div class="form-group"><label class="col-sm-2 control-label">show:</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" >
                                                        <option <?php if($_SESSION["itemPerPage"]==5){echo "selected";}else {echo "";}?>>5</option>
                                                        <option <?php if($_SESSION["itemPerPage"]==10){echo "selected";}else {echo "";}?>>10</option>
                                                        <option <?php if($_SESSION["itemPerPage"]==15){echo "selected";}else {echo "";}?>>15</option>
                                                        <option <?php if($_SESSION["itemPerPage"]==20){echo "selected";}else {echo "";}?>>20</option>
                                                        <option <?php if($_SESSION["itemPerPage"]==25){echo "selected";}else {echo "";}?>>25</option>
                                                    </select>

                                                    <button type="submit" class="btn-primary">Go</button>
                                                </div>
                                            </div>
                                                </form>

                                            <div id="message">

            <?
            if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                echo Message::message();
            }
            ?>
        </div>

                                            <table class="table table-stripped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Sl#</th>
                                                    <th>Student ID</th>
                                                    <th>status</th>
                                                    <th>Permission</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sl=0;
                                                if(isset($alldata)&& !empty($alldata)){
                                                    foreach ($alldata as $item){ $sl++?>



                                                        <tr>
                                                            <td><?php echo $sl?></td>
                                                            <td><?php echo $item['student_id']?></td>
                                                            <td><?php echo $item['status']?></td>
                                                            <td><?php echo $item['permission']?></td>

                                                            <td>
                                                                <!--    <form method="post" action="controller/deleteadmin.php"> -->

                                                                <a href="permission.php?id=<?php echo $item['accounts_id']?>" class="btn btn-primary" role="button">PerMission</a>

                                                                <!--    </form> -->
                                                            </td>
                                                        </tr>
                                                    <?php }}?>



                                                </tbody>
                                            </table>
                                            <?php if((strtoupper($_SERVER['REQUEST_METHOD']=='GET'))) { ?>
                                                <ul class="pagination">
                                                    <li class="<?php if($pageNo==1) {echo "hidden";}?>"><a href="TabSuperAdmin.php?pageNumber=<?php echo $pageNo-1;?>">Prev</a></li>
                                                    <?php echo $pagination;?>
                                                    <li class="<?php if($noOfPage==$pageNo){echo "hidden";}?>"><a href="TabSuperAdmin.php?pageNumber=<?php echo $pageNo+1;?>">Next</a></li>
                                                </ul>
                                            <?php }?>







                                        </fieldset>

                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">

                                        <fieldset class="form-horizontal">

                                            <?php
/*                                            $cse="CSE";
                                            $department=new \App\tusar\DepartMentData();
                                            $dept_id=$department->getDepartmentId($cse);
                                            $requestbyadmin=$acc->paginatorForAdminRequest($dept_id);

                                            */?>

                                            <table class="table table-stripped table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Sl#</th>
                                                    <th>Student ID</th>
                                                    <th>status</th>
                                                    <th>Admin Action</th>
                                                    <th>Permission</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sl=0;
                                                if(isset($requestbyadmin)&& !empty($requestbyadmin)){
                                                    foreach ($requestbyadmin as $item){ $sl++?>



                                                        <tr>
                                                            <td><?php echo $sl?></td>
                                                            <td><?php echo $item['student_id']?></td>
                                                            <td><?php echo $item['status']?></td>
                                                            <td><?php echo $item['request']?></td>
                                                            <td><?php echo $item['permission']?></td>

                                                            <td>
                                                                <!--    <form method="post" action="controller/deleteadmin.php"> -->

                                                                <a href="permission.php?id=<?php echo $item['accounts_id']?>" class="btn btn-primary" role="button">PerMission</a>

                                                                <!--    </form> -->
                                                            </td>
                                                        </tr>
                                                    <?php }}?>



                                                </tbody>
                                            </table>


                                        </fieldset>


                                    </div>
                                </div>
                               <!-- <div id="tab-3" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-stripped table-bordered">

                                                <thead>
                                                <?php
/*                                                $eee="EEE";
                                                $department=new \App\tusar\DepartMentData();
                                                $dept_id=$department->getDepartmentId($eee);
                                                $requestbyadmin=$acc->paginatorForAdminRequest($dept_id);

                                                */?>
                                                <tr>
                                                    <th>Sl#</th>
                                                    <th>Student ID</th>
                                                    <th>status</th>
                                                    <th>Admin Action</th>
                                                    <th>Permission</th>
                                                    <th>Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
/*                                                $sl=0;
                                                if(isset($requestbyadmin)&& !empty($requestbyadmin)){
                                                    foreach ($requestbyadmin as $item){ $sl++*/?>



                                                        <tr>
                                                            <td><?php /*echo $sl*/?></td>
                                                            <td><?php /*echo $item['student_id']*/?></td>
                                                            <td><?php /*echo $item['status']*/?></td>
                                                            <td><?php /*echo $item['request']*/?></td>
                                                            <td><?php /*echo $item['permission']*/?></td>

                                                            <td>
                                                                <!--    <form method="post" action="controller/deleteadmin.php"> -->

                                                               
                                        </div>

                                    </div>
                                </div>
                                <div id="tab-4" class="tab-pane">
                                    <div class="panel-body">

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-stripped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        Image preview
                                                    </th>
                                                    <th>
                                                        Image url
                                                    </th>
                                                    <th>
                                                        Sort order
                                                    </th>
                                                    <th>
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/2s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image1.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="1">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/1s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image2.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="2">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/3s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image3.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="3">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/4s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image4.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="4">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/5s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image5.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="5">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/6s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image6.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="6">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="img/gallery/7s.jpg">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" disabled value="http://mydomain.com/images/image7.png">
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" value="7">
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-white"><i class="fa fa-trash"></i> </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>-->
                            </div>
                    </div>
                </div>
            </div>
    </div>

<?php
include_once 'message_script.php';

?>

</div>


</div>
<div class="row">
    <?php include_once('footer.php');?>
</div>

