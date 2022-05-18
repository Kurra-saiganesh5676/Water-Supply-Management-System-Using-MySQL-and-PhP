<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include('connect.php');
include("checklogin.php");
include("head2.php");
if(isset($_POST['sub1'])){
      $name=$_POST['name'];
      $price=$_POST['price'];
      $code=$_POST['code'];
      $image=$_POST['img'];
      $img='product-images/'.$image;
      $sql = "INSERT INTO tblproduct (name,price,code,image) VALUES ('$name', '$price','$code','$img')";
      $result=mysqli_query($con,$sql);
      echo '<script language="Javascript">
                window.alert("item added");
                </script>';
}
      
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
<div class="container tab-pane active" id="home">
<div class="container mt-3 border border-5 border-primary" style="width:400px;height: 350px;padding-top: 20px;">
    <form method='post'>
      <div>
        <h6>Name(Capacity):</h6><input type="text" name="name" class="form-control" placeholder="Enter Name(Capacity) in this format only" required>
      </div>
      <div>
        <h6>Price:</h6><input type="number" name="price" class="form-control" required>
      </div>
      <div>
        <h6>Code:</h6><input type="text" name="code" class="form-control" required>
      </div>
      <div>
        <h6>Add Image:</h6><input type="file" name="img" class="form-control" required>
      </div>
      <button class="btn btn-success" name='sub1'>Submit</button>
      <button class="btn btn-success" type="reset">Cancel</button>
    </form>
  </div>
</div>
</body>
</html>