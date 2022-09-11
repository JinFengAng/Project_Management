<?php
require('../config.php');
session_start();
$work_id = $_GET['work_id'];
if(isset($_POST['submit'])){
	$item = $_POST['item'];
	$unitPrice = $_POST['unitPrice'];
	$sql = "INSERT INTO work_details (work_id, work_name, total) VALUES ('$work_id','$item', '$unitPrice')";
	$conn->query($sql);
	$sql = "SELECT * FROM work WHERE work_id = '$work_id'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentTotalOrderPrice = $row['totalPrice'];

	$updateTotalOrderPrice = $currentTotalOrderPrice + $unitPrice;

	$sql = "UPDATE work SET totalPrice='$updateTotalOrderPrice' WHERE work_id = '$work_id'";
	$conn->query($sql);
	echo "<script> alert('New Item added!')</script>";
	echo "<script> window.location='editWork.php?work_id=".$work_id."'</script>";
}
?>