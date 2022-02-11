<?php
require('../config.php');
session_start();
$_SESSION["DATE"] = date("Y-m-d");
include('../Home/header.php');
if (!isset($_SESSION['username'])) {
	header("Location:loginAdmin.php");
}
$id = $_SESSION['INVid'];
$sql = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'projectmanagement' AND   TABLE_NAME  = 'work';";
$result = $conn->query($sql);
$lastPOID = $result->fetch_assoc();
$_SESSION['currentPOID'] = $lastPOID['AUTO_INCREMENT'];

$sql = "SELECT * FROM supplier where house_id = '$id'";
$result = $conn->query($sql);
while ($rows = $result->fetch_assoc()) {
	$name = $rows['owner_name'];
	$phNumber = $rows['phNumber'];
	$address = $rows['house_address'];
	$work_details = $rows['work_details'];
}

?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<style type="text/css">
		.submitBtn {
			background-color: #4CAF50;
			/* Green */
			margin: 10px;
			border: none;
			color: white;
			padding: 15px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			cursor: pointer;
			float: right;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<script>
		var rowNum;

		function createTable() {
			rowNum = document.getElementById("rowNum").value;
			var inputField = "<tr><td><input type='text' name='item[]' class='form-control' style='width:50%' required></td>" + "<td><input type='number' name='unitPrice[]' step='any' class='form-control' style='width:20%' required></td></tr>";
			for (var i = 0; i < rowNum; i++) {
				document.getElementById("myTable").insertRow(-1).innerHTML = inputField;
			}
			document.getElementById("rowNum").disabled = true;
			document.getElementById("goBtn").disabled = true;
		}

		function resetTable() {
			document.getElementById("rowNum").disabled = false;
			document.getElementById("goBtn").disabled = false;
			var rowCount = document.getElementById("myTable").rows.length;
			for (var i = 0; i < rowCount; i++) {
				document.getElementById("myTable").deleteRow(0);
			}
		}
	</script>
</head>

<body>
	<div style="width: 100%;height: 100%;float: left;background-color: #272729; position: fixed; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div>
				<h2 style="float: left; color: white">工作项目</h2>
			</div>
			<div style="margin:10px 20px;float:left;width: 96%;height:1000px;overflow-y: auto;">
				<div style="width: 100%;height:340px;float: left;" id="table-wrapper">
					<div style="float: left;margin-bottom: 10px; color: white">
						<br>
						<label>多少样:</label><input type="number" id="rowNum" min="1" required>
						<span><button onclick="createTable()" id="goBtn">Go</button></span>
						<span><button onclick="resetTable()" id="resetBtn">Reset</button></span>
					</div>
					<form action="insertWorkDB.php" method="POST">
						<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table table-borderless">
							<thead style="background-color: #6228b8">
								<tr>
									<th>工作详情</th>
									<th>价钱</th>
								</tr>
							</thead>
							<tbody id="myTable">
							</tbody>
						</table>
						<div style="width: 100%;height: 45px;">
							<input type="submit" name="save" value="Save" class="submitBtn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>