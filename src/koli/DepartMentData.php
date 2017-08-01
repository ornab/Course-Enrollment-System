<?php
namespace App\koli;

class DepartMentData extends Db{
    Public $id;
    Public $name;
    Public function  __construct()
    {
        parent::__construct();
    }

    

    Public function prepareData($data){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        return $this;
    }
   Public function store(){
        
        $sql="INSERT INTO `ors`.`department` (name) VALUES ('".$this->name."');";
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
    public function delete(){
        $sql="delete from department where id='".$this->id."'";
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
    public  function update(){
        //Utility::dd($data);
        // $alldata=array();
        $sql="UPDATE `ors`.`department` SET `name` = '".$this->name."' WHERE `department`.`id` = '".$this->id."';";
        $rs=mysqli_query($this->conn,$sql);
        if ($rs) {
            // echo "updated";
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Updated successfully.
</div>");
            header('Location:../views/addDepartment.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem occured!!</strong> Data has not been updated successfully.
</div>");
            header('Location:../views/addDepartment.php');
        }



    }
    public  function edit($data){
        $alldata=array();
        $sql="SELECT * FROM `department` where id='".$data['id']."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[] = $row;
            // }
        }
        return $alldata;


    }
    public  function loadtable(){
        $alldata=array();
        $sql="SELECT * FROM `department`";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[]= $row;
            // }
        }
        return $alldata;


    }
    public  function getDepartmentId($deptname){
        $alldata=array();
        $sql="SELECT id FROM `department` where  name='".$deptname."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata= $row['id'];
            // }
        }
        return $alldata;


    }
    
}