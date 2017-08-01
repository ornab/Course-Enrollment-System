<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
use App\koli\CourseCoordinator;
use App\koli\BatchData;
use App\koli\Message;

?>
<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ORS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <script src="../js/jquery.min.js" rel="script"></script>
    <script src="../js/jquery.min.js" rel="script"></script>


    

</head>

<body class="gray-bg">

 



    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h1 class="font-bold">The Trickers</h1>
                <h2 class="font-bold">Welcome to online Course EnrollMent System </h2>


                <p>
                    Perfectly designed and precisely prepared By The Trickers.
                </p>

                

            </div>
            <div class="col-md-6">
                <div id="message">

                    <?
                    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
                        echo Message::message();
                    }
                    ?>
                </div>
                
                <div class="ibox-content">
                    <form class="m-t" role="form" method="post" action="../controller/login.php"> 
                        <div class="form-group" >
                         <select class="form-control" id="select" name="rank">
                             <option value="select">select</option>
                             <!--<option value="Accounts">Accounts</option>-->

                             <option value="student">student</option>
                              <option value="co-ordinator">co-ordinator</option>
                              <option value="Admin">Admin</option>
                              <option value="Super Admin">Super Admin</option>
                            </select> 
                              <input type="text" name="uname" class="form-control" placeholder="UserId" required=""> 
                           <!--  <input type="text" id="user_name" class="form-control" placeholder="Username" required=""> -->
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit"  class="btn btn-primary block full-width m-b">Login</button>

                        <!--<a href="#">
                            <small id="j">Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        -->
                        <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
                   </form> 
                    <p class="m-t">
                        <small>NOakhali Science & Technology University &copy; 2016</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright @Trickers
            </div>
            <div class="col-md-6 text-right">
               <small>© 2016-2017</small>
            </div>
        </div>
    </div>

<?php include 'message_script.php'?>

</body>

</html>
