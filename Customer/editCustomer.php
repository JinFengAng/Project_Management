<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
$id=null;
if(!empty($_GET['id']))
{
	$id = $_GET['id'];
	$_SESSION['customer_id'] = $id;
}
if($id == null)
{
	header("Location:customer.php");
}
$sql = "SELECT * FROM customer where customer_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['customer_name'];
	$telephone = $rows['customer_hpNo'];
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
	<div style="width: 100%;height: 100%;float: left;background-color: #272729; position: fixed; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2 style="color:white">更改员工资料</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">		
				<form action="editCustomerDB.php" method="POST">
					<div class="form-group">
						<label style="color: white">姓名</label>
						<input type="text" name="name" placeholder="Customer Name" value="<?php echo $name; ?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">电弧号码</label>
						<input type="text" name="phonenumber" placeholder="Phone Number" value="<?php echo $telephone;?>" required>
					</div>
					<input type="submit" name="Update" value="Update">
					<a id="cancel" href="customer.php">取消</a>								
				</form>
			</div>
		</div>		
	</div>
</body>
</html>