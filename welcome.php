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
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
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


  <div id="portfolio" class="our-portfolio section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
            <h6>DREAMJOB</h6>
            <h4>Welcome, <em><?php echo htmlspecialchars($_SESSION["username"]); ?></em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Apply <em>Here</em></h4>
          </div>
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-15">
                  <div class="menu">
                    <div class="first-thumb active" style="width: 48%;">
                      <div class="thumb">
                        <span class="icon"><img src="assets/images/scl.png" alt=""></span>
                        Apply as a school leaver
                        <p>Click Here to Apply</p>
                      </div>
                      <center>
                      	<div class="border-first-button scroll-to-section" style="width: 100%; margin-bottom: 30px;">
                      		<a href="scl.php">Apply Now</a>
                    	</div>
                      </center>
                    </div>
                    <div class="first-thumb active" style="width: 48%;">
                      <div class="thumb">                 
                        <span class="icon"><img src="assets/images/staff.png" alt=""></span>
                        Apply as a Staff Assistant
                        <p>Click Here to Apply</p>
                      </div>
                      <center>
                      	<div class="border-first-button scroll-to-section" style="width: 100%; margin-bottom: 30px;">
                      		<a href="staff.php">Apply Now</a>
                    	</div>
                      </center>
                    </div>
                  </div>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
            <h6>DREAMJOB</h6>
            <h4>Sent<em> Applications</em></h4>
            <div class="line-dec"></div>
          </div>
        </div>
        <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                      	<th>First Name</th>
                      	<th>Last Name</th>
                        <th>CV File Name</th>
                        <th>Apply As</th>
                        <th>Apply Date</th>
                        <th>Status</th>
                      </tr>
                      <?php 
                            require_once("conn.php"); 

                            $z = $conn->query("SELECT * FROM cvdocs") or die ($conn->error());
                                while($row = $z->fetch_array()){
                      ?>

                      <tr>
                      	<td class="text-truncate">
                          <?php echo $row['FName']; ?>
                        </td>
                        <td class="text-truncate">
                          <?php echo $row['LName']; ?>
                        </td>
                        <td class="text-truncate">
                          <?php echo $row['FileName']; ?>
                        </td>
                        <td class="align-middle">
                          <?php 
                          		$st = $row['Status']; 

                          		if($st == "School Leaver")
                          		{?>
                          			<strong style="color: #07644B;">School Leaver</strong>
                          <?php }
                          		if($st == "Staff Assistant")
                          		{?>
                          			<strong style="color: #072E64;">Staff Assistant</strong>
                          <?php }
                          ?>
                        </td>
                        <td><?php echo $row['date']; ?></td>
                        <td style="color: #06B233"><strong>Sent</strong></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>
</html>