<?php
require('../config.php');
session_start();
$POID = $_SESSION['POID'];
if(isset($_POST['submit'])){
	$item = $_POST['item'];
	$quantity = $_POST['quantity'];
	$unitPrice = $_POST['unitPrice'];
	$sql = "INSERT INTO purchase_order_detail (PO_id, product_name, quantity, product_price) VALUES ('$POID','$item', '$quantity', '$unitPrice')";
	$conn->query($sql);
	$sql = "SELECT * FROM purchase_order WHERE PO_id = '$POID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentSubTotalPrice = $row['subTotal'];
	$currentTaxPrice = $row['taxPrice'];
	$currentTotalOrderPrice = $row['totalPrice'];

	$updateSubTotalPrice = $quantity*$unitPrice;
	$updateSubTotalPrice = $currentSubTotalPrice + $updateSubTotalPrice;
	$updateTaxPrice = $updateSubTotalPrice * 0.00;
	$updateTotalOrderPrice = $updateSubTotalPrice + $updateTaxPrice;

	$sql = "UPDATE purchase_order SET subTotal='$updateSubTotalPrice',TaxPrice='$updateTaxPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '$POID'";
	$conn->query($sql);
	echo "<script> alert('New Item added!')</script>";
	echo "<script> window.location='editPO.php?POid=".$POID."'</script>";
}
?>