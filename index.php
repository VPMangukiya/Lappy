
<?php include("header.php")?>
<?php include("slider.php")?>
<?php include("content.php")?>
<?php include("footer.php")?>
<!--
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laptop House</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    </head>
    <body>
       navigation start -->
       <!-- <nav class="navbar" style="background-color:skyblue">
            <ul class="nav-list">
                <div class="logo"><img src="lhlogo.png" alt="LH"></div>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li><a href="Contactus.php">Concate Us</a></li>
                <li><a href="#">Services</a></li>
            </ul>
            <div class="rightNav" style="background-color:skyblue">
                <div class="search-container" style="margin-right: 0px;">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

                <ul class="nav-list">
                <?php
                    if(!isset($_SESSION['uname']))
                    {
                ?>
                <li><a href="Login.php" style="float:right;">Login</a></li>
                <?php
                    }
                    else{
                ?>
                 <li><a href="logout.php" style="float:right;">logout</a></li>
                 <?php
                    }
                    ?>
                <li><a href="Addtocart.php" style="margin-right: 0px;">Cart</a></li>
            </ul>
            </div>
        </nav>

         end navigation 
                    -->
                    
        <!-- slider image 
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
 
           <div class="carousel-inner">
                <div class="carousel-item active">
                      <img src="slider_img/img3.jpg" class="d-block w-100" height="500px" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                       <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                  </div>
                </div>
      
                <div class="carousel-item">
                      <img src="slider_img/img1.jpg" class="d-block w-100" height="500px" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                </div>
              </div>

                <div class="carousel-item">
                  <img src="slider_img/img2.jpg" class="d-block w-100" height="500px" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                  </div>
                </div>
            </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          <br>
          <br>
        </div>

         end slider -->
<!--
        
        <hr>
        <center><h1>Proffessional Laptop</h1></center>
        <hr>

        <section class="background firstSection">
            <div class="box-main">
                <div class=firstHalf style="background-color:black;">
                    <p class="text-big" style="color:white">Asus laptop</p>
                    <p class="text-small" style="color:white">1920x1080 full hd+ display </p>  
                    <div class="buttons">
                        <button class="btn">Learn More</button>
                        <button class="btn">Shop Now</button>
                    </div> 
                </div> 

                <div class=secondHalf>
                    <img src="Homeimg/1.jpg" alt="laptop image">
                </div>
                
            </div>

            <hr>
               <center><h1>Gaming Laptop</h1></center>
            <hr>

            <div class="box-main">
                <div class=firstHalf>
                    <img src="Homeimg/2.jpg" alt="laptop image">                   
                </div> 

                <div class=secondHalf style="color:black;">
                     <p class="text-big" style="color:black">Dell laptop</p>
                    <p class="text-small" style="color:black">1920x1080 full hd+ display </p>  
                    <div class="buttons">
                        <button class="btn">Learn More</button>
                        <button class="btn">Shop Now</button>
                    </div>  
                </div>               
            </div>

            <hr>
               <center><h1>Standard Laptop</h1></center>
            <hr>

            <div class="box-main">
                <div class=firstHalf>
                    <img src="Homeimg/2.jpg" alt="laptop image">                   
                </div> 

                <div class=secondHalf style="color:black;">
                     <p class="text-big" style="color:black">Dell laptop</p>
                    <p class="text-small" style="color:black">1920x1080 full hd+ display </p>  
                    <div class="buttons">
                        <button class="btn">Learn More</button>
                        <button class="btn">Shop Now</button>
                    </div>  
                </div>               
            </div>

        </section>-->
          <!-- End Main content -->

          <!-- Footer 
              <footer class="footer-distributed">
          
              <div class="footer-left">
          
              <h3>Laptop<span>House</span></h3>
          
              <p class="footer-links">
              <a href="#">Home</a>
            ·
              <a href="#">About</a>
            ·
              <a href="#">Contact Us</a>
              </p>
          
              <p class="footer-company-name">Laptop House &copy; 2021</p>
              </div>
          
              <div class="footer-center">
          
              <div>
              <i class="fa fa-map-marker"></i>
              <p><span>Mota varachha</span> Surat, Gujarat</p>
              </div>
          
              <div>
              <i class="fa fa-phone"></i>
              <p>+91 8347345829</p>
              </div>
          
              <div>
              <i class="fa fa-envelope"></i>
              <p><a href="mailto:support@company.com">laptop.house@gmail.com</a></p>
              </div>
          
              </div>
          
              <div class="footer-right">
          
              <p class="footer-company-about">
              <span>About Us</span>
                    It's Laptop House,There are availables all laptops for Proffessional with gaming usage. .
              </p>
          
              <div class="footer-icons">
          
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
          
              </div>
          
              </div>
 
		</footer>

     End Footer 
    </body>
</html>
-->