<?php
session_start();
include_once('includes/login.php');

    
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);	
$id=$_GET["id"];
$user=$_SESSION["user"]->id;
$sql="select * from booking where user_id=$user and house_id=$id";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)>0){
    header("location:index.php?message=Already applied");
}
else{
    $sql="INSERT INTO booking(house_id,user_id) VALUES($id,$user)";
mysqli_query($con,$sql);
header("location:index.php?message=You have to pay security deposit to confirm your booking!");

}




?>