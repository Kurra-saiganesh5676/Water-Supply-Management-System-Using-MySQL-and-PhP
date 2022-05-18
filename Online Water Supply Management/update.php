<?php
session_start();
include("checklogin.php");
include('connect.php');
$id = $_GET['id'];

$SelSql = "SELECT * FROM tblproduct WHERE id = '$id'";
$res1 = mysqli_query($con, $SelSql);
$r = mysqli_fetch_assoc($res1);


if(isset($_POST) & !empty($_POST)){
    $name = ($_POST['name']);
    $code = ($_POST['code']);
    $price = ($_POST['price']);
    $img = ($_POST['img']);

    // Execute query
	$query = "UPDATE tblproduct SET name='$name' , code= '$code' ,price = '$price',image = '$img'   WHERE id='$id'";
	$res = mysqli_query($con, $query); // get result
	if($res){
		header('location: watermanage.php');
	}else{
		$fmsg = "Failed to update data.";
		print_r($res);
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admin Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link href="cssstyles/helper.css" rel="stylesheet"> -->
    </head>
   
    <body>
		<section>
			<div>
			<div class="container">
					<h2 class="my-4">Update item</h2>
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label>Product name</label>
							<input type="text" class="form-control" name="name" value="<?php echo $r['name'];?>" required/>
						</div> 
						<div class="form-group">
							<label>Product code</label>
							<input type="text" class="form-control" name="code" value="<?php echo $r['code'];?>" required/>
						</div> 
                        <div class="form-group">
							<label>Product price</label>
							<input type="text" class="form-control" name="price" value="<?php echo $r['price'];?>" required/>
						</div> 
                        <div class="form-group">
							<label>product image</label>
							<input type="text" class="form-control" name="img" value="<?php echo $r['image'];?>" required/>
						</div> 
						<input type="submit" class="btn btn-primary" value="Update" />
					</form>
			</div>
			</div>
		</section>
    </body>
</html>