<?php
include'connect.php';
session_start();
if(isset($_POST['sub'])){

	$e=$_POST['email'];
	$p=$_POST['pass'];
        $p= md5($p);
	$s= "select * from customer where email='$e' and password= '$p'";
	$qu= mysqli_query($con, $s);

	if(mysqli_num_rows($qu)>0){
		$f= mysqli_fetch_assoc($qu);
      $_SESSION["login_sess"]="1";
		$_SESSION['cid']=$f['cid'];
		header ('location:home.php');
	}
	else{
		echo '<script> alert("Email or Password does not exist")</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Customer login</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">

</head>
<body>
   
<div class="form-container">

   <form method="POST" enctype="multipart/form-data">
      <h2>Customer LOGIN</h2>
      <input type="email" name="email" required placeholder="enter your email" required>
      <input type="password" name="pass" required placeholder="enter your password" required>
      <input type="submit" name="sub" value="login now" class="form-btn">
      <p>don't have an account? <a href="con_register.php">register now</a></p>
      <p>Forgot password <a href="sendlink.php">Click here</a></p>
   </form>

</div>

</body>
</html>