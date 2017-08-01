<?php
session_start();

?>

<?php include_once('header.php');?>


<?php include 'accounts_panel_navigation.php' ?>

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
                    <form role="form" action="accounts.php" method="post">
                        <div class="form-group">
                            <input type="text" name="filterByStudentId" value="" id="search" placeholder="Search">
                            <button type="submit" class="btn-primary"><i class="fa fa-search"></i></button>
                        </div>

                    </form>
                </ul>

            </nav>

        </div>

        <table class="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Amount</th>
                <th>paid</th>
                <th>due</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Admission Fee
                </td>
            </tr>



            </tbody>
        </table>



    </div>
    <?php include_once('footer.php');?>
</div>


</div>


