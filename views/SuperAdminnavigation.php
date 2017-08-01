<?php
include_once '../vendor/autoload.php';
use App\koli\SuperAdminProfile;
use App\koli\Message;
use App\koli\Login;

//use App\koli\Login;


$updatedata= new SuperAdminProfile();
$updatedataprofile=$updatedata->prepare($_POST)->view();
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../resource/images/<?php echo $updatedataprofile["image"]?>" width="50px" height="50px;"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold" id="tt">
                                        <?php echo $updatedataprofile["name"]?></strong>
                             </span> <span class="text-muted text-xs block">Super Admin<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="superAdminProfileUpdate.php">Profile Update</a></li>
                       <!-- <li><a href="superAdminContacts.php">Contacts</a></li>-->

                        <li class="divider"></li>
                        <li><a href="superAdminLogOut.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li>
                <a href="assigncourse.php"><i class="fa fa-diamond"></i> <span class="nav-label">Assign Course</span></a>
            </li>
            <li>
                <a href="assignadmin.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Add New Admin</span></a>

            </li>
            <li>
                <a href="addDepartment.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Add Department</span></a>

            </li>
            <li>
                <a href="addBatch.php"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Add Batch</span></a>

            </li>

            <!--

            <li>
                <a href="accounts.php"><i class="fa fa-pie-chart"></i> <span class="nav-label">Accounts</span>  </a>
            </li>
            -->
           <!-- <li>
                <a href="metrics.html"><i class="fa fa-pie-chart"></i> <span class="nav-label">Student Course History</span>  </a>
            </li>
            


            <li>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Registration List</span><span class="fa arrow"></span></a>

            </li>

            <li>
                <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Report Generates</span><span class="fa arrow"></span></a>

            </li>-->
        </ul>
        

    </div>
    
    
</nav>