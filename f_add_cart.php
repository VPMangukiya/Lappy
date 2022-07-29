<?php
ob_start();
require 'header.php';
require 'db.php';
if(!isset($_SESSION['uname'])){
    //header('location: Login.php');
    echo "<script>window.location.href='index.php';</script>";
}
    /*session_start();

    include("db.php");
    include("header.php");*/
    $stock =0;
    if((isset($_GET['id'])) && isset($_GET['price']))
       {
           $id1=$_GET['id'];
           $price1=$_GET['price'];
           $uid=$_SESSION['uid'];
           $qty1=1;
           $total1=$qty1*$price1;
        
           $scart = "select * from cart where Product_id = '$id1' and user_id = '$uid'";
           $rcart = mysqli_query($con,$scart);
           if($rcart->num_rows>0)
           {
               $cp=$cq=0;
               while($row = mysqli_fetch_array($rcart))
               {
                   $cq= $row['quantity'];
                   $cp= $row['total'];
               }
               $tcq = $cq+$qty1;
               $tc = $price1+$cp;
   
               $cqty =  "select quantity from tbl_stock where product_id  = $id1";
               $cnum  = mysqli_query($con,$cqty);
               $stock =0;
               if($cnum->num_rows > 0)
               {
                   while ($row = mysqli_fetch_array($cnum))
                   {
                       $stock = $row['quantity'];
                   }
               }
               if($stock < $qty)
               {
                   echo '<script>
                   swal({
                   title: "stock is not avilable",                              
                   icon: "error",
                   });
                    </script>'; 
                  // echo "<script>window.location.href='filter.php';</script>";
                  echo "filter stock";
                   
               }
               else{
                   $update = "update cart set quantity='$tcq',total='$tc' where product_id='$id1' and user_id='$uid'";
                   $num = mysqli_query($con,$update);
                   $delete_query="delete from wish_list where user_id='$uid' and product_id='$id'";
                   $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
                   echo "<script>window.location.href='filter.php';</script>";
                //  echo "filter update";
               }
            }
            else
            {
                $add_to_cart_query = "insert into cart (Product_id,user_id,price,quantity,total,status) values ('$id1','$uid','$price1','$qty1','$total1','added')";
                $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
               echo "<script>window.location.href='filter.php';</script>";
              // echo "filter insert";
            }   
   
   
           
        }
       
    
       
    include("footer.php");   
    ob_end_flush();
?>