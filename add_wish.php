
<?php
    //session_start();
    require 'db.php';
    
   // include("db.php");
   include("header.php");
   $uid = $_SESSION['uid'];
	$id=$_GET['id'];
    $select = "select * from wish_list where (Product_id ='$id' and user_id='$uid' and status='added' ";
    $run =mysqli_query($con,$select);
    if($run->num_rows>0)
    {
        echo '<script>
        swal({
        title: "Add items to wish list first.",                              
        icon: "error",
      });
      </script>';
      echo "<script>window.location.href='index.php';</script>";
    }
    else
    {

       $add_to_cart_query = "insert into wish_list (Product_id,user_id,status) values ('$id','$uid','added')";
        $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
       echo "<script>window.location.href='index.php';</script>";
    }

    include("footer.php");   
    
?>