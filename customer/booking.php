<?php
session_start();
 
if(!isset($_SESSION["cid"])){
	header("Location:con_login.php");
	exit();
}
include'connect.php';
if(isset($_POST['update'])){
$oid =$_POST['oid'];

$sql = "DELETE FROM bookings WHERE id='$oid'";
if(mysqli_query($con,$sql)){
  echo '<script>alert("Order deleted successfully.")</script>';
}else{
  echo '<script>alert("Something went to wrong.")</script>';
}


}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Booking </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a2a6251715.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/data.css">
    </head>
<body>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
     
    <?php include_once('kit/navbar.php');?>
    <?php include_once('kit/sidebar.php');?>
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
    <div class="row-12">
        <br>
		<table class="table table-image">
		  <thead>
		    <tr>
          <th scope="col">#</th>
          <th scope="col">Order Id</th>
		      <th scope="col">Provider Name</th>
		      <th scope="col">Provicer Mobile</th>
		      <th scope="col">Service</th>
		      <th scope="col">city</th>
		      <th scope="col">Date</th>
          <th scope="col">status</th>
          <th scope="col">View</th>
		    </tr>
		  </thead>
		  
<?php
include'connect.php';
 $no = 1;

$query = "SELECT * FROM bookings where cid='$_SESSION[cid]' ";
    $query_run = mysqli_query($con,$query);
     if(mysqli_num_rows($query_run) > 0){
      $querys = "SELECT bk.*,pv.* FROM bookings  bk, provider pv where cid='$_SESSION[cid]' And bk.pid=pv.pid ";
    $query_run = mysqli_query($con,$querys);
     if(mysqli_num_rows($query_run) > 0){
    while($row = mysqli_fetch_array($query_run))
    {
      ?>
		  <tbody>
		    <tr>
          <th><?php echo $no; ?></th>
          <td><?php echo 'GID'.$row['oid']; ?></td>
		      <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['mobile']; ?></td>
              <td><?php echo $row['service']; ?></td>
              <td><?php echo $row['city']; ?></td>
              <td><?php echo $row['date']; ?></td>
              <td style="color:#FF0000"><?php echo $row['status']; ?></td>
              <td><a href="view.php?oid=<?php echo $row['oid']; ?>" role="button" class="btn btn-primary btn-mb">View</a><td>
		    </tr>
		   
		  </tbody>

		  
		  <?php
      $no++;
    }
    }
}else{
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
</html>