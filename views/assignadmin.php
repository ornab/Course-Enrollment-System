<?php
session_start();
    include_once '../vendor/autoload.php';
use App\koli\Admin;
use App\koli\Message;
use App\koli\DepartMentData;

use App\koli\SuperAdminProfile;
use App\koli\Login;
use App\koli\Utility;

$obj= new Login();
$status=$obj->is_loggedin();
if($status== FALSE) {
    Message::message("<div class=\"alert alert-success\">
  <strong>Hey!</strong>You have to login before view this page
</div>");
    return Utility::redirect('login.php');
}


/*var_dump($_SESSION);
die();*/

$depertment=new DepartMentData();
$dept=$depertment->loadtable();
/*var_dump($dept);
die();*/
$obj=new Admin();

/*var_dump($dept);
die();*/

$alldata=$obj->loadtable();

?>
<?php include_once('header.php');?>
    <?php include 'SuperAdminnavigation.php'
?>



    <div id="page-wrapper" class="gray-bg">


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">


            </div>
            <?php include_once 'logoutrow.php'?>
           

                <div class="col-lg-4">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                            <div class="text-center">
                                <a data-toggle="modal" class="btn btn-primary" href="#modal-form">Add New Admin</a>
                            </div>
                            <div id="modal-form" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12 b-r">



                                                    <form role="form" method="post" action="../controller/addadmin.php">
                                                        <div class="form-group"><label>AdminId</label> <input type="text" name="admin_id" placeholder="Enter AdminId" class="form-control"></div>
                                                        <div class="form-group"><label>AdminName</label> <input type="text"  name="admin_name" placeholder="AdminName" class="form-control"></div>
                                                        <div class="form-group"><label>Set Password</label> <input type="password"  name="admin_pass" placeholder="Enter password" class="form-control"></div>
                                                        <div class="form-group"><label>Department</label>


                                                            <select class="form-control" name="dept">
                                                                <?php foreach ($dept as $dept){?>
                                                            <option value="<?php echo $dept['id']?>"><?php echo $dept['name']?></option>
                                                                <?php }?>
                                                        </select></div>

                                                        <div class="form-group"><input type="Submit" value="Save" class="html5buttons"></div>


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
            </div>
            <div class="row">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>SL#</th>
                        <th>AdminId</th>
                        <th>AdminName</th>
                        <th>Department</th>
                       <!-- <th>Action</th>-->
                    </tr>
                    </thead>
                    <tbody>
               <?php
               $sl=0;
               foreach ($alldata as $data){

                   $sl++?>


                    <tr>
                        <td><?php echo $sl?></td>
                        <td><?php echo $data->admin_id;?></td>
                        <td><?php echo $data->name;?></td>
                        <td><?php echo $data->dept_id;?></td>
                       <!--
                        <td>


                            <a href="editadmin.php?id=<?php echo $data->id;?>" class="btn btn-primary" role="button">Edit</a>
                            <a href="../controller/deleteadmin.php?td=<?php echo $data->id; ?>" class="btn btn-danger" role="button" >Delete</a>

                        </td>
                        -->
                    </tr>


                <? }?>
                </tbody>
                    </table>
             

            </div>

            
           <?php include_once('footer.php');?>