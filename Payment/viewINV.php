<?php
require('../config.php');
session_start();
if (!isset($_SESSION['username'])) {
	header("Location:loginAdmin.php");
}
include('../Home/header.php');
if (!empty($_GET['INVid'])) {
	$INVID = $_GET['INVid'];
	$_SESSION['INVid'] = $INVID;
}

$subtotal= 0;
$tax= 0;
$Totalprice = 0;


?>
<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style type="text/css">
		button {
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
			float: left;
		}
	</style>
</head>

<body>
	<div style="width: 100%;height: 100%;float: left;background-color: #272729; padding: 2.5%">
		<div>
			<h2 style="float: left; color: white">工作详情</h2>
		</div>
		<div style="margin:10px 20px;float:left;width: 96%;overflow-y: auto;">
			<div style="float: left;width: 50%;height: 150px;padding: 5px; color: white;">
				<?php
				$sql = "SELECT * FROM supplier WHERE house_id = '$INVID'";
				$result = $conn->query($sql);
				while ($rows = $result->fetch_assoc()) {
					$name = $rows['owner_name'];
					$telephone = $rows['phNumber'];
					$address = $rows['house_address'];
					$work_details = $rows['work_details'];
				}
				?>
				<div><b>屋主资料</b></div>
				<div>屋主姓名: <?php echo $name; ?></div>
				<div>工作详情: <?php echo $work_details; ?></div>
				<div>电话号码: <?php echo $telephone; ?></div>
				<div>地址: <?php echo $address; ?></div>
			</div>
			<button style="float: right;" class="button button1" onclick="window.location='insertPO.php'">加材料</button>
			<button style="float: right;" class="button button1" onclick="window.location='insertStaff.php'">加员工</button>
			<div style="width: 100%;height:500px;float: left;" id="table-wrapper">
				<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table">
					<thead style="background-color: #6228b8">
						<tr>
							<th>材料单/员工</th>
							<th>Actions</th>
							<th>总数</th>
						</tr>
					</thead>
					<tbody id="itemTable">
						<?php
						$sql = "SELECT * FROM purchase_order WHERE house_id = '$INVID'";
						$result = $conn->query($sql);
						while ($rows = $result->fetch_assoc()) {
							$INV = sprintf('%05d', $rows['PO_id']);
							$subtotal = $subtotal + $rows['subTotal'];
							$tax = $tax + $rows['taxPrice'];
							$Totalprice = $Totalprice + $rows['totalPrice'];
							$total2 = sprintf('%0.2f', $rows['totalPrice']);
						?>
							<tr>
								<td><label><?php echo $INV; ?></label></td>
								<td>
									<a href="../Order/editPO.php?POid=<?php echo $rows['PO_id']; ?>"><span class="editBtn">Edit</span></a>
								</td>
								<td><label><?php echo $total2; ?></label></td>
							</tr>
						<?php
						}
						?>
						<?php
						$sql2 = "SELECT s.*, c.customer_name FROM staff_work s LEFT JOIN customer c ON s.customer_id=c.customer_id WHERE house_id = '$INVID'";
						$result2 = $conn->query($sql2);
						while ($rows = $result2->fetch_assoc()) {
							$customer_name = $rows['customer_name'];
							$subtotal = $subtotal + $rows['salary'];
							$Totalprice = $Totalprice + $rows['salary'];
							$total2 = sprintf('%0.2f', $rows['salary']);
						?>
							<tr>
								<td><label><?php echo $customer_name; ?></label></td>
								<td>
									<a href="editStaff.php?staff_id=<?php echo $rows['staff_work_id']; ?>"><span class="editBtn">Edit</span></a>
								</td>
								<td><label><?php echo $total2; ?></label></td>
							</tr>
						<?php
						}
						?>
						<tr>
							<td colspan="2"></td>
							<td>
								<label>Sub-Total(Excluding Tax): </label>
								<br>
								<label><?php echo "SGD" . $subtotal; ?></label>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<label>TAX: </label>
								<br>
								<label><?php echo "SGD" . $tax; ?></label>
							</td>
						</tr>
						<tr>
							<td colspan="2"></td>
							<td>
								<label>Total: </label>
								<br>
								<label><?php echo "SGD" . $Totalprice; ?></label>
							</td>
						</tr>
					</tbody>
				</table>
				<!-- <div style="width: 100%;height:500px;float: left;" id="table-wrapper">
					<table border="1" style="background-color:white; border-collapse:collapse;width: 100%;" class="table">
						<thead style="background-color: #6228b8">
							<tr>
								<th>Receipt No</th>
								<th>Type</th>
								<th>Cheque No</th>
								<th>Bank</th>
								<th>Price</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody id="itemTable">
							<?php
							// $sql = "SELECT * FROM Receipt WHERE c_payment_id = '$INVID'";
							// $result = $conn->query($sql);
							// while ($rows = $result->fetch_assoc()) {
							// 	$id = $rows['receipt_id'];
							// 	$Type = $rows['type'];
							// 	$Cheque = $rows['cheque_no'];
							// 	$bank = $rows['bank'];
							// 	$price = $rows['price'];
							// 	$r_date = $rows['r_date'];
							?>
								<tr>
									<td><a href="viewReceipt.php?id=<?php echo $id ?>"><?php echo $id; ?></td></a></td>
									<td><label><?php echo $Type; ?></label></td>
									<td><label><?php echo $Cheque; ?></label></td>
									<td><label><?php echo $bank; ?></label></td>
									<td><label><?php echo $price; ?></label></td>
									<td><label><?php echo $r_date; ?></label></td>
								</tr>
							<?php
							// }
							?>
						</tbody>
					</table>
				</div> -->
			</div>
		</div>

	</div>
	</div>
</body>

</html>