<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;

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
$data=$obj->edit($_GET);
foreach ($data as $item){
    $x=$item;
}

?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AddBatch|Form</title>

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
        <?php include '../views/SuperAdminnavigation.php';?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <?php include_once 'logoutrow.php'?>

            <div class="container">
                <h2>Add Batch</h2>
                <form class="form-horizontal" role="form" method="post" action="../controller/editDepartment.php">

                    <div class="form-group">
                        <label class="control-label col-sm-2" >DepartMent name:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  name="name" value="<?php echo $x['name']?>" ">
                            <input type="hidden" class="form-control"  name="id" value="<?php echo $x['id']?>" ">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
                <div id="row">

                </div>
            </div>
            <?php include '../views/footer.php';?>
        </div>

    </div>

</div>


</body>


</html>
