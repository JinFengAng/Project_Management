<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}

function filterTable($query){
    $con = mysqli_connect("localhost","root","","id18419767_projectmanagement");
    // $con = mysqli_connect("localhost","id18419767_admin","oG#X_TVdwsR01d$%","id18419767_projectmanagement");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}
include('../Home/header.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../styleform.css">
</head>
<body>
	<div style="width: 100%;float: left; background-color: #272729; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2 style="color:white">新员工</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">			
				<form action="insertCustomerDB.php" method="POST">
					<div class="form-group">
						<label style="color: white">姓名</label>
						<input type="text" name="name" placeholder="Customer Name" required>
					</div>
					<div class="form-group">
						<label style="color: white">电话号码</label>
						<input type="text" name="phonenumber" placeholder="Phone Number" required>
					</div>
					<input type="submit" name="submit">
					<a id="cancel" href="customer.php">取消</a>						
				</form>
			</div>
		</div>		
	</div>
</body>
</html>