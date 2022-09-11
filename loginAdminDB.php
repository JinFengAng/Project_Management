<?php
require('config.php');
session_start();

if(isset($_POST['login'])){
	$username2=$_POST['username'];
	$password1=$_POST['password'];
	$password2= md5($password1);

	$sql="SELECT * FROM admin WHERE username='$username2' and password='$password2'";

	$result = $conn->query($sql);

	if($result->num_rows>0){
		$_SESSION['username'] = $username2;
		$rows = $result->fetch_assoc();
		$_SESSION['user_level'] = $rows['language'];
		$today_date = date('Y-m-d');
		$_SESSION['today_date'] = $today_date;
		echo "<script>window.location='Home/home.php';</script>";
	}
	else
	{
		header("Location:index.php");
	}
}

?>