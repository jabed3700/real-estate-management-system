<?php
session_start();
//error_reporting(0);
include('includes/config.php');
// if(strlen($_SESSION['alogin'])==0)
// 	{	
// header('location:index.php');
// }
// else{ 
// 	if(isset($_POST['submit']))
//   {
// try{

	if(!isset($_SESSION["owner"])){
		header("location:../");
	  }
 
$housestitle=$_POST['housestitle'];
$housecategory=$_POST['categoryname'];
$de=$_POST['description'];
$pricepermonth=$_POST['pricepermonth'];
$lo=$_POST['location'];
$area=$_POST['area'];
$contact=$_POST['contact'];
$bookingdate=$_POST['bookingdate'];
$himage1=$_FILES["img1"]["name"];
$himage2=$_FILES["img2"]["name"];
$himage3=$_FILES["img3"]["name"];
$himage4=$_FILES["img4"]["name"];  
$bed=$_POST['bed'];
$bath=$_POST['bath'];
$size=$_POST['size'];
$hidden=$_POST['owner_id'];
$lon=$_POST['lon'];
$lat=$_POST['lat'];

move_uploaded_file($_FILES["img1"]["tmp_name"],"../admin/img/housesimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"../admin/img/housesimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"../admin/img/housesimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"../admin/img/housesimages/".$_FILES["img4"]["name"]);

$sql="INSERT INTO tblhouses(houseowner_id,HousesTitle,dds,Himage1,Himage2,Himage3,Himage4,Bed,Bath,size,loc,area,lon,lat,HouseCategory,PricePerMonth,PostingDate,contact) VALUES(:hidden,:housestitle,:de,:himage1,:himage2,:himage3,:himage4,:bed,:bath,:size,:lo,:area,:lon,:lat,:housecategory,:pricepermonth,:bookingdate,:contact)";

$query = $dbh->prepare($sql);
$query->bindParam(':hidden',$hidden,PDO::PARAM_STR);
$query->bindParam(':housestitle',$housestitle,PDO::PARAM_STR);
$query->bindParam(':de',$de,PDO::PARAM_STR);
$query->bindParam(':himage1',$himage1,PDO::PARAM_STR);
$query->bindParam(':himage2',$himage2,PDO::PARAM_STR);
$query->bindParam(':himage3',$himage3,PDO::PARAM_STR);
$query->bindParam(':himage4',$himage4,PDO::PARAM_STR);
$query->bindParam(':bed',$bed,PDO::PARAM_STR);
$query->bindParam(':contact',$contact,PDO::PARAM_STR);
$query->bindParam(':bath',$bath,PDO::PARAM_STR);
$query->bindParam(':size',$size,PDO::PARAM_STR);
$query->bindParam(':lo',$lo,PDO::PARAM_STR);
$query->bindParam(':area',$area,PDO::PARAM_STR);
$query->bindParam(':lon',$lon,PDO::PARAM_STR);
$query->bindParam(':lat',$lat,PDO::PARAM_STR);
$query->bindParam(':housecategory',$housecategory,PDO::PARAM_STR);
$query->bindParam(':pricepermonth',$pricepermonth,PDO::PARAM_STR);
$query->bindParam(':bookingdate',$bookingdate,PDO::PARAM_STR);


$query->execute();


?>
<script>
alert('Post submitted. Now waiting for admin approval.')
window.location.href="post-ahouse.php";
</script>