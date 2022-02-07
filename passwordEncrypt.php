<?php
require_once("config.php");
	$password = "123";
	$password=md5($password);
	$sql = "UPDATE admin SET password = '$password' WHERE admin_id='1'";

	if($conn->query($sql)===TRUE){
			echo "<script> alert('Record updated')</script>";
			echo "<script>window.location='loginAdmin.php';</script>";
		}
?>