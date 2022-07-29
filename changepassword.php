<?php
    ob_start();
    include("header.php");
    if(!isset($_SESSION['uname']))
    {
        
        echo "<script>window.location.href='Login.php';</script>";
    }

?>
<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 50%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Change Password</h1>
                  <hr>
              </div>-->
   <br>      <br>    <br>    <br>      <br>    <br>   
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Change Password</h4>
                             </div>
                        </div><hr>
                            <form method="POST">
                                <div class="form-row">
                                    
                                    <label for="inputPassword4" >Old Password</label><!--style="margin-left:90%; text-align:center;" -->
                                    <input type="password" name="oldpass" class="form-control" id="inputPassword4" placeholder="Old Password" pattern="^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$" title="Password between 8 to 20 characters and contains atleast one digit, upercase, lowercase and special character" required><!--style="margin-left: 20px;width:400px;"-->
                                    <span style="color:red; margin:0px;"><?php //echo $oldpassErr; ?></span>
                                    
                                </div> 
<br>
                                <div class="form-row">
                                    
                                    <label for="inputPassword4">New Password</label>
                                    <input type="password" name="newpass" class="form-control" id="inputPassword4" placeholder="New Password" pattern="^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$" title="Password between 8 to 20 characters and contains atleast one digit, upercase, lowercase and special character" required>
                                    <span style="color:red; margin:0px;"><?php //echo $newpassErr; ?></span>
                                    
                                </div>
                                <br>
                                <div class="form-row">
                                    
                                    <label for="inputPassword4">Confirm Password</label>
                                    <input type="password" name="cpass" class="form-control" id="inputPassword4" placeholder="Confirm Password" pattern="^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$" title="Password between 8 to 20 characters and contains atleast one digit, upercase, lowercase and special character" required>
                                   
                                    
                                </div>

                                <br>
                                <button type="submit" name="Change" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
    </div>
</div>

<br><br>
<?php include("footer.php");?>
</body>
</html>

    <?php
    
    $newpass=$_POST['newpass'];
    $cpass=$_POST['cpass'];
		include("db.php");

        if(isset($_POST['Change']))
        {
            
            $verify ="select * from tbl_registration where email_id='".$_SESSION['uname']."' and password='".$_POST['oldpass']."'";
            if($result = mysqli_query($con,$verify))
            {
                if(mysqli_num_rows($result)>0)
                {
                    if($newpass == $cpass)
                    {
                            $update = "update tbl_registration set password='".$_POST['cpass']."' where email_id='".$_SESSION['uname']."' and password='".$_POST['oldpass']."'";
                            if(mysqli_query($con,$update))
                            {
                                    echo '<script>
                                    swal({
                                    title: "Password changed Successfully..",                              
                                    icon: "success",
                                });
                                </script>';
                            // echo "password change";
                            }
                            else{
                                echo '<script>
                                swal({
                                title: "Oops! Password is not changed!!",                              
                                icon: "error",
                            });
                            </script>';
                            }
                    }
                    else{
                        echo '<script>
                        swal({
                        title: "Oops! Password is not match!!",                              
                        icon: "error",
                    });
                    </script>';
                    }
            
                    //header("location:admin.php");
    
            }
            else
            {
                echo '<script>
                            swal({
                            title: "Oops! All field are Mandatory. Please try again.",                              
                            icon: "error",
                          });
                          </script>';
                // echo "Password is not matched..";
            }
        }
    }
    ob_end_flush();
    ?>
