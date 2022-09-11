<?php
require('../config.php');
session_start();
$staff_work_id = $_GET['id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['customer_name'];
	$updatedate = $_POST['start_date'];
	$updatedays = $_POST['days'];
	$updateSalary = $_POST['salary'];

	$sql = "UPDATE staff_work SET customer_id='$updateName', begin_date='$updatedate', n_days='$updatedays', salary='$updateSalary' WHERE staff_work_id=$staff_work_id";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='viewINV.php?INVid=".$_SESSION['INVid']."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>