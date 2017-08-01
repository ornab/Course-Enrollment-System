<?php
namespace App\koli;
class Payment extends Db{

    public $filterByStudentId;

    public function preparedata($data){
        if (array_key_exists('filterByStudentId',$data)){
            $this->filterByStudentId=$data['filterByStudentId'];
        }
        return $this;
    }


    public function __construct()
    {
        parent::__construct();
    }

    public function load(){
        $alldata=array();
        $sql="SELECT * FROM `enroll_master_admission_view` where student_id='".$this->filterByStudentId."'";
      //  echo $sql;die();
        $rs=mysqli_query($this->conn,$sql);
        while ($row=mysqli_fetch_assoc($rs)) {
            // while ($row = mysqli_fetch_assoc($rs)) {
            $alldata[] = $row;
            // }
        }
        return $alldata;
    }
}