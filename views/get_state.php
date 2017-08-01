<?php
/*require_once("DepartMentData.php");*/
/*$db_handle = new DBController();*/
$conn=mysqli_connect("localhost","root","","ors") or die("database not connected");

if(!empty($_POST["country_id"])) {
	$query ="SELECT number FROM batch where dept_id=".$_POST['country_id'];
	$results =mysqli_query($conn,$query);
?>
	<option value="">Select Batch</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["number"]; ?>"><?php echo $state["number"]; ?></option>
<?php
	}
}
?>