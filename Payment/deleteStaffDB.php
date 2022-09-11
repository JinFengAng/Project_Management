<?php
require('../config.php');
session_start();
$staff_work_id = $_GET['staff_id'];

	$sql = "DELETE FROM staff_work WHERE staff_work_id=$staff_work_id";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='viewINV.php?INVid=".$_SESSION['INVid']."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}


?>