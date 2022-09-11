<?php
require('../config.php');
session_start();	
if(!empty($_GET['work_Did']))
{
	$PURCHASEORDERDETAILID = $_GET['work_Did'];
	$sql = "SELECT * FROM work_details WHERE work_Did = '$PURCHASEORDERDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$work_id = $row['work_id'];
	$totalPrice = $row['total'];
	$sql = "SELECT * FROM work WHERE work_id = '$work_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$updateTotalPrice = $row['totalPrice'] - $totalPrice;
	$sql = "UPDATE work SET totalPrice='$updateTotalPrice' WHERE work_id = '$work_id'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM work_details WHERE work_Did = '$PURCHASEORDERDETAILID'";
	$conn->query($sql);
	echo "<script> alert('Item deleted')</script>";
	echo "<script> window.location='editWork.php?work_id=".$work_id."'</script>";
}
?>

