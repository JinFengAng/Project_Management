<?php
require('../config.php');
session_start();
$supplier_id = $_SESSION['supplier_id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateTelephone = $_POST['phonenumber'];
	$updateAddress = $_POST['address'];
	$updateEmail = $_POST['email'];
	$updatelevel = $_POST['user_level'];

	$sql = "UPDATE supplier SET owner_name='$updateName',phNumber='$updateTelephone',house_address='$updateAddress',work_details='$updateEmail',user_level='$updatelevel' WHERE supplier_id='$supplier_id'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='supplier.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>