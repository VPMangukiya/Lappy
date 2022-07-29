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
    if(isset($_SESSION['q']) && isset($_SESSION['i']) && isset($_SESSION['p']))
    {
        $uid = $_SESSION['uid'];
        $qty= $_SESSION['q'];
	    $id=$_SESSION['i'];
	    $price=$_SESSION['p'];
        $total = $qty*$price;

       

        $add_to_cart_query = "insert into cart (Product_id,user_id,price,quantity,total,status) values ('$id','$uid','$price','$qty','$total','added')";
        $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
       echo "<script>window.location.href='index.php';</script>";
       echo "content";
    }

     
    
       
    include("footer.php");   
    ob_end_flush();
?>