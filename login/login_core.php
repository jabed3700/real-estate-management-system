<?php
session_start();

$server = 'localhost';
$user = 'root';
$pass = '';
$db = 'hubrealestate';
$con = new mysqli($server, $user, $pass, $db);


 $email = $_REQUEST['email'];
 $password = md5($_REQUEST['password']);
  $hiddeninfo = $_REQUEST['hidden']; 

	if($hiddeninfo == 'owner'){
	
		$userinfo = mysqli_query($con,"SELECT * FROM houseowner WHERE Emailid='$email' AND Password='$password'");

		$num_rows= mysqli_num_rows($userinfo);

			if($num_rows == 1){
				while($user=mysqli_fetch_array($userinfo)){
					$_SESSION["owner"]=$user;
				} ?>
<script>
alert('Login successful!')
window.location.href="../houseowner/post-ahouse.php";
</script>
		<?php 
				
			}else{ ?>
				<script>
alert('Invalid Data')
window.location.href="login.php?type=owner";
</script> <?php
			}
	}