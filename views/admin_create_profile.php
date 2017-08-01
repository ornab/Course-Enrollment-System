<?php
include_once('../vendor/autoload.php');
session_start();

use App\koli\Admin_details;
use App\tusar\Message;
use App\koli\Utility;

?>

<?php include_once('header.php');?>

<?php include_once('adminnavigation.php');?>

    <div id="page-wrapper" class="gray-bg">
<?php include_once('logoutrow.php');?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">

        </div>
        <div class="col-lg-2">

        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><?php echo $_SESSION['username'];?> Full Profile</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="../controller/admin_create_profile.php"  enctype="multipart/form-data" class="form-horizontal">
                            
                            <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10"><input type="email" name="admin_email" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group"><label class="col-sm-2 control-label">Phone No.</label>
                                <div class="col-sm-10"><input type="text" name="admin_phone" class="form-control">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Profile Picture</label>
                                <div class="col-sm-10">
                                    <label title="Upload image file" for="inputImage" class="btn btn-primary">
                                        <input type="file" accept="image/*" name="image" id="inputImage" class="hide profile_pic_input">
                                        Upload new image
                                    </label>
                                    <div>
                                        <img id="profile_pic" width="200px" height="auto;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <?php include_once('footer.php');?>