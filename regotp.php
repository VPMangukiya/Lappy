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
                            <input type="text" name="otp" class="form-control" id="inputEmail4" placeholder="Enter OTP " ><!--style="margin-left: 20px;width:400px;" -->
                            
                        </div> 
                    
                        <br>
                        <button type="submit" name="change" class="btn btn-primary">Verify</button>

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

  $fn=$_SESSION['fn'];
  
  $mail=$_SESSION['email'];
  $mno=$_SESSION['mno'];
  $pass=$_SESSION['pwd'];
  $cpass=$_SESSION['cpwd'];
  $add=$_SESSION['add'];
  $ci=$_SESSION['ci'];
  $sta=$_SESSION['state'];
  $pin=$_SESSION['pincode'];

  $status=1;
    if($votp == $otp)
    {
      $cp = "INSERT INTO tbl_registration (user_id, name, contact_no, email_id, password, address, city,state,pincode,status) VALUES ('NULL', '$fn', '$mno', '$mail', '$cpass', '$add', '$ci', '$sta', '$pin', '$status')";

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
      echo '<script>
      swal({
      title: "Invalid OTP!",                              
      icon: "error",
  });
  </script>';
    }
  }

  ob_end_flush();
  ?>

