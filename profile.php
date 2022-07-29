<?php
ob_start();
include("header.php");
if(!isset($_SESSION['uname']))
{
    header("location:Login.php");
}

?>

    <?php
   // The preg_match() function searches a string for pattern, returning
    //   true if the pattern exists, and false otherwise.

    $fnameErr=$lnameErr=$conErr=$emailErr=$pwdErr=$addressErr=$cityErr=" ";
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {

            if (empty($_POST["fname"])) {
                $fnameErr = "First Name is required";
            } else {
                $fname = test_input($_POST["fname"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z]*$/", $fname)) {
                    $fnameErr = "Only alphabet";
                }
            }          
            
            if (empty($_POST["lname"])) {
              $lnameErr = "Last Name is required";
          
            } 
            else {
              $lname = test_input($_POST["lname"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z]*$/", $lname)) {
                  $lnameErr = "Only alphabet";
              }
            }

                 if (empty($_POST['email']))
                  {
                        $emailErr ="Email is required";
                  } 
                    else 
                    {
                        $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
                        if (!preg_match($pattern, $_POST['email'])) 
                        {
                            $emailErr = "Invalid Email";
                        }
                    }

                 if (empty($_POST['phone']))
                  {
                      $conErr = "Contact number is required";
                  }
                  else
                  {
                  $pattern = "/^[6-9]{1}[0-9]{9}$/";
                    if (!preg_match($pattern, $_POST['phone'])) 
                    {
                      $conErr = "Invalid contact number";
                    }
            
                  }

                  /*if (empty($_POST['pass']))
                  {
                      $pwdErr = "Password is required";
                  }
                  else
                  {
                  $pattern = "/^.{8,}$^/";
                    if (!preg_match($pattern, $_POST['pass'])) 
                    {
                        $pwdErr = "Password at least more thn 8 char";
                    }
                  } */
                  if (empty($_POST["address"])) {
                    $addressErr = "Address name is required";
                }

            if (empty($_POST["city"])) {
                $cityErr = "city name is required";
            } else {
                $city = test_input($_POST["city"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["city"])) {
                    $cityErr = "Only alphabet";
                }
            }

            if (empty($_POST["state"])) {
                $stateErr = "State name is required";
            } else {
                $state = test_input($_POST["state"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z ]*$/", $_POST["state"])) {
                    $stateErr = "Only alphabet";
                }
            }
            if(empty($_POST["pin"])){
                $pinErr = "Pincode is required";
            }
            else{
                $pin = test_input($_POST["pin"]);
                if(!preg_match("/^[0-9]{6}$/", $_POST["pin"])) //    
                {
                    $pinErr = "Pincode must 6 digit";
                }

            }

        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        include ("db.php");
        $fname=$state=$email=$address=$city=$pincode="";
        $contact=$id=0;
        
        $getdata="select * from tbl_registration where email_id='".$_SESSION['uname']."'";
        if($result = mysqli_query($con,$getdata))
            {
                if(mysqli_num_rows($result)>0)
                {
                    while($row=mysqli_fetch_array($result))
                    {
                        $id=$row['user_id'];
                        $fname=$row['name'];
                        $contact=$row['contact_no'];
                        $email=$row['email_id'];
                        $address=$row['address']; 
                        $city=$row['city'];
                        $state=$row['state'];
                        $pincode=$row['pincode'];
 
                    }
                }
            }
        ?>
<!--
<form method="POST" action="#">
    <div class="container">
      <br><br><br>
        <div class="box" style="margin-bottom: 0px;">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Profile</h1>
                  <hr>
              </div>
-->
<br><br>   <br><br> <br><br> <br><br>    
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                                <h4> Profile</h4>
                        </div>
                    </div><hr>
                    <form method="POST" action="#">   
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputName4">Full Name</label>
                              <input type="text" name="fname" class="form-control" id="inputName4" pattern="^[a-zA-Z]*$" title="Enter Letters Only" required value="<?php echo $fname; ?>">
                            </div>

                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Email</label>
                              <input type="text" name="email" class="form-control" id="inputEmail4" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Enter valid email ID" required value="<?php echo $email; ?>">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputContact4">Contact No.</label>
                              <input type="text" name="phone" class="form-control" id="inputContact4" pattern="^[6-9]{1}[0-9]{9}$" title="Enter valid Mobile No" required value="<?php echo $contact; ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputAddress">Address</label>
                              <input type="text" name="address" class="form-control" id="inputAddress" required value="<?php echo $address; ?>">
                            </div>


                          </div> 
<!--
                          <div class="form-row" style="-ms-transform-origin-y: -15px;" >
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $nameErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $conErr; ?></span>
                            </div>
                          </div> 
-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">City</label>
                              <input type="text" name="city" class="form-control" id="inputCity" pattern="^[a-zA-Z]*$" title="Enter Letters Only" required value="<?php echo $city; ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputContact4">State</label>
                              <input type="text" name="state" class="form-control" id="inputContact4" pattern="^[a-zA-Z]*$" title="Enter Letters Only" required value="<?php echo $state; ?>">
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Pincode</label>
                              <input type="text" name="pincode" class="form-control" id="inputCity" pattern="^[0-9]\d{5}$" title="Enter 6 Digits Only" required value="<?php echo $pincode; ?>">
                            </div>
                          </div>


                            <!--<div class="form-group col-md-6">
                              <label for="inputPassword4">Password</label>
                              <input type="password" name="pass" class="form-control" id="inputPassword4"  value="<?php echo $password; ?>">
                            </div>-->
                          
<!--
                          <div class="form-row" style="padding-top: px;">
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $emailErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $addressErr; ?></span>
                            </div>
-->
                            <!--<div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $pwdErr; ?></span>
                            </div>-->
                         

<!--
                          <div class="form-row" style="padding-top: px;">
                          

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $cityErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php echo $stateErr; ?></span>
                            </div>
-->

                      

                          <div class="form-row">
                            <div class="form-group col-md-6">
                                <a href="changepassword.php" style="margin-left:20px">Change Password?</a>
                            </div>  
                          </div>        

                      <button type="submit" name="update" class="btn btn-primary">Update</button>
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
   //echo $id;
		include("db.php");
        if(isset($_POST['update']))
        { 


               $update = "update tbl_registration set name='".$_POST['fname']."' , contact_no='".$_POST['phone']."', email_id='".$_POST['email']."',address='".$_POST['address']."',city='".$_POST['city']."',state='".$_POST['state']."',pincode='".$_POST['pincode']."' where user_id='$id' ";
               if(mysqli_query($con,$update))
               {
                echo '<script>
                swal({
                title: "Profile Updated Successfully..",                              
                icon: "success",
              }).then(function(){
                window.location="profile.php";
            });
              </script>';
                   //echo '<script> alert("Profile update successfully.")</script>';
               }
               else{
                echo '<script>
                  swal({
                  title: "Profile not updated!!",                              
                  icon: "error",
                  });
                  </script>';
                   //echo '<script> alert("Profile not updated..")</script>';
               }

        } 

        
        if(isset($_POST['delete']))
        {
            $del = "delete from tbl_registration where user_id='$id'";
           if(mysqli_query($con,$del))
           {
            session_unset();
            session_destroy();
            header("location:index.php");
           }
        }
        ob_end_flush();
   ?>

