<?php
namespace App\koli;
class Registration extends Db{
    public $id;
    public $userid;
    public $dept;
    public $batch;
    public $name;
    public $dept_id;
    public $batch_id;
    public $password;
    Public function  __construct()
    {
        parent::__construct();
    }
    Public function prepareData($data){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }
        if(array_key_exists('userid',$data)){
            $this->userid=$data['userid'];
        }
        if(array_key_exists('std_id',$data)){
            $this->userid=$data['std_id'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }

        if(array_key_exists('batch',$data)){
            $this->batch=$data['batch'];
        }
        if(array_key_exists('dept',$data)){
            $this->dept=$data['dept'];
        }
        if(array_key_exists('dept_id',$data)){
            $this->dept_id=$data['dept_id'];
        }
        if(array_key_exists('number',$data)){
            $this->number=$data['number'];
        }
        if(array_key_exists('pass',$data)){
            $this->password=$data['pass'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        return $this;
    }

   



    public function store_student_master(){
        $sql="INSERT INTO `ors`.`student_master` (`std_id`, `name`,password,dept_id,batch) VALUES ('".$this->userid."', '".$this->name."','".$this->password."','".$this->dept_id."','".$this->batch."')";
        $rs=mysqli_query($this->conn,$sql);
        if ($rs){
            return ;
        }
        else{
            die("Problem occured");
        }

    }
    public function store_student_details(){
        $query="SELECT `id` FROM `student_master` order by id desc limit 1";
        $result=mysqli_query($this->conn,$query);
         if($row=mysqli_fetch_row($result)){
             $masterid=$row;
         }
               //Utility::d($masterid);
       $string_masterid=implode("",$masterid);

        $query1="select a.id as id from co_odinator a,student_master b where a.dept_id=b.dept_id and b.batch=a.number and b.id=".$string_masterid;
        $result=mysqli_query($this->conn,$query1);
        if($row=mysqli_fetch_row($result)){
            $coid=$row;
        }
        $string_coid=implode("",$coid);


      //  Utility::dd($coid);
        $sql="INSERT INTO `ors`.`student_details` (`master_id`,`co_id`) VALUES ('".$string_masterid."','".$string_coid."' )";
         //  echo $sql;
       // die();
        $rs=mysqli_query($this->conn,$sql);
        if ($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>Registration Succes!</strong>you can login use your id and password.
</div>");
            
        }
        else{
            Message::message("<div class=\"alert alert-success\">
  <strong>Error!</strong>Try again later.
</div>");
        }

    }
}