<?php

namespace App\koli;

class Registered_Course extends Db{
    public $std_id;
    public $coursecode;
    public $coursename;
    public $trimister="";
    public $department;
   
    public $id;
    public $credit;
    public $total_credit;
    public $co_id;
    
    public function __construct()
    {
        parent::__construct();

    }
    public function prepare($data){
        // Utility::dd($data);
        
        if(array_key_exists("id",$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists("c_code",$data)){
            $this->coursecode=$data['c_code'];
        }
        if(array_key_exists("c_title",$data)){
            $this->coursename=$data['c_title'];
        }
        if(array_key_exists("dept",$data)){
            $this->department=$data['dept'];
        }
        if(array_key_exists("std_id",$data)){
            $this->std_id=$data['std_id'];
        }
        if(array_key_exists("status",$data)){
           $this->status=$data['status']; 
        }

        if(array_key_exists("credit",$data)){
            $this->credit=$data['credit'];
        }
        if(array_key_exists("trim",$data)){
            $this->trimister=$data['trim'];
        }
        if(array_key_exists("total_credit",$data)){
            $this->total_credit=$data['total_credit'];
        }
        if(array_key_exists("co_id",$data)){
            $this->co_id=$data['co_id'];
        }
        return $this;

    }

    public function loadmaster($ordinator_id=""){
        $alldata=array();
        $sql="SELECT a.id as id,a.std_id as std_id,a.trimster as trimster,a.total_credit as total_credit,b.name as name, Case a.status when 0 then 'pending' else 'Registered' end as status FROM `registered_course_master` a,student_master b where a.std_id=b.std_id and a.co_id=".$ordinator_id;
// echo $sql;die();
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }
    public function loaddetails($masterid=""){
        $alldata=array();
        $sql="SELECT b.c_code as course_code,b.c_title as course_title,b.credit as credit FROM `course` b,registered_course_details  a WHERE a.course_id=b.id and a.master_id=".$masterid;
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }

    
    
    
    public function insert_master(){
       
            $sql="INSERT INTO `registered_course_master`(`std_id`, `trimster`, `total_credit`, `status`,co_id) VALUES ('".$this->std_id."','".$this->trimister."','".$this->total_credit."','".$this->status."','".$this->co_id."')";
           /* echo $sql;
        die();*/
            $rs=mysqli_query($this->conn,$sql);
            if ($rs){
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
                //header()
            }
            else{
                Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been stored successfully.
</div>");
            }
        }

    public function insert_details($values,$status){
        for($i=0;($i<sizeof($values)-1);$i++) {
            $sql = "INSERT INTO `registered_course_details`(`master_id`, `course_id`, `status`) VALUES ('" . $values['master_id'] . "','" . $values[$i] . "','".$status."')";
            // echo $sql;

            $rs = mysqli_query($this->conn, $sql);
            if ($rs) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> processing successfully.
</div>");
                //header('Location:../views/seeCoursesForstudent.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> processing Not successfully.
</div>");

               // header('Location:../views/seeCoursesForstudent.php');
            }
        }
        return true;
        }



    
    public function lastmasterid(){
        $query="SELECT `id` FROM `registered_course_master` order by id desc limit 1";
        $result=mysqli_query($this->conn,$query);
        if($row=mysqli_fetch_assoc($result)) {
            $masterid = $row['id'];

        }
        return $masterid;
    }

    public function update($id="")
    {
        //echo $this->image_name;
        //die();
        $query="UPDATE `registered_course_master` SET `status`='1' WHERE id=".$id;
        //echo $query;
        //die();

        $result=mysqli_query($this->conn,$query);
        if($result){
            $sql="UPDATE `registered_course_details` SET `status`='1' WHERE master_id='$id'";
            $result2=mysqli_query($this->conn,$sql);
            if($result2) {
                Message::message("<div class=\"alert alert-info\">
  <strong>Success!</strong> Data has been updated successfully.
</div>");
                header("location:../views/acceptRegistration.php");

            }


            else
            {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Failed!</strong> Data has not been updated successfully.
</div>");
                header("location:../views/acceptRegistration.php");
            }

        }


    }

    public function registeredCourseFrom_master($student_id=""){
        $alldata=array();
        $sql="SELECT * FROM registered_course_master_view WHERE student_id='".$student_id."'";
      /* echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }
    public function registeredCourseFrom_details($masterid=""){
        $alldata=array();
        $sql="SELECT b.c_code as course_code,b.c_title as course_title,b.credit as credit FROM `course` b,registered_course_details a WHERE a.course_id=b.id and a.status=1 and a.master_id='".$masterid."'";
        /*echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }






}