<?php
$piash= $_GET['type'];
?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>| Houseowner Login</title>
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
					
						<h1 class="text-center text-bold text-light mt-4x" style="color:black!important"> Houseowner <br> Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" action="login_core.php">

									<label for="" class="text-uppercase text-sm">Your Email </label>
									<input type="text" placeholder="Youe Email" name="email" class="form-control mb">

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<input type="hidden" name="hidden" value="<?php echo $piash;?>">

									<input type="submit" value='LOGIN' class="btn btn-primary btn-block btn-flat" name="login">
									<!-- <a class="btn btn-primary btn-block"  type="submit">LOGIN</a> -->
                  <br>
                  <p style="padding: 0 10px;">Don't have an account? <a href="signup.php">Signup Here</a></p>

								</form>
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