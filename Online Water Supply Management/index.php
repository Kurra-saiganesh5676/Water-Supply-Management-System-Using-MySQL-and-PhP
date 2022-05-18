<?php
session_start();
include('connect.php');
if(isset($_POST['sub1'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];
    if(strcmp($pass,$cpass)!=0){
        echo '<script language="Javascript">
             window.alert(Current password and Password should be same);
             window.location="index.php";
             </script>';
    }
    $sql="SELECT * from customer where email='$email'";
    $res=mysqli_query($con,$sql);
    
    if(!$res)
    {
        die("Data can't be retrieved: ".mysqli_query($con));
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
        else if($pass!==$cpass)
        {
            echo '<script language="Javascript">
                window.alert("passwords doesn\'\'t match");
                window.location="index.php";
                </script>';
        }
        else if(strlen($pass)<6){
            echo '<script language="Javascript">
                window.alert("password should contain atleast SIX characters");
                window.location="index.php";
                </script>';

        }
        else
        {
            $sql = "INSERT INTO customer (name,email, password) VALUES ('$name', '$email','$pass');";
            $result=mysqli_query($con,$sql);
            $_SESSION["email"]=$email;
            if(!$result)
            {
                die('Could not enter data: '.mysqli_query($con));
            }
            echo '<script language="Javascript">
                window.alert("Registration Successfull");
                window.location="main1.php";
               </script>';
        }
    
    }

// if($pass===$cpass){
//     $sql="insert into customer(name,email,password,phone) values ('$name', '$email', '$pass', '$cpass')";
//     $res=mysqli_query($con,$sql);
//     $_SESSION['email']=$email;
//     $_SESSION['name']=$name;
//     echo '<script>window.location="register.php"</script>';
//     }
// else{
//     echo '<script>window.alert("password do not match");
//     window.location="index.php"</script>';
// };
}
elseif(isset($_POST['sub2'])){
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $sql="SELECT * from admin where email='$email' and password='$pass'";
  $res=mysqli_query($con,$sql);

 if($res->num_rows<1)
 {
  echo '<script language="Javascript">
  window.alert("Invalid Email or Password");
  window.location="admin.php";
  </script>';
  }
  else
  
  {
    $_SESSION['email']=$email;
          echo '<script language="Javascript">
          // window.alert("Login Successfull!!");
          window.location="admin.php";
          </script>';
  }
  
};
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Aqua Suppliers
        </title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    </head>
    <body>
        <?php
        include("headlog.php");
        ?>
  <div id="demo" class="carousel slide" data-bs-ride="carousel">

<!-- Indicators/dots -->
<div class="carousel-indicators">
  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
</div>

<!-- The slideshow/carousel -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="img\water5.jpg" alt="Hyderabadi-Biryani" class="d-block" height="650px" width="100%">
    <!-- <div class="carousel-caption">
      <h2>Hyderabadi-Biryani</h2>
      <p>One of our special items</p>
    </div> -->
  </div>
  <div class="carousel-item">
    <img src="img\water21.jpg" alt="Breakfast" class="d-block" height="650px" width="100%">
    <!-- <div class="carousel-caption">
      <h3>Breakfast</h3>
      <p>Begin the day with tight stomach!</p>
    </div>  -->
  </div>
  <div class="carousel-item">
    <img src="img\water14.jpg" alt="Meat" class="d-block" height="650px" width="100%">
    <!-- <div class="carousel-caption">
      <h3>Meat-Special</h3>
      <p>Bon Appetite</p>
    </div>   -->
  </div>
</div>

<!-- Left and right controls/icons -->
<button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</button>
<button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
  <span class="carousel-control-next-icon"></span>
</button>
</div>

<div id='pic' style="width=600px;">
      <img src='img/WATER.jpg' width="550px" height="500px" id='anime1'>
<div class="container border border-1 dorder-dark" style="width: 500px;height: 500px;float:right;margin-right:150px;margin-top:75px;">
<ul class="nav nav-tabs nav-justified" role="tablist">
<li class="nav-item">
<a class="nav-link display-5 text-warning" data-bs-toggle="tab" href="#customer"><b>Customer</b></a>
</li>
<li class="nav-item">
<a class="nav-link display-5 text-warning" data-bs-toggle="tab" href="#admin"><b>Admin</b></a>
</li>
</ul>
<div class="tab-content">
<div class="container tab-pane active" id="customer">
<div class="container border border-1 border-dark" style="width:400px;height: 400px;border: 2px solid black;color:wheat";>
    <form action="" method="post">
      <div>
     <h3 style="font-family:Times New Roman;margin-left:80px;">Fill your Details</h3> 
      <h6>Name:</h6><input name="name" type="text" class="form-control" placeholder="Enter your name" required>
      </div>
      <div>
        <h6>Email:</h6><input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div>
      <div>
        <h6>Password:</h6><input type="password" name="pass" class="form-control" placeholder="Enter password" required>
      </div>
      <div>
        <h6>Confirm Password:</h6><input type="password" name="cpass" class="form-control" placeholder="Confirm password" required>
      </div>
      <a href="login.php" style="color:yellow;">Already have an account?</a><br><br>
      <button class="btn btn-success" type="submit" name="sub1">Submit</button>
      <button class="btn btn-success" type="reset">Cancel</button>
    </form>
  </div>
</div>
<div class="container tab-pane" id="admin">
<div class="container mt-3" style="width:400px;height: 300px;border: 2px solid black;color:wheat";>
    <form action="" method="post">
      <div>
        <h6>Email:</h6><input type="email" name="email" class="form-control" placeholder="Enter email" required>
      </div><br>
      <div>
        <h6>Password:</h6><input type="password" name="pass" class="form-control" placeholder="Enter password" required>
      </div><br>
      <button class="btn btn-success" type="submit" name="sub2">Submit</button>
      <button class="btn btn-success" type="reset">Cancel</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>