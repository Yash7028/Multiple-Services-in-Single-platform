<?php
error_reporting(0);
session_start();
 
if(!isset($_SESSION["cid"])){
	header("Location:con_login.php");
	exit();
}
include'connect.php';
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home </title>
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
     
<form method="POST" enctype="multipart/form-data" >
<div class="row-12">
<div class="d-flex align-item-centet justify-content-center ">
<div class="col-md-6">
    <label for="service" class="form-label">Service</label>
        <select class="custom-select" name="service" id="service" >
          <option selected disabled value="">Select service</option>
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
<div class="col-md-6">
    <label for="city" class="form-label">City</label>
    <select class="custom-select" id="city" name="city" >
      <option selected disabled value="">Select City</option>
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
</div>

<div class="row-12">
<div class="d-flex align-item-centet justify-content-center">
<div class="col-mb-3">
    <br>
<button class="btn btn-primary" type="submit" value="search" name="search">Search</button>
<br>
<br>
</div>
</div>
</div>

<div class="d-flex align-item-center justify-content-center">
<div class="col-md-12">
    <div class="card">
    <div class="card-header">
   <center> PROVIDER LIST  </center>
  </div>
    <div class="container">
  <div class="row-12">
    <div class="row-12">
        <br>
		<table class="table table-image">
		  <thead>
		    <tr>
        <th scope="col">#</th>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Service</th>
		      <th scope="col">Address</th>
		      <th scope="col">City</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  
<?php
include'connect.php';


if(isset($_POST['search']))
{
    $city = $_POST['city'];
    $service = $_POST['service'];

    if($city != "" || $service != "")
    {
      $no= 1;
    $query = "SELECT * FROM provider where city='$city' AND service='$service' ";
    $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run) > 0){
    while($row = mysqli_fetch_array($query_run))
    {
      ?>
		  <tbody>
		    <tr>
        <th><?php echo $no; ?></th>
		      <td class="w-10">
			      <img src="<?php echo $row['image']; ?>" width="100px" height="100px" display="block"  onerror="this.src='kit/default.png'" style="border:1px solid black;" auto>
		      </td>
		      <td><?php echo $row['name']; ?></td>
		      <td><?php echo $row['service']; ?></td>
		      <td><?php echo $row['address']; ?></td>
		      <td><?php echo $row['city']; ?></td>
              <td><a href="action.php?pid=<?php echo $row['pid']; ?>" role="button" class="btn btn-primary btn-mb">Book Order</a><td>
		    </tr>
		   
		  </tbody>

		  
		  <?php
       $no++;
    }
}else{
    ?>
   <tbody>
                <tr>
                    <td colspan='5'>Select service and city..</td>
                </tr>
            </tbody>
 <?php 
}
}
}

        ?>

		</table>  
		</form> 
    </div>
  </div>
</div>
</div>
  </div>
</div>

</div>
</body>
</home>