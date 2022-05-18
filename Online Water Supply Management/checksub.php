<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
error_reporting(0);
$email=$_SESSION['email'];
include("checklogin.php");
include('connect.php');
include("head2.php");
$sql="SELECT * from subscriptions where user='$email'";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<?php if(mysqli_num_rows($res)<1){
    ?>
    <h2>You havn't taken Subscription</h2>
    <?php }else{?> 
<div class="container mt-3" style="width: 500px;height: 600px;margin-left:300px;">       
  <table class="table table-dark table-striped table-bordered table-hover">
    <thead>
      <tr>
      <th>Subscription_id</th>
        <th>Product_id</th>
        <th>Quantity</th>
        <th>Order_by</th>
        <th>Delivery_address</th>
        <th>Payment</th>
        <th>Start_Date</th>
        <th>End_Date</th>
        <th>Delivery_time</th>
      </tr>
    </thead>
    <tbody>
    <?php 
        while($r = mysqli_fetch_assoc($res)){
        ?>
      <tr>
      <td><?php echo $r['id']; ?></td>
        <td><?php echo $r['prod_id']; ?></td>
        <td><?php echo $r['quantity']; ?></td>
        <td><?php echo $r['user']; ?></td>
        <td><?php echo $r['user_address']; ?></td>
        <td><?php echo $r['payment_stat']; ?></td>
        <td><?php echo $r['start_date']; ?></td>
        <td><?php echo $r['expire_date']; ?></td>
        <td><?php echo $r['delivery_time']; ?></td>
    </tr>
      <?php }?>
    </tbody>
  </table>
        </div>
        <?php }?>

</body>
</html>