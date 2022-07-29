<?php
include("db.php");
$order_id=$_GET['del_id'];
$order_status=$_GET['status'];
$customer_email='';
$customer_address='';
$totalss=0;
$gst=0;
$total=0;
$update_p_cat = "update customer_orders set order_status='$order_status',payment_status='cancel' where order_id=$order_id"; 
$run_p_cat = mysqli_query($con,$update_p_cat);

$select_delete="select * from customer_orders where order_id='$order_id'";
$run_delete = mysqli_query($con,$select_delete);
$num_delete=mysqli_num_rows($run_delete);
if($num_delete==0)
{
    ?>
    <script>window.open("index.php");</script>
    <?php 
}
else{
while ($row_delete = mysqli_fetch_array($run_delete)) {

    $qty=$row_delete['qty'];
    $product_id=$row_delete['product_id'];
    $invoice_no=$row_delete['invoice_no'];
    $payment_status=$row_delete['payment_status'];
        $update_product="update tbl_stock set quantity=quantity+$qty where product_id='$product_id'";
        $up_product = mysqli_query($con,$update_product);
    
}
}

                echo "<script>window.open('view_order.php','_self')</script>";      
?>