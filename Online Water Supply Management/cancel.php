<?php
session_start();
include('connect.php');
include("checklogin.php");
$id = $_GET['id'];
// $s='SELECT * from cnfrm_orders where order_id="$id"';
// $e= mysqli_query($con, $s);
// $w=mysqli_fetch_assoc($e);
// if ($w['status']=='Out for Delivery'){
$query = "UPDATE cnfrm_orders SET status='Cancelled' where order_id='$id'";
$res = mysqli_query($con, $query);

if($res){
    header('location: myorders.php');
}else{
    echo "Failed to delete";
}
?>