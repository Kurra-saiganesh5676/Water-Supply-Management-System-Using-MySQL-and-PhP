
<?php
session_start();
$email=$_SESSION['email'];
include('connect.php');
include("checklogin.php");

if(isset($_POST['sub1'])){
    $num=$_POST['num'];
    $address=$_POST['address'];
    $duration=$_POST['optradio'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $dmode=$_POST['optradi'];
    $sql = "UPDATE customer SET phnnum='$num',address='$address' WHERE email='$email'";
    $result=mysqli_query($con,$sql);
    $pro="SELECT * FROM orders where order_by='$email'";
    $product1= mysqli_query($con,$pro);
      if ($product1) { 
		while ($row=mysqli_fetch_array($product1)) {
      $co='INSERT INTO subscriptions (prod_id,user,quantity,total) VALUES ("'.$row['product_id'].'","'.$row['order_by'].'","'.$row['quantity'].'","'.$row['total'].'")';
			$r=mysqli_query($con,$co);
		}
	   }
     if($duration=='1 month'){
       $ed= mysqli_query($con,"SELECT DATE_ADD('$date', INTERVAL 30 DAY) as d");
       $r3=mysqli_fetch_assoc($ed);
       $end=$r3['d'];
     }
     else if($duration=='6 months'){
      $ed= mysqli_query($con,"SELECT DATE_ADD('$date', INTERVAL 180 DAY) as d");
      $r3=mysqli_fetch_assoc($ed);
      $end=$r3['d'];
    }
    else if($duration=='1 year'){
      $ed= mysqli_query($con,"SELECT DATE_ADD('$date', INTERVAL 360 DAY) as d");
      $r3=mysqli_fetch_assoc($ed);
      $end=$r3['d'];
    }

    $sqq = "UPDATE subscriptions SET start_date='$date',user_address='$address',user_contact='$num',duration='$duration',delivery_time='$time',expire_date='$end',payment_stat='$dmode' WHERE user='$email'";
    $res1=mysqli_query($con,$sqq);
    $de="DELETE from orders where order_by='$email'";
    $total=$_SESSION['total'];
    if ($duration=='1 month'){
      $total=$total*30;
    }
  else if ($duration=='6 months'){
      $total=$total*180;
  }
  else if ($duration=='1 year'){
      $total=$total*360;
  }
  $_SESSION['total']=$total;
    $re=mysqli_query($con,$de);
     if($dmode=='Online Payment'){
     echo '<script language="Javascript">
                window.location="payment.php";
               </script>';
     }
      else{
        echo '<script language="Javascript">
                window.alert("Order Accepted!!");
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
<body id='pic4'>
<?php
		include("head2.php");
		?> 
    <br>
    <div style="margin:25px 0 0 0;">
    <img src="img/water9.jpg" alt="add" style="float:left;margin-left:75px" >
<!-- <div class="container">
  <div class="bg"></div>
  <div class="bg bg2"></div>
  <div class="bg bg3"></div>
</div> -->
<div class="container border border-1 border-dark" style="width:500px;height: 850px;border: 2px solid black;margin-right:75px;">
<div class="ss"><b><h2 class="text-center">ENTER YOUR DETAILS TO SUBSCRIBE</h2></b><br></div>
  <form method='post'>
  	<div class="form-group">
  		<label for="mobile">Mobile Number(+91)</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter mobile number" name="num" required>
  	</div>
    <div class="form-group">
  		<label for="date">Start Date:</label>
      <input type="date" class="form-control" id="date" name="date" required>
  	</div>  
  	<div class="form-group">
  		<label for="address">Address</label>
        <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
  	</div>
    <h3>Duration</h3>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1 month">
      <label class="form-check-label" for="radio1">1 month</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="optradio" value="6 months">
      <label class="form-check-label" for="radio2">6 months</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio3" name="optradio" value="1 year">
      <label class="form-check-label" for="radio1">1 year</label>
    </div>
    <div class="form-group">
  		<label for="time">Time of Delivery:</label>
      <input type="time" class="form-control" id="time" name="time" required>
  	</div>  
  	<h3>Type of Payment</h3>
  	<div class="form-check">
      <input type="radio" class="form-check-input" id="radio1" name="optradi" value="cash on delivery" checked>
      <label class="form-check-label" for="radio1">Cash on delivery</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio2" name="optradi" value="pay at office">
      <label class="form-check-label" for="radio2">Pay at office</label>
    </div>
    <div class="form-check">
      <input type="radio" class="form-check-input" id="radio3" name="optradi" value="Online Payment">
      <label class="form-check-label" for="radio3">Online Payment</label>
    </div>
    <button class="btn btn-primary" name='sub1'>Save and Pay Ammount</button>
  </form>
</div>
</div>
</body>
</html>