<?php
// session_start();


// server info
$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);
// show errors 
mysqli_report(MYSQLI_REPORT_ERROR);	

 $email = $_REQUEST['email'];
 $password = $_REQUEST['password'];


$userinfo = mysqli_query($con,"SELECT * FROM houseowner WHERE Emailid='$email' AND Password='$password'");

$num_rows= mysqli_num_rows($userinfo);

if($num_rows == 1){
	header('location: ../houseowner/change-password.php');
}else{
	header('location: login.php');
}
//  echo $hiddeninfo = $_REQUEST['hidden']; 

// 	if($hiddeninfo == 'admin'){
	
// 		$userinfo = mysqli_query($con,"SELECT id,username FROM admin WHERE username='$username' AND password='$password'");

// 		$num_rows= mysqli_num_rows($userinfo);

// 			if($num_rows == 1){
// 				while($user=mysqli_fetch_array($userinfo)){
// 					$_SESSION["admin"]=$user;
// 				}
// 			header('location: ../admin/adddoctor.php');
				
// 			}else{
// 				header('location: login.php?type=admin');
// 			}
// 	}
?>