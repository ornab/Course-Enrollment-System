<?php
namespace App\koli;
class CourseCoordinator extends Db
{
    
    Public $id;
    Public $name;
    public $password;
    public $dept;
    public $batch;
    public $number;
    Public function  __construct()
    {
        parent::__construct();
    }

    Public function prepareData($data){
        //var_dump($data);
       if(array_key_exists("id",$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists("name",$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists("password",$data)){
            $this->password=$data['password'];
        }
        if(array_key_exists("dept_id",$data)){
            $this->dept=$data['dept_id'];
        }
        if(array_key_exists("batch",$data)){
            $this->number=$data['batch'];
        }
        return $this;
       // Utility::dd($_POST);
    }
    Public function store(){

        $sql="INSERT INTO `ors`.`co_odinator`(`co_id`,`name`,`password`,`dept_id`,`number`) VALUES ('".$this->id."','".$this->name."','".$this->password."','".$this->dept."','".$this->number."')";
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
        $sql="DELETE FROM `co_odinator` WHERE id='".$this->id."'";
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
        $sql="SELECT a.id,a.co_id as co_id,a.name as name,a.password as password,b.name as dept,concat(b.name,a.number) as number from co_odinator a,department b where a.dept_id=b.id";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_object($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[]= $row;
            // }
        }
        //Utility::dd($alldata);
        return $alldata;


    }
    public function count(){
        $query="SELECT COUNT(*) AS totalItem FROM `co_odinator` where dept_id=".$this->dept;
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['totalItem'];

    }

    public function paginator($pageStartFrom=0,$Limit=5,$deptid){
       // echo "exact we need".$_SESSION['userid'];
        $query="SELECT a.id as id, a.co_id as co_id,a.name as name,b.name as dept_id,concat(b.name,a.number) as number FROM `co_odinator` a,department b WHERE  a.dept_id=b.id and a.dept_id='".$deptid."' LIMIT ".$pageStartFrom.",".$Limit;
       /* echo $query;
        die();*/
        $_allcoordinator= array();
        $result= mysqli_query($this->conn,$query);
        //You can also use mysqli_fetch_object e.g: $row= mysqli_fetch_object($result)
        while($row= mysqli_fetch_object($result)){
            $_allcoordinator[]=$row;
        }

        return $_allcoordinator;

    }
    public function getDeptid($data){
        $query="SELECT dept_id  FROM `co_odinator` where co_id='".$data."'";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        if ($row>0){
            $id=$row['dept_id'];
            return $id;
        }
    }
    public function getCo_id($data){
        $query="SELECT id FROM `co_odinator` WHERE co_id='".$data."'";
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        return $row['id'];
    }
   

}