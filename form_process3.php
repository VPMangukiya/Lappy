<?php
session_start(); 
?>
<?php 
include("db.php");

?>
<?php 
           
           if(!isset($_SESSION['uname'])){
               ?>
            <script>window.open('Login.php','_self')</script>
            <?php
           }
           else{
           
?>
<?php

 if(isset($_SESSION['order_id']))
 {
     $txnid=$_SESSION['order_id'];
 }
 else{
     ?>
    <script>window.open('home','_self')</script>
    <?php   
}
 if (isset($_SESSION['c_id'])) {
     $c_id=$_SESSION['c_id'];
 }
 else{
     ?>
    <script>window.open('home','_self')</script>
    <?php   
}
 

                $status="failed";
                $o_status="f";
                $invoice_no=mt_rand();
                $pro_size="";          
                $pro_qty=0;
                $pro_id=0;
                $pro_name=0;
                $sub_total=0;
                $total=0;
                $pro_price=0;
                $totals=0;
                $customer_email='';
                $customer_address='';
                            
               
                $get_customer="select * from tbl_registration where user_id ='$c_id'";
                $run_customer=mysqli_query($con,$get_customer);
                while($row_customer=mysqli_fetch_array($run_customer))
                {

                 $customer_name=$row_customer['name'];
                  //  $customer_lname=$row_customer['customer_lname'];
                    $customer_email=$row_customer['email_id'];
                   // $customer_country=$row_customer['customer_state'];
                    $customer_city=$row_customer['city'];
                    $customer_contact=$row_customer['contact_no'];
                    $customer_address=$row_customer['address'];
                    $customer_pincode=$row_customer['pincode'];
                    $insert_customer="insert into orders(customer_name,customer_email,customer_city,customer_pincode,customer_contact,customer_address) values('$customer_name','$customer_email','$customer_city','$customer_pincode','$customer_contact','$customer_address')";
                    $run_insert_customer=mysqli_query($con,$insert_customer);
                    $get_orders="select * from orders where customer_email='$customer_email'";
                    $run_orders=mysqli_query($con,$get_orders);
                    while($row_orders=mysqli_fetch_array($run_orders))
                    {
                        
                           $order_id=$row_orders['id'];
                         
                           
                    }
                   echo $order_id;
                }
                             
                $get_cart="select * from cart where user_id ='$c_id'";
                $run_cart=mysqli_query($con,$get_cart);
                while($row_cart=mysqli_fetch_array($run_cart))
                {
                   $id = $row_cart['cart_id'];
                    $pro_qty=$row_cart['quantity'];
                    $pro_id=$row_cart['product_id'];
                    $pro_price=$row_cart['price'];
                    $total=$total+$row_cart['price']*$row_cart['quantity'];
                    $insert_customer_orders="insert into customer_orders(order_id,product_id,txnid,invoice_no,qty,customer_email,order_date,order_status,payment_status) values('$order_id','$pro_id','$txnid','$invoice_no','$pro_qty','$customer_email',NOW(),'$o_status','$status')";
                    $run_customer_orders=mysqli_query($con,$insert_customer_orders);

                    $querys="update tbl_stock set quantity=quantity-$pro_qty where product_id='$pro_id' ";
                    $run_querys=mysqli_query($con, $querys);
                    $del_cart = "DELETE FROM cart where cart_id ='$id'";
                    $run_caert= mysqli_query($con,$del_cart);
                }   

                ?>
                <?php
                
                header("location:index.php");
                

            }
            ?>
                
                                               
                                                    
                                                        