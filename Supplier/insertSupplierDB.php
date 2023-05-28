<?php
require('../config.php');
session_start();
if(isset($_POST['submit'])){
	$name = $_POST["name"];
	$work_details = $_POST["work_details"]; 
	$address = $_POST["address"];
	$phonenumber = $_POST["phNumber"];
	$today_date = date("d-m-Y");

$sql = "INSERT INTO supplier(owner_name, work_details, house_address, phNumber, completed) VALUES ('$name','$work_details','$address','$phonenumber', '0')";
$conn->query($sql);
$last_id = mysqli_insert_id($conn);
echo "<script> alert('Record updated')</script>";
echo "<script>window.location.href='../Payment/viewINV.php?INVid=".$last_id."'</script>";
}
?>