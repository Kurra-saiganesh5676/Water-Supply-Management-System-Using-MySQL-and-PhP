<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
// error_reporting(0);
session_start();
include('connect.php');
include('head2.php');
include("checklogin.php");
$email=$_SESSION['email'];
$rql = "SELECT image,name,total,quantity,user_address FROM subscriptions INNER JOIN tblproduct p ON prod_id = p.id where user='$email'";
$res=mysqli_query($con,$rql);
if(isset($_POST['sub1'])){
    $up=mysqli_query($con,"UPDATE subscriptions set payment_stat='succesfull' where user='$email'");
    echo '<script language="Javascript">
                window.alert("payment succesful");
                window.location="main1.php";
               </script>';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
       
        th, td {
        border: 1px solid;
        padding: 10px;
        text-align: center;
        }
        table{
            width:1300px;
        }
    </style>
  </head>
  <body>
            <section style="padding:55px 0 0 0;">
            <div>
              <h2>Your orders<h2>
               <hr>   
             </div>
			<div>
			<div class="container-fluid my-4">
				<table > 
				<thead> 
					<tr> 
						<th>product image</th>
						<th>product name</th> 
						<th>product price</th>
            <th>quantity</th>
            <th>Delivery address</th>
					</tr> 
				</thead> 
				<tbody> 
				<?php 
				while($r = mysqli_fetch_assoc($res)){
				?>
					<tr> 
						<td> <img src='<?php echo $r['image']; ?>' height=50px; width=:50px;> </td>
						<td><?php echo $r['name']; ?></td>
						<td><?php echo $r['total']; ?></td>
            <td><?php echo $r['quantity'] ?></td>
            <td><?php echo $r['user_address'] ?></td>
					</tr> 
				<?php } ?>
				</tbody> 
				</table>
			</div>
			</div>
		</section>
      <section>
          <h2>Total amount: <?php $total=$_SESSION['total'];
          echo "RS. ".$total;?></h2>
        
      </section>
      <section style= 'margin:0 0 55px 0 ;'>

      <div class="row">
          <div class="col-md-8">
            <div>
            <form action="payment.php" method="post">
              <input type="hidden" name="subscription_id" value="<?php echo $subscriptionInfo['id'];  ?>">
              <input type="hidden" name="total" value="<?php echo $total;  ?>">
              <div class="" style="border: 2px solid #EFEFEF;margin: 20px; padding: 10px">
            
             <div class="form-group" >
              <label for="payment_type" class="col-2 col-form-label">Credit Card</label>
              <div class="col-10">
                <input type="number" maxlength="16" class="form-control" name="card_no" placeholder="Enter Credit Card Number" required="">                
              </div>
            </div>
            <div class="form-group" >
              <label for="payment_type" class="col-2 col-form-label">Name On Card</label>
              <div class="col-10">
                <input type="text" class="form-control" name="card_no" placeholder="Enter Credit Name On Card" required="">                
              </div>
            </div>

            <div class="form-group" >
              <label for="payment_type" class="col-2 col-form-label">Expiry Date</label>
              <div class="col-10">
                <input style="width: 200px; " type="number" class="form-control" name="card_no" placeholder="Enter Month" min = "1" max = "12" required="">

                <input style="width: 200px; " type="number" class="form-control" name="card_no" placeholder="Enter Year" min = "2022" max = "2030" required="">                    
              </div>
            </div>

            <div class="form-group" >
              <label for="payment_type" class="col-2 col-form-label">CVV</label>
              <div class="col-10">
                <input type="text" maxlength="3"  class="form-control" name="card_no" placeholder="Enter CCV Number" required="">                
              </div>
            </div><br>

            <div class="form-group" >
              <!-- <label for="payment_type" class="col-2 col-form-label">CCV</label> -->
              <div class="col-10">
               <!-- <button id="pay-now-btn" name="pay-now-btn" class="btn btn-info btn-large"><span class="fa fa-check"></span> PAY NOW</button> -->
                <input type="submit" id="pay-now-btn" name="sub1" class="btn btn-info btn-large"><span class="fa fa-check" value='PAY NOW'>                
              </div>
            </div>
            </div>

            </form>
          </div>
        </div>
      </div>
      </section>
  </body>
</html>