<?php
session_start();

if(!isset($_SESSION["status"])){
	header("Location:sendlink.php");
	exit();
}
include'connect.php';
if(isset($_POST['sub'])) {
  $email=$_POST['email'];
  $token=$_POST['token'];
  $p=$_POST['password'];
  $encrypted_p = md5($p);
  
  $s= "select * from customer where email='$email' and token='$token'";
  $qu= mysqli_query($con, $s);
  if(mysqli_num_rows($qu)>0)
  {
    $update = "update customer set password='$encrypted_p' where email='$email'";
    $sql2=mysqli_query($con,$update);
    echo '<script> alert("Password chnaged successfully!") </script>';
}else{
    echo '<script> alert("Something went to wrong.") </script>';
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
      <input type="email" name="email"  placeholder="enter your email" required>
      <input type="text" name="token"  placeholder="enter your token" required>
      <input type="password" name="password" minlength="6" placeholder="enter your password" required>
      <input type="submit" name="sub" value="Set Password" class="form-btn">
      <p>Back to <a href="con_login.php">Login</a></p>
   </form>

</div>

</body>
</html>