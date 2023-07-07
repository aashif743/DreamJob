<?php
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$email = $username = $password = $confirm_password = "";
$email_err = $username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate e-mail
    if(empty(trim($_POST["email"]))){
        $email_err = "Please Enter Your Email Address.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This Email Is Already Taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "<div class='alert alert-danger' style='margin-top: 10px;'>
                <strong>Error Detected!</strong> Please Try Again Later.
                </div>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please Enter a Username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This Username Is Already Taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "<div class='alert alert-danger' style='margin-top: 10px;'>
                <strong>Error Detected!</strong> Please Try Again Later.
                </div>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please Enter a Password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password Must Have Atleast 6 Characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please Confirm Password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password Did Not Match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, username, password) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_username, $param_password);
            
            // Set parameters
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "<div class='alert alert-danger' style='margin-top: 10px;'>
                <strong>Error Detected!</strong> Please Try Again Later.
                </div>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
              <li class="scroll-to-section"><div class="border-first-button"><a href="login.php">Sign In</a></div></li> 
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

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>DREAMJOB</h6>
            <h4>Register <em>Now</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <form id="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="row">
                <div class="fill-form">
                  <div class="row">
                    <h4>Please Fill This Form to Registration</h4>
                    <center>
                      <div class="col-lg-4">
                      <fieldset>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <input type="text" name="username" id="username" placeholder="Enter Username" autocomplete="on">
                            <span class="help-block" style="color: #C70039; float: left; margin-left: 15px; margin-top: 10px;"><?php echo $username_err; ?></span>
                        </div>
                      </fieldset>
                      <fieldset>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                          <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Enter Email Address">
                          <span class="help-block" style="color: #C70039; float: left; margin-left: 15px; margin-top: 10px;"><?php echo $email_err; ?></span>
                        </div>
                      </fieldset>
                      <fieldset>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                          <input type="password" name="password" id="password" placeholder="Enter Password" autocomplete="on">
                          <span class="help-block" style="color: #C70039; float: left; margin-left: 15px; margin-top: 10px;"><?php echo $password_err; ?></span>
                        </div>
                      </fieldset>
                      <fieldset>
                        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" autocomplete="on">
                          <span class="help-block" style="color: #C70039; float: left; margin-left: 15px; margin-top: 10px;"><?php echo $confirm_password_err; ?></span>
                        </div>
                      </fieldset>
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button ">Register</button>
                      </fieldset>
                      <fieldset>
                        <p style="text-align: center; margin-top: 15px;"> Already have an account? <a href="login.php"><b>Sign In here</b></a>.</p>
                      </fieldset>
                    </div> 
                    </center>
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