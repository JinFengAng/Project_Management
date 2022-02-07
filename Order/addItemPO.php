<?php
require('../config.php');
session_start();
if(!isset($_SESSION['username'])){
	header("Location:loginAdmin.php");
}
if(!empty($_GET['POid']))
{
	$PURCHASEORDERID = $_GET['POid'];
	$_SESSION['POID'] = $PURCHASEORDERID;
}
$purchaseOrderID = sprintf('%05d',$PURCHASEORDERID);
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
				<h2>PO<?php echo $purchaseOrderID;?>:加材料</h2>
			</div>
			<div style="width: 98%;margin: 10px; float: left;">		
				<form action="addItemPODB.php" method="POST">
					<fieldset>
						<label style="color: white">材料</label>
						<div>
						<input type="text" name="item" placeholder="Item" required>
						</div>
						<label style="color: white;">数量</label>
						<input type="number" name="quantity" placeholder="Quantity" min="1" required>
						<label style="color: white;">价钱（per unit）</label>			
						<input type="number" name="unitPrice" placeholder="Price" step="any" required>
						<input type="submit" name="submit">
						<a id="cancel" href="editPO.php?POid=<?php echo $PURCHASEORDERID;?>">取消</a>					
					</fieldset>				
				</form>
			</div>
		</div>		
	</div>
</body>
</html>