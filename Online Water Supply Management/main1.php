<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<?php
session_start();
$email=$_SESSION['email'];
// $_SESSION['email']=$email;
require_once("connect.php");
include("checklogin.php");
//code for Cart
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	//code for adding product in cart
	case "add":
        $pid=$_GET["pid"];
        $q=$_POST['quantity'];
        $query2 = "SELECT * FROM orders WHERE product_id = '$pid' and order_by='$email'";
        $result2 = mysqli_query($con,$query2);
        if ($result2) {
            if (mysqli_num_rows($result2) > 0) {
                echo '<script language="Javascript">
                    window.alert("Item already exists!");
                    </script>';
            } else {
                $result=mysqli_query($con,"SELECT price FROM tblproduct WHERE id='$pid'");
                $ro=mysqli_fetch_assoc($result);
                $a=$ro['price']*$q;
                $query="INSERT into orders (product_id,order_by,quantity,total) values('$pid','$email','$q','$a')";
                mysqli_query($con,$query);
            }
        } 
        else {
        echo 'Error: '.mysqli_error($con);
        }
        break;
        case "remove":
            $pid=$_GET["id"];
            $a=mysqli_query($con,"DELETE from orders where product_id='$pid' and order_by='$email'");
            header('main1.php');
        break;
        case "empty":
            // $email=$_SESSION['email'];
            $del="DELETE from orders where order_by='$email'";
            mysqli_query($con,$del);
            unset($_GET['empty']);
            
        break;	
		
}
}
?>

<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link rel="stylesheet" href="style.css">
<link href="style1.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<?php
		include("head2.php");
		
?>
<a class="btn btn-lg btn-outline-dark" href='myorders.php' style="margin:10px;">active orders</a>
<a class="btn btn-lg btn-outline-dark" href='oldorders.php'>old orders</a>
<a class="btn btn-lg btn-outline-dark" href='checksub.php'>Your Subscription</a>


	
<!-- Cart ---->
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a href="main1.php?action=empty" class="btn btn-outline-danger" style="float:right;">Empty Cart</a>
<?php
$sq="SELECT * FROM orders INNER JOIN tblproduct ON orders.product_id = tblproduct.id where order_by = '$email'";
$r=mysqli_query($con,$sq);
if(mysqli_num_rows($r)>0){
    ?>
<table class="table-striped table-hovered table-bordered" cellpadding="10" cellspacing="1" style="font-size: 0.9em;">
<thead>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
</thead>
<tbody>
<?php

while($z=mysqli_fetch_assoc($r)){
?>
<tr>
    <td><img src="<?php echo $z["image"]; ?>" class="cart-item-image" /><?php echo $z["name"]; ?></td>
    <td><?php echo $z["code"]; ?></td>
    <td style="text-align:right;"><?php echo $z["quantity"]; ?></td>
    <td  style="text-align:right;"><?php echo "Rs ".$z["price"]; ?></td>
    <td  style="text-align:right;"><?php echo "Rs ". number_format($z['total'],2); ?></td>
    <td style="text-align:center;"><a href="?action=remove&id=<?php echo $z["product_id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
    
</tr>


<?php
}
?>
<tr>
    <?php 
    $sum="SELECT sum(total) as tot, sum(quantity) as quant from orders where order_by= '$email'";
    $ss=mysqli_query($con,$sum);
    $abc=mysqli_fetch_assoc($ss);
    ?>

<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $abc['quant']; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rs ".number_format($abc['tot'], 2); ?></strong></td>
<?php $_SESSION['total']=$abc['tot'];?>
<td><a href="presub.php" class="btn btn-outline-dark" role="button">Proceed</a></td>
</tr>
</tbody>
</table>
<?php
}
else{
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
 }
?>
</div>
 
<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product= mysqli_query($con,"SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product)) { 
		while ($row=mysqli_fetch_array($product)) {
		
	?>
		<div class="product-item">
			<form method="post" action="main1.php?action=add&pid=<?php echo $row["id"]; ?>">
			<div class="product-image"><img src="<?php echo $row["image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $row["name"]; ?></div>
			<div class="text-secondary" style="float:left;"><?php echo "Rs ".$row["price"]; ?></div>&nbsp&nbsp
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" />&nbsp&nbsp<input type="submit" value="Add to Cart" class="btnAddAction" /></div>&nbsp&nbsp
			</div>
			</form>
		</div>
	<?php
		}
	}  else {
 echo "No Records.";
	}
// }
	?>
</div>

</body>
</html>