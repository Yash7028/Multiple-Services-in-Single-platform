<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Setting </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/a2a6251715.js" crossorigin="anonymous"></script>
        <!--=====content css link======-->
        <link rel="stylesheet" href="data.css">
    </head>
<body>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <!--===========navigation bar==========-->
   =========-->

     <!-- div class is name content -->
<?php 
$nameErr = "";  
$emailErr = ""; 
$addressErr = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    if (empty($_POST["name"])) {  
      $nameErr = "Name Field is required";  
    } else {  
      $name = test_input($_POST["name"]);  
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {  
        $nameErr = "Only letters and white space allowed";  
      }  
    }  
      if (empty($_POST["email"])) {  
      $emailErr = "Email field is required";  
    } else {  
      $email = test_input($_POST["email"]);  
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
        $emailErr = "Invalid email format";  
      }  
    }  
    if (empty($_POST["website"])) {  
      $website = "";  
    } else {  
      $website = test_input($_POST["website"]);  
      if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
        $websiteErr = "Invalid URL";  
      }  
    }  
}
function test_input($data) {  
    $data = trim($data);  
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
  }  

?>
    
     <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
     <div class="mb-3">
  <label for="name" class="form-label">Current Password</label><span class="error"> *  <?php echo $nameErr;?> </span>
  <input type="text" class="form-control" name="name" id="Name" placeholder="current password" minlength="6" value="<?php echo $name;?>" required>
</div>
<div class="mb-3">
  <label for="eamil" class="form-label">New Password</label><span class="error"> * <?php echo $emailErr;?> </span>  
  <input type="text" class="form-control" name="email" id="Email" placeholder="new password" minlength="6" required>
</div>
<div class="mb-3">
  <label for="address" class="form-label">Confirm Password</label><span class="error"> * <?php echo $addressErr;?> </span>  
  <input type="text" class="form-control" name="address" id="Address" placeholder="confirm password" minlength="6" required>
</div>
<div class="d-flex align-item-center justify-content-center">
<div class="mb-3 ">
  <input class="btn btn-primary" type="submit" name="submit" value="Submit">
</div>
</div>
</form>

</body>
</home>