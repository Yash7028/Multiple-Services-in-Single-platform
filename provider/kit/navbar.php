
<?php

if(!isset($_SESSION["pid"])){
	header("Location:pro_login.php");
	exit();
}
include'connect.php';
 
$s="select * from provider where pid='$_SESSION[pid]'";
$qu= mysqli_query($con, $s);
$f=mysqli_fetch_assoc($qu);
 
?>

<style> <?php include 'css/ap_main.css';?> </style>
    <div class="wrapper hover_collapse">
    <div class="top_navbar">
		<div class="logo"></div>
		<div class="menu">
			<div class="hamburger">
				<b><a href="home.php">Home </a><a style="color:black">/ about</b>
			</div>
			<div class="profile_wrap">
				<div class="profile">
					<img src="<?php	echo $f['image'];?>" onerror="this.src='kit/default.png'">
					<span class="name"><?php	echo $f['name'];?></span>
				</div>
			</div>
		</div>
	</div>
    </div>
