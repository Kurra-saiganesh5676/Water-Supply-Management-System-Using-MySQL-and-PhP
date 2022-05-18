<?php
session_start();
$email=$_SESSION['email'];
include("checklogin.php");
include('connect.php');
if(isset($_POST['sub1'])){
    $num=$_POST['num'];
    $address=$_POST['address'];
    $dmode=$_POST['optradio'];
    $date=$_POST['date'];
    $sql = "UPDATE customer SET phnnum='$num',address='$address' WHERE email='$email'";
    $result=mysqli_query($con,$sql);
    $sql1 = "UPDATE orders SET delivery_address='$address',delivery_mode='$dmode',date ='$date' where Order_by='$email'";
    $result1=mysqli_query($con,$sql1);
    $pro="SELECT * FROM orders where order_by='$email'";
    $product1= mysqli_query($con,$pro);
      if ($product1) { 
		while ($row=mysqli_fetch_array($product1)) {
      $co='INSERT INTO cnfrm_orders (product_id,order_id,order_by,delivery_address,delivery_mode,status,date,quantity,p_total) VALUES ("'.$row['product_id'].'","'.$row['order_id'].'","'.$row['order_by'].'","'.$row['delivery_address'].'","'.$row['delivery_mode'].'","Out for Delivery","'.$row['date'].'","'.$row['quantity'].'","'.$row['total'].'")';
			$r=mysqli_query($con,$co);
		}
	   }
     if($dmode=='Online Payment'){
     echo '<script language="Javascript">
                window.location="payment1.php";
               </script>';
     }
      else{
        $de="DELETE from orders where order_by='$email'";
        $re=mysqli_query($con,$de);
        echo '<script language="Javascript">
                // window.alert("Order Accepted!!");
                window.location="continue.php";
               </script>';
      }
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta charset="utf-8">
   <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body id='pic'>
<?php
		include("head2.php");
		?> 
    <br>
    <div style="margin:25px 0 0 0;">
    <img src="img/water15.jpg" alt="add" style="float:left;margin-left:75px" >
<!-- <div class="container">
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
</div> -->
<div class="container border border-1 border-dark" style="width:500px;height: 550px;border: 2px solid black;margin-right:75px;">
<div class="ss"><b><h2 class="text-center">ENTER YOUR DETAILS</h2></b><br></div>
  <form method='post'>
  	<div class="form-group">
  		<label for="mobile">Mobile Number(+91)</label>
      <input type="tel" class="form-control" id="mobile" placeholder="Enter mobile number" name="num" required>
  	</div>
    <div class="form-group">
  		<label for="date">Date:</label>
      <input type="date" class="form-control" id="date" name="date" required>
  	</div>  
  	<div class="form-group">
  		<label for="address">Address</label>
        <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
  	</div>
  	<h3>Type of Payment</h3>
  	<div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="cash on delivery" checked>
      <label class="form-check-label" for="radio1">Cash on delivery</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="optradio" value="pay at office">
      <label class="form-check-label" for="radio2">Pay at office</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio3" name="optradio" value="Online Payment">
      <label class="form-check-label" for="radio3">Online Payment</label>
    </div>
    <button class="btn btn-primary" name='sub1'>Save Address</button>
  </form>
</div>
</div>
</body>
</html>