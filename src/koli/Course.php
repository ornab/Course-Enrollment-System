<?php

namespace App\koli;
class Course extends Db{
    public $coursecode;
    public $coursename;
    public $trimister="";
    public $department;
    
    public $id;
    public $credit;
    public $dept_id;
    public $trimisterforenroll;
    public $rowdata=array();

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
        if(array_key_exists("dept_id",$data)){
            $this->department=$data['dept_id'];
        }
        if(array_key_exists("credit",$data)){
            $this->credit=$data['credit'];
        }
        if(array_key_exists("trim",$data)){
            $this->trimister=$data['trim'];
        }
        if(array_key_exists("trimister",$data)){
            $this->trimister=$data['trimister'];
        }
       // var_dump($this);
        return $this;

    }

    public function insert(){


        $sql="INSERT INTO `course`(`c_code`, `c_title`, `dept_id`,`trimister`,`credit`) VALUES ('".strtoupper($this->coursecode)."','".$this->coursename."','".$this->department."','".$this->trimister."','".$this->credit."')";
        echo $sql;
        $rs=mysqli_query($this->conn,$sql);
        if ($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been stored successfully.
</div>");
        }

    }
    public  function loadtable(){
        $alldata=array();
        $sql="SELECT * FROM `course`";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_object($rs)) {
           // while ($row = mysqli_fetch_assoc($rs)) {
                $alldata[] = $row;
           // }
        }
        return $alldata;
         
        
    }
    public  function edit(){
        $alldata=array();
        $sql="SELECT * FROM `course` where id='".$this->id."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata= $row;
            // }
        }
        return $alldata;


    }
    public  function update(){
       //Utility::dd($data);
       // $alldata=array();
        $sql="UPDATE `course` SET `c_code`='".$this->coursecode."',`c_title`='".$this->coursename."',`dept_id`='".$this->department."',`trimister`='".$this->trimister."',credit='".$this->credit."' WHERE id='".$this->id."'";
       //echo $sql;die();
        $rs=mysqli_query($this->conn,$sql);
        if ($rs) {
           // echo "updated";
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Updated successfully.
</div>");
            header('Location:../views/assigncourse.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem occured!!</strong> Data has not been updated successfully.
</div>");
            header('Location:../views/assigncourse.php');
        }



    }
    public function delete($id){
        $sql="delete from course where c_code='".$id."'";
        $rs=mysqli_query($this->conn,$sql);
        if($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Deleted!</strong> Data has been Deleted successfully.
</div>");
            
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!</strong> Data has not been DEleted successfully.
</div>");
        }

    }
    public function count()
    {
        $query="SELECT COUNT(*) AS totalItem FROM `course`";
        $result=mysqli_query($this->conn,$query);
        $row=mysqli_fetch_assoc($result);
        return $row["totalItem"];
    }


    public function paginator($pageStartFrom=0,$limit=5)
    {

        $_allInfo=array();
        $query="SELECT a.id as id ,a.c_code as c_code,a.c_title as c_title,a.credit as credit,b.name as dept_id,a.trimister as trimister FROM `course` a,department b where a.dept_id=b.id LIMIT ".$pageStartFrom.",".$limit;
       /* echo $query;
        die();*/
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result))
        {
            $_allInfo[]=$row;
        }
        return $_allInfo;
    }
    public function loadCourseTrimisterWise()
    {

        $_allInfo=array();
        $query="SELECT * FROM `course` WHERE trimister=".$this->trimister;
        //$query="SELECT `id`,`c_code`,`c_title`,`credit`,`dept_id`,`status`,`trimister`,credit*per as per FROM `course` WHERE dept_id='".$this->department."' and trimister=".$this->trimister;
        //echo $query;die();
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_object($result))
        {
            $_allInfo[]=$row;
        }
        return $_allInfo;
    }
    public function totalcredit()
    {
        $totalcredit="";
        //$_allInfo=array();
        $query="SELECT  sum(credit)as total_credit FROM `course` WHERE dept_id='".$this->department."' and trimister=".$this->trimister;
        /*echo $query;
         die();*/
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $totalcredit=$row['total_credit'];
        }
        return $totalcredit;
    }



}