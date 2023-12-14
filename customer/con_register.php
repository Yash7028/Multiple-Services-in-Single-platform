<?php
session_start();
include 'connect.php';
if(isset($_POST['sub'])){
	$n=$_POST['name'];
	$e=$_POST['email'];
  $m=$_POST['mobile'];
  $g=$_POST['gender'];
	$p=$_POST['password'];
	$encrypted_p = md5($p);//encryption in md5
  $cp=$_POST['cfpassword'];

	//code for image uploading
	if($_FILES['photo']['name']){
    $filenamekey = md5(uniqid($_FILES['photo']['name'], true));
    $filenamekey .= "." . pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
		move_uploaded_file($_FILES['photo']['tmp_name'], "../image/".$filenamekey);
		$img="../image/".$filenamekey;
	}
  

    $sql="SELECT * from customer where email='$e'";
	$result=mysqli_query($con,$sql);
	$present=mysqli_num_rows($result);
	if($present>0){
		echo '<script>alert("Email id is already exists use another email")</script>';
	}
  elseif(!(strtoupper(substr($_FILES['photo']['name'],-4))==".JPG"
  || strtoupper(substr($_FILES['photo']['name'],-5))==".JPEG"
  || strtoupper(substr($_FILES['photo']['name'],-4))==".PNG")){
   echo '<script>alert("upload image in only jpg,jpeg or png format.")</script>';
  }
  elseif($p != $cp){
    echo '<script>alert("Confirm password does not match with password.")</script>';
  }
  else{
	$i="insert into customer(name,email,mobile,gender,password,image)values('$n','$e','$m','$g','$encrypted_p','$img')";
		if(mysqli_query($con, $i)){
      echo '<script>alert("Registred Successfully")</script>';
	}
}
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Customer Register </title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/register.css">
    </head>
<body>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
<div class="wrapper">
        <div class="title">
        Customer Registration
        </div>
    
<form method="POST" enctype="multipart/form-data" class="was-validated" nonvalidate>

<div class="d-flex align-item-center justify-content-center">
    <div class="col-md-6">
        <div class="col-md-12">
            <label for="fname" class="form-label">Name</label>
            <div class="input-group has-validation">
              <input type="text" class="form-control" name="name" id="fname" cribedby="inputGroupPrepend" minlength="3" maxlength="20" title="Enter name in this format E.g Jack Castro" required>
              <div class="invalid-feedback">
                Please enter your name.
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <div class="input-group has-validation">
              <input type="email" class="form-control" name="email" id="email" aria-describedby="inputGroupPrepend" minlength="3" maxlength="20" title="E.g Jack@gmail.com" required>
              <div class="invalid-feedback">
                Please enter your name.
              </div>
            </div>
          </div>
    </div>
</div>


<div class="d-flex align-item-center justify-content-center">
    <div class="col-md-6">
        <div class="col-md-12">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="num" class="form-control" name="mobile" id="mobile" minlength="10" maxlength="10" title="Enter mobile number contain only 1o digits" required>
            <div class="invalid-feedback">
              Please enter your mobile number.
            </div>
          </div>
    </div>
    <div class="col-md-6"> 
      <div class="col-md-12">
        <label for="gender" class="form-label">Gender</label>
        <select class="custom-select" name="gender" id="gender" required>
          <option selected disabled value="">Select Gender</option>
          <option value="Male">male</option>
          <option value="Female">Female</option>
        </select>
        <div class="invalid-feedback">
          Please select your gender.
        </div>
        </div>
    </div>
    </div>

       
  <div class="d-flex align-item-center justify-content-center">
    <div class="col-md-6">
        <div class="col-md-12">
            <label for="password" class="form-label">Password</label>
            <div class="input-group has-validation">
              <input type="password" class="form-control" name="password" id="password" minlength="6" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please enter your password minmum length is 6.
              </div>
            </div>
          </div>
    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <label for="cfpassword" class="form-label">Confirm Password</label>
            <div class="input-group has-validation">
              <input type="password" class="form-control" name="cfpassword" id="cfpassword" minlength="6" aria-describedby="inputGroupPrepend" required>
              <div class="invalid-feedback">
                Please enter your confirm password same as password.
              </div>
            </div>
          </div>
    </div>
  </div>

  
  <div class="d-flex align-item-center justify-content-center">
    <div class="col-md-6">
      <div class="col-md-12">
        <label for="photo" class="form-label">Upload Photo</label>
        <input type="file" class="form-control" name="photo" id="photo" aria-label="file example" required>
        <div class="invalid-feedback">Upload your photo size maximum is 2MB in JPG,JPEG, PNG format only.</div>
      </div>
    </div>
    <div class="col-md-6">
    
    </div>
    </div>
  
  
  <div class="md-col-8">
    <div class="form-check"><br>
      <input class="form-check-input" type="checkbox" value="" id="check" required>
      <label class="form-check-label" for="check">
        Agree to terms and conditions
      </label>
    </div>
  </div>

  <div class="d-flex align-item-center justify-content-center">
    <div class="md-12">
      <br>
      <button class="btn btn-primary" type="submit" name="sub">Submit</button>
    </div>
    </div>
    <div class="col-md-12">

    <div class="col-md-12">
      <br>
      Already Registered User? Click here to <a href="con_login.php">login<a>
    </div>


</div>
</form>
</div>

<script>
    
(function () {
  'use strict'

  var forms = document.querySelectorAll('.was-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
</body>
</html>