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
// $user_level = $_SESSION['user_level'];
// if(isset($_POST['search'])){
// 	$valueToSearch = $_POST['valueToSearch'];
// 	$query = "SELECT * FROM supplier WHERE company_name LIKE '%$valueToSearch%'";
// 	$search_result = filterTable($query);  
// }else{
	$query = "SELECT * FROM supplier ORDER BY house_id DESC";
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
			<h2 style="float: left; color: white">房子</h2>
		</div>
		<div>
			<br>
			<br>
			<button style="float: right;" class="button button1" onclick="window.location='insertSupplier.php'">新房子</button>
			<!-- <form action="supplier.php" method="POST">
				<input style="border-radius: 5px;margin-left: 20px;" type="text" size="30" placeholder="Search here..." name="valueToSearch"> 
				<input type="submit" name="search" value="Search">
			</form> -->
		</div>
		<div style="margin:10px 20px;float:left;width: 96%;overflow-y: auto;">
			<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table">
				<thead style="background-color: #6228b8">
				<tr>
					<th>屋主姓名</th>
					<th>工作详情</th>
					<th>地址</th>
					<th>电话号码</th>
					<th>完成</th>
					<th>Action</th>
				</tr>
				</thead>
				<?php
				if ($search_result->num_rows > 0){
					while($rows = $search_result->fetch_assoc()){
						echo "<tr>";
						echo "<td><a href='../Payment/viewINV.php?INVid=".$rows['house_id']."'>".$rows['owner_name']."</td></a></td>";
						echo "<td>".$rows['work_details']."</td>";
						echo "<td>".$rows['house_address']."</td>";
						echo "<td>".$rows['phNumber']."</td>";
						echo "<td>";
							if($rows['completed']== '1'){
								echo "完成";
							}else{
								echo "未完成";
							}
						"</td>";
						echo "<td><a href='editSupplier.php?id=".$rows['house_id']."'>
						<span class='editBtn'>Edit</span></a>
						<a href='deleteSupplierDB.php?id=".$rows['house_id']."' onclick=\"return confirm('Are you sure you want to delete this?')\">
						<span class='deleteBtn'>Delete</span></a>
						<a href='complete.php?id=".$rows['house_id']."' onclick=\"return confirm('Are you sure?')\">
						<span class='editbtn'>Completed</span></a></td>";
						echo "</tr>";
					}
				}
				?>
			</table>
		</div>
	</div>
</body>
</html>