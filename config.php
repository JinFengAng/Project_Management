<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'id18419767_projectmanagement';
// $username = 'id18419767_admin';
// $password = 'oG#X_TVdwsR01d$%';
// $database = 'id18419767_projectmanagement';

$conn = mysqli_connect($servername,$username,$password,$database);
header('charset=utf-8');
if(!$conn){
	die("Connection failed: " .mysqli_connect_error());
}
?>