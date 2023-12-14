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

if(isset($_POST['update'])) {
  $pid=$_SESSION['pid'];
  $service=$_POST['service'];
  $pincode=$_POST['pincode'];
  $city=$_POST['city'];
  $address=$_POST['address'];

  $select= "select * from provider where pid='$pid'";
  $sql = mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($sql);    
    $res= $row['pid'];
    if($res === $pid)
    {
      $update = "update provider set service='$service',pincode='$pincode',city='$city',address='$address'  where pid='$pid'";
      $sql2=mysqli_query($con,$update);

    if($sql2)
    { 
        /*Successful*/
        echo '<script>alert("Your changes have been successfully saved!")</script>';
    }
    else
    {
        /*sorry your profile is not update*/
        echo '<script>alert("Something went to wrong while trying to update service.")</script>';
    }
  }
 }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Service </title>
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
   <center> SERVICE </center>
  </div>
     
<form method="post">
    <div class="col-md-12">
        <label for="service" class="form-label">Service</label>
        <select class="custom-select" name="service" id="service" >
          <option  value="<?php	echo $f['service'];?>"><?php	echo $f['service'];?></option>
          <option value="Electrician">Electrician</option>
          <option value="Plumber">Plumber</option>
          <option value="Pest Control">Pest Control</option>
          <option value="Housekeeping">Housekeeping</option>
          <option value="Ac Repair">Ac Repair</option>
          <option value="Real Estate">Real Estate</option>
          <option value="packers">packers</option>
          <option value="Interior Designer">Interior Designer</option>
        </select>
    </div>
    <div class="col-md-12">
      <label for="pincode" class="form-label">pincode</label>
      <input type="num" class="form-control" id="pincode" name="pincode" value="<?php	echo $f['pincode'];?>" placeholder="Enter pincode" minlength="6" maxlength="6" required>
    </div>
    <div class="col-md-12">
    <label for="city" class="form-label">City</label>
    <select class="custom-select" id="city" name="city" >
      <option  value="<?php	echo $f['city'];?>"><?php	echo $f['city'];?></option>
      <option value="Mumbai">Mumbai</option>
      <option value="Pune">Pune</option>
      <option value="Nashik">Nashik</option>
      <option value="Latur">Latur</option>
      <option value="Nagpur">Nagpur</option>
      <option value="Dhule">Dhule</option>
      <option value="Panvel">Panvel</option>
      <option value="Jalgaon">Jalgaon</option>
      <option value="Amravati">amravati</option>
      <option value="Thane">Thane</option>
      <option value="Solapur">Solapur</option>
    </select>
    </div>
    <div class="col-md-12">
    <label for="address" class="form-label">Address</label>
    <textarea class="form-control" name="address" id="address" placeholder="Enter address" value="" minlength="20" maxlength="200" required><?php	echo $f['address'];?></textarea>
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