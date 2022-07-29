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
    
     if(isset($_GET['wid']))
        {
            $uid = $_SESSION['uid'];
            $qty= 1;
            $id=$_GET['wid'];
            $select = "select * from tbl_product where product_id = '$id'";
            $run = mysqli_query($con,$select);
            $price =0;
            while($row = mysqli_fetch_array($run))
            {
             $price = $row['price'];
            }
            $total = $qty*$price; 

            $scart = "select * from cart where Product_id = '$id' and user_id = '$uid'";
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
   
               $cqty =  "select quantity from tbl_stock where product_id  = $id";
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
                    $update = "update cart set quantity='$tcq',total='$tc' where product_id='$id' and user_id='$uid'";
                    $num = mysqli_query($con,$update);
                    $delete_query="delete from wish_list where user_id='$uid' and product_id='$id'";
                    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
                    echo "<script>window.location.href='wish_list.php';</script>";
                    echo "list update";
                }
                    
            }
            


        else
        {

            $add_to_cart_query = "insert into cart (Product_id,user_id,price,quantity,total,status) values ('$id','$uid','$price','$qty','$total','added')";
            $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
            $delete_query="delete from wish_list where user_id='$uid' and product_id='$id'";
            $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
            echo "<script>window.location.href='wish_list.php';</script>";
           echo "list insert";
        }
    
    }
       
    include("footer.php");   
    ob_end_flush();
?>