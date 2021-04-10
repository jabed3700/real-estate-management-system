<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$email=$_POST['emailid']; 
$password=md5($_POST['password']);
$address=$_POST['address'];
$contactno=$_POST['contactno']; 
$sql="INSERT INTO  tblusers(FullName,Emailid,Password,Address,ContactNo) VALUES(:fname,:email,:password,:address,:contactno)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->execute();


$currentpage=$_SERVER['REQUEST_URI'];
echo "<script>alert('Registration completed. Now you can log-in.')</script>";
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
}

?>


<!-- <script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script> -->
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-12">
      <div class="modal-header">
      <h3 class="modal-title">Sign Up</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style='font-size:25px' aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                      
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>
			        	<div class="form-group">
                  <input type="text" class="form-control" name="address" placeholder="Address" maxlength="10" required="required">
                </div>
			        	<div class="form-group">
                  <input type="text" class="form-control" name="contactno" placeholder="Contact No" maxlength="11" required="required">
                </div>
                
                <div class="form-group">
                  <input style='font-size:18px' type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class=" text-center">
       
        <p style="padding: 0 10px;">Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>