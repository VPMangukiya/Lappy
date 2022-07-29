<?php ob_start();


include("header.php");
	
    if(!isset($_SESSION['uname']))
    {
        echo '<script>
					swal({
					title: "Do not Access this Page!!",                              
					icon: "error",
				  });
				  </script>';

        echo "<script>window.location.href='Login.php';</script>";
    }
    $fn=$_SESSION['fn'];
?>     

    <br>
    <br>   <br>
    <br>   <br>
    <br>
<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 40%; ">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Feedback</h1>
                  <hr>
              </div>-->

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4>Give Feedback</h4>
                             </div>
                        </div><hr>
                        <form method="POST"> 

                            <div class="form-row">
                                <label for="inputEmail4"  class="form-label">Email:</label> 
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_SESSION['uname'];?>">
                            </div> 
<br>
                            <div class="form-row">
                                <label for="inputEmail4"  class="form-label">Message:</label> 
                            </div>  
                            <div class="form-row">
                                <textarea rows="4" cols="50" name="feedback" placeholder="write something here..." maxlength="250" required></textarea> 
                            </div> 
<br>
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
<br>
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
		include("db.php");
		if(isset($_POST['submit']))
        {
            $get_feedback = "insert into tbl_feedback(uid,review) values ('".$_SESSION['uid']."','".$_POST['feedback']."')";
           // $set_feedback = mysqli_query($con,$get_feedback);
            if(mysqli_query($con,$get_feedback))
            {
                echo "<script>window.location.href='index.php';</script>";
            }
            else{echo "qwef";}
        }
        ob_end_flush();
	?>