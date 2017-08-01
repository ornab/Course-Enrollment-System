<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
use App\koli\Message;
use App\koli\BatchData;

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
$dept=$obj->loadtable();
$batch=new BatchData();
$allbatch=$batch->loadtable();

?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AddBatch|Admin</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/jquery.min.js" rel="script"></script>

    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

</head>

<body>
<div style="height: 656px !important;">
    <div id="wrapper">
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
                <h2>Add Batch</h2>
                <form class="form-horizontal" role="form" method="post" action="../controller/addbatch.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >DepartMent name:</label>
                        <div class="col-sm-6">
                            <select class="form-control" name="dept">

                                <?php foreach ($dept as $depta){?>
                                    <option  value="<?php echo $depta['id'].",".$depta['name']?>"><?php echo $depta['name']?></option>

                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Add batch Number:</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="number" placeholder="Enter batch number">
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
                            <th>DepartMent</th>
                            <th>Total Batch</th>
                            <!--<th>Action</th>-->

                        </tr>
                        </thead>
                        <tbody>
                        <?php $sl=0;foreach ($allbatch as $all){

                            $sl++;
                            ?>


                            <tr>
                                <td><?php echo $sl?></td>
                                <td><?php echo $all['department']?></td>
                                <td><?php echo $all['total']?></td>

                             <!--
                                <td>

                                    <button class="btn btn-primary" role="button" disabled="Restricted" >Edit</button>
                                     <button class="btn btn-danger" role="button" disabled="">Delete</button>

                                </td>
                                -->
                            </tr>


                        <? }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <?php include 'footer.php';?>
        </div>

    </div>

</div>
<?php include 'message_script.php'?>

</body>


</html>
