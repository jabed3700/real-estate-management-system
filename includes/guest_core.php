<?php 
session_start();
include_once('run.php');
$user_id= $_SESSION["user"]->id;
$user_name=$_SESSION["user"]->FullName;

if(isset($_POST['signup']))
{
    $fname=$_POST['fullname'];
    $phone=$_POST['phone'];
    $email=$_POST['emailid']; 
    $purpose=$_POST['purpose'];
    $property=$_POST['property'];
    $area=$_POST['area'];
    $city=$_POST['city']; 
    

$sql="INSERT INTO  guest_user(name,phone,email,purpose,type,area,city) VALUES('$fname','$phone','$email','$purpose','$property','$area','$city')";
mysqli_query($con, $sql);

?>
<script>
alert('Data inserted successfully!')
window.location.href="../index.php";
</script>

<?php
}

?>