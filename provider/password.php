<?php
session_start();
 
if(!isset($_SESSION["pid"])){
	header("Location:pro_login.php");
	exit();
}

include'connect.php';

$s="select * from provider where pid='$_SESSION[pid]'";
$qu= mysqli_query($con, $s);
$f=mysqli_fetch_assoc($qu);

if(isset($_POST['update'])){
    $pid=$_SESSION['pid'];
    $p=$_POST['currentpassword'];
    $p= md5($p);
    $np=$_POST['newpassword'];
	$encrypted_np = md5($np);

    $s= "select * from provider where pid='$pid' and password= '$p'";
	$qu= mysqli_query($con, $s);
	if(mysqli_num_rows($qu)>0){
        $update = "update provider set password='$encrypted_np' where pid='$pid'";
        $sql2=mysqli_query($con,$update);
        echo '<script> alert("Your changes have been successfully saved!") </script>';
    }else{
        echo '<script> alert(" Your current password not match OR Something went to wrong while trying to update password.") </script>';
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Password </title>
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
   <center> RESET PASSWORD </center>
  </div>


<form method="post">
  <div class="col-md-12">
  <label for="currentpassword" class="form-label">Current Password</label>
  <input type="text" class="form-control" id="password" name="currentpassword" placeholder="Enter password" minlength="6" required>
  </div>
  <div class="col-md-12">
  <label for="newpassword" class="form-label">New Password</label>
  <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Enter password" minlength="6" required>
  </div>
  
  <div class="d-flex align-item-center justify-content-center">
  <div class="mb-3 ">
  <br>
  <input class="btn btn-primary" type="submit" name="update" value="update">
   </div>
   </div>
</form>
</div>
    </div>
    </div>
    </div>
</body>
</home>
