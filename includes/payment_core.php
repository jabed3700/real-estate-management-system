<?php 
session_start();
include_once('run.php');
$user_id= $_SESSION["user"]->id;
$user_name=$_SESSION["user"]->FullName;

if(isset($_POST['signup']))
{
$name=$_POST['name'];
$hidden=$_POST['hidden'];
$phone=$_POST['phone'];
$method=$_POST['method']; 
$amount=$_POST['amount'];
$trx_id=$_POST['trx_id'];

$sql="INSERT INTO  payment (method,name,phone,amount,trx_id,house_id,user_id,user_name) VALUES('$method','$name','$phone','$amount','$trx_id','$hidden','$user_id','$user_name')";
mysqli_query($con, $sql);

$sql7="UPDATE booking SET booking_money=1 WHERE house_id=$hidden AND user_id=$user_id";
mysqli_query($con,$sql7);


?>
<script>
alert('Your booking will be confirm after payment verification!')
window.location.href="../mybooking.php";
</script>

<?php
}

?>