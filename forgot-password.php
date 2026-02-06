<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon">
<title>Oxyy - Login and Register Form Html Template</title>
<meta name="description" content="Login and Register Form Html Template">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
========================= -->
<link rel='stylesheet' href='../../css.css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

<!-- Stylesheet
========================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css">
<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#">
</head>
<body>

<!-- Preloader -->
<div class="preloader">
  <div class="lds-ellipsis">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
</div>
<!-- Preloader End -->

<div id="main-wrapper" class="oxyy-login-register">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100"> 
      
      <!-- Welcome Text
      ========================= -->
      <div class="col-md-6 col-lg-7 bg-light">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('images/login-bg-7.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="container">
              <div class="row g-0 mt-5">
                <div class="col-11 col-md-10 col-lg-9 mx-auto">
                  <h1 class="text-13 text-white fw-600 mb-4">Don't worry, We are here help you to recover password.</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
      
      <!-- Forgot Password Form
      ========================= -->
      <div class="col-md-6 col-lg-5 d-flex flex-column align-items-center">
        <div class="container pt-4">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <div class="logo"> <a class="fw-600 text-6 text-dark" href="login.php" title="Oxyy">Oxyy</a> </div>
            </div>
          </div>
        </div>
        <div class="container my-auto py-5">
          <div class="row g-0">
            <div class="col-11 col-md-10 col-lg-9 mx-auto">
              <h3 class="text-12 mb-4">Reset Password</h3>
              <p class="mb-4 text-muted">Enter the email address or mobile number associated with your account.</p>

              <form id="forgotForm" method="post">

              <?php
               include("db_conn.php");
              date_default_timezone_set("Africa/Lagos");
              $OTP= rand(1000,9999);
              error_reporting(E_ALL);
              if(isset($_REQUEST["submit"])){
                $email = trim(addslashes($_REQUEST["email"]));
                $otp = $_REQUEST["otp"];

                $_SESSION["email"] = $email;

                $sql="UPDATE otpver SET otp='$otp' WHERE email='$email'";
                    $result=mysqli_query($conn, $sql);
                    if($result){

                      echo "<script>window.location.href='newotp.php'</script>";
                    }
                    else{
                      echo"<script>alert('Email address does not exist!')</script>";
                    }
              }


              ?>

                <label class="form-label fw-500" for="emailAddress">Email or Mobile Number</label>
                <div class="mb-3 icon-group icon-group-end">

                  <input type="text" class="form-control bg-light border-light" id="emailAddress" required="" placeholder="Enter Email or Mobile Number" name="email">

                  <span class="icon-inside text-muted"><i class="fas fa-envelope"></i></span>

                 </div>

                <div class="mb-3 icon-group icon-group-end">

                  <input type="hidden" class="form-control bg-light border-light" id="emailAddress" required="" name="otp" value="<?php echo $OTP;?>">

                 </div>

                <div class="d-grid my-4">
                  <button class="btn btn-dark btn-lg" type="submit" name="submit">Continue</button>
                </div>

                <p class="text-2 text-muted text-center">Return to <a href="login.php">Sign In</a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
      <!-- Forgot Password Form End --> 
      
    </div>
  </div>
</div>



<!-- Script --> 
<script src="vendor/jquery/jquery.min.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>