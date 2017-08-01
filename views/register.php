<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
use App\koli\Message;
use App\koli\BatchData;

use App\koli\SuperAdminProfile;
use App\koli\Login;
use App\koli\Utility;

/*$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to log in before view this page
</div>");
    return Utility::redirect('login.php');
}*/


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

    <title>INSPINIA | Register</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
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

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Register to IN+</h3>
            <p>Create account to see it in action.</p>
            <form class="m-t" role="form" action="../controller/register.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" required="">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="userid" placeholder="User Id" required="">
                </div>
                <div class="form-group">

                    <select name="dept_id" id="dept-list"  onChange="getState(this.value);" class="form-control">
                        <option value="">Select Department</option>
                        <?php
                        foreach($dept as $country) {
                            ?>
                            <option value="<?php echo $country["id"]; ?>"><?php echo $country["name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>

                </div>
                <div class="form-group">
                    <select name="batch" id="state-list" class="form-control">
                        <option value="">Select Batch</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" name="pass" placeholder="Password" required="">
                </div>
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

                <p class="text-muted text-center"><small>Already have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="login.php">Login</a>
            </form>
            <p class="m-t"> <small></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>
