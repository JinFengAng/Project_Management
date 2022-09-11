<?php
require('../config.php');
session_start();
if(isset($_POST['submit'])){
	$name = $_POST["name"];
	$phonenumber = $_POST["phonenumber"];
	
	$sql = "INSERT INTO customer(customer_name,customer_hpNo) VALUES ('$name','$phonenumber')";
	if($conn->query($sql)){
			echo "<script>alert('New customer has been inserted successfully')</script>";
			echo "<script>window.location.href='customer.php'</script>";
	}else{
		echo "<script>alert('Something went wrong!Please Try Again!')</script>";
		echo "<script>window.location.href='customer.php'</script>";
	}
}
?>