<?php 
session_start();
// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);

$id= $_SESSION["user"]->id;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome To Hub Real Estate</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="top">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col">
                    <p class="social d-flex">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-google"></span></a>
                        <a href="#"><span class="icon-pinterest"></span></a>
                    </p>
                </div>
                <div class="col d-flex justify-content-end">
                    <p class="num"><span class="icon-phone"></span> +008 1714586925</p>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" style="
    margin-top: -26px;" href="index.php"><span>HUB</span> REAL ESTATE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="property.php" class="nav-link">Property</a></li>
                    <li class="nav-item"><a href="agents.php" class="nav-link">Agents</a></li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="#signupform1" data-toggle="modal" class="nav-link">List your property</a></li>

                    <?php
			 if(isset($_SESSION["user"])){
				 //echo name with logout button

				 ?>
                    <li class="nav-item cta dropdown">
                        <a href="#" class="nav-link ml-lg-2 dropdown-toggle" data-toggle="dropdown"><span
                                class="icon-user"></span> <?=$_SESSION["user"]->FullName?></a>
                        <ul class="dropdown-menu" style="background-color:#109FD3;color:#fff;padding:10px;">

                            <li><a style="color:#fff; font-size:13px" href="logout.php">Logout</a></li>
                            <li><a style="color:#fff; font-size:13px;margin:7px 0" href="mybooking.php">My
                                    Booking</a></li>
                           

                        </ul>
                    </li>
                    <?php
			 } 
			 else{
				 ?>
                    <li class="nav-item cta dropdown">
                        <a href="#" class="nav-link ml-lg-2 dropdown-toggle" data-toggle="dropdown"><span
                                class="icon-user"></span> Login</a>
                        <ul class="dropdown-menu" style="background-color:#109FD3;color:#fff;padding:10px;">
                            <li><a style="color:#fff; font-size:13px" href="./admin">Admin login</a></li>
                            <li><a style="color:#fff; font-size:13px" href="login/login.php?type=owner">Houseowner
                                    login</a></li>
                            <li><a style="color:#fff; font-size:13px" href="#loginform" data-toggle="modal">User
                                    Login</a></li>
                        </ul>
                    </li>
                    <?php
			 }
			 ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>booking</span></p>
            <h1 class="mb-3 bread">booking house list</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section contact-section bg-light">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-9 offset-3 mb-4">
            <h2 class="h3">My booking house list</h2>
          </div>
          <div class="w-100"></div>
          
        </div>
        <div class="row block-9">
        <div class="col-md-3 d-flex">
          	<div class="info" style='border-right:1.5px solid #ccc'>
	           <ul class="list-unstyled" >
                <li class='text-right'>
                    <a class='p-2' style='color: #555;font-size: 15px;font-weight: 900;' href="mybooking.php">My booking</a>
                </li>
                <li class='text-right'>
                    <a class='p-2' style='color: #555;font-size: 15px;font-weight: 900;' href="#">Update Password</a>
                </li>
                <li class='text-right'>
                    <a class='p-2' style='color: #555;font-size: 15px;font-weight: 900;' href="#payment" data-toggle="modal">Payment</a>
                </li>
                <li class='text-right'>
                    <a class='p-2' style='color: #555;font-size: 15px;font-weight: 900;' href="logout.php">Logout</a>
                </li>
               </ul>

	          </div>
          </div>
          <div class="col-md-9 order-md-last d-flex bg-white">
          <table id="example1" class="table table-bordered table-striped ">
            <thead>
            
                <tr>
                    <th>HousesTitle</th>
                    <th>Bed</th>
                    <th>Bath</th>
                    <th>Size</th>
                    <th>Location</th>
                    <th>Area</th>
                    <th>Rent</th>
                    <th>Minimum_payable</th>
                    <th>Payment_status</th>
                    <th>Booking</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
     
      $newsql="SELECT tblhouses.id,tblhouses.HousesTitle,tblhouses.loc,booking.approve,tblhouses.PricePerMonth,booking.booking_money,tblhouses.Bath,tblhouses.Bed,tblhouses.size,booking.approve,tblhouses.area,tblusers.FullName FROM tblhouses INNER JOIN booking on tblhouses.id=booking.house_id INNER JOIN tblusers ON tblusers.id=booking.user_id WHERE booking.user_id=$id";
      $query=mysqli_query($con,$newsql);

      if($query== true){
        while($info=mysqli_fetch_array($query)){ ?>
                <tr>
                    <td><?php echo $info['HousesTitle']?></td>
                    <td><?php echo $info['Bed']?></td>
                    <td><?php echo $info['Bath']?></td>
                    <td><?php echo $info['size']?></td>
                    <td><?php echo $info['loc']?></td>
                    <td><?php echo $info['area']?></td>
                    <td><?php echo $info['PricePerMonth']?></td>
                    <td><?php echo $info['PricePerMonth']*.2?></td>
                    <td><?php
                    if($info['booking_money']==0){
                      echo "Haven't paid yet.";
                    }elseif($info['booking_money']==1){
                      echo "Wait for confirmation.";
                    }elseif($info['booking_money']==2){
                      echo "Booking money clear.";
                    }
                    ?></td>
                    <td><?php
                    if($info['approve']==0){
                      echo 'Pending.';
                    }elseif($info['approve']==1){
                      echo 'Booking successful.';
                    }
                    
                    ?></td>
                </tr>
                </tr>

                <?php }
      }
      
    
      ?>
            </tbody>
        </table>
          
          </div>

        </div>
      </div>
    </section>
		
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Hubrealestate</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Buy</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home For Sale</a></li>
                <li><a href="#" class="py-2 d-block">Open Houses</a></li>
                <li><a href="#" class="py-2 d-block">New Listing</a></li>
                <li><a href="#" class="py-2 d-block">Recently Reduce</a></li>
                <li><a href="#" class="py-2 d-block">Off-Market Homes</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Sell</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Sell Your Home</a></li>
                <li><a href="#" class="py-2 d-block">Get A Home Valuation</a></li>
                <li><a href="#" class="py-2 d-block">Local Home Prices</a></li>
                <li><a href="#" class="py-2 d-block">Guides &amp; Rules</a></li>
                <li><a href="#" class="py-2 d-block">Others</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">47/2 Arambagn,Motijheel,Dhaka-1000</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+088 1917506645</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@hub.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">Hub real estate.</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
      <!--/Login-Form --> 
  <?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/registrationguest.php');?>
<?php include('includes/payment.php');?>
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html>