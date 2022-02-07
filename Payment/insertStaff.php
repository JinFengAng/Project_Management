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
	<div style="width: 100%;float: left; background-color: #272729; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px;">
				<h2 style="color:white">员工</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">			
				<form action="insertStaffDB.php" method="POST">
					<div class="form-group">
						<label style="color: white">员工姓名</label>
						<select name='customer_id' class='form-control' style='width:20%'><?php
								$sql = 'SELECT * FROM customer';
								$result = $conn->query($sql);
								while($row3 = $result->fetch_array()){
									$id = $row3['customer_id'];
									$name = $row3['customer_name'];?>
								<option value='<?php echo $id; ?>'><?php echo $name; }?></option>
						</select>
						<input type="hidden" name="house_id" value="<?php echo $_SESSION['INVid']?>">
					</div>
					<br>
					<div class="form-group">
						<label style="color: white">工作日期</label>
						<input type="date" name="start_date" placeholder="DD/MM/YYYY" required>
					</div>
					<div class="form-group">
						<label style="color: white">天</label>
						<input type="number" step="0.5" name="days" placeholder="0.5=半天, 1=整天" required>
					</div>
					<div class="form-group">
						<label style="color: white">工资</label>
						<input type="number" name="salary" placeholder="这个记入的总工资" required>
					</div>
					<input type="submit" name="submit">
					<a id="cancel" href="viewINV.php?INVid=<?php echo $_SESSION['INVid']?>">取消</a>						
				</form>
			</div>
		</div>		
	</div>
</body>
</html>