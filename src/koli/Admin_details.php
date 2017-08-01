<?php
namespace App\tusar;

//use App\koli\Message;
use App\tusar\Utility;

class Admin_details extends Db{

    public $admin_email="";
    public $admin_phone="";
    public $image="";
    public $master_id ="";

    public function __construct()
    {
        parent::__construct();

    }

    public function prepare($data){

        if(array_key_exists("admin_email",$data)){
            $this->admin_email=$data['admin_email'];
        }
        if(array_key_exists("admin_phone",$data)){
            $this->admin_phone=$data['admin_phone'];
        }
        if(array_key_exists("image",$data)){
            $this->image=$data['image'];
        }
        if(array_key_exists("master_id",$data)){
            $this->master_id=$data['master_id'];
        }

        return $this;
    }
    public function store(){
        
        $sql="INSERT INTO `ors`.`admin_details` (`master_id`, `email`, `phone`, `image`) VALUES ('$this->master_id', '".$this->admin_email."', '".$this->admin_phone."', '".$this->image."')";
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

}





