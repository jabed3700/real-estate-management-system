<?php
include('../admin/includes/config.php');
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$password=md5($_POST['password']);
$address=$_POST['address'];
$location=$_POST['location'];
$contactno=$_POST['contactno']; 
$sql="INSERT INTO  houseowner(FullName,Emailid,Password,Address,location,ContactNo) VALUES(:fname,:email,:password,:address,:location,:contactno)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':location',$address,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);

$query->execute();

$lastInsertId = $dbh->lastInsertId();


$currentpage=$_SERVER['REQUEST_URI'];
echo "<script>alert('Registration successful. Now you can log-in.')</script>";
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
}


?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Welcome to hubrealestate| Admin Login</title>
	<link rel="stylesheet" href="../admin/css/font-awesome.min.css">
	<link rel="stylesheet" href="../admin/css/bootstrap.min.css">
	<link rel="stylesheet" href="../admin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../admin/css/bootstrap-social.css">
	<link rel="stylesheet" href="../admin/css/bootstrap-select.css">
	<link rel="stylesheet" href="../admin/css/fileinput.min.css">
	<link rel="stylesheet" href="../admin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../admin/css/style.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/login-bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light" style="color:black!important;font-size:50px">Sign up</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md- col-md-offset-2">
								<form  method="post" name="signup" onSubmit="return valid();">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                      
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
			        	<div class="form-group">
                  <input type="text" class="form-control" name="address" placeholder="Address" maxlength="30" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="location" placeholder="Location" maxlength="30" required="required">
                </div>
			        	<div class="form-group">
                  <input type="text" class="form-control" name="contactno" placeholder="Contact No" maxlength="21" required="required">
                </div>
                
                <div class="form-group">
                  <input style="font-size:16px!important" type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-primary btn-block">
                </div>
              </form>
			  <p style="padding: 0 10px;">Already got an account? <a href="login.php?type=owner">Login Here</a></p>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Loading Scripts -->
	<script src="../admin/js/jquery.min.js"></script>
	<script src="../admin/js/bootstrap-select.min.js"></script>
	<script src="../admin/js/bootstrap.min.js"></script>
	<script src="../admin/js/jquery.dataTables.min.js"></script>
	<script src="../admin/js/dataTables.bootstrap.min.js"></script>
	<script src="../admin/js/Chart.min.js"></script>
	<script src="../admin/js/fileinput.js"></script>
	<script src="../admin/js/chartData.js"></script>
	<script src="../admin/js/main.js"></script>

</body>

</html>