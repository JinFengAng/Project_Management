<?php
require('../config.php');
session_start();
$supplier_id = $_GET['id'];
if (isset($_POST['Update'])) {
	$updateName = $_POST['name'];
	$updateTelephone = $_POST['phonenumber'];
	$updateAddress = $_POST['address'];
	$updateEmail = $_POST['email'];

	$sql = "UPDATE supplier SET owner_name='$updateName',phNumber='$updateTelephone',house_address='$updateAddress',work_details='$updateEmail' WHERE house_id='$supplier_id'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script> window.location='supplier.php'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}

?>