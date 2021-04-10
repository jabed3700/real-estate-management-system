<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
$id=$_GET["id"];
$sql="DELETE FROM booking where id=".$id;
mysqli_query($con,$sql);
header("location:approve-book.php");
?>