<?php
/*echo uniqid('CSE',true);
die();
*/?>
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



?>
<?php
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

    <title>New Admission|</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/jquery.min.js" rel="script"></script>

    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <script>
        function getState(val) {
            $.ajax({
                type: "POST",
                url: "get_state.php",
                data:'country_id='+val,
                success: function(data){
                    $("#state-list").html(data);
                }
            });
        }

        function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
        }
    </script>

</head>

<body>
<div style="height: 656px !important;">
    <div id="wrapper">
        <?php include 'accounts_panel_navigation.php';?>
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
                <div id="row">

                        <div class="col-lg-8">

                            <form role="form" action="../controller/new_addmission.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label >Name:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Student Name">
                                </div>
                                <div class="form-group">
                                    <label >Mobile Number:</label>
                                    <input type="number" class="form-control" name="mobile_no" placeholder="Mobile Number 01XXXXXXXXXX">
                                </div>
                                <div class="form-group">
                                    <label >Department:</label>
                                    <select name="dept_id" id="dept-list"  onChange="getState(this.value);" class="form-control">
                                        <option value="">Select Department</option>
                                        <?php
                                        foreach($dept as $item) {
                                            ?>
                                            <option value="<?php echo $item["id"]; ?>"><?php echo $item["name"]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Batch:</label>
                                    <select name="batch" id="state-list" class="form-control">
                                        <option value="">Select Batch</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Trimister:</label>
                                    <select name="trimister" id="state-list" class="form-control">
                                        <option value="0">Select</option>
                                        <?php
                                        for($count=1;$count<=10;$count++){?>
                                            <option value="<?php echo $count;?>">Trimister<?php echo $count?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Admission Fee:</label>
                                    <input type="text" class="form-control" name="fee" placeholder="Admission Fee">
                                </div>
                                <div class="form-group">
                                    <label >PassWord:</label>
                                    <input type="password" class="form-control" name="password" value="123" >
                                </div>
                                <!--<div class="form-group">
                                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                        <input type="file"  name="image" id="inputImage" class="hide profile_pic_input">
                                        Upload new image
                                    </label>
                                    <div>
                                        <img src="../resource/images/<?php /*echo $updatedataprofile["image"]*/?>" id="profile_pic" width="200px" height="auto;">
                                    </div>
                                </div>-->
                                <button type="submit" class="btn btn-primary">Insert</button>
                            </form>
                        </div>



                </div>

            </div>
            <?php include 'footer.php';?>
        </div>

    </div>

</div>
<?php include 'message_script.php'?>


</body>


</html>
