<?php
session_start();
include('includes/config.php');

 $getId=$_SESSION["owner"]['id'];

if(!isset($_SESSION["owner"])){
  header("location:../");
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
	<meta name="theme-color" content="#3e454c">
	
	<title> </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
	
  
</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
            <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>HousesTitle</th>
                        <th>Bed</th>
                        <th>Bath</th>
                        <th>Size</th>
                        <th>Location</th>
                        <th>Area</th>
                        <th>Booking_date</th>
                        <th>Approve_date</th>
                    </tr>
				</thead>
                <tbody>

                <?php $sql = "SELECT * FROM tblhouses as h INNER JOIN booking as b ON h.id=b.house_id WHERE h.houseowner_id=$getId AND b.approve=1";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    { ?>	
                    <tr>
                        <td><?php echo htmlentities($cnt);?></td>
                        <td><?php echo htmlentities($result->HousesTitle);?></td>
                        <td><?php echo htmlentities($result->Bed);?></td>
                        <td><?php echo htmlentities($result->Bath);?></td>
                        <td><?php echo htmlentities($result->size);?></td>
                        <td><?php echo htmlentities($result->loc);?></td>
                        <td><?php echo htmlentities($result->area);?></td>
                        <td><?php echo htmlentities($result->booking_date);?></td>
                        <td><?php echo htmlentities($result->approve_date);?></td>
                    </tr>
                    <?php $cnt=$cnt+1; }} ?>
                    
                </tbody>
            </table>
            </div>
        </div>

	

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
  <script src="js/main.js"></script>

</body>
</html>
