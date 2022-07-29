<?php
ob_start();
    include('db.php');
    include('header.php');
    require 'PHPMailer.php';
                    require 'Exception.php';
                    require 'SMTP.php';

   // require 'mail/OAuth.php';
   // require 'mail/POP3.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    /*if(isset($_SESSION['customerID']))
    {
        header("location:index.php");
    }
    else{
        header("location:Login.php");
    }*/
   
    $errMobileno=$errEmailID='';
    $error='';
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $tempMobileno=TRUE;
        $tempEmailID=TRUE;
        $existMobileno='';
        $existEmailID='';
       

        $firstName=$_POST['firstName'];
        $mobileno=$_POST['mobileno'];
        $emailID=$_POST['emailID'];
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
        $address=$_POST['address'];
        $city=$_POST['city'];
        $state=$_POST['state'];
        $pincode=$_POST['pincode'];

        $status=0;

        $_SESSION['fn']=$firstName;
        $_SESSION['email']=$emailID;
        $_SESSION['mno']=$mobileno;
        $_SESSION['pwd']=$password;
        $_SESSION['cpwd']=$confirmPassword;
        $_SESSION['add']=$address;
        $_SESSION['ci']=$city;
        $_SESSION['state']=$state;
        $_SESSION['pincode']=$pincode;

        if($firstName==''||$mobileno==''||$emailID==''||$password==''||$confirmPassword==''||$address==''||$city==''||$state==''||$pincode=='')
        {
            $error="Fill all the details";
        }
        else
        {
            $select="select contact_no,email_id from tbl_registration";

            if($result= mysqli_query($con, $select))
            {
                if(mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        if($mobileno==$row['contact_no'])
                        {
                            $tempMobileno=FALSE;
                            $existMobileno="Contact No".$mobileno;
                        }
                        if ($emailID==$row['email_id'])
                        {
                            $tempEmailID=FALSE;
                            $existEmailID="Email Id ".$emailID;
                        }
                    }
                }
            }

            if($tempMobileno && $tempEmailID)
            {
                /*
                    $ins="INSERT INTO tbl_registration (Firstname, Lastname, Mobileno, Email, Password, Address, City,status) VALUES ('$firstName', '$lastName', '$mobileno', '$emailID', '$password', '$address', '$city', '$status')";*/

                    $_SESSION['votp']=rand(1000, 100000);
                    $mail=new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host="smtp.gmail.com";
                    $mail->SMTPAuth="true";
                    $mail->SMTPSecure="tls";
                    $mail->Port="587";
                    $mail->Username="businesswithlh@gmail.com";
                    $mail->Password="LaptopHouse2021";
                    $mail->Subject="Your Otp is";
                    $mail->setFrom("businesswithlh@gmail.com");
                    $mail->Body= $_SESSION['votp'];
                    $mail->addAddress($_POST['emailID']);
   
                        if($mail->send())
                        {
                            
                            header("location:regotp.php");
                            
                        }
                        else
                        {
                            echo '<script>
                            swal({
                            title: "Oops..! Check your connectivities!",                              
                            icon: "error",
                        });
                        </script>';
                        //   echo '<script>alert("Check your connectivitys")</script>';  
                        }
                    $mail->smtpClose();
            }
            else
            {
                ?>         
                <script>
                    swal({
                        title: "Already exist!",
                        text: '<?php echo $existMobileno." ".$existEmailID?>',
                        icon: "error",
                    });
                </script>';
                <?php
            }

        }
        
    }
                               
 ?>                         

<script type="text/javascript">              
    $(document).ready(function(){

        $('#firstName').keyup(function(){
            var firstName=$('#firstName').val();
            if (firstName === "")
            {
                $('#firstnameErr').html('First name is required');
                return false;
            }
            else
            {
                if(!/^[a-zA-Z]*$/g.test(document.registrationForm.firstName.value))
                {
                    $('#firstnameErr').html('Enter only alphabets');
                    return false;
                }
                else if(firstName.length<2)
                {
                    $('#firstnameErr').html('Enter atleast 2 alphabets');
                    return false;
                }
                else if(firstName.length>20)
                {
                    $('#firstnameErr').html('Enter within 20 alphabets');
                    return false;
                }
                else
                {
                    $('#firstnameErr').html('');
                    return false;
                }
            }
        });

        $('#state').keyup(function(){
            var state=$('#state').val();
            if (state === "")
            {
                $('#stateErr').html('state name is required');
                return false;
            }
            else
            {
                if(!/^[a-zA-Z]*$/g.test(document.registrationForm.state.value))
                {
                    $('#stateErr').html('Enter only alphabets');
                    return false;
                }
                else if(state.length<2)
                {
                    $('#stateErr').html('Enter atleast 2 alphabets');
                    return false;
                }
                else if(state.length>20)
                {
                    $('#stateErr').html('Enter within 20 alphabets');
                    return false;
                }
                else
                {
                    $('#stateErr').html('');
                    return false;
                }
            }
        });

       $('#mobileno').keyup(function(){
            var mobileno=$('#mobileno').val();
            if (mobileno === "")
            {
                $('#mobilenoErr').html('Mobile no is required');
                return false;
            }
            else
            {
                if(mobileno.length!=10)
                {
                    $('#mobilenoErr').html('Enter 10 digit only');
                    return false;
                }
                else if(!/^[6-9]\d{9}$/g.test(document.registrationForm.mobileno.value))
                {
                    $('#mobilenoErr').html('Enter valid mobile no');
                    return false;
                }
                else
                {
                    $('#mobilenoErr').html('');
                    return false;
                }
            }
        });

        $('#pincode').keyup(function(){
            var pincode=$('#pincode').val();
            if (pincode === "")
            {
                $('#pincodeErr').html('Pincode is required');
                return false;
            }
            else
            {
                if(pincode.length!=6)
                {
                    $('#pincodeErr').html('Enter 6 digit only');
                    return false;
                }
                else if(!/^[0-9]\d{5}$/g.test(document.registrationForm.pincode.value))
                {
                    $('#pincodeErr').html('Enter valid pincode');
                    return false;
                }
                else
                {
                    $('#pincodeErr').html('');
                    return false;
                }
            }
        });

       $('#emailID').keyup(function(){
            var emailID=$('#emailID').val();
            if (emailID === "")
            {
                $('#emailIDErr').html('Email ID is required');
                return false;
            }
            else
            {
                if(emailID.length<=6 || emailID>30)
                {
                    $('#emailIDErr').html('Email ID between 7 to 30 characters');
                    return false;
                }
                else if(!/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(document.registrationForm.emailID.value))
                {
                    $('#emailIDErr').html('Enter valid email ID');
                    return false;
                }
                else
                {
                    $('#emailIDErr').html('');
                    return false;
                }
            }
        });

        $('#password').keyup(function(){
            var pswd=$('#password').val();
            if (pswd === "")
            {
                $('#passwordErr').html('Password is required');
                return false;
            }
            else
            {                        
                if(!/^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/.test(document.registrationForm.password.value))
                {
                    $('#passwordErr').html('Password between 8 to 20 characters and contains atleast one digit, upercase, lowercase and special character');
                    return false;
                }
                else
                {
                    $('#passwordErr').html('');
                    return false;
                }
            }
        });

        $('#confirmPassword').keyup(function(){
            var password=$('#password').val();
            var confirmPassword=$('#confirmPassword').val();

            if(confirmPassword!=password)
            {
                $('#confirmPasswordErr').html('Password is not match*');
                return false;
            }
            else
            {
                $('#confirmPasswordErr').html('');
            }
       });

       $('#address').keyup(function(){
            var address=$('#address').val();
            if (address === "")
            {
                $('#addressErr').html('Address is required');
                return false;
            }
            else
            {    if(/^[\w\s.-/]+\d+,\s*[\w\s.-]+\d+,\s*[\w\s.-]+$/.test(document.registrationForm.address.value))
                {
                    $('#addressErr').html('Format: House No, Street name - Street no, Area');
                    return false;
                }              
                else if(address.length<10)
                {
                    $('#addressErr').html('Enter atleast 10 alphabets');
                    return false;
                }
                else if(address.length>100)
                {
                    $('#addressErr').html('Enter within 100 alphabets');
                    return false;
                }
                else
                {
                    $('#addressErr').html('');
                    return false;
                }
            }
        });
    });            
</script> 
<br><br> <br><br><br><br>     
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                                <h4> Register Here..</h4>
                        </div>
                    </div><hr>

                    <form action="#" method="post" name="registrationForm">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputFirstName" class="form-label">Full Name</label>
                                    <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter Full Name" autocomplete="off">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="firstnameErr"></span>
                                        </div>
                                    </div>

                                </div>                                        
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputEmailID" class="form-label">Email ID</label>
                                    <input type="email" name="emailID" id="emailID" class="form-control" placeholder="Enter Email ID" autocomplete="off">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="emailIDErr"></span>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                        </div>

                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputPassword" class="form-label">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="passwordErr"></span>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Re-type Password">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="confirmPasswordErr"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputMobileNo" class="form-label">Mobile Number</label>
                                    <input type="number" name="mobileno" id="mobileno" class="form-control" placeholder="Enter Mobile Number" autocomplete="off">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="mobilenoErr"></span>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <textarea style="resize:none;" name="address" rows="3" id="address" class="form-control" placeholder="Ex: 110, Akshardham soc-2, Motavarachha"></textarea>

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="addressErr"></span>
                                        </div>
                                    </div>                                            
                                </div>
                            </div>
                        </div>

                        

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputCity" class="form-label">City</label>
                                    <select id="inputCity" class="form-control" name="city">                                                
                                        <option value="" selected>-- Select City --</option>
                                        <?php
                                            $result= mysqli_query($con, "select * from tbl_city");
                                            while ($row= mysqli_fetch_array($result))
                                            {
                                        ?>
                                        <option value="<?php echo $row["CityName"]?>"><?php echo $row["CityName"]?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>  

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="cityErr"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputFirstName" class="form-label">State</label>
                                    <input type="text" name="state" id="state" class="form-control" placeholder="Enter State Name" autocomplete="off">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="stateErr"></span>
                                        </div>
                                    </div>

                                </div>  
                        </div><br>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputFirstName" class="form-label">Pincode</label>
                                    <input type="number" name="pincode" id="pincode" class="form-control" placeholder="Enter Pincode" autocomplete="off">

                                    <div class="row">
                                        <div class="col">
                                            <span style="color: red;" id="pincodeErr"></span>
                                        </div>
                                    </div>

                                </div>  
                        </div><br>
                    </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input style="padding-right:20px; padding-left: 20px;" class="btn btn-primary" type="submit" value="Sign Up">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <span style="color: red;"><?php echo $error;?></span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
<?php
    include 'footer.php';
    ob_end_flush();
?>