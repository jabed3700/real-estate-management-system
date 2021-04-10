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
include('includes/config.php');
 
$id= $_GET['id'];
$sql = "SELECT tblhouses.HousesTitle,tblhouses.size,tblhouses.area,tblcategory.CategoryName,tblhouses.PricePerMonth,tblhouses.loc,tblhouses.PostingDate,tblhouses.id,tblhouses.Bed,tblhouses.Bath,tblhouses.dds,tblhouses.Himage1,tblhouses.Himage2,tblhouses.Himage3,tblhouses.Himage4,tblhouses.HouseCategory,tblhouses.lon,tblhouses.lat  FROM `tblhouses` join tblcategory on tblcategory.id=tblhouses.HouseCategory where tblhouses.id=$id";
$reviews=mysqli_query($con,$sql);
while($res=mysqli_fetch_array($reviews)){
	$details=$res["dds"];
	$category=$res["CategoryName"];
	$size=$res["size"];
	$price=$res["PricePerMonth"];
	$loc=$res["loc"];
	$area=$res["area"];
	$bed=$res["Bed"];
	$bath=$res["Bath"];
	$img=$res['Himage1'];
    $img2=$res['Himage2'];
    $img3=$res['Himage3'];
    $img4=$res['Himage4'];
	$lon=$res['lon'];
	$lat=$res['lat'];
  }
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
   <!-- <div class="top">
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
                    <p class="num"><span class="icon-phone"></span></p>
                </div>
            </div>
        </div>
    </div>   -->


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" style="
    margin-top: -26px;" href="index.php"><span></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="property.php" class="nav-link">Property</a></li>
                   <!-- <li class="nav-item"><a href="agents.php" class="nav-link">Agents</a></li> -->
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
,,    </nav>
    <!-- END nav -->
<section >
	<div>
                    <div  id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li  data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li  data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li  data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li  data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height:550px" src="admin/img/housesimages/<?=$img?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style="height:550px" src="admin/img/housesimages/<?=$img2?>" class="d-block w-100" alt="...">
    </div>
    <div style="height:550px" class="carousel-item">
      <img src="admin/img/housesimages/<?=$img3?>" class="d-block w-100" alt="...">
    </div>
    <div style="height:550px" class="carousel-item">
      <img src="admin/img/housesimages/<?=$img4?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

                </div>
</section>


    <section class="ftco-section ftc-no-pb" style="margin-top:-75px">
        <div class="container">
            <div class="row">
                <div>
                    <section class="overview" id="overview" style="margin-top: 20px;">
                    <div class="clearfix">
                            <h2 class="main-heading" style="width:600px;float:left">Overview</h2>
                             
                            <?php
                            if(isset($_SESSION["user"])){ ?>
                                <h3 class="main-heading" style="width:400px;float:left;margin-left:7px"><a
                                href="housebooking.php?id=<?=$id?>" >Booking</a></h3>
                         <?php   }if(!isset($_SESSION["user"])){
                                echo'<h3 class="main-heading" style="width:400px;float:left;margin-left:7px"><a
                                href="#loginform" data-toggle="modal" class="">Booking</a></h3>';
                            }
                            ?>
                                    
                        </div>
                        <section class="detail content">
                            <h3 class="sub-heading">Details</h3>
                            <ul>
                                <li class="left" style="list-style-type: none">
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="category left"><span style="font-weight: bold"> Type:</span>
                                                <span class="value left" style="margin-left:20px"><?=$category?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="category left"><span style="font-weight: bold"> Size:</span>
                                                <span class="value left" style="margin-left:20px"><?=$size?><span> Sq.
                                                        Ft.</span></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="category left"><span style="font-weight: bold"> Price:</span>
                                                <span class="value left" style="margin-left:20px"> <span
                                                        class="curuncy"> BDT</span>
                                                    <?=$price?> <p style="font-size: 18px"><b>(Rent would be negotiable) </b></p>
                                                </span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="category left"><span style="font-weight: bold"> Purpose:</span>
                                                <span class="value left" style="margin-left:20px">To Rent</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="category left"><span style="font-weight: bold">
                                                    Bedroom(s):</span>
                                                <span class="value left" style="margin-left:20px"><?=$bed?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="category left"><span style="font-weight: bold"> Bath(s):</span>
                                                <span class="value left" style="margin-left:20px"><?=$bath?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="category left"><span style="font-weight: bold"> Location:</span>
                                                <span class="value left" style="margin-left:20px"><?=$loc?></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="category left"><span style="font-weight: bold"> Area:</span>
                                                <span class="value left" style="margin-left:20px"><?=$area?></span>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                            </ul>
                            <hr>
                        </section>
                        <section class="content description ltr">
                            <div class="container">
                                <h3 class="sub-heading">Description</h3>
                                <div class="desc-text toogling-section">
                                    <p>
                                        <?=$details?>
                                    </p>
                                </div>
                            </div>

                        </section>
                        <hr>
                        <section>

                            <div class="row">
                                <div id="map" style="height: 400px" class="col-md-8">


                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-info btn-block mb-2" data-target="#schoolul"
                                        data-toggle="collapse" id="school">Nearby School</button>
                                    <ul id="schoolul" class="collapse"></ul>
                                    <button class="btn btn-info btn-block mb-2" data-target="#hospitalul"
                                        data-toggle="collapse" id="hospital">Nearby Hospital</button>
                                    <ul id="hospitalul" class="collapse"></ul>
                                    <button class="btn btn-info btn-block mb-2" data-target="#Restaurantl"
                                        data-toggle="collapse" id="Restaurant">Nearby Restaurant</button>
                                    <ul id="Restaurantl" class="collapse"></ul>
                                    <button class="btn btn-info btn-block mb-2" data-target="#Parkl"
                                        data-toggle="collapse" id="Park">Nearby Park</button>
                                    <ul id="Parkl" class="collapse"></ul>

                                    <button class="btn btn-info btn-block mb-2" data-target="#Marketl"
                                        data-toggle="collapse" id="Market">Nearby Super Market</button>
                                    <ul id="Marketl" class="collapse"></ul>

                                    <button class="btn btn-info btn-block mb-2" data-target="#arketl"
                                        data-toggle="collapse" id="arket">Nearby Shopping Complex</button>
                                    <ul id="arketl" class="collapse"></ul>

                                    <button class="btn btn-info btn-block mb-2" data-target="#Universityl"
                                        data-toggle="collapse" id="University">Nearby University</button>
                                    <ul id="Universityl" class="collapse"></ul>

                                    <button class="btn btn-info btn-block mb-2" data-target="#Collegel"
                                        data-toggle="collapse" id="College">Nearby  MedicalCollege</button>
                                    <ul id="Collegel" class="collapse"></ul>

                                    <button class="btn btn-info btn-block mb-2" data-target="#Bankl"
                                        data-toggle="collapse" id="Bank">Nearby Bank</button>
                                    <ul id="Bankl" class="collapse"></ul>
                                </div>
                            </div>


                        </section>



                        <hr>
                    </section>
                    <!-- <section class="content description ltr">
                        <div class="container">
                            <h3 class="sub-heading">Review</h3>
                            <form class="bg-white contact-form col-md-8">
                                <div class="form-group">
                                    <textarea name="message" id="" cols="30" rows="7" class="form-control"
                                        placeholder="Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="send" value="Submit" class="btn btn-primary">
                                </div>
                            </form>

                    </section> -->

                    <footer class="ftco-footer ftco-bg-dark ftco-section col-md-12 mt-4">
                        <div class="container">
                            <div class="row mb-5">
                                <div class="col-md">
                                    <div class="ftco-footer-widget mb-4">
                                        <h2 class="ftco-heading-2"></h2>
                                        <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                            Consonantia, there live the blind texts.</p>
                                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a>
                                            </li>
                                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a>
                                            </li>
                                            <li class="ftco-animate"><a href="#"><span
                                                        class="icon-instagram"></span></a></li>
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
                                                <li><span class="icon icon-map-marker"></span><span class="text">47/2
                                                       Badda Gulshan Link Road ,Dhaka-1000</span></li>
                                                <li><a href="#"><span class="icon icon-phone"></span><span
                                                            class="text">+088 1300868683</span></a></li>
                                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                                            class="text">sawonpatowary@gmail.com</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <p>
                                        Copyright &copy;
                                        <script>
                                        document.write(new Date().getFullYear());
                                        </script> All rights reserved <i class="icon-heart color-danger"
                                            aria-hidden="true"></i> by <a href="#" target="_blank"></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </footer>

                    <!--/Login-Form -->
                    
                    <?php include('includes/registration.php');?>
                    <?php include('includes/login.php');?>
                    <?php include('includes/payment.php');?>
                    <?php include('includes/registrationguest.php');?>

                    <!-- loader -->
                    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
                            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                                stroke="#eeeeee" />
                            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                                stroke-miterlimit="10" stroke="#F96D00" /></svg></div>


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
                    <script>
                    let pos;
                    let map;
                    let place = [];
                    function  getDistance(lat1,lon1,lat2,lon2){
                        var p = 0.017453292519943295;    // Math.PI / 180
  var c = Math.cos;
  var a = 0.5 - c((lat2 - lat1) * p)/2 + 
          c(lat1 * p) * c(lat2 * p) * 
          (1 - c((lon2 - lon1) * p))/2;

  return (12742 * Math.asin(Math.sqrt(a))).toFixed(2);
                    }
                    function deg2rad(deg) {
  return deg * (Math.PI/180)
}
                    function getNearbyPlaces(position, pla, callback) {

                        let request = {
                            location: position,
                            rankBy: google.maps.places.RankBy.DISTANCE,
                            keyword: pla
                        };



                        service = new google.maps.places.PlacesService(map);
                        service.nearbySearch(request, (results, status) => {
                            console.log(results)

                            place.push(results.map(school => `<li>${school.name+'('+getDistance(<?php echo "$lon"; ?>,<?php echo "$lat"; ?>,school.geometry.location.lat(),school.geometry.location.lng())+' km)'}</li>`).join(''));

                            callback();

                           // if (status == google.maps.places.PlacesServiceStatus.OK) {
                            // createMarkers(results);
                           //  }
                        });

                    }
                    let bounds;
                    // Handle the results (up to 20) of the Nearby Search
                    function createMarkers(places) {
                        places.forEach(place => {


                            let marker = new google.maps.Marker({
                                position: place.geometry.location,
                                map: map,

                                title: place.name
                            });

                            /* TODO: Step 4B: Add click listeners to the markers */

                            // Adjust the map bounds to include the location of this marker
                            bounds.extend(place.geometry.location, place);
                        });
                        /* Once all the markers have been placed, adjust the bounds of the map to
                         * show all the markers within the visible area. */
                        map.fitBounds(bounds);
                    }



                    function initMap() {
                        // Set the default location and initialize all variables
                        bounds = new google.maps.LatLngBounds();
                        pos = {
                            lat: <?php echo "$lon"; ?> ,
                            lng : <?php echo "$lat"; ?>
                        };
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: pos,
                            zoom: 16
                        });
                        var marker = new google.maps.Marker({
                            position: pos,
                            map: map
                        });
                        getNearbyPlaces(pos, 'school', () => {
                            getNearbyPlaces(pos, 'hospital', () => {
                                getNearbyPlaces(pos, 'restaurant', () => {
                                    getNearbyPlaces(pos, 'park', () => {

                                      getNearbyPlaces(pos, 'Supermarket', () => {
                                        
                                        getNearbyPlaces(pos, 'Shopping Complex', () => {


                                         getNearbyPlaces(pos, 'University', () => {
                                             getNearbyPlaces(pos, 'Medical College', () => {

                                        getNearbyPlaces(pos, 'bank', () => {
                                            let schbtn = document
                                                .getElementById('school')
                                            let schul = document.getElementById(
                                                'schoolul')


                                            schbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'schoolul')
                                                        .innerHTML = place[
                                                            0]

                                                })

                                            let hosbtn = document
                                                .getElementById('hospital')

                                            hosbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'hospitalul')
                                                        .innerHTML = place[
                                                            1]

                                                })
                                            let rstbtn = document
                                                .getElementById('Restaurant')

                                            rstbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Restaurantl')
                                                        .innerHTML = place[
                                                            2]

                                                })
                                            let prkbtn = document
                                                .getElementById('Park')

                                            prkbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Parkl')
                                                        .innerHTML = place[
                                                            3]

                                                })

                                             let Marketbtn = document
                                                .getElementById('Market')

                                            Marketbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Marketl')
                                                        .innerHTML = place[
                                                            4]

                                                })

                                            let arketbtn = document
                                                .getElementById('arket')

                                            arketbtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'arketl')
                                                        .innerHTML = place[
                                                            5]

                                                })


                                             let Universitybtn = document
                                                .getElementById('University')

                                            Universitybtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Universityl')
                                                        .innerHTML = place[
                                                            6]

                                                })

                                             let Collegebtn = document
                                                .getElementById('College')

                                            Collegebtn.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Collegel')
                                                        .innerHTML = place[
                                                            7]

                                                })



                                            let bank = document.getElementById(
                                                'Bank')

                                            bank.addEventListener('click',
                                                function() {
                                                    document.getElementById(
                                                            'Bankl')
                                                        .innerHTML = place[
                                                            8]

                                                })

                                        });
                                    });
                                });
                            });
                        });

                       });
                         
                             });
                           });
                        });




                    }
                    </script>


                    <script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi82DDWkY-_hwoBcUp84sIcnP8pUx8lLc&libraries=places&callback=initMap">
                    </script>

                    <script>

                    </script>
                    <script src="js/main.js"></script>

</body>

</html>