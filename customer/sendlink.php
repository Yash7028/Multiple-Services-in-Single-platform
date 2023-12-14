<?php
include'connect.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function send_password_reset($name,$email,$token)
{
require ('Exception.PHP');
require ('SMTP.php');
require ('PHPMailer.php');
$link = $email;
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Enter_email_@gmail.com';                     //SMTP username
        $mail->Password   = 'Enter_your_password';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('Enter_email_@gmail.com', 'yash');
        $mail->addAddress($email, $name);     //Add a recipient
    
        //Attachments
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Forgot password';
        $mail->Body    = 'This is link <a href="http://localhost/customer/setpassword.php">Click here</a> for set password where you can paste email and token the ste password . '.$email. ' this is token number is = ' .$token.'';
    
        $mail->send();
        echo '<script> alert("Email or Password does not exist")</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

if(isset($_POST['sub'])){
$e=$_POST['email'];
$token=md5(rand());

	$s= "select * from customer where email='$e'";
	$qu= mysqli_query($con, $s);

	if(mysqli_num_rows($qu)>0)
    {
    $f= mysqli_fetch_assoc($qu);
    $email = $f['email'];
    $name = $f['name'];

    $update_token = "update customer set token='$token' where email='$email'";
    $to= mysqli_query($con, $update_token);

    if($to){
     
         send_password_reset($name,$email,$token);
         $_SESSION['status'] = "1";
         echo '<script> alert("Email or Password does not exist")</script>';
         header("Location: setpassword.php");
         exit(0);

        }else{
            
            $_SESSION['status'] = "Something went wrong . #1";
            header("Location: sendlink.php");
            exit(0);
           }
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
   <title>Sendlink</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/login.css">

</head>
<body>
   
<div class="form-container">

   <form method="POST" enctype="multipart/form-data">
      <h2>Forgot Password</h2>
      <input type="email" name="email" required placeholder="enter your email" required>
      <input type="submit" name="sub" value="Send link" class="form-btn">
      <p>don't have an account? <a href="con_register.php">register now</a></p>
   </form>

</div>

</body>
</html>