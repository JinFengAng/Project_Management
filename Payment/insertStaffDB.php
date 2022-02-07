<?php
require('../config.php');
session_start();
if(isset($_POST['submit'])){
	$house = $_POST["house_id"];
	$staff = $_POST["customer_id"];
	$start_date = $_POST["start_date"];
	$days = $_POST["days"];
	$salary = $_POST["salary"];

	$sql = "INSERT INTO staff_work(house_id,customer_id,begin_date,n_days,salary) VALUES ('$house','$staff','$start_date','$days','$salary')";
	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script>window.location.href='viewINV.php?INVid=".$house."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}
