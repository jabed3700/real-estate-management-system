<?php
session_start();
include('includes/config.php');

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
	
	<title></title>

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
	<script type="text/javascript"
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCi82DDWkY-_hwoBcUp84sIcnP8pUx8lLc&callback=initMap"></script>
  <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
  <style type="text/css">
    #map {
      width: 100%;
      height: 400px;
    }
  </style>
<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

/* Set the size of the div element that contains the map */
#map {
        height: 500px;  /* The height is 400 pixels */
        width: 100%;  /* The width is the width of the web page */
       }
		</style>
		

</head>

<body>
	<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Post A Houses</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>


									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data" action="houseData.php">
<div class="form-group">
<label class="col-sm-2 control-label">Houses Title<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="housestitle" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Category<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="categoryname" required>
<option value=""> Select </option>
<?php $ret="select id,CategoryName from tblcategory";
$query= $dbh -> prepare($ret);
// $query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->CategoryName);?></option>
<?php }} ?>

</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Bed<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="bed" class="form-control" required>
<input type="hidden" name="owner_id" class="form-control" value="1">
<input type="hidden" name="approve" class="form-control" value="1">
</div>
<label class="col-sm-2 control-label">Bath<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="bath" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Month<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="pricepermonth" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Srft<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="size" class="form-control" required>
</div>

</div>


<div class="form-group">

<label class="col-sm-2 control-label">Select Location<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="location" required>
<option value=""> Select </option>
<option value="Dhaka">Dhaka</option>
<option value="Chittagong">Chittagong</option>
<option value="Rajshahi">Rajshahi</option>
<option value="Khulna">Khulna</option>
<option value="Barishal">Barishal</option>
<option value="Shylet">Shylet</option>
<option value="Jessor">Jessor</option>
</select>
</div>
<label class="col-sm-2 control-label">Select Area<span style="color:red">*</span></label>
<div class="col-sm-4">
<select class="selectpicker" name="area" required>
<option value=""> Select </option>
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
<option value="Savar">Savar</option>
<option value="Uttara">Uttara</option>
<option value="Dhanmondi">Dhanmondi</option>
<option value="Jatrabari">Jatrabari</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Posting Date<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="date" name="bookingdate" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Contact<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="contact" class="form-control" required>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Description<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="description" rows="3" required></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Select your location<span style="color:red">*</span></label>
<label style="float: right;cursor:pointer;background:#1ceae1;margin-right:5px;padding:8px;color: #1d1515;"><span id="confirmPosition">Confirm Position</span></label>
<div id="map"></div>
<br>

<br>
<p style="display: none"><span id="onIdlePositionView"></span></p>
<p style="display: none"><span id="onClickPositionView"></span></p>
<input type="hidden" id="ddd" name="lon" required>
<input type="hidden" id="fff" name="lat" required>
<br>

<script>
  // Get element references
  var confirmBtnId = document.getElementById('ddd');
  var confirmBtnlat = document.getElementById('fff');
  var confirmBtn = document.getElementById('confirmPosition');
  var onClickPositionView = document.getElementById('onClickPositionView');
  var onIdlePositionView = document.getElementById('onIdlePositionView');
  var map = document.getElementById('map');

  // Initialize LocationPicker plugin
  var lp = new locationPicker(map, {
    setCurrentPosition: true, // You can omit this, defaults to true
    lat: 23.725454268270603,
    lng: 90.42506164270661
  }, {
    zoom: 15 // You can set any google map options here, zoom defaults to 15
  });

  // Listen to button onclick event
  confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    onClickPositionView.innerHTML = 'The chosen location is ' + window.latt + ',' + location.lng;
  };

  // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
  google.maps.event.addListener(lp.map, 'idle', function (event) {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    onIdlePositionView.innerHTML = 'The chosen location is ' + location.lat + ',' + location.lng;
    window.latt=location.lat;
    window.lngg=location.lng;
    
  });
  confirmBtn.onclick = function () {
    // Get current location and show it in HTML
    var location = lp.getMarkerPosition();
    confirmBtnId.value = window.latt; 
    confirmBtnlat.value = window.lngg;
  };
 
  
</script>

</div>

<div class="hr-dashed"></div>
<div class="form-group" style="margin-top:-80px">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-6">
Image 1 <span style="color:red">*</span><input type="file" name="img1" required>
</div>
<div class="col-sm-6">
Image 2<span style="color:red">*</span><input type="file" name="img2" required>
</div>
</div>
<div class="form-group">
<div class="col-sm-6">
Image 3 <span style="color:red">*</span><input type="file" name="img3" required>
</div>
<div class="col-sm-6">
Image 4<span style="color:red">*</span><input type="file" name="img4" required>
</div>
</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
	<div class="form-group">
		<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
	</div>
	</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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
  <script>
$(document).ready(function(){
  $("#confirmPosition").click(function(){
    $(this).text("Confirmed");
  });
});


</script>
</body>
</html>
