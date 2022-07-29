<html>
<head>
      <link rel="stylesheet" href="css/style1.css">
      <link rel="stylesheet" href="css/style2.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



</head>
<body>
  <div style="padding-top:90px;">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
          <?php
            $sl = 0;
            $ls = 1;
            include 'db.php';
            $slider = "select gallery_img from tbl_gallery";
            $slre = mysqli_query($con,$slider);
            if($slre->num_rows>0)
            {
              while($raw = mysqli_fetch_array($slre))
              {
                if($sl == 0 && $ls == 1)
                {  ?>
                   <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $sl; ?>" class="active" aria-current="true" aria-label="Slide <?php echo $ls; ?>"></button>
                <?php 
                }
                else
                {  ?>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $sl; ?>" aria-label="Slide <?php echo $ls; ?>"></button>
                <?php }
                $sl = $sl+1;
                $ls = $ls+1;
              }
            }
          ?>
             <!--   <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>  -->
          </div>
 
          <div class="carousel-inner">
            <?php
            $view = "select gallery_img from tbl_gallery";
            $sview = mysqli_query($con,$slider);
            $c = 0;
               if($sview->num_rows>0)
               {
                 
                 while($raw = mysqli_fetch_array($sview))
                 {
                   if($c==0)
                   { ?>
                      <div class="carousel-item active">
                        <img src="image/<?php echo $raw['gallery_img']; ?>" class="d-block w-100" height="400px" alt="..."> 
                      </div>
                    <?php }
                    else
                    { ?>
                      <div class="carousel-item">
                      <img src="image/<?php echo $raw['gallery_img']; ?>" class="d-block w-100" height="400px" alt="...">
                      </div>
                    <?php }
                    $c = $c+1;
                  }
                }
                else {
            ?>
                <div class="carousel-item active">
                      <img src="slider/1.jpg" class="d-block w-100" height="400px" alt="...">
                </div>
      
                <div class="carousel-item">
                      <img src="slider/2.jpg" class="d-block w-100" height="400px" alt="...">
                </div>

                <div class="carousel-item">
                  <img src="slider/3.jpg" class="d-block w-100" height="400px" alt="...">
                </div>
                <?php } ?>
          </div>

          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="color:black;"></span>
            <span class="visually-hidden" >Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"  data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
</div>
</div>