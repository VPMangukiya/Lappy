<?php if (isset($_POST["order_id"])) {
    include("db.php");
    ?>
<p class="mb-2">Order id : <span class="text-primary"><?php echo $_POST["order_id"] ?></span></p>
<?php
 $order_id=$_POST["order_id"];
 $get_product="select * from orders where id=$order_id";
 $run_product=mysqli_query($con,$get_product);
 while ($row_product=mysqli_fetch_array($run_product)) {
     ?>
                                <p class="mb-2">Billing Name : <span class="text-primary"><?php echo $row_product["customer_name"]; ?></span></p>
                                <p class="mb-2">Order Address : <span class="text-primary"><?php echo $row_product["customer_address"]; ?></span></p>
                                <p class="mb-3">Contact Number : <span class="text-primary"><?php echo $row_product["customer_contact"]; ?></span></p>
<?php
 }
$get_customer_orders="select DISTINCT txnid,invoice_no from customer_orders where order_id=$order_id";
$run_customer_orders=mysqli_query($con,$get_customer_orders);
while($row_customer_orders=mysqli_fetch_array($run_customer_orders))
{
    ?>
     <p class="mb-2">Invoice number : <span class="text-primary"><?php echo $row_customer_orders["invoice_no"]; ?></span></p>
    <?php 
    if($row_customer_orders['txnid']=="")
    {
        ?>
         <p class="mb-2">Payment Method : <span class="badge badge-pill badge-soft-success font-size-10" >Cash On Delivery</span></p>
        <?php

    }else
    {?>
        <p class="mb-2">Transaction ID : <span class="text-primary"><?php echo $row_customer_orders["txnid"]; ?></span></p>
        <p class="mb-2">Payment Method : <span class="badge badge-pill badge-soft-success font-size-10" > Online Payment</span></p>
    <?php 
    }
}
 ?>
                                <div class="table-responsive">
                                    <table class="table table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $bill=0;
                                                $total=0;
                                                $totals=0;
                                                 $get_products="select * from customer_orders where order_id=$order_id";
                                                 $run_products=mysqli_query($con,$get_products);
                                                 while ($row_products=mysqli_fetch_array($run_products)) {
                                                     $product_id=$row_products["product_id"];
                                                     $product_qty=$row_products["qty"];
                                                        
                                                         $get_productss="select * from tbl_product where product_id=$product_id";
                                                         $run_productss=mysqli_query($con, $get_productss);
                                                         while ($row_productss=mysqli_fetch_array($run_productss)) {
                                                             ?>
                                                <th scope="row">
                                                    <div>
                                                        
                                                        <img src="image/<?php echo $row_productss["product_image"]; ?>"  style="height:50px;" alt="" class="avatar-sm">
                                                    </div>
                                                </th>
                                                <td>
                                                    <div>
                                                        <h5 class="text-truncate font-size-14"><?php echo $row_productss["model_name"]; ?></h5>
                                                        <p class="text-muted mb-0"><?php echo $row_productss["price"]; ?> x <?php echo $product_qty; ?></p>
                                                    </div>
                                                </td>
                                                <td>Rs.<?php  echo $bill= $product_qty*$row_productss["price"]; ?></td>
                                            </tr>
                                            <?php
                                                $total+=$bill;
                                                         }
                                                         
                                                     

                                                 }?>
                                            <tr>
                                               
                                            
                                                <td colspan="2">
                                                   
                                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                                </td>
                                                <td>Rs.<?php echo $total; ?>
                                                </td>

                                            </tr>
                                            
                                            <!-- <tr>
                                            
                                                <td colspan="2">
                                                    
                                                    <h6 class="m-0 text-right">GST (18%):</h6>
                                                </td>
                                                <td>
                                                
                                                
                                                Rs.<?php echo $gst=$total*18/100; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                            
                                                <td colspan="2">
                                                    
                                                    <h6 class="m-0 text-right">Total:</h6>
                                                </td>
                                                <td>
                                                
                                                
                                                Rs.<?php echo $totals=$total+$gst; ?>
                                                </td>
                                            </tr> -->
                                            
                                        </tbody>
                                    </table>
                                    <?php
                                     $get_status="select DISTINCT order_status,invoice_no,txnid,payment_status from customer_orders where order_id=$order_id";
                                     $run_status=mysqli_query($con,$get_status);
                                     while ($row_status=mysqli_fetch_array($run_status)) {
                                         $product_status=$row_status['order_status']; 
                                         $product_invoice=$row_status['invoice_no'];
                                         $txnids=$row_status['txnid'];
                                         $payment_status=$row_status['payment_status'];
                                         ?>
                                    <div class="text-left m-2">
                                    <?php
                                    if($product_status=="c" || $product_status=="cancel")
                                    {?>

                                        <span class="ml-2 badge badge-pill badge-soft-danger font-size-10" > Cancel Order</span> 
                                        <?php  
                                    }
                                    else if($product_status=="r" || $payment_status=="returned")
                                    {
                                        ?>
                                        <span class="ml-2 badge badge-pill badge-soft-warning font-size-10" > Returned Order</span> 
                                        <?php 
                                    }
                                    else if($product_status=="f" || $payment_status=="failed")
                                    {
                                        ?>
                                        <span class="badge badge-pill badge-soft-danger font-size-10" >Payment Failed</span>
                                        <?php
                                    }
                                    else{
                                        
                                    if ($product_status=="o") {
                                        ?>
                                        <a href="Generate_bill.php?or_id=<?php echo $order_id; ?>"><input type="button" class="btn btn-primary"  value="Bill" ></a>
                                            <a href="cancel_order.php?del_id=<?php echo $order_id; ?>&status=c" id="btn-delete"><input type="button" class="btn btn-danger"  value="Cancel Order" ></a>
                                            <a href="delete.php?del_id=<?php echo $order_id; ?>&status=p&txnid=<?php echo $txnids ?>&invoiceno=<?php echo $product_invoice ?>&total=<?php echo $totals ?>"><input type="button" class="btn btn-primary"  value="Packed" ></a> 
                                            <span class="ml-2 badge badge-pill badge-soft-success font-size-10" > Ordered And Approved</span>

                                    <?php
                                        }
                                    if($product_status=="p")
                                    {
                                    ?>
                                    <a href="Generate_bill.php?or_id=<?php echo $order_id; ?>"><input type="button" class="btn btn-primary"  value="Bill"></a>
                                        <a href="cancel_order.php?del_id=<?php echo $order_id; ?>&status=c" id="btn-delete"><input type="button" class="btn btn-danger"  value="Cancel Order" ></a>
                                        <a href="delete.php?del_id=<?php echo $order_id; ?>&status=s&txnid=<?php echo $txnids ?>&invoiceno=<?php echo $product_invoice ?>&total=<?php echo $totals ?>"><input type="button" class="btn btn-primary" value="Shipped" > </a>
                                        <span class="ml-2 badge badge-pill badge-soft-success font-size-10" > Packed</span>    

                                    <?php 
                                    }
                                    if ($product_status=="s") {
                                        ?>
                                        <a href="Generate_bill.php?or_id=<?php echo $order_id; ?>"><input type="button" class="btn btn-primary"  value="Bill" ></a>
                                        <a href="cancel_order.php?del_id=<?php echo $order_id; ?>&status=c" id="btn-delete"><input type="button" class="btn btn-danger"  value="Cancel Order"  id=""></a>
                                        <a href="delete.php?del_id=<?php echo $order_id; ?>&status=d&txnid=<?php echo $txnids ?>&invoiceno=<?php echo $product_invoice ?>&total=<?php echo $totals ?>"><input type="button" class="btn btn-primary"  value="Delivered" ></a>
                                            <span class="ml-2 badge badge-pill badge-soft-success font-size-10" > Shipped</span> 
                                    <?php
                                    } 
                                    if ($product_status=="d") {
                                      
                                
                                        ?>
                                        <a href="Generate_bill.php?or_id=<?php echo $order_id; ?>"><input type="button" class="btn btn-primary"  value="Bill" ></a>
                                        <span class="ml-2 badge badge-pill badge-soft-success font-size-10" > Delivered</span> 
                                    <?php
                                    }
                                    }
                                    ?>
                            
                            </div>
                                </div>
<?php 
                                     }
}
?>    
