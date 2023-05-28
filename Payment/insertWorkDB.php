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
	if (!empty($_POST['item']) && !empty($_POST['unitPrice']) && is_array($_POST['item']) && is_array($_POST['unitPrice'])) {
		    $item_array = $_POST['item'];
		    $unitPrice_array = $_POST['unitPrice'];
		    for ($i = 0; $i < count($item_array); $i++) {
		        $item = $item_array[$i];
				$unitPrice = $unitPrice_array[$i];
		        $subTotal += $unitPrice;
		        $sql = ("INSERT INTO work_details (work_id, work_name, total) VALUES ('".$_SESSION['currentPOID']."', '$item', '$unitPrice')");
		        $conn->query($sql);
		    }
		    $totalPrice = $subTotal;
		    $sql = "INSERT INTO work(house_id, totalPrice) VALUES ('$house_id', '$totalPrice')";
		    if($conn->query($sql)===TRUE){
					echo "<script> alert('New Purchase Order is created successfully!')</script>";
					echo "<script> window.location='viewINV.php?INVid=$house_id'</script>";
			}
		}
}
?>