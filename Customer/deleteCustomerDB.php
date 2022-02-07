<?php
require('../config.php');
session_start();
$id=null;
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
}
if($id == null)
{
	header("Location:customer.php");
}

$sql = "DELETE FROM customer where customer_id=$id";

if($conn->query($sql)===TRUE)
{
	echo "<script> alert('Record successfully deleted')</script>";
	echo "<script> window.location='customer.php'</script>";
}
else
{
	echo "<script> alert('Error deleting record: ".$conn->error."')</script>";
	echo "<script> window.location='customer.php'</script>";
}
$conn->close();

?>