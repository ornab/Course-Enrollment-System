<?php
namespace App\koli;
class BatchData extends Db{
    public $dept;
    public  $number;
    Public function  __construct()
    {
        parent::__construct();
    }
    Public function prepareData($data){
        if(array_key_exists('dept',$data)){
            $this->dept=$data['dept'];
        }
        if(array_key_exists('number',$data)){
            $this->number=$data['number'];
        }
        return $this;
    }
    public  function loadtable(){
        $alldata=array();
        $sql="SELECT count(a.number)as total ,b.name as department from batch a,department b where a.dept_id=b.id group by a.dept_id";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[] = $row;
            // }
        }
        return $alldata;


    }
    public  function view($data){
        $alldata=array();
        $sql="SELECT `number` FROM `batch` WHERE dept_id=".$data;
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[]= $row;
            // }
        }
        return $alldata;


    }
    Public function store(){

        $sql="INSERT INTO `ors`.`batch` (`dept_id`, `number`) VALUES ('".$this->dept."', '".$this->number."')";
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
}