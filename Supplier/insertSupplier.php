<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}

function filterTable($query){
	$con = mysqli_connect("localhost","root","","projectmanagement");
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
	<div style="width: 100%;float: left;background-color: #272729; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2 style="color:white">新房子</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">			
				<form action="insertSupplierDB.php" method="POST">
					<div class="form-group">
						<label style="color: white">屋主姓名</label>
						<input type="text" name="name" placeholder="Owner Name" required>
					</div>
					<div class="form-group">
						<label style="color: white">工作详情</label>
						<input type="text" name="work_details" placeholder="Work details" required>
					</div>
					<div class="form-group">
						<label style="color: white">地址</label>
						<input type="text" name="address" placeholder="Address" required>
					</div>
					<div class="form-group">
						<label style="color: white">电话号码</label>
						<input type="text" name="phNumber" placeholder="Phone Number" required>
					</div>
					<input type="submit" name="submit">
					<a id="cancel" href="supplier.php">取消</a>	 				
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>