<?php
session_start();
 
if(!isset($_SESSION["pid"])){
	header("Location:pro_login.php");
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
   
<center><h4>Order Details</h4></center>
<hr class="border border-danger border-2 opacity-50">
    
<div class="d-flex align-item-center justify-content-center">
<div class="col-md-12">
    <div class="card">
    <div class="card-header">
   <center> ORDER </center>
  </div>
<div class="container color-dark">
  <div class="row-12">
    <div class="row">
        <br>
		<table class="table table-image">
		  <thead>
		    <tr>
        <th scope="col">#</th>
        <th scope="col">O/I</th>
		      <th scope="col">Name</th>
		      <th scope="col">Mobile</th>
		      <th scope="col">Date</th>
		      <th scope="col">Address</th>
              <th scope="col">City</th>
              <th scope="col">Problem</th>
              <th scope="col">Status</th>
              <th scope="col">Check</th>
		    </tr>
		  </thead>
		  
<?php
include'connect.php';
$no = 1;


      $querys = "SELECT bk.*,pv.* FROM bookings  bk, provider pv where pv.pid='$_SESSION[pid]' And bk.pid=pv.pid ";
      $query_run = mysqli_query($con,$querys);
      if(mysqli_num_rows($query_run) > 0){
    while($row = mysqli_fetch_array($query_run))
    {
      ?>
		  <tbody>
		    <tr>
        <th><?php echo $no; ?></th>
        <td><?php echo 'GID'.$row['oid']; ?></td>
		      <td><?php echo $row['oname']; ?></td>
              <td><?php echo $row['omobile']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td><?php echo $row['oaddress']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['problem']; ?></td>
              <td style="color:#FF0000"><?php echo $row['status']; ?></td>
              <td><a href="action.php?oid=<?php echo $row['oid']; ?>" role="button" class="btn btn-primary btn-mb">View</a><td>
		    </tr>
		   
		  </tbody>

		  
		  <?php
       $no++;
    }
  }
else{
    ?>
   <tbody>
                <tr>
                    <td colspan='5'>No  order..</td>
                </tr>
            </tbody>
 <?php 
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