<?php
session_start();
include'connect.php';
 $pid= $_GET['pid'];

$query = "SELECT * FROM provider where pid='$pid'";
$query_run = mysqli_query($con,$query);
$fa=mysqli_fetch_assoc($query_run);

$s="SELECT * from customer where cid='$_SESSION[cid]'";
$qu= mysqli_query($con, $s);
$fc=mysqli_fetch_assoc($qu);

if(isset($_POST['book'])){
    $n=$_POST['name'];
    $m=$_POST['mobile'];
    $d=$_POST['date'];
    $pc=$_POST['pincode'];
    $pm=$_POST['paymethod'];
    $a=$_POST['address'];
    $pb=$_POST['problem'];
    $provider = $_POST['pid'];
    $customer=$_POST['cid'];
    $status=$_POST['status'];
	//code for image uploading $provider = $_POST['provider'];

	$i="insert into bookings(status,pid,cid,oname,omobile,date,pincode,paymethod,oaddress,problem)values('$status','$provider','$customer','$n','$m','$d','$pc','$pm','$a','$pb')";
		if(mysqli_query($con, $i)){
            echo '<script> alert("Booking is successful!")</script>';
	}
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Setting </title>
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

    <form method="POST" enctype="multipart/form-data">
    <center><h4>Order Details</h4></center>
    <hr class="border border-danger border-2 opacity-50">

    <div class="d-flex align-item-center justify-content-center">
    <div class="d-flex align-item-center justify-content-center">
<img src="<?php	echo $fa['image'];?>" width="140px" height="140px" display="block"  border-radius="50%"  style="border:1px solid black;" margin=" 0 auto" onerror="this.src='kit/default.png'">
</div>
<div class="card-body">
    
            <table class="table">
            
                <tr>
                    <th>Name</th>
                    <td>
                    <?php echo $fa['name'];?>
                    </td>
                    <th>Profession</th>
                    <td>
                    <?php echo $fa['service'];?>
                    </td>
                </tr>
     <tr>
                    <th>Address</th>
                    <td>
                    <?php echo $fa['address'];?>
                    </td>
                    <th>City</th>
                    <td>
                    <?php echo $fa['city'];?>
                    </td>
                </tr>
            </table>
        </div>
</div>
<hr class="border border-danger border-2 opacity-50">

<div class="d-flex align-item-center justify-content-center">
<div class="col-md-6">
<div class="col=md-12">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Enter your name" required>
</div>
</div>
<div class="col-md-6">
<div class="col-md-12">
  <label for="exampleFormControlInput1" class="form-label">Mobile</label>
  <input type="numb" class="form-control" id="exampleFormControlInput1" name="mobile" placeholder="7894464512" maxlength="10" minlength="10" required>
</div>
</div>
</div>


<div class="d-flex align-item-center justify-content-center ">
<div class="col-md-6">
<div class="col=md-12">
<label for="city" class="form-label">City</label>
    <select class="custom-select" id="city" disabled>
      <option selected disabled value=""><?php echo $fa['city'];?></option>
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
</div>
<div class="col-md-6">
<div class="col-md-12">
  <label for="exampleFormControlInput1" class="form-label">Date</label>
  <input class="form-control" type="date" name="date" id="date" required>
</div>
</div>
</div>

<div class="d-flex align-item-center justify-content-center ">
<div class="col-md-6">
<div class="col=md-12">
  <label for="exampleFormControlInput1" class="form-label">Pin code</label>
  <input type="num" class="form-control" id="exampleFormControlInput1" maxlength="6"  name="pincode" minlength="6" placeholder="Enter pin code" required>
</div>
</div>
<div class="col-md-6">
<div class="col-md-12">
<label for="inputState">Payment Method</label>
      <select id="inputState" name="paymethod" class="form-control" required>
        <option selected>Choose Payment...</option>
        <option>Cash</option>
        <option>Card</option>
      </select>
</div>
</div>
</div>

<div class="d-flex align-item-center justify-content-center ">
<div class="col-md-6">
<div class="col=md-12">
  <label for="exampleFormControlInput1" class="form-label">Address</label>
  <input type="text" class="form-control" name="address" id="exampleFormControlInput1" placeholder="Enter address" minlength="15"  maxlength="200" required>
</div>
</div>
<div class="col-md-6">
<div class="col-md-12">
  <label for="exampleFormControlInput1" class="form-label">Problem</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" name="problem" minlength="15"  maxlength="200" placeholder="Any Queries?" required>
</div>
</div>
</div>
 
<div class="d-flex align-item-center justify-content-center">
<div class="mb-4 ">
  <br>
  <input class="btn btn-primary" type="submit" name="book" value="Book">
</div>
</div>

<input type="hidden" name="status" value="pending">
<input type="hidden" name="pid" value="<?php echo $fa['pid'];?>">
<input type="hidden" name="cid" value="<?php echo $fc['cid'];?>">
</form>           
            
    </div>
</body>
</home>