<?php
if(isset($_POST['login']))
{
  
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT id,EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
  foreach($results as $result)
  {  
    
      $_SESSION["user"]=$result;

  }
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script>alert('Login successful!')</script>";
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";

} else{
  
  echo "<script>alert('Invalid Details');</script>";

}
?>
<script>
</script>
<?php

}

?>

<div class="modal fade" id="loginform" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="modal-title">Login</h3>
        <button type="button" class="close" style="font-size:25px" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12 col-sm-6">
              <form method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email address*">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password*">
                </div>
                <div class="form-group">
                  <input type="submit" style="font-size:18px" name="login" value="Login" class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
        </div>
      </div>
      <div class="">
        <p style="padding: 0 10px;">Don't have an account? <a href="#signupform" data-toggle="modal" data-dismiss="modal">Signup Here</a></p>
      </div>
    </div>
  </div>
</div>