<?php
require('../config.php');
session_start();
$house_id = $_SESSION['INVid'];
$DATE = $_SESSION["DATE"];
$subTotal = 0;
$TaxRate = 0.00;
$totalPrice = 0;
$day = date('w');
if(isset($_POST['save'])){
	if (!empty($_POST['item']) && !empty($_POST['quantity']) && !empty($_POST['unitPrice']) && is_array($_POST['item']) && is_array($_POST['quantity']) && is_array($_POST['unitPrice'])) {
		    $item_array = $_POST['item'];
		    $quantity_array = $_POST['quantity'];
		    $unitPrice_array = $_POST['unitPrice'];
		    for ($i = 0; $i < count($item_array); $i++) {
		        $item = $item_array[$i];
		        $quantity = $quantity_array[$i];
		        $unitPrice = $unitPrice_array[$i];
		        $subTotal += $unitPrice * $quantity;
		        $sql = ("INSERT INTO purchase_order_detail (PO_id, product_name, quantity, product_price) VALUES ('".$_SESSION['currentPOID']."', '$item', '$quantity', '$unitPrice')");
		        $conn->query($sql);
		    }
		    $TaxPrice = $subTotal * $TaxRate;
		    $totalPrice = $TaxPrice + $subTotal;
		    $sql = "INSERT INTO purchase_order(house_id, subTotal, taxPrice, totalPrice, purchase_date) VALUES ('$house_id' ,'$subTotal','$TaxPrice','$totalPrice', '$DATE')";
		    if($conn->query($sql)===TRUE){
					echo "<script> alert('New Purchase Order is created successfully!')</script>";
					echo "<script> window.location='viewINV.php?INVid=$house_id'</script>";
			}
		}
}
?>