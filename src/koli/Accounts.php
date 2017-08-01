<?php
namespace App\koli;

class Accounts extends Db{
    
    public $accounts_id;
    public $permission;
    public $name;
    public $mobile_no;
    public $batch;
    public $trimister;
    public $fee;
    public $password;
    public $dept_id;

    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function preparedata($data){
        if(array_key_exists('id',$data)){
            $this->accounts_id=$data['id'];
        }
        if(array_key_exists('permission',$data)){
            $this->permission=$data['permission'];
        }
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }
        if(array_key_exists('mobile_no',$data)){
            $this->mobile_no=$data['mobile_no'];
        }
        if(array_key_exists('dept_id',$data)){
            $this->dept_id=$data['dept_id'];
        }
        if(array_key_exists('batch',$data)){
            $this->batch=$data['batch'];
        }
        if(array_key_exists('trimister',$data)){
            $this->trimister=$data['trimister'];
        }
        if(array_key_exists('fee',$data)){
            $this->fee=$data['fee'];
        }
        if(array_key_exists('password',$data)){
            $this->password=$data['password'];
        }
        return $this;
        
    }


    public function storeAdmission(){
        $co_id="";
        $get_co_id_sql="SELECT id FROM `co_odinator` WHERE dept_id='".$this->dept_id."' and number='".$this->batch."'";
        $rs_sql=mysqli_query($this->conn,$get_co_id_sql);
        if($row=mysqli_fetch_assoc($rs_sql)){
            $co_id=$row['id'];
        }
        $query ="INSERT INTO `addmission` (`password`,`admission_fee`, `batch`, `dept_id`, `mobile_no`, `trimister`, `name`,co_id) VALUES ('".$this->password."','".$this->fee."','".$this->batch."','".$this->dept_id."','".$this->mobile_no."','".$this->trimister."','".$this->name."','".$co_id."')";
        //echo $query;die();
        $rs=mysqli_query($this->conn,$query);
        if($rs){
            
            return $co_id;
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been Imported successfully.
</div>");
            header('Location:../views/accounts_panel.php');
        }


    }
    public function storeEnrollMaster(){
        $lastid_query="SELECT student_id FROM `addmission` order by student_id desc limit 1";
        $rslast=mysqli_query($this->conn,$lastid_query);
        if($row=mysqli_fetch_assoc($rslast)){
            $last_id=$row['student_id'];
           
        }
        $query="SELECT sum(credit)as sum_credit,sum(credit)*per as total_amount FROM `course` WHERE trimister='".$this->trimister."' and dept_id='".$this->dept_id."'";
        $rs1=mysqli_query($this->conn,$query);
        if($row=mysqli_fetch_assoc($rs1)){
            $sum=$row['sum_credit'];
            $total_amount=$row['total_amount'];
        }
        $forRegisterMaster=array();
        $forRegisterMaster['total_credit']=$sum;
        $forRegisterMaster['std_id']=$last_id;
        $forRegisterMaster['trim']=$this->trimister;

        $sql="INSERT INTO `enroll_master` (`std_id`, `trimister`, `total_credit`, `total_amount`, `status`) VALUES ('".$last_id."', '".$this->trimister."','".$sum."','".$total_amount."','0')";
       // echo $sql;die();
        $rs2=mysqli_query($this->conn,$sql);
        if($rs2){
            Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Imported successfully.
</div>");
            return $forRegisterMaster;
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been Imported successfully.
</div>");
            header('Location:../views/accounts_panel.php');
        }


    }
    public function store_Enroll_details($values=array(),$datamount=array()){
        $lastid_query="SELECT id FROM `enroll_master` order by id desc limit 1";
        $rslast=mysqli_query($this->conn,$lastid_query);
        if($row=mysqli_fetch_assoc($rslast)){
            $last_id=$row['id'];

        }
       // Utility::dd($values);

        for($i=0;$i<sizeof($values);$i++) {
            $sql = "INSERT INTO  `enroll_details` (`master_id`, `course_id`, `amount`, `status`) VALUES ('".$last_id."', '".$values[$i]."', '".$datamount[$i]."', '0');";
           // echo $sql;

            $rs = mysqli_query($this->conn, $sql);
            if ($rs) {
                Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> processing successfully.
</div>");// header('Location:../views/accounts_panel.php');
            } else {
                Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> processing successfully.
</div>");
                header('Location:../views/accounts_panel.php');
            }
        }
        return;
    }



   public function insert($id){
       $query = 'INSERT INTO accounts_excel_import (`student_id`) VALUES ';
       $query_parts = array();
       for($x=1; $x<count($id); $x++){
           $query_parts[] = "('".$id[$x]."')";
       }
       $query .= implode(',', $query_parts);
       
        $rs=mysqli_query($this->conn,$query);
       if($rs){
           Message::message("<div class=\"alert alert-success\">
  <strong>Success!</strong> Data has been Imported successfully.
</div>");
           header('Location:../views/TabSuperAdmin.php');
       }
       else{
           Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> Data has not been Imported successfully.
</div>");
           header('Location:../views/TabSuperAdmin.php');
       }
       

   }
    public function loadtable(){
        $alldata=array();
        $sql="SELECT accounts_id,`student_id`, CASE status WHEN 0 THEN 'Due' ELSE 'paid' END as status,CASE permission WHEN 0 THEN 'Not Allowed' ELSE 'Allowed' END as permission FROM `accounts` ";
        $rs=mysqli_query($this->conn,$sql);
        while($row=mysqli_fetch_assoc($rs)){
            $alldata[]=$row;
        }
        return $alldata;
    }
    
    public function delete(){
    $sql="delete  from accounts_excel_import";
    $rs=mysqli_query($this->conn,$sql);
    if($rs){
        return;
    }
    
}
    public function view(){
        $sql="select student_id from accounts where accounts_id=".$this->accounts_id;
        echo $sql;
        $rs=mysqli_query($this->conn,$sql);
        if($row=mysqli_fetch_assoc($rs)){
            $data=$row;
        }
        return $data;
    }
    public function update(){
        $sql="UPDATE `ors`.`accounts` SET `permission` ='".$this->permission."' WHERE `accounts`.`accounts_id` =".$this->accounts_id;
        $rs=mysqli_query($this->conn,$sql);
        if($rs){
            Message::message("<div class=\"alert alert-success\">
  <strong>permitted!</strong>permission Granted successfully.
</div>");
            header('Location:../views/TabSuperAdmin.php');
        }
        else{
            Message::message("<div class=\"alert alert-danger\">
  <strong>Problem Occured!!</strong> contact the vendor.
</div>");
            header('Location:../views/TabSuperAdmin.php');
        }
    }
    
    public function count()
    {
        $query="SELECT COUNT(*) AS totalItem FROM `accounts`";
        $result=mysqli_query($this->conn,$query);
        $row=mysqli_fetch_assoc($result);
        return $row["totalItem"];
    }
    
    public function paginator($pageStartFrom=0,$limit=5)
    {

        $_allInfo=array();
        $query="SELECT accounts_id,`student_id`, CASE status WHEN 0 THEN 'Due' ELSE 'paid' END as status,CASE permission WHEN 0 THEN 'Not Allowed' ELSE 'Allowed' END as permission FROM `accounts_excel_import` LIMIT ".$pageStartFrom.",".$limit;
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $_allInfo[]=$row;
        }
        return $_allInfo;
    }
    public function paginatorForAdminRequest()
    {

        $_allInfo=array();
        $query="select a.accounts_id as accounts_id,a.student_id as student_id,b.name as name,(case a.status when 0 then 'Due' else 'Paid' end) as status,(case a.permission when 0 then 'Restricted' else 'permitted' end) as permission,(case a.request when 1 then 'Requested By Admin' else 'No Acton' end) as request,b.batch as batch from accounts_excel_import a,student_master b where b.std_id=a.student_id and a.request=1";
        $result=mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result))
        {
            $_allInfo[]=$row;
        }
        return $_allInfo;
    }


    public function allStudentId(){
        $_allInfo= array();
        $query="select student_id from `accounts`";
        $result= mysqli_query($this->conn,$query);
        while($row=mysqli_fetch_assoc($result)){
            $_allInfo[]=$row["student_id"];
            //Utility::dd($_allInfo);
        }
        return $_allInfo;


    }
       // $sql=


}