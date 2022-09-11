<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}	
if(!empty($_GET['PODetailid']))
{
	$name = '';
	$PURCHASEORDERDETAILID = $_GET['PODetailid'];
	$_SESSION['PODetailID'] = $PURCHASEORDERDETAILID;
	$sql = "SELECT * FROM purchase_order_detail WHERE PO_DTid = '$PURCHASEORDERDETAILID'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$name = $row['product_name'];
	$quantity = $row['quantity'];
	$productPrice = $row['product_price'];
	
}
$purchaseOrderID = sprintf('%05d',$_SESSION['POID']);
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
				<h2>PO<?php echo $purchaseOrderID;?>:更改材料资料</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">	
				<form action="editItemPODB.php" method="POST">
					<fieldset>
						<label style="color: white">材料</label>
						<input type="text" name="item" placeholder="Item Name" value="<?php echo $name;?>">
						<label style="color: white">数量</label>
						<input type="number" name="quantity" placeholder="Quantity" min="1" value="<?php echo $quantity;?>" required>
						<label style="color: white">价钱（per unit）</label>
						<input type="number" name="unitPrice" placeholder="Price" step="any" value="<?php echo $productPrice;?>">
						<input type="submit" name="update" class="submit" value="Update">
						<a id="cancel" href="editPO.php?POid=<?php echo $_SESSION['POID'];?>">Cancel</a>	
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>