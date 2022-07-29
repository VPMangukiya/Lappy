<?php ob_start();
include("header.php"); ?>
<!--<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 40%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Verify Otp</h1>
                  <hr>
              </div>-->
              <br><br><br>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Verify Otp</h4>
                             </div>
                        </div><hr>
                      <form method="POST">              
                        <div class="form-row">
                          
                            <label for="inputEmail4">Enter OTP</label><!--  style="margin-left:90%; text-align:center;" -->
                            <input type="text" name="otp" class="form-control" id="inputEmail4" placeholder="Enter OTP" required><!--style="margin-left: 20px;width:400px;" -->
                            
                        </div> 
                        <div class="form-row">
                          
                            <label for="inputPassword4">New Password</label><!--  style="margin-left:90%; text-align:center;" -->
                            <input type="password" name="pwd" class="form-control" id="inputPassword4" placeholder="Enter New Password" pattern="^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$" title="Password between 8 to 20 characters and contains atleast one digit, upercase, lowercase and special character" required><!--style="margin-left: 20px;width:400px;" -->
                            
                        </div>
                        <br>
                        <button type="submit" name="change" class="btn btn-primary">Change</button>

                      </form>
              </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include("footer.php");?>



<?php
include("db.php");
if(isset($_POST['change']))
  {
  $votp =  $_SESSION['votp'];
  $otp = $_POST['otp'];
  
    if($votp == $otp)
    {
      $cp = "update tbl_registration set password='".$_POST['pwd']."' where email_id='".$_SESSION['femail']."'";
      mysqli_query($con,$cp);
      header("location:Login.php");
    }
    else{
      echo '<script>alert("Invalid OTP")</script>';
    }
  }

  ob_end_flush();
  ?>

