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
     

    
    </div>
</body>
</html>