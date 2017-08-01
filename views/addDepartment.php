<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
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


$obj=new DepartMentData();
$alldata=$obj->loadtable();

?>

<?php include_once('header.php');?>
        <?php include 'SuperAdminnavigation.php';?>
<div id="page-wrapper" class="gray-bg dashbard-1">
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
        </ul>

    </nav>

    <div class="container">
        <h2>Add Department</h2>
        <form class="form-horizontal" role="form" method="post" action="../controller/addDepartment.php">

            <div class="form-group">
                <label class="control-label col-sm-2" >DepartMent name:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control"  name="name" placeholder="Enter department name">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">ADD</button>
                </div>
            </div>
        </form>
        <div id="row">
            <?php include 'message_div_show.php'?>
            <table class="table">
                <thead>
                <tr>
                    <th>Sl#</th>

                    <th>DepartMent Name</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                <?php $sl=0;foreach ($alldata as $data){

                    $sl++;
                    ?>


                    <tr>
                        <td><?php echo $sl?></td>
                        
                        <td><?php echo $data['name']?></td>

                        <td>
                            <!--    <form method="post" action="controller/deleteadmin.php"> -->

                            <a href="editDepartment.php?id=<?php echo $data['id']?>" class="btn btn-primary" role="button">Edit</a>
                            <a href="../controller/deleteDepartment.php?id=<?php echo $data['id']?>" class="btn btn-danger" role="button" >Delete</a>
                            <!--    </form> -->
                        </td>
                    </tr>


                <? }?>
                </tbody>
            </table>

        </div>
    </div>
    <?php include_once('footer.php');?>
