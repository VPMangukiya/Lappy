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
<br><br><br>
<!--
<div class="grid_4 ng-scope" style="padding:43px 0;">
    <div class="container"> 
        <h1 class="blog_head" style="margin-bottom: 0.5em;margin-left:500px;">Contact Us</h1>
        <div class="contact" style="margin-top: 1em;">
            <div class="col-md-4 contact_left">
                <div class="text-center">
                    <img src="lhlogo.png" height="100px"alt="Lh Logo">
                </div>
                <p class="text-center">
                   201, <br>
                    Panvel point,<br>
                    Mota Varachha <br>
                    Dist: Surat - 394101,  <br>
                    Gujarat (INDIA). <br>

                    <span class="fa fa-phone"></span>&nbsp;+91 8347345829 <br>
                    <span class="fa fa-phone"></span>&nbsp;+91 9925151905 <br>
                    <span class="fa fa-envelope"></span>&nbsp;<a href="mailto:businesswithlh@gmail.com">businesswithlh@gmail.com</a>
                </p>

            </div>-->
            <br>   <br>   <br>
<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-body">
                            <div class="row">
                                <div class="col">
                                        <h1 class="blog_head" style="margin-bottom: 0.5em;margin-left:450px;"> Contact Us</h1>
                                </div>
                            </div>
                                    <section id="contact-us" class="contact-us" style="margin-top:100px;">
                                        <div class="container">
                                               <!-- <h1 class="blog_head" style="margin-bottom: 0.5em;margin-left:500px;">Contact Us</h1>-->

                                            <div class="row mt-5">
                                                <div class="col-lg-4">
                                                    <div class="info">
                                                        <div class="address"><br>
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <b><p>201,Panvel Point,Surat-394101</p></b>
                                                        </div>

                                                        <div class="email">
                                                            <i class="fa fa-envelope"></i>
                                                            <a href="mailto:businesswithlh@gmail.com">businesswithlh@gmail.com</a>
                                                        </div>
                                                         <br>
                                                        <div class="phone">
                                                        <span class="fa fa-phone"></span>&nbsp;+91 8347345829 <br>
                                                        <span class="fa fa-phone"></span>&nbsp;+91 9925151905 <br>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="col-lg-8 mt-5 mt-lg-0">
                                                    <div class="col-md-8">
                                                        <div id="map_canvas" class="map">
                                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.8922119720974!2d72.87070241488699!3d21.236122435886436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f385708e481%3A0x45200a861ae9101b!2sPanvel%20Point%2C%20Mota%20Varachha%2C%20Surat%2C%20Gujarat%20394101!5e0!3m2!1sen!2sin!4v1619457245898!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                </div>
            </div>
        </div>  
    </div>                    
</div> 
<br>
<?php
            include('footer.php');
            ob_end_flush();    
?>