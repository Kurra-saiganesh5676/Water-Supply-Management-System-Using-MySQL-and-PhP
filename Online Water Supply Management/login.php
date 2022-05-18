<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<?php
session_start();
include('connect.php');

        include("head.php");
        if(isset($_POST['sub'])){
                $email=$_POST['email'];
                $pass=$_POST['pass'];
                $sql="SELECT * from customer where email='$email' and password='$pass'";
                $res=mysqli_query($con,$sql);
        
               if($res->num_rows<1)
               {
                echo '<script language="Javascript">
                window.alert("Invalid Email or Password");
                window.location="login.php";
                </script>';
                }
                else
                {
                        $_SESSION['email']=$email;
                        echo '<script language="Javascript">
                        // window.alert("Login Successfull!!");
                        window.location="main1.php";
                        </script>';
                }
                
        };
        mysqli_close($con);
        ?>
        <!DOCTYPE html>
        <head>
                <title>Login</title>
        </head>
        <body id="pic">
<div>
  <img src="img/water11.jpg" alt="water" id='anime2'> 
<div id="pic3" class="container-fluid border border-dark border-3 rounded-3" style="width:500px;height:300px;float:right;margin:100px 150px">
  <form action="" method="post">
  <h3 style="font-family:Times New Roman;margin-left:120px;">Enter your Details</h3> 
    <div class="mb-3 mt-3">
      Email:<input type="email" class="form-control" name="email" placeholder="Enter email" required>
    </div>
    <div class="mb-3">
      Password:<input type="password" class="form-control" name="pass" placeholder="Enter password" required>
    </div>
    <button class="btn btn-success" type="submit" name="sub">Submit</button>
    <!-- <button type="submit" class="btn btn-outline-dark" name="sub">Submit</button> -->
  </form>
</div>
</div>
</form>