<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'projectmanagement';

$conn = mysqli_connect($servername,$username,$password,$database);
header('charset=utf-8');
if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
?>