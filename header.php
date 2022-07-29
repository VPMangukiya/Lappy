<?php
session_start();
if(isset($_SESSION['anmae']))
{
  header("location:demo.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="lhlogo.png" />
<title>LAPTOP HOUSE</title>

<!-- Header -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<!-- Header end-->
<!-- <link rel="stylesheet" href="css/stylee.css"> -->

<!-- form -->
<link rel="stylesheet" href="css/style5.css" type="text/css">
<script src="sweetalert.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- form end-->

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}

    .bs-example{
        margin: auto;
    }

  
    .dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
  display: block;
}



disabled{cursor: not-allowed;}

</style>
</head>
<body>
<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" style="height:auto;">
    <div class="logo"><img src="lhlogo.png" alt="LH" style="height:50px;width:50px;margin-right:auto;">
    <a href="index.php" class="navbar-brand" style="margin-right:100px"><b>LAPTOP HOUSE</b></a>
    </div>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link" style="color:black;">Home</a>
              <!--  <a href="profile.php" class="nav-item nav-link" style="color:black;">Profile</a> -->
                <a href="filter.php" class="nav-item nav-link" style="color:black;">Laptop</a>

                <div class="dropdown">
                  <a href="#" class="dropbtn nav-item nav-link" style="color:black;">Category</a>
                   <div class="dropdown-content">
                      
                            <?php 
                            include 'db.php';
                              $result= mysqli_query($con,"select * from tbl_product_category");
                              while($row=mysqli_fetch_array($result))
                               {     $row['category_id'];
                                ?>     
                                  <a href="s_cate.php?id=<?php echo $row['category_id'];?>"><?php echo $row["category_type"]?></a>
                                  
                                <?php   }?>
                   </div>
                </div>
                <a href="contactus.php" class="nav-item nav-link" style="color:black;">Contact Us</a>

                <a href="aboutus.php" class="nav-item nav-link" style="color:black;">About Us</a>
                <?php if(isset($_SESSION['uname']))
                    {
                   ?>
                <a href="yourorder.php" class="nav-item nav-link" style="color:black;">My Order</a>
                <?php } ?>
            </div>

            <div class="navbar-nav" style="margin:0px 15px 0px 50px;margin-top:5px;">
           <!-- <i class="fas fa-shopping-cart" style="margin-top:25px;"></i><a href="cart.php" class="nav-item nav-link" style="margin-top:15px;">Cart</a>  -->
          <!--  </div>-->


        <?php
        if (empty($_SESSION['uname']) && empty($_SESSION['aname'])) {
        ?>
           <!-- <div class="navbar-nav"> -->
           <a href="Login.php" class="nav-item nav-link"  style="margin-top:15px;color:black;"><i class="fas fa-user"style="margin-top:5px;"></i>Log-in</a>
            
           <!-- </div> -->

        <?php
        } else {
            include 'db.php';
            $select = "select * from tbl_registration where email_id='".$_SESSION['uname']."'";
            $result = mysqli_query($con,$select);
            
            $num = mysqli_num_rows($result);
            $name="";
            if($num > 0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    $name = $row['name'];
                    $_SESSION['uid']=$row['user_id'];
                }
            }
        ?> 

         <a href="profile.php" class="nav-item nav-link"  style="margin-top:15px;color:blue;"><i class="fas fa-user-circle" style="margin-top:7px;"></i><?php echo $name; ?></a>
            
            <a href="wish_list.php" class="nav-item nav-link" style="margin-top:15px;color:black;" ><i class="fas fa-heart" style="margin-top:7px;"></i>Wish-list</a>

           <a href="cart.php" class="nav-item nav-link" style="margin-top:15px;color:black;"><i class="fas fa-shopping-cart" style="margin-top:7px;"></i>Cart</a>

           <a href="logout.php"  style="margin-top:15px;color:black;" class="nav-item nav-link"><i class="fas fa-sign-out-alt" style="margin-top:7px;"></i>Log-Out</a>
            </div>
            
        <?php
        }
        ?>
      </div>
    </nav>
</div>

