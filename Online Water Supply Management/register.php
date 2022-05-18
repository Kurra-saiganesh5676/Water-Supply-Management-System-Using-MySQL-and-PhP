<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include("head.php");
include('connect.php');
$email=$_SESSION['email'];
$name=$_SESSION['name'];
echo "HI, ".$name." complete your profile!";
?>
<!DOCTYPE html>
<html>
        <head>
                <title>Registration</title>
        </head>
        <body id="pic">
        
        </body>
</html>
