<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Message;
use App\koli\Accounts;
use App\koli\Utility;


use App\koli\SuperAdminProfile;
use App\koli\Login;


$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}


$acc=new Accounts();

$data=$acc->preparedata($_GET)->view();
//Utility::dd($alldata);



?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <script src="../js/jquery.min.js" rel="script"></script>

</head>

<body>

<div id="wrapper">


    <?php include 'SuperAdminnavigation.php' ?>

    <div id="page-wrapper" class="gray-bg">

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">


            </div>
            <?php include_once 'logoutrow.php'?>
                <div class="col-lg-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                            <div class="text-center">
                                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Give PerMission</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">



                                                    <form role="form" method="post" action="../controller/permission.php" >
                                                        <input type="hidden"  class="form-control" value="<?php echo $_GET['id']?>" name="id" >
                                                        <div class="form-group">
                                                            <label>Student Id</label> 
                                                            <input type="text"  class="form-control" disabled value="<?php echo $data['student_id']?>" name="student_id" >
                                                        </div>
                                                        <div class="form-group">
                                                            <label>PerMission</label> 
                                                            <select class="form-control" name="permission">
                                                                <option value="">select </option>
                                                                <option value="1">Allow</option>
                                                                <option value="0">Restrict</option>

                                                            </select></div>
                                                        
                                                       


                                                        <div class="form-group">
                                                            <input type="Submit" value="Update" class="html5buttons">
                                                        </div>



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
                </div></div></div></div>


<script src="../js/jquery-2.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
</body>
</html>
