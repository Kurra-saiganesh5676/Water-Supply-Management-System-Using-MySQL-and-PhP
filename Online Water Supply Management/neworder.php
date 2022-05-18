<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include('connect.php');
include("checklogin.php");
include("head2.php");
$sql="SELECT * from cnfrm_orders where status='Out for Delivery'";
$res=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <style type="text/css">
    #leftdiv{
      height: 800px;
      width: 300px;
      background-color: rgb(60,60,60);
      float: left;
    }
    /*span{
      height: 150px;
      width: 230px;
      display: inline-block;
      margin: 20px;
      border-radius:7px;
    }*/
  </style>
</head>
<body>
<div class="container" id="leftdiv">
  <ul class="nav flex-column ">
    <li class="nav-item">
      <a class="nav-link mt-5" href="admin.php">Dashboard</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Water bottle info</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="wateradd.php">Add</a></li>
        <li><a class="dropdown-item" href="watermanage.php">Manage</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Order Management</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="neworder.php">New orders</a></li>
        <li><a class="dropdown-item" href="deliverorder.php">Delivered Orders</a></li>
        <li><a class="dropdown-item" href="cancelorder.php">Cancelled Orders</a></li>
        <li><a class="dropdown-item" href="subord.php">Subscribed Orders</a></li>
      </ul>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Users</a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="regusers.php">Normal users</a></li>
        <li><a class="dropdown-item" href="subusers.php">Subscribed users</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="queries.php">View Queries</a>
    </li>
    
  </ul>
</div>
<div class="container mt-3" style="width: 500px;height: 600px;">            
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
        <th>Modify</th>
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
        <td><a class="btn btn-sm btn-outline-danger" href='delivered.php?id=<?php echo $r['order_id']?>'>Mark as Delivered</a></td>
    </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</body>
</html>