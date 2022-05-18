<?php
session_start();
include('connect.php');
include("checklogin.php");
$id = $_GET['id'];
$DelSql = "DELETE FROM tblproduct WHERE id=$id";
$res = mysqli_query($con, $DelSql);
if($res){
    header('location: watermanage.php');
}else{
    echo "Failed to delete";
}
?>