<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\SuperAdminProfile;
use App\koli\Message;
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

<?php include_once('header.php');?>

<?php include_once('studentNavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="container">
        <div class="col-lg-12">
            <h2>Hello Jon your present course list</h2>
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                <tr class="success">
                    <th>#</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                    <th>Creadit</th>
                    <th>semester</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>CSE213</td>
                    <td>Optical Fiver</td>
                    <td>3</td>
                    <td>Summer</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


<?php include_once('footer.php');?>