<?php
global $name;
	$name=$_POST['uname'];
	data();
go();
function data(){

	return $name;
}
function go(){
	$rank=$_POST['rank'];
	$name=$_POST['uname'];
	
	
	if($rank=="student"){
        header('Location: student_panel.php');
       }
       else if($rank=="co-ordinator"){
       		
       	session_start();                      
	
		$_SESSION['uname'] = $name;
       	header('Location: manager.php');
       
       }
       else if($rank=="Admin"){
       header('Location:Admin.php');
        

        //var x=document.getElementById("tt");
        
       }
       else if($rank=="Super Admin"){
       	header('Location:SuperAdmin.php');
       
       
       }
       else{
        echo "not working";
       }
	
}

?>
