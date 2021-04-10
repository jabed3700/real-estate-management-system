<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>
<?php

//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$contact=$_POST['contact']; 
$address=$_POST['address'];
$zone=$_POST['zone'];
$room=$_POST['room']; 
$size=$_POST['size']; 
$floor=$_POST['floor']; 
$details=$_POST['details']; 

$sql="INSERT INTO  tblusers(FullName,conact,Address,zone,room,size,floor,details) VALUES(:fname,:contact,:address,:zone,:room,:size,:floor,:details)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':zone',$zone,PDO::PARAM_STR);
$query->bindParam(':room',$room,PDO::PARAM_STR);
$query->bindParam(':size',$size,PDO::PARAM_STR);
$query->bindParam(':floor',$floor,PDO::PARAM_STR);
$query->bindParam(':details',$details,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
// echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>


<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data: 'emailid=' + $("#emailid").val(),
        type: "POST",
        success: function(data) {
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error: function() {}
    });
}
</script>
<script type="text/javascript">
function valid() {
    if (document.signup.password.value != document.signup.confirmpassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.signup.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>
<style>
.cbox-hidden {
    display: none;
}

.dropdown-menu>li>a:hover,
.dropdown-menu>li>a:focus {
    text-decoration: none;
    color: #262626;
    background-color: #109fd3 !important;
}
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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

    <link rel="stylesheet" href="chat/style2.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <?php include('includes/login.php');?>
  <!--  <div class="top">
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
                    <p class="num"><span class="icon-phone"></span> +088 1300868683</p> 
                </div>
            </div>
        </div>
    </div> -->

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" style="
    margin-top: -26px;" href="index.php"><span></span> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto" ">
                    <li class="nav-item "><a href="index.php" class="nav-link" >Home</a></li>
                    <li class="nav-item"><a href="property.php" class="nav-link">Property</a></li>
                   <!-- <li class="nav-item"><a href="agents.php" class="nav-link">Agents</a></li> -->
                    <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="login/login.php?type=owner" class="nav-link">Post your property</a></li>

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


    <section class="home-slider owl-carousel" style="
    margin-top: -200px">
        <div class="slider-item" style="background-image:url(images/sp2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                    <div class="col-md-6 text p-4 ftco-animate">
                        <h1 class="mb-3 ">Road 5, Arambagh</h1>
                        <span class="location d-block mb-3"><i class="icon-my_location"></i> Merul Badda 1000</span>
                        <p>It is the exact place if you are looking for one of the most picked and affordable properties in a congenial zone.</p>
                        <span class="price">30,000</span>
                        <a href="reviews.php?id=44" class="btn-custom p-3 px-4 bg-primary">View Details <span
                                class="icon-plus ml-1"></span></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image:url(images/sp3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                    <div class="col-md-6 text p-4 ftco-animate">
                        <h1 class="mb-3">Road 9A, Uttara</h1>
                        <span class="location d-block mb-3"><i class="icon-my_location"></i> Dhaka,1000</span>
                        <p>The scenic building includes amazing bed and bath which are enough to get you swayed to seize the flat right away..</p>
                        <span class="price">15,000</span>
                        <a href="reviews.php?id=37" class="btn-custom p-3 px-4 bg-primary">View Details <span
                                class="icon-plus ml-1"></span></a>
                    </div>
                </div>
            </div>
        </div>

<div class="slider-item" style="background-image:url(images/sp4.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-md-end align-items-center justify-content-end">
                    <div class="col-md-6 text p-4 ftco-animate">
                        <h1 class="mb-3">Road 17 Block d, Fakirafool</h1>
                        <span class="location d-block mb-3"><i class="icon-my_location"></i> Dhaka,1000</span>
                        <p>Waiting for winning a ready flat in Banasree? You just chose the right link to get through it.Banasree is offering you one of the finest looking flats positioning. </p>
                        <span class="price">25,000</span>
                        <a href="reviews.php?id=27" class="btn-custom p-3 px-4 bg-primary">View Details <span
                                class="icon-plus ml-1"></span></a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="ftco-search">
        <div class="container">
            <div class="row">
                <div class="col-md-12 search-wrap">
                    <h2 class="heading h5 d-flex align-items-center pr-4"><span class="ion-ios-search mr-3"></span>
                        Search Property</h2>
                    <form action="#property" class="search-property">
                        <div class="row">
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Location</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span style="color:black"
                                                    class="ion-ios-arrow-down"></span></div>
                                            <select name="loc" id="" class="form-control">
                                                <option value=""> Location </option>
                                                <option value="Dhaka">Dhaka</option>
                                                <option value="Chittagong">Chittagong</option>
                                                <option value="Rajshahi">Rajshahi</option>
                                                <option value="Khulna">Khulna</option>
                                                <option value="Barishal">Barishal</option>
                                                <option value="Shylet">Shylet</option>
                                                <option value="Jessor">Jessor</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Area</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span style="color:black"
                                                    class="ion-ios-arrow-down"></span></div>
                                            <select name="area" id="" class="form-control">
                                                <option value="">area</option>
                                                <option value="Motijheel">Motijheel</option>
                                                <option value="Khilgaon">Khilgaon</option>
                                                <option value="Mohammadpur">Mohammadpur</option>
                                                <option value="Khilkhet">Khilkhet</option>
                                                <option value="Palton">Palton</option>
                                                <option value="Gulshan">Gulshan</option>
                                                <option value="Mirpur">Mirpur</option>
                                                <option value="Banani">Banani </option>
                                                <option value="Dhaka Cantonment">Dhaka Cantonment</option>
                                                <option value="Badda">Badda</option>
                                                <option value="Badda">Fakiraful</option>
                                                <option value="Savar">Savar</option>
                                                <option value="Uttara">Uttara</option>
                                                <option value="Dhanmondi">Dhanmondi</option>
                                                <option value="Jatrabari">Jatrabari</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Property Type</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span style="color:black"
                                                    class="ion-ios-arrow-down"></span></div>
                                            <select name="type" id="" class="form-control">
                                                <option value="">Type</option>
                                                <option value="House">House</option>
                                                <option value="Apartment">Apartment</option>
                                                <option value="Female hostel">Female hostel</option>
                                                <option value="Sublet">Sublet</option>
                                                <option value="Bechelor hostel">Bechelor hostel</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Price</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <input type="number" class="form-control" placeholder="Min price"
                                                name="min">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Max Price</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <input type="number" name="max" class="form-control"
                                                placeholder="Max price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Bed</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span style="color:black"
                                                    class="ion-ios-arrow-down"></span></div>
                                            <select name="bed" id="" class="form-control">
                                                <option value="">Min Bed</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-items-end">
                                <div class="form-group">
                                    <label for="#">Min Bath</label>
                                    <div class="form-field">
                                        <div class="select-wrap">
                                            <div class="icon"><span style="color:black"
                                                    class="ion-ios-arrow-down"></span></div>
                                            <select name="bath" id="" class="form-control">
                                                <option value="">Min Bath</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 align-self-end">
                                <div class="form-group">
                                    <div class="form-field">
                                        <input type="submit" value="Search" class="form-control btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section bg-light" id="property">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">
                         <?=isset($_GET["min"])?"Result showing  from ".$_GET[""]."  ".$_GET[""]:""?> 
                        All Properties
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row">

                <?php
			if(!isset($_GET["min"])){
				$sql = "SELECT tblhouses.HousesTitle,tblhouses.contact,tblhouses.size,tblcategory.CategoryName,houseowner.Emailid,tblhouses.PricePerMonth,tblhouses.loc,tblhouses.PostingDate,tblhouses.id,tblhouses.Bed,tblhouses.Bath,tblhouses.dds,tblhouses.Himage1,tblhouses.Himage2,tblhouses.HouseCategory FROM `tblhouses` join tblcategory on tblcategory.id=tblhouses.HouseCategory JOIN houseowner on houseowner.id=tblhouses.houseowner_id where tblhouses.approve=1 and tblhouses.id not in(select house_id from booking where approve=1)";
			}

			else{
				$min=$_GET["min"];
				$max=$_GET["max"];
				$loc=$_GET["loc"];
				$type=$_GET["type"];
				$area=$_GET["area"];
				$bed=$_GET["bed"];
				$bath=$_GET["bath"];
				$sql = "SELECT tblhouses.HousesTitle,tblhouses.contact,tblhouses.size,tblcategory.CategoryName,houseowner.Emailid,tblhouses.PricePerMonth,tblhouses.loc,tblhouses.PostingDate,tblhouses.id,tblhouses.Bed,tblhouses.Bath,tblhouses.dds,tblhouses.Himage1,tblhouses.Himage2,tblhouses.HouseCategory FROM `tblhouses` join tblcategory on tblcategory.id=tblhouses.HouseCategory JOIN houseowner on houseowner.id=tblhouses.houseowner_id where tblhouses.approve=1 and tblhouses.id not in(select house_id from booking where approve=1)";
				//if($min && $max){
				//	$sql.="and (PricePerMonth >= $min and PricePerMonth <=$max)";

                 if($min){
                    $sql.="and (PricePerMonth >= '$min')"; }

                 if($max){
                    $sql.="and (PricePerMonth <= '$max')";    }
                       
				if($loc){
					$sql.="and loc='$loc'";
				}if($type){
					$sql.="and tblcategory.CategoryName='$type'";
				}if($area){
					$sql.="and area='$area'";
				}if($bed){
					$sql.="and Bed>='$bed'";
				}if($bath){
					$sql.="and Bath>='$bath'";
				}
			}	
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
                        <a href="#" class="img img-2 d-flex justify-content-center align-items-center"
                            style="background-image: url(admin/img/housesimages/<?php echo htmlentities($result->Himage1);?>);">
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
                            <div class="d-flex">
                                <div class="one" style='width:110px'>
                                    <p id ='call<?=$result->id?>' onclick="call('call<?=$result->id?>','<?=$result->contact?>')" style='margin-bottom:0px;margin-top:20px; margin-bottom: 0px;
    margin-top: 20px;
    font-size: 15px;
    background-color: #0e6b4f;
    border: none;
    border-radius: 52px;
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    height: 24px;
    padding: 0;
    text-transform: uppercase;
    letter-spacing: .5px;
    width: 110px;
    text-align: center;' class=''>Call</p>
                                    
                                </div>
                                <script>
                                    
                                        call=(id,number)=>{
                                            console.log(id,number)
                                            document.getElementById(id).innerHTML='+88'+number;
                                        document.getElementById(id).style.background='#fff';
                                        document.getElementById(id).style.color='#333';
                                        
                                        }

                                   
                                </script>
                                <div class="two">
                                <p style='margin-bottom:0px;margin-top:20px;    margin-bottom: 0px;
    margin-top: 20px;
    font-size: 15px;
    background-color: #0e6b4f;
    border: none;
    border-radius: 62px;
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    font-weight: 700;
    height: 24px;
    padding: 0;
    text-transform: uppercase;
    letter-spacing: .5px;
    width: 80px;
    margin-left:118;
    text-align: center;
    
    color:white;text-decoration: none'  id ='email<?=$result->id?>' onclick="email('email<?=$result->id?>',
    '<?=$result->Emailid?>')">Email</p>
    <script>
                                    
                                    email=(id,a)=>{
                                        console.log(id,a)
                                        document.getElementById(id).innerHTML=a;
                                    document.getElementById(id).style.background='#fff';
                                    document.getElementById(id).style.color='#333';
                                    document.getElementById(id).style.width='110px';
                                    document.getElementById(id).style.marginLeft='120px';
                                    
                                    }

                               
                            </script>
                                </div>
                            </div>
                            <hr>
                            <p class="bottom-area d-flex">
                                <span><i class="flaticon-selection"></i>
                                    <?php echo htmlentities($result->size);?></span>
                                <span class="ml-auto"><i class="flaticon-bathtub"></i>
                                    <?php echo htmlentities($result->Bath);?></span>
                                <span><i class="flaticon-bed"></i> <?php echo htmlentities($result->Bed);?></span>
                            </p>
                        </div>
                    </div>

                </div>
                <?php }}?>
            </div>

        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-pin"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Find Places Anywhere In The World</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-detective"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">We Have Agents With Experience</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-house"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Buy &amp; Rent Modern Properties</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services py-4 d-block text-center">
                        <div class="d-flex justify-content-center">
                            <div class="icon"><span class="flaticon-purse"></span></div>
                        </div>
                        <div class="media-body p-2 mt-2">
                            <h3 class="heading mb-3">Making Money</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Some fun facts</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="9000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="10000">0</strong>
                                    <span>Properties</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="1000">0</strong>
                                    <span>Agents</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100">0</strong>
                                    <span>Awards</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section testimony-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 ftco-animate">
                    <div class="row ftco-animate">
                        <div class="col-md-12">
                            <div class="carousel-testimony owl-carousel ftco-owl">
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Tamim iqbal</p>
                                            <span class="position">Clients</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Piash</p>
                                            <span class="position">Agent</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_3.jpg)">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Shabbir</p>
                                            <span class="position">Client</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Jahangir</p>
                                            <span class="position">Client</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="testimony-wrap py-4 pb-5">
                                        <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                                            <span class="quote d-flex align-items-center justify-content-center">
                                                <i class="icon-quote-left"></i>
                                            </span>
                                        </div>
                                        <div class="text text-center">
                                            <p class="mb-4">A small river named Duden flows by their place and supplies
                                                it with the necessary regelialia. It is a paradisematic country, in
                                                which roasted parts of sentences fly into your mouth.</p>
                                            <p class="name">Zahir khan</p>
                                            <span class="position">Client</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Read Articles</span>
                    <h2>Recent Blog</h2>
                </div>
            </div>
            <div class="row d-flex">
               <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b1.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3"><a href=blog-single1.php>A Renter's Guide to Gift Giving in an Apartment</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single2.php class="block-20" style="background-image: url('images/blog/b2.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single2.php>7 Places to Hide a Gift from Your Roommate</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single3.php class="block-20" style="background-image: url('images/blog/b3.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single3.php>How to Get Packages Delivered to Your Apartment</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single4.php class="block-20" style="background-image: url('images/blog/b4.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single4.php>6 Simple Thanksgiving Recipes</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single5.php class="block-20" style="background-image: url('images/blog/b5.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3"><a href=blog-single5.php>3 Thanksgiving Day Party Tips</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single6.php class="block-20" style="background-image: url('images/blog/b6.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single6.php>Tips for Hiring Movers</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single7.php class="block-20" style="background-image: url('images/blog/b7.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single7.php>Moving Out of State: How to Start Your Apartment Search in a New State</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
<!--<div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b1.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3"><a href="https://www.apartments.com/blog/a-renters-guide-to-gift-giving-in-an-apartment">A Renter's Guide to Gift Giving in an Apartment</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b2.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href="#">7 Places to Hide a Gift from Your Roommate</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b3.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href="#">How to Get Packages Delivered to Your Apartment</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b4.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href="#">6 Simple Thanksgiving Recipes</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b5.jpg');">
              </a>
              <div class="text mt-3 d-block">
                <h3 class="heading mt-3"><a href="#">3 Thanksgiving Day Party Tips</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b6.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href="#">Tips for Hiring Movers</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/blog/b7.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href="#">Moving Out of State: How to Start Your Apartment Search in a New State</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div> -->
<div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single8.php class="block-20" style="background-image: url('images/blog/b8.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single8.php>Apartment Safety Questions to Ask Before Signing a Lease</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single9.php class="block-20" style="background-image: url('images/blog/b9.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single9.php>Apartment Safety Questions to Ask Before Signing a Lease</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
<div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single10.php class="block-20" style="background-image: url('images/blog/b10.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single10.php>Apartment Safety Questions to Ask Before Signing a Lease</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
    <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single11.php class="block-20" style="background-image: url('images/blog/b11.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single11.php>Apartment Safety Questions to Ask Before Signing a Lease</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href=blog-single12.php class="block-20" style="background-image: url('images/blog/b12.jpg');">
              </a>
              <div class="text mt-3">
                <h3 class="heading mt-3"><a href=blog-single12.php>Apartment Safety Questions to Ask Before Signing a Lease</a></h3>
                <div class="meta mb-3">
                  <div><a href="#">Dec 6, 2018</a></div>
                  <div><a href="#">Admin</a></div>
                  <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
              </div>
            </div>
          </div>
  </div>
      </div>
        </div>
    </section>

    <!--/Login-Form -->
    
    <?php include('includes/registration.php');?>
    <?php include('includes/registrationguest.php');?>
    <?php include('includes/mail.php');?>
    <!--Register-Form -->


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"></h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
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
                                <li><span class="icon icon-map-marker"></span><span class="text">47/2
                                       Badda Gulshan link road  ,Dhaka-1000</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+088
                                            1300868683</span></a></li>
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
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> <a
                            href="#" target="_blank"></a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!--contact form end-->

    <div style=" position: relative;">
        <?php

      include_once("chat/chat.php");
  
   ?>
    </div>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" /></svg></div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    <script>
    startChat = (id) => {

        if (!localStorage.getItem("chatEmail") || localStorage.getItem("chatEmail") == 'null') {
            localStorage.setItem("chatEmail", window.prompt("Please Enter your Email"));
        }
        if (localStorage.getItem("chatEmail") && localStorage.getItem("chatEmail") != 'null') {
            $("#chat_window_1").removeClass("cbox-hidden");
        }
        localStorage.setItem("reciever", id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("msg-body").innerHTML = this.responseText;
                document.getElementById("msg-body").scrollTop = 13000;
            }
        };
        xhttp.open("GET", "getmessage.php?sender=" + localStorage.getItem("chatEmail") + "&reciever=" + id, true);
        xhttp.send();
        if (window.msgInterval) {
            clearInterval(msgInterval);
        }
        window.msgInterval = window.setInterval(function() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("msg-body").innerHTML = this.responseText;

                }
            };
            xhttp.open("GET", "getmessage.php?sender=" + localStorage.getItem("chatEmail") + "&reciever=" +
                id, true);
            xhttp.send();
        }, 5000);
    }
    send = () => {
        let sender = localStorage.getItem("chatEmail");
        let reciever = localStorage.getItem("reciever");
        let message = document.getElementById("msg").value;
        document.getElementById("msg").value = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                startChat(reciever);
            }
        };
        xhttp.open("GET", "sendmessage.php?sender=" + sender + "&reciever=" + reciever + "&message=" + message,
            true);
        xhttp.send();

    }
    $(document).on('click', '.panel-heading span.icon_minim', function(e) {
        var $this = $(this);
        if (!$this.hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
        } else {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('focus', '.panel-footer input.chat_input', function(e) {
        var $this = $(this);
        if ($('#minim_chat_window').hasClass('panel-collapsed')) {
            $this.parents('.panel').find('.panel-body').slideDown();
            $('#minim_chat_window').removeClass('panel-collapsed');
            $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
        }
    });
    $(document).on('click', '#new_chat', function(e) {
        var size = $(".chat-window:last-child").css("margin-left");
        size_total = parseInt(size) + 400;
        alert(size_total);
        var clone = $("#chat_window_1").clone().appendTo(".container");
        clone.css("margin-left", size_total);
    });
    $(document).on('click', '.icon_close', function(e) {
        //$(this).parent().parent().parent().parent().remove();
        $("#chat_window_1").addClass("cbox-hidden");
    });
    </script>
    <?php
	
	if($_GET["message"]){
		?>
    <script>
    alert("<?=$_GET["message"]?>");
    </script>
    <?php
	}
	?>
</body>

</html>