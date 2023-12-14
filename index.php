<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('Exception.PHP');
require ('SMTP.php');
require ('PHPMailer.php');

if(isset($_POST['send'])){
  $email=$_POST['email'];
  $name=$_POST['name'];
  $mobile=$_POST['mobile'];
  $subject=$_POST['subject'];
  $message=$_POST['message'];

    $mail = new PHPMailer(true);
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'Enter_email_@gmail.com';                     //Enter your SMTP username
        $mail->Password   = 'Enter_your_password';                               //Enter your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('Enter_email_@gmail.com', 'yash');
        $mail->addAddress('Enter_email_@gmail.com','self');     //Add a recipient
    
        //Attachments
    
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = 'Name:- '.$name.' <br>
                          Email:- '.$email.'<br> 
                          Mobile:- '.$mobile.'<br>
                          Subject:- '.$subject.'<br>
                          Message:- ' .$message.'';
    
        $mail->send();
        echo '<script> alert("Thank you for your valuable feedback.")</script>';
    } catch (Exception $e) {
      echo '<script> alert("Somethig went to wrong. ")</script>';
    }

}
?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Portfolio Website | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <!-- Move to up button -->
  <div class="scroll-button">
    <a href="#home"><i class="fas fa-arrow-up"></i></a>
  </div>
  <!-- navgaition menu -->
  <nav>
    <div class="navbar">
      <div class="logo"><a href="#">Get It Done</a></div>
      <ul class="menu">
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#contact">Contact</a></li>
          <div class="cancel-btn">
            <i class="fas fa-times"></i>
          </div>
      </ul>
      <div class="media-icons">
        <a href="choose.php">Login</a>
      </div>
    </div>
    <div class="menu-btn">
      <i class="fas fa-bars"></i>
    </div>
  </nav>

<!-- Home Section Start -->
 <section class="home" id="home">
 </section>

<!-- About Section Start -->
<section class="about" id="about">
  <div class="content">
    <div class="title"><span>About Us</span></div>
  <div class="about-details">
    <div class="left">
      <img src="images/5112782.jpg" alt="">
    </div>
    <div class="right">
      <div class="topic">Hello, Dear friends</div>
      <p>Welcome to Get it done is a professional service providing website, we are happy you want to know smothing more about our site<br>
      So, basically nowadays people are more dependent on online products and services that's why we also, take forward a step to help you.
      our first wish is to solve your problem.So, kindly if you dont get any solution then mention in it in the comment section
      below section you can get more ideas about our different type services.
      So, our main goal is to provide you safe and better services.
      Basically, we focus on the service provider a better user experience to all users. Any one can be register your self to provide service it's easy to get
      order from different location.
      </p>
    </div>
  </div>
  </div>
</section>

<!-- My Services Section Start -->
<section id="services">
<div class="container" id="services">
  <div class="title"><span>Services</span></div>   
  <div class="box-container">
  
  
      <div class="box">
          <img src="images/pm.jpg" alt="">
          <h3>Plumber</h3>
          <p> if water runs through it, we fix it with our expert  </p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/pc.jpg" alt="">
          <h3>Pest Control</h3>
          <p> Protect your home & your   family from pests</p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/hk.jpg" alt="">
          <h3>Housekeeping</h3>
          <p> Professional quality cleaning    with a personal  touch</p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
      
      <div class="box">
          <img src="images/ac.jpg" alt="">
          <h3>Ac Repair</h3>
          <p> Keep your own AC at it's peak performance </p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/sa.jpg" alt="">
          <h3>Real Estate</h3>
          <p> Navigate the real estate mark with global expert!</p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/pk.jpg" alt="">
          <h3>Packers</h3>
          <p>We'll move you with our hard wark and genuine smiles  </p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/id.jpg" alt="">
          <h3>Interior Designer</h3>
          <p>Whatever your style, we'll help to achieve it.  </p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  
      <div class="box">
          <img src="images/et.jpg" alt="">
          <h3>Electrician</h3>
          <p>Switch to us for your electrical work, and you'll be glad you did! </p>
          <a href="customer/home.php" class="btn">Book</a>
      </div>
  </div>
  </div>
</section>

<!-- Contact Me section Start -->
<form method="POST">
<section class="contact" id="contact">
  <div class="content">
    <div class="title"><span>Contact Us</span></div>
    <div class="contact-box">
      <div class="contact-left">
   <h3>Send your request</h3>
   <form method="POST">
      <div class="input-row">
      <div class="input-group">
          <label>Name</label>
          <input type="text" name="name" minlength="2" placeholder="Jack castro" required>
      </div>
      <div class="input-group">
          <label>Phone</label>
          <input type="num" name="mobile" minlength="10" maxlength="10" placeholder="+91 865 451 5125" required>
      </div>
      </div> 
      <div class="input-row">
          <div class="input-group">
              <label>Email</label>
              <input type="email" name="email" placeholder="jackmark@gmail.com" required>
          </div>
          <div class="input-group">
              <label>Subject</label>
              <input type="text" name="subject" placeholder="Service Type" required>
          </div>
          </div> 
          <label>Mesaage</label>
          <textarea rows="5" placeholder="Your Message" name="message" required></textarea>
          <button type="submit" name="send">SEND</button>
   </form> 
      </div>
      <div class="contact-right">
   <h3>Reach Us</h3>
   <table>
      <tr>
          <td>Email</td>
          <td>Getitdone@gamil.com</td>
      </tr>
      <tr>
          <td>Phone</td>
          <td>+91 222 121 8978</td>
      </tr>
      <tr>
          <td>Address</td>
          <td>south Mumbai, Maharshtra </td>
      </tr>
  </table>
      </div>
  </div>
  </div>
</section>


<section class="privacy" id="privacy">
  <div class="content">
    <div class="title"><span>Privacy Polices</span></div>
    <div>
    <h3><b>Read <a href="privacy.html">Privacy Plolices </a>and <a href="#">Legal</a></b></h3>
    <div>

</div>
</section>
<!-- Footer Section Start -->
<footer>
  <div class="text">
    <span>Created By <a href="#">Yash Batavle</a> | &#169; 2022  All Rights Reserved</span>
  </div>
</footer>

  <script src="script.js"></script>
</body>
</html>
