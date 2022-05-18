<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
error_reporting(0);
$email=$_SESSION['email'];
include("checklogin.php");
include('connect.php');
include("head2.php");
$sql="SELECT * from cnfrm_orders where order_by='$email' and (status='Cancelled' or status='Delivered')";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<div class="container mt-3" style="width: 500px;height: 600px;margin-left:300px;">            
  <table class="table table-dark table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th>Product_id</th>
        <th>Order_id</th>
        <th>Order_by</th>
        <th>Delivery_address</th>
        <th>Delivery_mode</th>
        
        <th>Date</th>
        <th>Quantity</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($r = mysqli_fetch_assoc($res)){
        ?>
      <tr>
        <td><?php echo $r['product_id']; ?></td>
        <td><?php echo $r['order_id']; ?></td>
        <td><?php echo $r['order_by']; ?></td>
        <td><?php echo $r['delivery_address']; ?></td>
        <td><?php echo $r['delivery_mode']; ?></td>
        <td><?php echo $r['date']; ?></td>
        <td><?php echo $r['quantity']; ?></td>
        <td><?php echo $r['status']; ?></td>
    </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>