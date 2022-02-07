<?php
require('../config.php');
session_start();
if(isset($_POST['submit'])){
	$name = $_POST["name"];
	$work_details = $_POST["work_details"]; 
	$address = $_POST["address"];
	$phonenumber = $_POST["phNumber"];
	$today_date = date("d-m-Y");

$sql = "INSERT INTO supplier(owner_name, work_details, house_address, phNumber) VALUES ('$name','$work_details','$address','$phonenumber')";
$conn->query($sql);
$last_id = mysqli_insert_id($conn);
$sql2 = "INSERT INTO c_payment(c_date, c_payment_price, status, house_id) VALUES ('$today_date','0','0','$last_id')";
$conn->query($sql2);
echo "<script> alert('Record updated')</script>";
echo "<script>window.location.href='../Payment/viewINV.php?INVid=".$last_id."'</script>";
}
?>