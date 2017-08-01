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


$admin=new \App\tusar\Admin();
$singlerowFordeptid=$admin->preparedata($_SESSION)->view();
/*$allstudentId= $acc->allStudentId();
//Utility::dd($allstudentId);
$commaSeparatedStudentId= implode('","',$allstudentId);*/
//Utility::dd($commaSeparatedStudentId);
$alldataCount=$admin->count();
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
$noOfPage=ceil($alldataCount/$itemPerPage);
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
    $pagination.="<li class='$active' }><a href='accountsApproval.php?pageNumber=$i'>$i</a></li>";
}

$pageStartFrom=$itemPerPage*($pageNo-1);
if(strtoupper($_SERVER['REQUEST_METHOD']=='GET')) {

    if (isset($_GET['student_id'])){
        $admin->preparedata($_GET)->updateRequest();
        /*echo $_GET['student_id'];
        die();*/

    }
    
    $alldata = $admin->paginator($pageStartFrom, $itemPerPage,$singlerowFordeptid['dept_id']);
}

if(strtoupper($_SERVER['REQUEST_METHOD']=='POST')) {
    $alldata = $admin->loadbypaginator($singlerowFordeptid['dept_id']);
}
//var_dump($alldata);die();

?>

<?php include_once('header.php');?>


<?php include 'adminnavigation.php' ?>

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
                    <form role="form" action="accountsApproval.php" method="post">
                        <div class="form-group">
                            <input type="text" name="filterByStudentId" value="" id="search" placeholder="Search">
                            <button type="submit" class="btn-primary"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </ul>

            </nav>
            <div class="col-lg-4">
               <!-- <div class="ibox float-e-margins">

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
                    </div>-->
                    <form role="form" action="accountsApproval.php">
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
        <div id="message">

            <?
            if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                echo Message::message();
            }
            ?>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>Sl#</th>
                <th>Student ID</th>
                <th>status</th>
                <th>REQUEST</th>
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
                        <td><?php echo $item['request']?></td>

                        <td>
                            <!--    <form method="post" action="controller/deleteadmin.php"> -->

                            <a href="accountsApproval.php?student_id=<?php echo $item['student_id']?>" class="btn btn-primary" role="button">Send Request</a>

                            <!--    </form> -->
                        </td>
                    </tr>
                <?php }}?>



            </tbody>
        </table>
        <?php if((strtoupper($_SERVER['REQUEST_METHOD']=='GET'))) { ?>
            <ul class="pagination">
                <li class="<?php if($pageNo==1) {echo "hidden";}?>"><a href="accountsApproval.php?pageNumber=<?php echo $pageNo-1;?>">Prev</a></li>
                <?php echo $pagination;?>
                <li class="<?php if($noOfPage==$pageNo){echo "hidden";}?>"><a href="accountsApproval.php?pageNumber=<?php echo $pageNo+1;?>">Next</a></li>
            </ul>
        <?php }?>


    </div>
    <?php include_once('footer.php');?>
</div>


</div>


