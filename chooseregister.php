<?php 
if(isset($_POST['customer'])){
    header('location:customer/con_register.php');
}
?>
<?php 
if(isset($_POST['provider'])){
    header('location:provider/pro_register.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Choose register</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">

</head>
<body>
   
<div class="form-container">

   <form method="POST" enctype="multipart/form-data">
      <h2>Choose One</h2>
      <input type="submit" name="customer" value="Customer" class="form-btn">
      <input type="submit" name="provider" value="Provider" class="form-btn">
   </form>

</div>

</body>
</html>