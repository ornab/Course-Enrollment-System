<?php


namespace App\koli;

class Admin extends Db

{
    public $name;
    public $pass;
    public $dept;
    public $admin_id;
    
    public $student_id;
    public $id;
    public function __construct()
    {
        parent::__construct();

    }
    public function preparedata($data){
        if(array_key_exists("id",$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists("username",$data)){
            $this->admin_id=$data['username'];
        }
        if(array_key_exists("admin_name",$data)){
            $this->name=$data['admin_name'];
        }
        if(array_key_exists("admin_pass",$data)){
            $this->pass=$data['admin_pass'];
        }
        if(array_key_exists("dept",$data)){
            $this->dept=$data['dept'];
        }
        if(array_key_exists("student_id",$data)){
            $this->student_id=$data['student_id'];
        }
        
        return $this;

    }

    public function insert($data){

        if(array_key_exists("admin_id",$data)){
            $this->admin_id=$data['admin_id'];
        }
        if(array_key_exists("admin_name",$data)){
            $this->name=$data['admin_name'];
        }
        if(array_key_exists("admin_pass",$data)){
            $this->pass=$data['admin_pass'];
        }
        if(array_key_exists("dept",$data)){
            $this->dept=$data['dept'];
        }
        $sql="INSERT INTO `admin`(`name`, `dept_id`,password,admin_id) VALUES ('".$this->name."','".$this->dept."','".$this->pass."','".strtoupper($this->admin_id)."')";
        $rs=mysqli_query($this->conn,$sql);
        if ($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Stored successfully.
</div>");
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been inserted successfully.
</div>");
        }

    }
    public function loadtable(){
        $alldata=array();
        $sql="SELECT a.id as id,a.admin_id as admin_id,a.name as name,b.name as dept_id FROM `admin` a,department b where a.dept_id=b.id ";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_object($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[] = $row;
            // }
        }
        return $alldata;
    }
    public  function update($data){
        //Utility::dd($data);
        // $alldata=array();
        $sql="UPDATE `admin` SET `admin_id`='".strtoupper($data['adminid'])."',`name`='".$data['name']."',`dept`='".$data['dept']."',password='".$data['pass']."' WHERE id='".$data['id']."'";
        $rs=mysqli_query($this->conn,$sql);
        if ($rs) {
            // echo "updated";
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Updated successfully.
</div>");
            header('Location:../views/assignadmin.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been Updated successfully.
</div>");
            header('Location:../views/assignadmin.php');
        }



    }
    public  function updateRequest(){
        //Utility::dd($data);
        // $alldata=array();
        $sql="UPDATE `ors`.`accounts` SET  `request` = '1' WHERE `accounts`.`student_id` ='".$this->student_id."'";
        $rs=mysqli_query($this->conn,$sql);
        if ($rs) {
           // echo "updated";

            header('Location:../views/accountsApproval.php');
        }
        else{

            header('Location:../views/accountsApproval.php');
        }



    }
    public function edit(){
       //Utility::dd($data);
        $alldata=array();
        $sql="SELECT * FROM `admin` where id='".$this->id."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata= $row;
            // }
        }
        return $alldata;
    }
    public function view(){
     //   Utility::dd($data);
     //   $userid=implode(" ",$data);
       // Utility::dd($userid);
        $alldata=array();
        $sql="SELECT * FROM `admin` where admin_id='".$this->admin_id."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata= $row;
            // }
        }
        return $alldata;
    }
    public function delete($id){
        $sql="delete from admin where id='".$id."'";
        $rs=mysqli_query($this->conn,$sql);
        if($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Deleted!</strong> Data has been Deleted successfully.
</div>");
          
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem occured!</strong> Data has not been Deleted successfully.
</div>");
        }

    }
    public function paginator($pageStartFrom=0,$limit=5,$dept_id)
    {

        $_allInfo=array();
        $query="select a.student_id,CASE a.status WHEN 0 THEN 'Due' ELSE 'paid' END as status,CASE a.request WHEN 0 THEN 'NOT SENT' ELSE 'SENT' END as request from accounts a,`student_master_view` b where a.student_id=b.std_id and b.dept_id='$dept_id' LIMIT ".$pageStartFrom.",".$limit;
      echo $query;die();
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $_allInfo[]=$row;
        }
        return $_allInfo;
    }
    public function loadbypaginator($dept_id){
        $alldata=array();
        $sql="select a.student_id,CASE a.status WHEN 0 THEN 'Due' ELSE 'paid' END as status,CASE a.request WHEN 0 THEN 'NOT SENT' ELSE 'SENT' END as request from accounts a,student_master b where a.student_id=b.std_id and b.dept_id=".$dept_id;
      /* echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }
    public function count()
    {
        $query="SELECT COUNT(*) AS totalItem FROM `student_master`";
        $result=mysqli_query($this->conn,$query);
        $row=mysqli_fetch_assoc($result);
        return $row["totalItem"];
    }


}