<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
if(!empty($_GET['work_id']))
{
	$PURCHASEORDERID = $_GET['work_id'];
	$_SESSION['POID'] = $PURCHASEORDERID;
}
include('../Home/header.php');
$sql = "SELECT * FROM work where work_id = '$PURCHASEORDERID'";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
	$house_id = $rows['house_id'];
	$totalPrice = $rows['totalPrice'];
	$purchaseOrderID = sprintf('%05d',$PURCHASEORDERID);
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style.css">
<style type="text/css">
#backBtn{
		background-color: #4CAF50; /* Green */
		margin: 10px;
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 16px;
	    cursor: pointer;
	    float: left;
	}
	.editBtn{
		padding: 4px 10px;
		margin-right: 6px;
		-webkit-transition-duration: 0.4s;
		transition-duration: 0.4s;
		border: 1px solid black;
	}
	.delBtn{
		padding: 4px 10px;
		margin-right: 6px;
		-webkit-transition-duration: 0.4s;
		transition-duration: 0.4s;
		border: 1px solid black;
	}
	.editBtn:hover{
		background-color: orange;
	    color: white;
	}
	.delBtn:hover{
		background-color: red;
	    color: white;
	}
</style>
</head>
<body>
	<div style="width: 100%;height: 100%;float: left;background-color: #272729; padding: 2.5%">
		<div>
			<h2 style="float: left; color: white">工作项目</h2>
		</div>
			<div style="margin:10px 20px;float:left;width: 96%;overflow-y: auto;">
				<div style="float: left;width: 50%;height: 100px;padding: 5px; color: white;">
					<?php
						$sql = "SELECT * FROM supplier WHERE house_id = '$house_id'";
						$result = $conn->query($sql);
						while($rows = $result->fetch_assoc()){
							$name = $rows['owner_name'];
							$telephone = $rows['phNumber'];
							$address = $rows['house_address'];
							$work_details = $rows['work_details'];
						}
					?>
					<div><b>屋主资料</b></div>
					<div>屋主姓名: <?php echo $name;?></div>
					<div>电话号码: <?php echo $telephone;?></div>
					<div>地址: <?php echo $address;?></div>
					<div>工作详情: <?php echo $work_details;?></div>
				</div>
				<div style="float: right; margin-bottom: 5px; height: 40px;width: 100%;">
					<a style="float: right;" href="addItemWork.php?work_id=<?php echo $PURCHASEORDERID;?>" class="button button1">
						<span>加工作</span></a>
				</div>
				<div style="width: 100%;height:500px;float: left;" id="table-wrapper">
					<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table">
					<thead style="background-color: #6228b8">
					 		<tr>
						 		<th>工作详情</th>
							 	<th>总价(SGD)</th>
							 	<th>Actions</th>
						 	</tr>
					 	</thead>					 		
						<tbody id="itemTable">
							<?php
								$sql = "SELECT * FROM work_details WHERE work_id = '$PURCHASEORDERID'";
								$result = $conn->query($sql);
								while($rows = $result->fetch_assoc()){
									$total = $rows['total'];
									$total2 = sprintf('%0.2f',$total);
							?> 
						 	<tr>
						 		<td><label><?php echo $rows['work_name'];?></label></td>
						 		<td><label><?php echo $total2;?></label></td>
						 		<td>
						 			<a href="editItemWork.php?work_Did=<?php echo $rows['work_Did'];?>"><span class="editBtn">Edit</span></a>
						 			<a href="deleteItemWork.php?work_Did=<?php echo $rows['work_Did'];?>" onclick="return confirm('Are you sure you want to delete this?')"><span class="deleteBtn">Delete</span></a>
						 		</td>
						 	</tr>
						 	<?php
						 	}
						 	?>
						 	<tr>
						 		<td colspan="1"></td>
						 		<td>
						 			<label>Total: </label>
						 			<br>
						 			<label><?php echo "SGD".$totalPrice;?></label>
						 		</td>
						 	</tr>
					 	</tbody>
					</table>
					<div style="width: 100%;height: 45px;margin-top: 10px;">
					 	<button id="backBtn" onclick="window.location='../Payment/viewINV.php?INVid=<?php echo $_SESSION['INVid']?>'">返回</button>		 	
					</div>	
				</div>			
			</div>
		</div>		
	</div>
</body>
</html>