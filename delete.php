<?php
include("db.php");
$order_id=$_GET['del_id'];
$order_status=$_GET['status'];
$txnid=$_GET['txnid'];
$product_invoice=$_GET['invoiceno'];
$total=$_GET['total'];
$update_p_cat = "update customer_orders set order_status='$order_status' where order_id=$order_id"; 
$run_p_cat = mysqli_query($con,$update_p_cat);
if($order_status=="d")
{
    if($txnid=="")
    {
        $payment_mode="Cash on Delivery";
        $update_status="update customer_orders set payment_status='successful' where order_id='$order_id'";
        mysqli_query($con,$update_status);
    }
}

if($run_p_cat){
    echo "<script>window.open('view_order.php','_self')</script>";   
}      
?>