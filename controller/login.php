<?php
session_start();
include_once '../vendor/autoload.php';
use App\koli\Utility;
//Utility::d($_POST);
use App\koli\Login;
use App\koli\Message;
$obj=new Login();
//Utility::dd($_POST);

if(isset($_POST)&& ($_POST['rank']!="select")){
    if($_POST['rank']=="Super Admin"){
        // if($_POST['uname']==)
        // header('Location:')
        $_SESSION["username"]=$_POST["uname"];
        $data=$obj->superadmin($_POST);
        //Utility::d($data);
        if($data['username']==$_POST['uname'] && $data['password']==$_POST['pass']){
            Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are SuperAdmin.
</div>");
            header('Location:../views/SuperAdmin.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>Given Information is Wrong.
</div>");
            header('Location:../views/login.php');

        }

    }

    //this is for admin login
    if($_POST['rank']=="Admin"){
        $_SESSION['username']=$_POST['uname'];
        $login=new Login();
        $result=$login->prepare($_POST)->admin();
        // var_dump($result);
        if($result==true){
            Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are Admin.
</div>");
            header('Location:../views/Admin.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>you are not Admin.
</div>");
            header('Location:../views/login.php');


        }




    }
    
   /*
    //Accounts panel
   if($_POST['rank']=="Accounts"){
     // echo 'ddddd';
      $_SESSION['username']=$_POST['uname'];
      $login=new Login();
      $result=$login->prepare($_POST)->accounted();
      // var_dump($result);
      if($result==true){
          Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are Accounted.
</div>");
          header('Location:../views/accounts_panel.php');

      }
      else{
          Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>you are not Accounted.
</div>");
          header('Location:../views/login.php');


      }


    }
    
    */
    


    //this is for Co_ordinator
     if($_POST['rank']=="co-ordinator"){
        // Utility::dd($_POST);
        $_SESSION["username"]=$_POST["uname"];
        /*var_dump($_POST);
        die();*/


        $login=new Login();
        $result=$login->prepare($_POST)->coordinator();
        // var_dump($result);
        if($result==true){
            Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are Co-ordinator.
</div>");
            header('Location:../views/Co-ordinator.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>you are not Co-ordinator.
</div>");
            header('Location:../views/login.php');


        }

    }
    if($_POST['rank']=="student"){
        $_SESSION["username"]=$_POST["uname"];
        $login=new Login();
        $result=$login->prepare($_POST)->studentLogin();
       // $permit=$login->notpermit($_SESSION['username']);
        if($result==true){
            Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are Student.
</div>");
            header('Location:../views/student_panel.php');
        }
       /* else if($result==true && $permit==false){
            Message::message("<div class=\"alert alert-success\">
  <strong>Not Permitted!</strong> Restricted for your due.
</div>");
            header('Location:../views/student_panel_without_permission.php');
        }*/
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>you are not student.
</div>");
            header('Location:../views/login.php');
        }
    }
    
    
    //this for when signup
    /* if($_POST['rank']=="student"){
        $_SESSION["username"]=$_POST["uname"];
        $login=new Login();
        $result=$login->prepare($_POST)->student();
        $permit=$login->notpermit($_SESSION['username']);
        if($result==true && $permit==true){
            Message::message("<div class=\"alert alert-success\">
  <strong>Login Succes!</strong> You Are Student.
</div>");
            header('Location:../views/student_panel.php');
        }
        else if($result==true && $permit==false){
            Message::message("<div class=\"alert alert-success\">
  <strong>Not Permitted!</strong> Restricted for your due.
</div>");
            header('Location:../views/student_panel_without_permission.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>you are not student.
</div>");
            header('Location:../views/login.php');
        }
    }*/

    //this for superadmin

}
else{
    Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong>select Rank!!!.
</div>");
    header('Location:../views/login.php');
}