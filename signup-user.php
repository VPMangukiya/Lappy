<?php 
ob_start();

include("db.php");
include("header.php");

include("controluserdata.php"); ?>
<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
html,body{
    /*background: #6665ee;*/
    font-family: 'Poppins', sans-serif;
}
::selection{
    color: #fff;
    background: #6665ee;
}
.container{
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.container .form{
    background: #fff;
    padding: 30px 35px;
    border-radius: 5px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.container .form form .form-control{
    height: 40px;
    font-size: 15px;
}
.container .form form .forget-pass{
    margin: -15px 0 15px 0;
}
.container .form form .forget-pass a{
   font-size: 15px;
}
.container .form form .button{
    background: #6665ee;
    color: #fff;
    font-size: 17px;
    font-weight: 500;
    transition: all 0.3s ease;
}
.container .form form .button:hover{
    background: #5757d1;
}
.container .form form .link{
    padding: 5px 0;
}
.container .form form .link a{
    color: #6665ee;
}
.container .login-form form p{
    font-size: 14px;
}
.container .row .alert{
    font-size: 14px;
}


</style>
<br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="signup-user.php" method="POST" autocomplete="">
                    <h2 class="text-center">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name"  required value="<?php echo $name ?>">
                    </div> 

                    <div class="form-group">
                        <input class="form-control" type="text" name="mobile" placeholder="Mobile Number" pattern="/^[6-9]{1}[0-9]{9}$/" required value="<?php echo $mobile ?>">
                    </div>                  

                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^" required value="<?php echo $email ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" pattern="/^.{8,}$^/" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" pattern="/^.{8,}$^/" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="address" placeholder="Address" pattern="[A-Za-z0-9'\.\-\s\,]" required value="<?php echo $address ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="city" placeholder="City" pattern="/^[a-zA-Z ]*$/" required value="<?php echo $city ?>">
                    </div>

                    <div class="form-group">
                        <input class="form-control" type="text" name="pincode" placeholder="Pincode" pattern="/^[0-9]{6}$/" required value="<?php echo $pincode ?>">
                    </div>

                    

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>
                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>

                
            </div>
        </div>
    </div>
  
<?php 
        ob_end_flush();
        ?>