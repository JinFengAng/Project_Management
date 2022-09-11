<?php
require('../config.php');
session_start();	
if(!empty($_GET['PODetailid']))
{
	$PURCHASEORDERDETAILID = $_GET['PODetailid'];
	$PURCHASEORDERID = $_SESSION['POID'];
	$sql = "SELECT * FROM purchase_order_detail WHERE PO_DTid = '$PURCHASEORDERDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$totalPrice = $row['quantity'] * $row['product_price'];
	$sql = "SELECT * FROM purchase_order WHERE PO_id = '$PURCHASEORDERID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$updateSubTotalPrice = $row['subTotal'] - $totalPrice;
	$updateTaxPrice = $updateSubTotalPrice * 0.00;
	$updateTotalOrderPrice = $updateSubTotalPrice + $updateTaxPrice;
	$sql = "UPDATE purchase_order SET subTotal='$updateSubTotalPrice',TaxPrice='$updateTaxPrice',totalPrice='$updateTotalOrderPrice' WHERE PO_id = '$PURCHASEORDERID'";
	$result = $conn->query($sql);
	$sql = "DELETE FROM purchase_order_detail WHERE PO_DTid = '$PURCHASEORDERDETAILID'";
	$conn->query($sql);
	echo "<script> alert('Item deleted')</script>";
	echo "<script> window.location='editPO.php?POid=".$PURCHASEORDERID."'</script>";
}
?>

