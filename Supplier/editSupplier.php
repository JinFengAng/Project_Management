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
}
if($id == null)
{
	header("Location:supplier.php");
}
$sql = "SELECT * FROM supplier where house_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['owner_name'];
	$telephone = $rows['phNumber'];
	$address = $rows['house_address'];
	$email = $rows['work_details'];
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
				<h2 style="color:white">更改房子资料</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">		
				<form action="editSupplierDB.php?id=<?php echo $id ?>" method="POST">
					<div class="form-group">
						<label style="color: white">屋主姓名</label>
						<input type="text" name="name" placeholder="Company Name" value="<?php echo $name; ?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">工作详情</label>
						<input type="text" name="email" placeholder="Company Email" value="<?php echo $email;?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">电话号码</label>
						<input type="text" name="phonenumber" placeholder="Phone Number" value="<?php echo $telephone;?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">地址</label>
						<input type="text" name="address" placeholder="Company Address" value="<?php echo $address;?>" required>
					</div>
					<input type="submit" name="Update" value="Update">
					<a id="cancel" href="supplier.php">取消</a>			
				</form>
			</div>
		</div>		
	</div>
</body>
</html>