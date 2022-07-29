<?php
require 'header.php';
require 'db.php';
if(!isset($_SESSION['uname'])){
    //header('location: Login.php');
    echo "<script>window.location.href='index.php';</script>";
}
   // require 'db.php';
    //session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['uid'];
    $delete_query="delete from cart where user_id='$user_id' and product_id='$item_id'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
   // header('location: cart.php');
    echo "<script>window.location.href='cart.php';</script>";
?>
