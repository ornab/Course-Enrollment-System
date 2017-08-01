<?php
namespace App\koli;
class Login extends Db{
    
    public $userid;
    public $password;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data){
        if (array_key_exists('uname',$data)){
            $this->userid=$data['uname'];
        }
        if (array_key_exists('pass',$data)){
            $this->password=$data['pass'];
        }
        return $this;

    }
    public function superadmin(){
        $fetch=array();
        $sql="SELECT username,password FROM `superadmin`";
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $fetch=$row;
        }
       
        return $fetch;

    }
    public function admin(){
        $fetch[]=array();
        $sql="SELECT * FROM `admin` where admin_id='".$this->userid."' and password='".$this->password."' ";

        $rs=mysqli_query($this->conn,$sql);

        $row=mysqli_fetch_assoc($rs);

        if($row>0){
            $this->name=$row['name'];

            return $this;

        }
        else{
            return false;
        }
    }

        public function coordinator()
        {
            $fetch[] = array();
            $sql = "SELECT * FROM `co_odinator` where co_id='" . $this->userid . "' and password='" . $this->password . "' ";

            $rs = mysqli_query($this->conn, $sql);
            $row = mysqli_fetch_assoc($rs);
            if ($row > 0) {
                return true;

            } else {
                return false;
            }

        }


    public function studentLogin()
    {
        $fetch[] = array();
        $sql = "SELECT `std_id`,`password` FROM `student_master` WHERE std_id='".$this->userid."' and password='" . $this->password . "'";

        $rs = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rs);
        if ($row > 0) {
            return true;

        } else {
            return false;
        }


    }

    public function student()
    {
        $fetch[] = array();
        $sql = "SELECT `std_id`,`password` FROM `student_master` WHERE std_id='" . $this->userid . "' and password='" . $this->password . "'";

        $rs = mysqli_query($this->conn, $sql);
        $row = mysqli_fetch_assoc($rs);
        if ($row > 0) {
            return true;

        } else {
            return false;
        }


    }
    public function accounted(){
        $fetch[]=array();
        $sql="SELECT * FROM `accounts_panel` where  accounted_id='".$this->userid."' and  password='".$this->password."' ";

        $rs=mysqli_query($this->conn,$sql);

        $row=mysqli_fetch_assoc($rs);

        if($row>0){

            return true;

        }
        else{
            return false;
        }
    }

    public function notpermit($data){
        $fetch=array();
        $sql="SELECT * FROM `accounts` WHERE status= 0 and `permission`= 0 and student_id='".$data."'";

        $rs=mysqli_query($this->conn,$sql);
        $row=mysqli_fetch_assoc($rs);
        if($row>0){
            return false;
        }
        else{
            return true;
        }

        


    }
    public function is_loggedin(){
        if((array_key_exists('username',$_SESSION))&& (!empty($_SESSION['username']))){
            return TRUE;
        }
        else{
            return FALSE;
        }

    }
    public function logout()
    {
        if ((array_key_exists('username', $_SESSION)) && (!empty($_SESSION['username']))) {
            $_SESSION['username'] = "";
            return TRUE;
        }
        else{
            session_destroy();
            return TRUE;
        }

    }
    
}