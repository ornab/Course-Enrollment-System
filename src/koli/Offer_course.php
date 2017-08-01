<?php
namespace App\koli;
class Offer_course extends Db{
   
    public $userid;
    public $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data){
        if (array_key_exists('uname',$data)){
            $this->userid=$data['uname'];
        }
        if (array_key_exists('pass',$data)){
            $this->password=$data['pass'];
        }
        return $this;

    }
    public function insert($course_id,$std_id,$status){


        $sql="INSERT INTO `ors`.`offer_course` (`course_id`, `student_id`, `status`) VALUES ('".$course_id."', '".$std_id."', '$status')";
        //echo $sql;
        $rs=mysqli_query($this->conn,$sql);
        if ($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Assigned!</strong> Assighned successfully.
</div>");
            return true;
            
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been Assighned successfully.
</div>");
            return false;
        }

    }








}