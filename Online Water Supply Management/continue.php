<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include('connect.php');
include("checklogin.php");
include("head2.php");
?>
<?php
echo '<h3 style="text-align:center;margin-top:30px;">Yaay! Your order has been accepted..🥳🥳</h3>';
echo '<a href="main1.php?action=empty" class="btn btn-outline-success btn-lg" style="margin-left:650px;margin-top:40px">Continue Shopping</a>';
?>