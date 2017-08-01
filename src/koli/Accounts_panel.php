<?php

namespace App\koli;
class Accounts_panel extends Db{
    public $name;
    public $pass;
    public $dept;
   

    public $accountant_id;
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
            $this->accountant_id=$data['username'];
        }
        if(array_key_exists("accountant_name",$data)){
            $this->name=$data['accountant_name'];
        }
        if(array_key_exists("password",$data)){
            $this->pass=$data['password'];
        }
        if(array_key_exists("dept",$data)){
            $this->dept=$data['dept'];
        }
       

        return $this;

    }
    public function loadtable(){
        $alldata=array();
        $sql="SELECT * FROM `accounts_panel`";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_object($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[]=$row;
            // }
        }
        return $alldata;
    }
    public function view(){
        //   Utility::dd($data);
        //   $userid=implode(" ",$data);
        // Utility::dd($userid);
        $alldata=array();
        $sql="SELECT * FROM `accounts_panel` where accounted_id='".$this->accountant_id."'";
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata= $row;
            // }
        }
        return $alldata;
    }
}