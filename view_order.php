<?php
include("adminheader.php");
include("db.php");
    ?>

          
            <form action="view-order.php" method="POST">
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">View Order</h4> 
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <table id="employee_data" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Billing Name</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Payment Method</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                               
                                                
                                            </tr>
                                            </thead>
                                            
                                            <tbody>
                                            
                                            <?php
                                        
                                              $select_cat="SELECT * FROM orders ORDER BY id DESC";
                                              $run_cart=mysqli_query($con, $select_cat);
                                            while ($row_cart=mysqli_fetch_array($run_cart)) {
                                                $id=$row_cart["id"];
                                                    ?>
                                                    <tr>
                                                <td><?php echo $row_cart["id"]?> </td>
                                                <td><?php echo $row_cart["customer_name"]?></td>
                                                
                                                <?php 
                                                $select_cats="SELECT DISTINCT order_date FROM customer_orders WHERE order_id='$id' ORDER BY order_id DESC";
                                                $run_carts=mysqli_query($con, $select_cats);
                                                while ($row_carts=mysqli_fetch_array($run_carts)) {
                                                    $date=$row_carts["order_date"]; 
                                                    $orgDate = $date;  
                                                    $newDate = date("d-M-Y", strtotime($orgDate));  
                                                ?>
                                                <td><?php echo $newDate; ?></td>
                                                <?php
                                                } 
                                                ?>

                                                <?php
                                                $bill=0;
                                                $total=0;
                                                $select_total="SELECT * FROM customer_orders WHERE order_id='$id' ORDER BY order_id DESC ";
                                                $run_total=mysqli_query($con,$select_total);
                                                while ($row_total=mysqli_fetch_array($run_total)) {
                                                    
                                                    $qty=$row_total['qty'];
                                                    $product_id=$row_total['product_id'];
                                                    $select_totals="SELECT * FROM tbl_product WHERE product_id='$product_id' ORDER BY product_id DESC";
                                                        $run_totals=mysqli_query($con,$select_totals);
                                                        while ($row_totals=mysqli_fetch_array($run_totals)) {
                                                            $bill=$row_totals['price']*$qty;

                                                        }
                                                            $total+=$bill;
                                                       
                                                        $totals=$total;
                                                   

                                                }
                                                
                                                ?>
                                                <td>Rs.<?php echo  $totals; ?></td> 
                                                <?php 
                                                $select_pays="SELECT DISTINCT txnid,payment_status FROM customer_orders WHERE order_id='$id' ORDER BY order_id DESC ";
                                                $run_pays=mysqli_query($con, $select_pays);
                                                while ($row_pays=mysqli_fetch_array($run_pays)) {
                                                    $pay=$row_pays["txnid"]; 
                                                        if($pay=="")
                                                        {
                                                        ?>
                                                        
                                                        <td><span class="badge badge-pill badge-soft-success font-size-10" >Cash On Delivery</span></td>
                                                        <?php
                                                        
                                                        }
                                                        else{
                                                            ?>
                                                            <td><span class="badge badge-pill badge-soft-success font-size-10" > Online Payment</span></td>
                                                              <?php
                                                        }
                                            }
                                                ?> 
                                                 <?php 
                                                $select_payss="SELECT DISTINCT order_status FROM customer_orders WHERE order_id='$id' ORDER BY order_id DESC ";
                                                $run_payss=mysqli_query($con, $select_payss);
                                                while ($row_payss=mysqli_fetch_array($run_payss)) {
                                                    $order_status=$row_payss["order_status"]; 
                                                    if ($order_status=="o") {
                                                        ?>
                                                           <td><span class=" badge badge-pill badge-soft-success font-size-10" > Ordered And Approved</span></td>
                                                    <?php
                                                        }
                                                    else if($order_status=="p")
                                                    {
                                                    ?>
                                                          <td><span class=" badge badge-pill badge-soft-success font-size-10" > Packed</span>  </td>
                                                    <?php 
                                                    }
                                                    else if($order_status=="s") {
                                                        ?>
                                                           <td><span class=" badge badge-pill badge-soft-success font-size-10" > Shipped</span> </td>
                                                    <?php
                                                    }
                                                    else if($order_status=="d")
                                                    {
                                                        ?>
                                                         <td> <span class=" badge badge-pill badge-soft-success font-size-10" > Delivered</span> </td>
                                                        <?php
                                                    }
                                                    else if($order_status=="c")
                                                    { 
                                                      ?>  
                                                      <td><span class="badge badge-pill badge-soft-danger font-size-10"> Cancal Order</span></td>
                                                    <?php
                                                    } 
                                                    else if($order_status=="r")
                                                    {
                                                        ?>  
                                                      <td><span class="badge badge-pill badge-soft-warning font-size-10" > Returned  Order</span></td>
                                                    <?php
                                                    }
                                                    else if($order_status=="f")
                                                    {
                                                        ?>
                                                        <td><span class="badge badge-pill badge-soft-danger font-size-10" >Payment Failed</span></td>
                                                        <?php
                                                    }
                                                    } 
                                                    ?>
                                                <td><input type="button" name="view" value="Order Details" id="<?php echo $row_cart["id"]?>" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light view_data"  /></td>
                                               
                                            </tr>
                                                <?php 
                                                
                                                 }?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                   
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
               
                <!-- Modal -->
                
                <div class="modal fade exampleModal" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="employee_detail">
                            
                            </div>

                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>                                
                           
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <script>  
                    $(document).on('click','.view_data', function(){  
                            var order_id = $(this).attr("id");  
                            $.ajax({  
                                    url:"select_1.php",  
                                    method:"post",  
                                    data:{order_id:order_id},  
                                    success:function(data){  
                                        $('#employee_detail').html(data);  
                                        $('#dataModal').modal("show");  
                                    }  
                            });  
                        });  
                </script> 
        <?php
include 'adminfooter.php';
?>