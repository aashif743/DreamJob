<?php
// Initialize the session
session_start();
 
// If the user not loged in redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>DREAMJOB</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-digimedia-v3.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

TemplateMo 568 DigiMedia

https://templatemo.com/tm-568-digimedia

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <img src="assets/images/logo-v3.png" alt="">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="about.php">About</a></li>
              <li class="scroll-to-section"><a href="contact.php">Contact</a></li> 
              <li class="scroll-to-section"><div class="border-first-button"><a href="logout.php">Sign Out</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s"><br><br><br><br><br><br>
          <form id="contact" method="POST" enctype="multipart/form-data" action="sclfile.php">
            <div class="row">
              <div class="col-lg-5">
                <div style="margin-top: 200px;">
                  <img src="assets/images/about-dec-v3.png" alt="">
                </div>
              </div>
                <div class="col-lg-7">
                <div class="fill-form">
                  <div class="row">
                    <h4>School Leavers Application</h4>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="fname" id="fname" placeholder="First Name" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="nic" id="nic" placeholder="NIC Number" required="">
                      </fieldset>
                      <fieldset>
                        <input type="text" name="mobile" id="mobile" placeholder="Mobile Number" autocomplete="on">
                      </fieldset>
                      <fieldset>
                        <textarea name="address" type="text" class="form-control" id="address" placeholder="Address" required=""></textarea>  
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="lname" id="lname" placeholder="Last Name" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="drive" name="drive" id="drive" placeholder="Driver License Number" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="dob" id="dob" placeholder="Date of Birth" onfocus="(this.type = 'date')" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="city" id="city" placeholder="City" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="province" id="province" placeholder="Province" autocomplete="on" required>
                      </fieldset>
                    </div>
                    <h6 style="margin-top: 50px;">Educational Qualification</h6>

                    <div class="col-lg-6">
                      <fieldset>
                        <label style="margin-top: 30px; font-size: 12px; float: left; margin-left: 20px;"><b>G.C.E Ordinary Level Examination</b></label>
                        <input type="text" name="ol" id="ol" placeholder="Year" autocomplete="on" required>
                      </fieldset>
                      <fieldset>
                        <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email Address" autocomplete="on">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input style="margin-top: 78px;" type="text" name="oindex" id="oindex" placeholder="Index Number" required="">
                      </fieldset>
                      <fieldset>
                        <input type="text" name="FileName" id="FileName" placeholder="Click Here to Upload CV" onfocus="(this.type = 'file')" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button" name="save">Submit</button>
                      </fieldset>
                      <p style="text-align: center; margin-top: 15px; margin-bottom: 20px;"> Click Here To <a href="welcome.php"><b>Go Back</b></a>.</p>
                    </div>
                  </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2021 DreamJob (pvt) Ltd. All Rights Reserved. 
          <br>Maharagama, Colombo</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>