<?php
require('../config.php');
session_start();
$work_id = $_GET['id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['work_name'];
	$updatePrice = $_POST['price'];

	$sql = "UPDATE work SET work_name='$updateName', price='$updatePrice' WHERE work_id=$work_id";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='viewINV.php?INVid=".$_SESSION['INVid']."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>