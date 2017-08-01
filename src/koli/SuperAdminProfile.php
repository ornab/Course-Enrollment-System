<?php
namespace App\koli;
use App\koli\Message;
use App\koli\Utility;
class SuperAdminProfile extends Db
{
    
    public $image_name;
    public $name;
    public $password;
    public $email;
    public $phnnumber;



    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data=array()){
        if (array_key_exists('name',$data)){
            $this->name=$data['name'];
        }

        if (array_key_exists('email',$data)){
            $this->email=$data['email'];
        }
        if (array_key_exists('phnnumber',$data)){
            $this->phnnumber=$data['phnnumber'];
        }
        if (array_key_exists('image',$data)){
            $this->image_name=$data['image'];
            echo $this->image_name;
        }

        return $this;
        //Utility::dd($this);

    }
    public function store()
    {
        $query = "INSERT INTO `superadmindetails` (`name`, `email`, `phnnumber`, `image`) VALUES ( '" . $this->name . "', '" . $this->email . "', '" . $this->phnnumber . "', '" . $this->image_name . "')";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been stored successfully.
</div>");
            Utility::redirect("../views/SuperAdmin.php");

        } else {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Failed!</strong> Data has not been stored successfully.
</div>");
            header('Location:../views/superAdminProfileUpdate.php');
        }

    }

    public function view()
    {
        $query="SELECT * FROM `superadmindetails`";
        //echo $query;
        $result=mysqli_query($this->conn,$query);
        $row=mysqli_fetch_assoc($result);
        //Utility::dd($row);
        return $row;
    }

    public function update()
    {
        //echo $this->image_name;
        //die();
        $query="UPDATE `superadmindetails` SET `name` = '".$this->name."',`email` = '".$this->email."',`phnnumber` = '".$this->phnnumber."', `image` = '".$this->image_name."' ";
        //echo $query;
        //die();

        $result=mysqli_query($this->conn,$query);
        if($result) {
            Message::message("<div class=\"alert alert-info\">
  <strong>Success!</strong> Data has been updated successfully.
</div>");
            header("location:../views/SuperAdmin.php");

        }


        else
        {
            Message::message("<div class=\"alert alert-danger\">
  <strong>Failed!</strong> Data has not been updated successfully.
</div>");
            header("location:../views/SuperAdmin.php");
        }

    }
}