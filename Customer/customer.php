<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
function filterTable($query){
    $con = mysqli_connect("localhost","root","","projectmanagement");
    // $con = mysqli_connect("localhost","id18419767_admin","oG#X_TVdwsR01d$%","id18419767_projectmanagement");
    $filter_Result = mysqli_query($con ,$query);
    return $filter_Result;
}

// if(isset($_POST['search'])){
// 	$valueToSearch = $_POST['valueToSearch'];
// 	$query = "SELECT * FROM customer WHERE customer_name LIKE '%$valueToSearch%'";
// 	$search_result = filterTable($query);  
// }else{
	$query = "SELECT * FROM customer";
	$search_result = filterTable($query);
// }
include('../Home/header.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
	<div style="width: 100%;height: 100%;float: left;background-color: #272729; position: fixed; padding: 2.5%">
		<div>
			<h2 style="float: left; color: white">员工</h2>
		</div>
		<div>
			<br>
			<br>
			<button style="float: right;" class="button button1" onclick="window.location='insertCustomer.php'">新员工</button>
			<!-- <form action="customer.php" method="POST">
				<input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
				<input type="submit" name="search" value="Search">
			</form> -->
		</div>
		<div style="margin:10px 20px;float:left;width: 96%;overflow-y: auto;">
			<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table">
				<thead style="background-color: #6228b8">
					<tr>
						<th>姓名</th>
						<th>电话</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				if ($search_result->num_rows > 0){
					while($rows = $search_result->fetch_assoc()){
						echo "<tr>";
						echo "<td>".$rows['customer_name']."</td></a>";
						echo "<td>".$rows['customer_hpNo']."</td>";
						echo "<td><a href='editCustomer.php?id=".$rows['customer_id']."'>
						<span class='editBtn'>更改</span></a>
						<a href='deleteCustomerDB.php?id=".$rows['customer_id']."' onclick=\"return confirm('Are you sure you want to delete this?')\">
						<span class='deleteBtn'>清除</span></a></td>";
						echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>