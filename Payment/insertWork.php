<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
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
				<h2 style="color:white">工作</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">			
				<form action="insertWorkDB.php" method="POST">
					<div class="form-group">
						<label style="color: white">工作详情</label>
						<input type="text" name="work_name" placeholder="Work Details" required>
						<input type="hidden" name="house_id" value="<?php echo $_SESSION['INVid']?>">
					</div>
					<br>
					<div class="form-group">
						<label style="color: white">价钱</label>
						<input type="number" name="price" placeholder="price" required>
					</div>
					<input type="submit" name="submit">
					<a id="cancel" href="viewINV.php?INVid=<?php echo $_SESSION['INVid']?>">取消</a>						
				</form>
			</div>
		</div>		
	</div>
</body>
</html>