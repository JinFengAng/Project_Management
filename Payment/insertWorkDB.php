<?php
require('../config.php');
session_start();
if(isset($_POST['submit'])){
	$house = $_POST["house_id"];
	$work_name = $_POST["work_name"];
	$price = $_POST["price"];

	$sql = "INSERT INTO work(house_id,work_name,price) VALUES ('$house','$work_name','$price')";
	if($conn->query($sql)===TRUE){
		echo "<script> alert('Record updated')</script>";
		echo "<script>window.location.href='viewINV.php?INVid=".$house."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}
