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
	header("Location:supplier.php");
}

$sql = "UPDATE supplier SET completed='1' WHERE house_id=$id";

if($conn->query($sql)===TRUE)
{
	echo "<script> alert('Completed')</script>";
	echo "<script> window.location='supplier.php'</script>";
}
else
{
	echo "<script> alert('Error failed to update record: ".$conn->error."')</script>";
	echo "<script> window.location='supplier.php'</script>";
}
$conn->close();

?>