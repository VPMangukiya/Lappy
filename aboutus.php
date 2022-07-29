<?php ob_start();

include("header.php");
	
if(!isset($_SESSION['uname']))
{
    header("location:Login.php");
}

if(isset($_SESSION['aname']))
{
    header("location:Login.php");   
}


?>
<!-- =======  Section ======= -->
       <!-- <div class="container">
            <div class="row content">
            <div class="col-md-8 mx-auto">
            <h4 style="text-align:center;margin-top:5px;margin-right:350px;">About Us</h4>
                <div class="col-lg-10 pt-4 pt-lg-0"><br><br>
                -->
          <br>   <br>   <br><br>   <br>  <br> 
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <h1 class="blog_head" style="margin-bottom: 0.5em;margin-left:450px;"> About Us</h1>
                                </div>
                            </div>
    
                                <div class="container" style="margin-right:500px;">
                                    <p>It's Laptop House.we are selling best laptop for you.
                                    Laptop House is to develop an Internet based sale. By developing of this portal and keeping the site searchable on Google hence increasing the customer base from a local market to all around the globe. IT can not only save the operating costs or enterprises as well as save the time of customer to go shopping at mall and it increasing the efficiency of business. </p>
                                </div>  
                </div>
            </div>
        </div>
    </div>
</div> 
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
    <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
<?php 
include("footer.php");
?>
                
<?php
        ob_end_flush();
?> 
            
