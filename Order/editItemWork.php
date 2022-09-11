<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}	
if(!empty($_GET['work_Did']))
{
	$name = '';
	$PURCHASEORDERDETAILID = $_GET['work_Did'];
	$_SESSION['work_Did'] = $PURCHASEORDERDETAILID;
	$sql = "SELECT * FROM work_details WHERE work_Did = '$PURCHASEORDERDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name = $row['work_name'];
	$productPrice = $row['total'];
	
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
	<div style="width: 100%; height:100%;float: left; background-color: #272729; position: fixed; padding: 2.5%">
		<div style="width: 98%;margin: 10px;">
			<div style="width: 100%;height: 45px; color: white">
				<h2>更改工作详情</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">	
				<form action="editItemWorkDB.php?work_Did= <?php echo $PURCHASEORDERDETAILID ?>" method="POST">
					<fieldset>
						<label style="color: white">工作详情</label>
						<input type="text" name="item" placeholder="Item Name" value="<?php echo $name;?>">
						<label style="color: white">价钱</label>
						<input type="number" name="unitPrice" placeholder="Price" step="any" value="<?php echo $productPrice;?>">
						<input type="submit" name="update" class="submit" value="Update">
						<a id="cancel" href="editWork.php?work_id=<?php echo $_SESSION['POID'];?>">Cancel</a>	
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>