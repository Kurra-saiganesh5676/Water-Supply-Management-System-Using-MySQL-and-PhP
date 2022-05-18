<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include('connect.php');
include("checklogin.php");
include("head2.php");

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
        <li><a class="dropdown-item" href="acceptorder.php">Order accept</a></li>
        <li><a class="dropdown-item" href="deliverorder.php">Delivered Orders</a></li>
        <li><a class="dropdown-item" href="cancelorder.php">Cancelled Orders</a></li>
      </ul>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="regusers.php">Regd Users</a>
    </li>
  </ul>
</div>

</body>
</html>
