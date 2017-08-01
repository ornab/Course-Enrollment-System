



<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../resource/images/1.png" width="50px" height="50px"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold" id="tt">
                                        <?php echo $_SESSION['username'];?></strong>
                             </span> <span class="text-muted text-xs block">Accounted<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="admin_create_profile.php">Profile</a></li>
                        <li><a href="admin_contact.php">Contacts</a></li>

                        <li class="divider"></li>
                        <li><a href="superAdminLogOut.php">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li>
                <a href="new_addmission.php"><i class="fa fa-diamond"></i> <span class="nav-label">New Addmission</span></a>
            </li>
            <!-- <li>
                 <a href="addBatch.php"><i class="fa fa-diamond"></i> <span class="nav-label">Add Batch</span></a>
             </li>-->


            <li>
                <a href="student_history.php"><i class="fa fa-pie-chart"></i> <span class="nav-label">Student History</span>  </a>
            </li>
            <li>
                <a href="payment.php"><i class="fa fa-pie-chart"></i> <span class="nav-label">Payment</span>  </a>
            </li>



            <!--<li>
                 <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Report Submit</span><span class="fa arrow"></span></a>
 
             </li>-->
        </ul>

    </div>
</nav>
    