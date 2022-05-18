<?php
include("connect.php");
if(isset($_POST['sub'])){
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['pass'];
$cpass=$_POST['cpass'];
error_reporting(0);
if(strcmp($pass,$cpass)!=0){
    echo '<script language="Javascript">
         window.alert(Current password and Password should be same);
         window.location="index.php";
         </script>';
}
$sql="SELECT * from customer where email='$email'";
$res=mysqli_query($conn,$sql);

if(!$res)
{
    die("Data can't be retrieved: ".mysqli_query($conn));
}
else
{
    if($res->num_rows>0)
    {
        echo '<script language="Javascript">
            window.alert("There is already account associated with this Email. Please login");
            window.location="index.php";
            </script>';
    }
    else if($pass!=$cpass)
    {
        echo '<script language="Javascript">
            window.alert("passwords doesn\'\'t match");
            window.location="index.php";
            </script>';
    }
    else
    {
        $sql = "INSERT INTO customer (name,email, ph.no, password) VALUES ('$name', '$email', '$phone', '$pass');";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            die('Could not enter data: '.mysqli_query($conn));
        }
        echo '<script language="Javascript">
            window.alert("Registration Successfull");
            window.location="register.php";
           </script>';
    }

}}
mysqli_close($conn);
?>