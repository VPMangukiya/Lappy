<?php ob_start();
include("header.php");

require 'PHPMailer.php';
                    require 'Exception.php';
                    require 'SMTP.php';

   // require 'mail/OAuth.php';
   // require 'mail/POP3.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>
<?php 
    $emailErr="";
    $emailID="";
    
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $emailID=$_POST['uname'];

        if(empty($emailID))
        {
            $emailErr="Email Id is required*";
        }
    }


?>
<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['uname']))
        {
            echo '<script>
            swal({
            title: "oops! Email Id is required. please try again!!! ",                              
            icon: "error",
          });
          </script>';    
        } 
          else 
          {
              $pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^/";
              if (!preg_match($pattern, $_POST['uname'])) 
              {
                echo '<script>
                swal({
                title: "Enter Proper Email. please try again!!! ",                              
                icon: "error",
              });
              </script>';    
              }
          }
    
    
    }


?>
<br><br><br>
<br><br><br>

<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 40%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Forget</h1>
                  <hr>
              </div>
              -->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Forgot Password</h4>
                             </div>
                        </div><hr>
                        <form method="POST">
                            
                                <div class="form-row">
                                <label for="inputEmail4" >Email</label><!--style="margin-left:90%; text-align:center;"-->
                                <input type="text" name="uname" class="form-control" id="inputEmail4" placeholder="Enter Email">    <!--style="margin-left: 20px;width:400px;"-->      
                                </div> 

                                <br>
                            <button type="submit" name="Forgot" class="btn btn-primary">Send Otp</button>
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
if(isset($_POST['Forgot']))
{
		include("db.php");
        $_SESSION['femail']=$_POST['uname'];
		
            $verifyuser ="select * from tbl_registration where email_id ='".$_POST['uname']."'";

            if($result = mysqli_query($con,$verifyuser))
            {			
                if(mysqli_num_rows($result)>0)
                {
    

                    $_SESSION['votp']=rand(1000, 100000);
                    $mail=new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host="smtp.gmail.com";
                    $mail->SMTPAuth="true";
                    $mail->SMTPSecure="tls";
                    $mail->Port="587";
                    $mail->Username="businesswithlh@gmail.com";
                    $mail->Password="LaptopHouse2021";
                    $mail->Subject="Your Otp are";
                    $mail->setFrom("businesswithlh@gmail.com");
                    $mail->Body= $_SESSION['votp'];
                    $mail->addAddress($_POST['uname']);
   
                        if($mail->send())
                        {
                            
                            header("location:otp.php");
                            
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
                    echo '<script>
                    swal({
                    title: "Email id is invalid",                              
                    icon: "error",
                  });
                  </script>';
                    //echo '<script>alert("Email id is invalid")</script>';
                }		
            }
        }
        ob_end_flush();
?>