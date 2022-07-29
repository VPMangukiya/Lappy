<?php session_start();
include("header.php"); ?>
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 40%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Verify Otp</h1>
                  <hr>
              </div>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4" style="margin-left:90%; text-align:center;">Enter OTP</label>
                  <input type="text" name="otp" class="form-control" id="inputEmail4" placeholder="Enter OTP" style="margin-left: 20px;width:400px;">
                  
                </div>  
            </div> 

            <button type="submit" name="change" class="btn btn-primary">Change</button>
        
            </div>
    </div>
</form>
<br><br>
<?php include("footer.php");?>



<?php
include("db.php");
if(isset($_POST['change']))
  {
  $votp =  $_SESSION['votp'];
  $otp = $_POST['otp'];
  $verify=1;
    if($votp == $otp)
    {
      $cp = "update tbl_registration set verifyemail='".$verify."' where email_id='".$_SESSION['femail']."'";
      mysqli_query($con,$cp);
      echo '<script>
      swal({
        title: "Email id Verified successfully!",                              
        icon: "success",
      }).then(function(){
          window.location="Login.php";
      });
      </script>';
      //header("location:Login.php");
    }
    else{
      echo '<script>alert("Invalid OTP")</script>';
    }
  }
  ?>
</body>
</html
