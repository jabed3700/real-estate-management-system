<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title></title>
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
 <!--    <div class="top">
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
    				<p class="num"><span class="icon-phone"></span> +008 1300868683</p> 
    			</div>
    		</div>
    	</div>
	</div>  -->
	
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" style="
    margin-top: -26px;" href="index.php"><span></span></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="property.php" class="nav-link">Property</a></li>
	        <!--  <li class="nav-item"><a href="agents.php" class="nav-link">Agents</a></li> -->
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
			  <li class="nav-item"><a href="login/login.php?type=owner" class="nav-link">Post your property</a></li>

			  <?php
			 if(isset($_SESSION["user"])){
				 //echo name with logout button

				 ?>
				<li class="nav-item cta dropdown">
				  <a href="#" class="nav-link ml-lg-2 dropdown-toggle" data-toggle="dropdown"><span class="icon-user"></span> <?=$_SESSION["user"]->FullName?></a>
				  	<ul class="dropdown-menu" style="background-color:#109FD3;color:#fff;padding:10px;">

						<li><a style="color:#fff; font-size:13px" href="logout.php">Logout</a></li>
						<li><a style="color:#fff; font-size:13px;margin:7px 0" href="mybooking.php">My Booking</a></li>
						
						
              	   </ul>
				</li>
				 <?php
			 } 
			 else{
				 ?>
<li class="nav-item cta dropdown">
				  <a href="#" class="nav-link ml-lg-2 dropdown-toggle" data-toggle="dropdown"><span class="icon-user"></span> Login</a>
				  	<ul class="dropdown-menu" style="background-color:#109FD3;color:#fff;padding:10px;">
						<li><a style="color:#fff; font-size:13px" href="./admin">Admin login</a></li>
						<li><a style="color:#fff; font-size:13px" href="login/login.php?type=owner">Houseowner login</a></li>
						<li><a style="color:#fff; font-size:13px" href="#loginform" data-toggle="modal">User Login</a></li>
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

    <div class="hero-wrap" style="background-image: url('images/properties-2.jpg');padding-top: 230px">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Property</span></p>
            <h1 class="mb-3 bread">Property</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section bg-light">
    	<div class="container">
			<div class="row mb-4">
			<div class="col-md heading-section text-center ftco-animate">
		<h2 class="mb-4">All Properties</h2>
          </div>
			</div>
		<div class="row">
		
		
			<?php
				$sql = "SELECT tblhouses.HousesTitle,tblhouses.size,tblcategory.CategoryName,tblhouses.PricePerMonth,tblhouses.loc,tblhouses.PostingDate,tblhouses.id,tblhouses.Bed,tblhouses.Bath,tblhouses.dds,tblhouses.Himage1,tblhouses.Himage2,tblhouses.HouseCategory  FROM `tblhouses` join tblcategory on tblcategory.id=tblhouses.HouseCategory where tblhouses.approve=1 and tblhouses.id not in(select house_id from booking where approve=1)";
				$query = $dbh -> prepare($sql);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
				foreach($results as $result)
				{  
			?>
    			<div class="col-sm col-md-4 ftco-animate">
    				<div class="properties">
    					<a href="#" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url(admin/img/housesimages/<?php echo htmlentities($result->Himage1);?>);">
    						<div class="icon d-flex justify-content-center align-items-center">
    							<span class="icon-search2"></span>
    						</div>
						</a>
    					<div class="text p-3">
    						<span class="status sale">Sale</span>
    						<div class="d-flex">
    							<div class="one">
									<h3><a href="#"><?php echo htmlentities($result->HousesTitle);?></a></h3>
									<p><?php echo htmlentities($result->CategoryName);?></p>
		    						
	    						</div>
	    						<div class="two">
									<span class="price">৳ <?php echo htmlentities($result->PricePerMonth);?></span>
									<p><?php echo htmlentities($result->loc);?></p>
    							</div>
    						</div>
							<div class="d-flex">
							<div class="one">
							<a href="reviews.php?id=<?=$result->id?>">Details</a>
							</div>
							</div>
    						<hr>
    						<p class="bottom-area d-flex">
    							<span><i class="flaticon-selection"></i> <?php echo htmlentities($result->size);?></span>
    							<span class="ml-auto"><i class="flaticon-bathtub"></i> <?php echo htmlentities($result->Bed);?></span>
    							<span><i class="flaticon-bed"></i> <?php echo htmlentities($result->Bath);?></span>
    						</p>
    					</div>
					</div>
				</div>
				<?php }}?>
			</div>
    		
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"></h2>
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
	                <li><span class="icon icon-map-marker"></span><span class="text">47/2 Badda Gulshan link road,Dhaka-1000</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+088 1300868683</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">sawonpatowary@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#" target="_blank">
    
  </a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  <!--/Login-Form --> 
  <?php include('includes/login.php');?>
<?php include('includes/registration.php');?>
<?php include('includes/registrationguest.php');?>

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>