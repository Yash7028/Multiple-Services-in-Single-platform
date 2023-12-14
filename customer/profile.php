<?php
session_start();
 
if(!isset($_SESSION["cid"])){
	header("Location:con_login.php");
	exit();
}

include'connect.php';

$s="select * from customer where cid='$_SESSION[cid]'";
$qu= mysqli_query($con, $s);
$f=mysqli_fetch_assoc($qu);

if(isset($_POST['delete'])){
  $cid=$_SESSION['cid'];

$sql = "DELETE FROM customer WHERE cid='$cid'";
if(mysqli_query($con,$sql)){
  echo '<script>alert("account deleted successfully.")</script>';
  if(session_destroy())
{
// Redirecting To Home Page
header("Location: con_login.php");
}
}else{
  echo '<script>alert("Something went to wrong.")</script>';
}
}

if(isset($_POST['update'])) {
  $cid=$_SESSION['cid'];
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $gender=$_POST['gender'];

  if($_FILES['photo']['name']){
    $filenamekey = md5(uniqid($_FILES['photo']['name'], true));
    $filenamekey .= "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['photo']['tmp_name'], "../image/".$filenamekey);
		$img="../image/".$filenamekey;
	

  $select= "select * from customer where cid='$cid'";
  $sql = mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($sql);    
    $res= $row['cid'];

    if(!(strtoupper(substr($_FILES['photo']['name'],-4))==".JPG"
    || strtoupper(substr($_FILES['photo']['name'],-5))==".JPEG"
    || strtoupper(substr($_FILES['photo']['name'],-4))==".PNG")){
     echo '<script>alert("upload image in only jpg,jpeg or png format.")</script>';
    }
     else{
    if($res === $cid)
    {
      $update = "update customer set name='$name', mobile='$mobile',gender='$gender',image='$img'  where cid='$cid'";
      $sql2=mysqli_query($con,$update);

    if($sql2)
    { 
        /*Successful*/
        echo '<script>alert("Your changes have been successfully saved!")</script>';
    }
    else
    {
        /*sorry your profile is not update*/
        echo '<script>alert("Something went to wrong while trying to update profile.")</script>';
    }
  }
     }

}
 }
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Profile </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a2a6251715.js" crossorigin="anonymous"></script>
        <!--=====content css link======-->
        <link rel="stylesheet" href="css/data.css">
    </head>
<body>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <!--===========navigation bar==========-->
    <?php include_once('kit/navbar.php');?>
    <!--================sidebar=============-->
    <?php include_once('kit/sidebar.php');?>
<!--=================================================-->

     <!-- div class is name content -->
<div class="content">

<div class="d-flex align-item-center justify-content-center">
<div class="col-md-8">
    <div class="card">
    <div class="card-header">
   <center> PROFILE </center>
  </div>
<form method="post" enctype="multipart/form-data">
<br>
<div class="d-flex align-item-center justify-content-center">
  
<img src="<?php	echo $f['image'];?>" width="100px" height="100px" display="block"  border-radius="50%" style="border:1px solid black;" margin=" 0 auto" onerror="this.src='kit/default.png'">
</div>
<div class="col-md-12">
  <label for="password" class="form-label">Email</label>
  <input type="email" class="form-control" id="email" name="email" value="<?php	echo $f['email'];?>" placeholder="Enter email" minlength="6" disabled readonly>
</div>
<div class="col-md-12">
  <label for="name" class="form-label">Name</label>
  <input type="text" class="form-control" id="name" name="name" value="<?php	echo $f['name'];?>" placeholder="Enter name" minlength="6" required>
</div>
<div class="col-md-12">
  <label for="mobile" class="form-label">Mobile</label>
  <input type="num" class="form-control" id="mobile" name="mobile" value="<?php	echo $f['mobile'];?>" placeholder="Enter mobile number" minlength="10" maxlength="10"  required>
</div>

<div class="col-md-12">
        <label for="gender" class="form-label">Gender</label>
        <select class="custom-select" id="gender" name="gender" >
          <option value="<?php	echo $f['gender'];?>"> <?php	echo $f['gender'];?> </option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
</div>
<div class="col-md-12">
        <label for="photo" class="form-label">Upload Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" aria-label="file example" required>
</div>
<div class="d-flex align-item-center justify-content-center">
<div class="mb-3 ">
  <br>
  <input class="btn btn-primary" type="submit" name="update" value="update">
</div>
</div>
</form>
<form method="post" enctype="multipart/form-data">
<hr class="border border-danger border-2 opacity-50">
<center>
   <h4> If You wanted delete your account click on delete button </h4>
  <input class="btn btn-danger" type="submit" name="delete" value="delete">
  <center>
</form>
</div>
</div>
</div>
</div>
</body>
</html>