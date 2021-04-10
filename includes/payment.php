<?php
session_start();
include_once('run.php');
//error_reporting(0);
$sql5="SELECT * FROM booking WHERE id=(SELECT MAX(id)FROM booking WHERE user_id=$id)";
$query5=mysqli_query($con,$sql5);
if($query5==true){
  while($info5=mysqli_fetch_array($query5)){
    $house_id=$info5['house_id'];
  }
}
?>

<div class="modal fade" id="payment">
  <div class="modal-dialog" role="document">
    <div class="modal-content col-md-12">
      <div><h4 class='alert alert-danger'>You have to pay minimum 20% of rent. <br> Our bkash/Rocket/Nagad Agent Number: 01300868683</h4></div>
      <div class="modal-header">
        
      <h3 class="modal-title">Payment Process</h3>
     
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style='font-size:25px' aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" name="signup" action='includes/payment_core.php'>
              <div class="form-group">
                  <select  style='padding:6px' name='method'>
                    <option value="">choose</option>
                    <option value="bkash">bkash<br>Agent Number : 01300868683</option>
                    <option value="Rocket">Rocket Agent Number : 01300868683</option>
                    <option value="Mkash">Nagad Agent Number : 01300868683</option>
                  </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="name"; placeholder="Full Name" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="phone" placeholder="Phone Number" required="required">
                </div>
                <input type="hidden"  name="hidden" value='<?=$house_id?>'>     
                <div class="form-group">
                  <input type="text" class="form-control" name="amount" id="text"placeholder="Amount" required="required">
                   
                </div>
                      
                <div class="form-group">
                  <input type="text" class="form-control" name="trx_id" id="text"placeholder="Transaction Id" required="required">
                   
                </div>
                
                <div class="form-group">
                  <input style='font-size:18px'   type="submit" value="Submit" name="signup"  class="btn btn-primary btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      
 
    </div>
  </div>
</div>