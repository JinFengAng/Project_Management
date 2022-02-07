<?php
require('../config.php');
session_start();
$customer_id = $_SESSION['customer_id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateTelephone = $_POST['phonenumber'];

	$sql = "UPDATE customer SET customer_name='$updateName',customer_hpNo='$updateTelephone'WHERE customer_id='$customer_id'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='customer.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>