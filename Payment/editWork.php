<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
$id=null;
if(!empty($_GET['work_id']))
{
	$id = $_GET['work_id'];
}

$sql = "SELECT * FROM work where work_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['work_name'];
	$price = $rows['price'];
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
				<h2 style="color:white">更改员工</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">		
				<form action="editWorkDB.php?id='<?php echo $id?>'" method="POST">
					<div class="form-group">
						<label style="color: white">工作</label>
						<input type="text" name="work_name" placeholder="work" value="<?php echo $name ?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">价钱</label>
						<input type="number" name="price" placeholder="price" value="<?php echo $price ?>" required>
					</div>
					<input type="submit" name="Update" value="Update">
					<a id="cancel" href="viewINV.php?INVid=<?php echo $_SESSION['INVid']?>">取消</a>								
				</form>
			</div>
		</div>		
	</div>
</body>
</html>