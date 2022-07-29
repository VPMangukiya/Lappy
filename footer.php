<br>
<style>
html{
    scroll-behavior: smooth;
}
section{
    width:100%;
    /*height: 100vh;*/
    background-size: cover;
}
.gotopbtn{
    position: fixed;
    width: 50px;
    height: 50px;
    background: #27ae60;
    bottom:40px;
    right: 50px;
    text-decoration: none;
    text-align: center;line-height: 50px;
    font-size: 22px;
    color: white;

}
</style>
<section>
</section>
<a href="#" class="gotopbtn"><i class="fas fa-arrow-up"></i></a>
     <!-- footer -->
     <footer  style="background-color: #343a40">
        <div class="container">
            <div class="row ">
                <div class="col-md-4 text-center my-4 text-center text-md-left ">
                <span class=" font-weight-bold " style="color:white;">About Us</span>
                    <div class="py-0">
                        <!--<div class="logo">
                            <h3 class="my-4 text-white" style="margin-right:5px;margin-bottom:50px;">Laptop<span class="mx-2 font-italic text-warning" style="margin-top:50px;">House</span></h3>
                        </div>-->
                        <p class="footer-links" style="color:white;margin-top:28px;">
                            Hello everyone, It is Laptop House.</p>
                            <p style="color:white;">
                            We are provide best value for buying the laptop.
                        </p>
                    </div>
                </div>
                
                <div class="col-md-4 text-white my-4 text-center text-md-left ">
                <span class=" font-weight-bold" style="margin-top:10px;">Contact Us</span>
                    <div class="py-2 my-4">
                        <div>
                            <p class="text-white"> <i class="fa fa-map-marker mx-2 "></i>
                                    201,Panvel Point,surat - 394101</p>
                        </div>

                        <div> 
                            <p><i class="fa fa-phone  mx-2 "></i> +91 8347345829, +91 9925151905</p>
                        </div>
                        <div>
                            <p><i class="fa fa-envelope  mx-2"></i><a href="mailto:businesswithlh@gmail.com">businesswithlh@gmail.com</a></p>
                        </div>  
                    </div>  
                </div>
                
                <div class="col-md-4 text-white my-4 text-center text-md-left ">
                    <span class=" font-weight-bold ">Follow Us</span>
					<p class="text-warning my-2" ></p>
                    <div class="py-2">
                        <a href="#"><i class="fab fa-facebook fa-2x text-primary mx-3"></i></a>
                        <a href="#"><i class="fab fa-twitter fa-2x text-info mx-3"></i></a>
                        <a href="#"><i class="fab fa-youtube fa-2x text-danger mx-3"></i></a>
                    </div>
                </div>
            </div> 

            <div class="row" style="margin:auto;">
                   <p style="margin:auto;" class="text-white"> <a href="index.php" class="text-white">Home</a> | 
                   <?php if(isset($_SESSION['uname']))
                    {
                   ?>
                   <a href="yourorder.php" class="text-white">My order</a> |
                   <?php } ?>
                    <a href="contactus.php" class="text-white">Contact Us</a> | 
                    <a href="aboutus.php" class="text-white">About Us</a> </p>
            </div>

            <div class="row">
               <p class="text-light py-4 mb-4" style="margin:auto;text-align:center;">&copy;2021 Laptop House Pvt. Ltd.</p>
            </div>
        </div>
     </footer>
     
     <!-- end of footer -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>

