<?php
//error_reporting(0);
if(isset($_POST['signup']))
{
$fname=$_POST['fullname'];
$phone=$_POST['phone'];
$email=$_POST['emailid']; 
$purpose=$_POST['purpose'];
$property=$_POST['property'];
$area=$_POST['area'];
$city=$_POST['city']; 
$sql="INSERT INTO  guest_user(name,phone,email,purpose,type,area,city) VALUES(:fname,:phone,:email,:purpose,:property,:area,:city)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':purpose',$purpose,PDO::PARAM_STR);
$query->bindParam(':property',$property,PDO::PARAM_STR);
$query->bindParam(':area',$area,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->execute();
?>
<script>
alert('Data inserted successfully!')
window.location.href="index.php";
</script>
<?php
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
<div class="modal fade" id="signupform1">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-12">
      <div class="modal-header">
      <h3 class="modal-title">List Your Property With HUB</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style='font-size:25px' aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="POST" name="signup" action='includes/guest_core.php'>
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="required">
                </div>
                      
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <select name="purpose" class='form-control'>
                    <option value="">Purpose</option>
                    <option value="Rent">Rent</option>
                    <option value="Sale">Sale</option>
                  </select>
                </div>
                <div class="form-group">
                  <select name="property" class='form-control'>
                    <option value="">Property Type</option>
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Bechelor hostel">Bechelor hostel</option>
                    <option value="Female hostel">Female hostel</option>
                    <option value="Sublet">Sublet</option>
                    
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="area" placeholder="Area"  required="required">
                </div>
			        	<div class="form-group">
                  <input type="text" class="form-control" name="city" placeholder="City"  required="required">
                </div>
                <div class="form-group">
                  <input style='font-size:18px' type="submit" value="Submit" name="signup" id="submit" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
 
    </div>
  </div>
</div>