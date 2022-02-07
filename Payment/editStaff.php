<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
$id=null;
if(!empty($_GET['staff_id']))
{
	$id = $_GET['staff_id'];
}
if($id == null)
{
	header("Location:customer.php");
}
$sql = "SELECT * FROM staff_work s LEFT JOIN customer c ON s.customer_id = c.customer_id where staff_work_id = '$id'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$name = $rows['customer_name'];
	$cus_id = $rows['customer_id'];
	$date = $rows['begin_date'];
	$days = $rows['n_days'];
	$salary = $rows['salary'];
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
				<form action="editStaffDB.php?id='<?php echo $id?>'" method="POST">
					<div class="form-group">
						<label style="color: white">员工姓名</label>
						<select style="width: 12%;margin-bottom: 10px;" name="customer_name" class="form-control">
								<?php
								//mysqli selecty query for category
								$sql = "SELECT customer_id, customer_name FROM customer";
								$result = $conn->query($sql);

								while($row3 = $result->fetch_array()){
									$id = $row3['customer_id'];
									$name = $row3['customer_name'];
								?>
								<option value="<?php echo $id; ?>" <?php if($id == $cus_id) echo "selected";?>><?php echo $name; ?></option>
								<?php
								}
								?>
							</select>
					</div>
					<div class="form-group">
						<label style="color: white">工作日期</label>
						<input type="date" name="start_date" placeholder="DD/MM/YYYY" value="<?php echo $date ?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">天</label>
						<input type="number" step="0.5" name="days" placeholder="0.5 for half day, 1 for full day" value="<?php echo $days ?>" required>
					</div>
					<div class="form-group">
						<label style="color: white">工资</label>
						<input type="number" name="salary" placeholder="Salary for this record" value="<?php echo $salary ?>" required>
					</div>
					<input type="submit" name="Update" value="Update">
					<a id="cancel" href="viewINV.php?INVid=<?php echo $_SESSION['INVid']?>">取消</a>								
				</form>
			</div>
		</div>		
	</div>
</body>
</html>