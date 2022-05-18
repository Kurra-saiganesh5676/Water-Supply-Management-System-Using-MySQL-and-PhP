<?php
session_start();
include('connect.php');
include("checklogin.php");
$id = $_GET['id'];
$query = "UPDATE cnfrm_orders SET status='Delivered' where order_id='$id'";
$res = mysqli_query($con, $query);
if($res){
    header('location: neworder.php');
}else{
    echo "Failed to delete";
}
?>