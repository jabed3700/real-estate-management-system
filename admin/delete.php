<?php
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
$id=$_GET["id"];
$sql="DELETE FROM tblhouses where id=".$id;
mysqli_query($con,$sql);
header("location:reg-post.php");
?>