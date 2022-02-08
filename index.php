<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background-color: #f2f2f2;
		}
		form{
			padding: 10px;
			text-align: center;
		}
		label{
			font-size: 20px;
		}
		.inputBox{
			width: 30%;
		    padding: 12px 16px;
		    margin: 8px 0;
		    display: inline-block;
		    border: 1px solid #ccc;
		    border-radius: 4px;
		    box-sizing: border-box;
		}
		.loginBtn{
			padding: 12px 40px;
			border-radius: 2px solid black;
		}
	</style>
</head>
<body>
<div style="width: 100%;text-align: center;margin-top: 10%"><h1>Newspaper Distribution Managment System</h1></div>
<div style="border: 1px solid black;width: 50%;margin-left: 25%;height: 200px; ">
	<form action="loginAdminDB.php" method="POST">
		<label>Username:</label>
		<input type="text" name="username" class="inputBox"><br>
		<label>Password: </label>
		<input type="password" name="password" class="inputBox"><br>
		<input type="submit" name="login" value="Login" class="loginBtn">
	</form>
</div>
</body>
</html>