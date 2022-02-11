<?php
require('../config.php');
session_start();
$work_Did = $_GET['work_Did'];
$PURCHASEORDERID = $_SESSION['POID'];
if (isset($_POST['update'])) {
	$updateItem = $_POST['item'];
	$updateUnitPrice = $_POST['unitPrice'];
	$sql = "SELECT * FROM work_details WHERE work_Did = '".$work_Did."'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$work_id = $row['work_id'];
	$subTotal = $row['total'];

	$sql = "SELECT * FROM work WHERE work_id = '$work_id'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentTotalOrderPrice = $row['totalPrice'];
	
	$currentSubTotalPrice = $currentTotalOrderPrice - $subTotal;
	$updateSubTotalPrice = $currentSubTotalPrice + $updateUnitPrice;
	$sql = "UPDATE work SET totalPrice='$updateSubTotalPrice' WHERE work_id = '$work_id'";
	$conn->query($sql);
	$sql = "UPDATE work_details SET work_name='$updateItem', total='$updateUnitPrice' WHERE work_Did='$work_Did'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Item updated')</script>";
		echo "<script> window.location='editWork.php?work_id=".$work_id."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}
?>