<?php
$db_hostname="127.0.0.1";
$db_username="root";
$db_password="";
$db_name="water";
$con=mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$con){
	echo "connection failed".mysqli_connect_error();
	exit;
}
?>