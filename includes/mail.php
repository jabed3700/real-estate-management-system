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
<div class="modal fade" id="mail">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-12">
      <div class="modal-header">
      <h3 class="modal-title">Contact Us</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style='font-size:25px' aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Name" required="required">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="text"placeholder="Email" required="required">
                   
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="phone" placeholder="Phone" required="required">
                </div>
                      
                
                      
                <div class="form-group">
                  <textarea name="" id=""   class='form-control'>message</textarea>
                   
                </div>
                
                <div class="form-group">
                  <input  style='font-size:18px' type="submit" value="Send-mail" name="signup" id="submit" class="btn  btn-primary btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
 
    </div>
  </div>
</div>