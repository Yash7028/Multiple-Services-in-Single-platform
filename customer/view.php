<?php
session_start();
 
if(!isset($_SESSION["cid"])){
	header("Location:con_login.php");
	exit();
}

include'connect.php';
$oid=$_GET['oid'];

$query = "SELECT * FROM bookings where oid='$oid'";
$query_run = mysqli_query($con,$query);
$fa=mysqli_fetch_assoc($query_run);
if(mysqli_num_rows($query_run) > 0){
    $query = "SELECT bk.*,pv.* FROM bookings  bk, provider pv where cid='$_SESSION[cid]' And bk.pid=pv.pid ";
    $query_run = mysqli_query($con,$query);
            $fs=mysqli_fetch_assoc($query_run);
            }

$query = "SELECT * FROM customer where cid='$_SESSION[cid]'";
$query_run = mysqli_query($con,$query);
$ca=mysqli_fetch_assoc($query_run);

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
                    <td style="color:#FF0000">
                    <?php echo $fa['status'];?>
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
                    <th>Provider Email</th>
                    <td>
                    <?php echo $fs['email'];?>
                    </td>
                    <th>Provider Mobile</th>
                    <td>
                    <?php echo $fs['mobile'];?>
                    </td>
                </tr>
                <tr>
                    <th>Provider name</th>
                    <td>
                    <?php echo $fs['name'];?>
                    </td>
                    <th>Pincode</th>
                    <td>
                    <?php echo $fa['pincode'];?>
                    </td>
                </tr>
                <tr>
                    <th>Customer Email</th>
                    <td>
                    <?php echo $ca['email'];?>
                    </td>
                    <th>Customer Mobile</th>
                    <td>
                    <?php echo $ca['mobile'];?>
                    </td>
                </tr>
                <tr>
                    <th>Booking Name</th>
                    <td>
                    <?php echo $fa['oname'];?>
                    </td>
                    <th>Booking Mobile</th>
                    <td>
                    <?php echo $fa['omobile'];?>
                    </td>
                </tr>
                <tr>
                    <th>Service</th>
                    <td>
                    <?php echo $fs['service'];?>
                    </td>
                    <th>Problem</th>
                    <td>
                    <?php echo $fa['problem'];?>
                    </td>
                </tr>
                <tr>
                    <th>City</th>
                    <td>
                    <?php echo $fs['city'];?>
                    </td>
                    <th>Booking Address</th>
                    <td>
                    <?php echo $fa['oaddress'];?>
                    </td>
                </tr>

            </table>
</div>
</div>
</form>


</div>
</body>
</home>