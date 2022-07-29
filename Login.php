<?php ob_start();


include("header.php");
    if(isset($_SESSION['uname']))
    {
        echo '<script>
					swal({
					title: "Do not Access this Page!!",                              
					icon: "error",
				  });
				  </script>';

        echo "<script>window.location.href='index.php';</script>";
    }
    if(isset($_SESSION['aname']))
    {
        echo "<script>window.location.href='demo.php';</script>";   
    }

?>
  <?php
   // The preg_match() function searches a string for pattern, returning
    //   true if the pattern exists, and false otherwise.
                
        $pwdErr = $emailErr = "";
        $password = $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          if (empty($_POST["pwd"])) {
                $pwdErr = "password is required";
            } else {
               // $password = test_input($_POST["pwd"]);
                $pattern = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
                // check if name only contains letters and whitespace
                if(!preg_match($pattern, $_POST["pwd"])) {
                    $pwdErr = "";
                }
            }

            if (empty($_POST["uname"])) {
                $emailErr = "Email is required";
            }
            else 
            {
                $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^/";
                if (!preg_match($pattern, $_POST['uname'])) 
                {
                    $emailErr = "Invlid Email";
                   // echo "<script> alert('Enter proper Email')</script>";
                }
            }


        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

    <br>
    <br>
<br>
<br><br>
 <!--<form method="POST">
  <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 40%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Login</h1>
              </div> <hr>-->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Login..</h4>
                             </div>
                        </div><hr>
        <form method="POST">
            <div class="form-row">
                
                  <label for="inputEmail4"  class="form-label">Email</label><!-- style="margin-left:90%; text-align:center;" -->
                  <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Enter Email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Enter Valid Email" required>
                  <!-- style="margin-left: 20px;border-radius: 10px;width:400px;"-->
                  <!-- <span style="color:red; margin:0px;"><?php //echo $emailErr; ?></span>-->
                 
            </div> 
            <div class="form-row">
                
                  <label for="inputPassword4">Password</label><!-- style="margin-left:90%; text-align:center;" -->
                  <input type="password" name="pwd" class="form-control" id="inputPassword4" pattern="^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$" placeholder="Enter Password" required>  <!-- style="margin-left: 20px;border-radius: 10px;width:400px;"-->
                  <span style="color:red; margin:0px;"><?php //echo $pwdErr; ?></span>
               
            </div>

            <br>
            <div class="form-row">
              
                    <a href="forgot.php" >Forgot password?</a><!--  style="margin-left:20px" -->
                       
            </div>
            <div class="form-row">
                
                <a href="registration.php">Create New Account?</a> <!--  style="margin-left:20px" -->
                        
            </div>

            <br>

            <button type="submit" name="login" class="btn btn-primary">Sign In</button>
         

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
		if(isset($_POST['login']))
        {
            $verify ="select * from tbl_admin_login where email ='".$_POST['email']."' and password = '".$_POST['pwd']."'";
           /* $verifyuser ="select * from tbl_registration where email_id ='".$_POST['email']."' and password = '".$_POST['pwd']."'";*/
           $verifyuser ="select * from tbl_registration where email_id ='".$_POST['email']."' and password = '".$_POST['pwd']."'";
            
		// if($nameErr == " " && $emailErr ==" ")
        // {
            if($result = mysqli_query($con,$verify))
            {
                
			    if(mysqli_num_rows($result)>0)
                {
                    $_SESSION['aname']=$_POST['email'];
                    header("location:demo.php");

                }
                else if($result1 = mysqli_query($con,$verifyuser))
                {			
                    if(mysqli_num_rows($result1)>0)
                    {
                        $_SESSION['uname']=$_POST['email'];
                        header("location:index.php");
                    }
                  
                    else{
                        echo '<script>
                        swal({
                        title: "oops! username and password incorrect. please try again!!! ",                              
                        icon: "error",
                      });
                      </script>';                        
                      // echo '<script> alert("Username and password incorrect")</script>';
                    }
                }
		    }
        }
        ob_end_flush();
	?>