<?php
require('../config.php');
session_start();
$PODetailID = $_SESSION['PODetailID'];
$PURCHASEORDERID = $_SESSION['POID'];
if (isset($_POST['update'])) {
	$updateItem = $_POST['item'];
	$updateQuantity = $_POST['quantity'];
	$updateUnitPrice = $_POST['unitPrice'];
	$sql = "SELECT * FROM purchase_order WHERE PO_id = '$PURCHASEORDERID'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$currentSubTotalPrice = $row['subTotal'];
	$currentTaxPrice = $row['taxPrice'];
	$currentTotalOrderPrice = $row['totalPrice'];
	$sql = "SELECT * FROM purchase_order_detail WHERE PO_DTid = '".$_SESSION['PODetailID']."'";	
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$subTotal = $row['quantity'] * $row['product_price'];
	$currentSubTotalPrice = $currentSubTotalPrice - $subTotal;
	$updateSubTotalPrice = $updateUnitPrice*$updateQuantity;
	$updateSubTotalPrice = $currentSubTotalPrice + $updateSubTotalPrice;
	$updateTaxPrice = $updateSubTotalPrice * 0.00;
	$updateTotalOrderPrice = $updateSubTotalPrice + $updateTaxPrice;
	$sql = "UPDATE purchase_order SET subTotal='$updateSubTotalPrice',taxPrice='$updateTaxPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '$PURCHASEORDERID'";
	$conn->query($sql);
	$sql = "UPDATE purchase_order_detail SET product_name='$updateItem',quantity='$updateQuantity',product_price='$updateUnitPrice' WHERE PO_DTid='$PODetailID'";

	if($conn->query($sql)===TRUE){
		echo "<script> alert('Item updated')</script>";
		echo "<script> window.location='editPO.php?POid=".$PURCHASEORDERID."'</script>";
	}else{
		echo "Error:".$sql."<br>".$conn->error;
	}
}
?>