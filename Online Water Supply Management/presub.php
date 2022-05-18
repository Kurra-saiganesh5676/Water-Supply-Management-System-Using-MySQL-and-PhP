<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
$email=$_SESSION['email'];
include("checklogin.php");
include('connect.php');
include('head2.php');
?>
<?php
$s=mysqli_query($con,"SELECT * from subscriptions where user='$email'");
if($s){
    if(mysqli_num_rows($s)<1){
        // echo "1";
        // echo mysqli_num_rows($s);
        echo '<h3 style="text-align:center;margin-top:30px;">Do you need subscription for selected items??</h3>';
        echo '<a href="address.php" class="btn btn-outline-success btn-lg" style="margin-left:600px;margin-top:40px">No, Thanks</a>';
        echo '<a href="subscribe.php" class="btn btn-outline-success btn-lg" style="margin-left:50px;margin-top:40px">Yes</a>';
    }
    else{
        echo'<script language="Javascript">
        window.location="address.php";
       </script>';
}
    }
?>
