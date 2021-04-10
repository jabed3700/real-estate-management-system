<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
$id=$_GET["id"];
$sql="update booking set approve=1,booking_money=2,approve_date=sysdate()  where id=".$id;
mysqli_query($con,$sql);
header("location:approve-book.php");
?>