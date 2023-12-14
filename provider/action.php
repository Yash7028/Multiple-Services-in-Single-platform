<?php
session_start();
 
if(!isset($_SESSION["pid"])){
	header("Location:pro_login.php");
	exit();
}

include'connect.php';
$oid=$_GET['oid'];

$query = "SELECT * FROM provider where pid='$_SESSION[pid]'";
$query_run = mysqli_query($con,$query);
$pv=mysqli_fetch_assoc($query_run);

$query = "SELECT * FROM bookings where oid='$oid'";
$query_run = mysqli_query($con,$query);
$fa=mysqli_fetch_assoc($query_run);
if(mysqli_num_rows($query_run) > 0){
    $query = "SELECT bk.*,cu.* FROM bookings  bk, customer cu where pid='$_SESSION[pid]' And bk.cid=cu.cid ";
    $query_run = mysqli_query($con,$query);
            $fs=mysqli_fetch_assoc($query_run);
            }

if(isset($_POST['update'])) {
    $state=$_POST['state'];
    
    $update = "update bookings set status='$state' where oid='$oid'";
    $sql2=mysqli_query($con,$update);
    if($sql2)
    { 
        /*Successful*/
        echo '<script>alert("Status has been change successfully!")</script>';
    }
    else
    {
        /*sorry your profile is not update*/
        echo '<script>alert("Something went to wrong while trying to update.")</script>';
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

</div>
<div class="card-body">
    
            <table class="table">
            
                <tr>
                    <th>Order Id</th>
                    <td>
                    <?php echo 'GID'.$fa['oid'];?>
                    </td>
                    <th>Status</th>
                    <td>
<select class="form-select" name="state" aria-label="Default select example" style="color:#FF0000">
  <option  value="<?php	echo $fa['status'];?>"><?php echo $fa['status']; ?></option>
  <option value="Pending">Pending</option>
  <option value="Completed">Completed</option>
  <option value="Rejected">Rejected</option>
</select>
                    </td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>
                    <?php echo $fa['date'];?>
                    </td>
                    <th>Payment Method</th>
                    <td>
                    <?php echo $fa['paymethod'];?>
                    </td>
                </tr>
                <tr>
                    <th>Customer Email</th>
                    <td>
                    <?php echo $fs['email'];?>
                    </td>
                    <th>Customer Mobile</th>
                    <td>
                    <?php echo $fs['mobile'];?>
                    </td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>
                    <?php echo $pv['service'];?>
                    </td>
                    <th>Problem</th>
                    <td>
                    <?php echo $fa['problem'];?>
                    </td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>
                    <?php echo $pv['city'];?>
                    </td>
                    <th>Address</th>
                    <td>
                    <?php echo $fa['oaddress'];?>
                    </td>
                </tr>
                <tr>
                    <th>pincode</th>
                    <td>
                    <?php echo $fa['pincode'];?>
                    </td>
                </tr>

            </table>
            <input class="btn btn-primary" type="submit" name="update" value="update">
</div>
</div>
</form>

    </div>
</body>
</home>