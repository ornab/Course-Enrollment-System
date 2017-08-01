<?php
/**
 * Created by PhpStorm.
 * User: rod16
 * Date: 6/24/2016
 * Time: 2:15 AM
 */

namespace App\koli;



class Student extends db
{

    public $name;
    public $dept_id;
    public $batch_id;
    public $student_id;
    public $student_idBySession;
    Public function  __construct()
    {
        parent::__construct();
    }
    
    Public function prepareData($data){
        if(array_key_exists("id",$data)){
            $this->student_id=$data['id'];
        }
        if(array_key_exists("username",$data)){
            $this->student_idBySession=$data['username'];
        }
        if(array_key_exists("dept",$data)){
            $this->dept=$data['dept'];
        }
        if(array_key_exists("number",$data)){
            $this->number=$data['number'];
        }
        return $this;
    }
    //public  function loadtable($data){
    public  function loadtable(){
        $alldata=array();
        $sql="SELECT * FROM `student_master`";
        //$sql="SELECT a.id,a.std_id,a.name,concat(c.name,a.batch) as batch FROM `student_master` a,student_details b,department c where  c.id=a.dept_id and a.id=b.master_id and b.co_id=";
        /*echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[] = $row;
            // }
        }
        return $alldata;


    }
    public  function takestudentid($data){
        $alldata=array();
        $sql="SELECT a.id as id FROM `student_master` a,student_details b,department c where  c.id=a.dept_id and a.id=b.master_id and b.co_id=".$data;
        /*echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[]= $row['id'];
            // }
        }
        return $alldata;


    }
    public function getDeptid($data){
        $query="SELECT dept_id FROM `student_master_view` where student_id='".$data."'";
        //echo $query;die();
        $result=mysqli_query($this->conn,$query);
        $row= mysqli_fetch_assoc($result);
        if ($row>0){
            $id=$row['dept_id'];
            return $id;
        }
    }
    public function getCoordinatorName(){
        $alldata="";
        $sql = "SELECT co_odinator.name as co_name,department.name as dept_name FROM `co_odinator` JOIN department on co_odinator.dept_id = department.id AND batch_id = (SELECT batch FROM `student_master` WHERE std_id ='".$this->student_idBySession."')";
        //$sql="SELECT a.name as name ,d.name as deptname,concat(d.name, a.number)as department FROM co_odinator a,`student_master` b,student_details c,department d where a.id=c.co_id and c.master_id=b.id and b.student_id='".$this->student_idBySession."' and d.id=a.dept_id";
        //var_dump($sql);
       /* echo $sql;
        die();*/
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata=$row;

            // }
        }
        //Utility::dd($alldata);
        return $alldata;
    }
    public function getCoordinatorId($masterid=""){
        $alldata="";
        $sql="SELECT co_id FROM `student_details` WHERE master_id=".$masterid;
        /* echo $sql;
         die();*/
        $rs=mysqli_query($this->conn,$sql);
        if ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata=$row['co_id'];

            // }
        }
        //Utility::dd($alldata);
        return $alldata;
    }
    public function getmasterid($username=""){
        $alldata="";
        $sql="SELECT id FROM `student_master` WHERE std_id='".$username."'";
       /*echo $sql;
         die();*/
        $rs=mysqli_query($this->conn,$sql);
        if ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata=$row['id'];

            // }
        }
        //Utility::dd($alldata);
        return $alldata;
    }


}