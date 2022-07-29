<?php 
ob_start();
include("header.php");
include("db.php");
if(!isset($_SESSION['uname']))
{
    echo "<script>window.location.href='Login.php';</script>";
}
if(isset($_GET['pid']))
{
    $pid = $_GET['pid'];
}
$getdata="select * from customer_orders where order_id='$pid' and customer_email='".$_SESSION['uname']."'";
        

?>
<br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                                <h4>My Orders...</h4>
                        </div>
                    </div><hr>
                    <form action="#">
                    <?php
                    if($result = mysqli_query($con,$getdata))
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row=mysqli_fetch_array($result))
                            {
                                 $id1=$row['id'];

                                $oid=$row['order_id'];
                                $txnid=$row['txnid'];
                                $bill=$row['invoice_no']; 
                                $date=$row['order_date'];
                                $orgDate = $date;  
                                $newDate = date("d-M-Y", strtotime($orgDate));  
                                $qty=$row['qty']; 
                                $ostatus=$row['order_status'];
                                $paystatus=$row['payment_status'];
                                $opid = $row['product_id'];

                                $spn = "select * from tbl_product where product_id = '$opid'";
                                $rpn = mysqli_query($con,$spn);
                                while($rw=mysqli_fetch_array($rpn))
                                {
                                    $gpn = $rw['model_name'];
                                    $gpi = $rw['product_image'];
                                }
                                        ?>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Order ID:</label>
                                            <div class="col-sm-10">
                                                 <span class=" badge badge-pill badge-soft-success font-size-10" ><?php echo $oid;?></span>
                                                
                                            </div>
                                        </div>
<hr>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Transaction ID:</label>
                                            <div class="col-sm-10">
                                                <span class=" badge badge-pill badge-soft-success font-size-10" ><?php echo $txnid;?></span>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Invoice ID:</label>
                                            <div class="col-sm-10">
                                                <span class=" badge badge-pill badge-soft-success font-size-10" ><?php echo $bill;?></span>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Order Date:</label>
                                            <div class="col-sm-10">
                                                <span class=" badge badge-pill badge-soft-success font-size-10" ><?php echo $newDate;?></span>
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">product name:</label>
                                            <div class="col-sm-10">
                                                <span class=" badge badge-pill badge-soft-success font-size-10" ><?php echo $gpn;?> <img src="image/<?php echo $gpi; ?>" width="100" height="100"> </span>
                                                
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Quantity:</label>
                                            <div class="col-sm-10">
                                            <span class=" badge badge-pill badge-soft-success font-size-10" >
                                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $qty;?>">
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Order Status:</label>
                                            <div class="col-sm-10">
                                               <?php
                                               if ($ostatus=="o") {
                                                        ?>
                                                           <span class=" badge badge-pill badge-soft-success font-size-10" > Ordered And Approved</span>
                                                    <?php
                                                        }
                                                    else if($ostatus=="p")
                                                    {
                                                    ?>
                                                          <span class=" badge badge-pill badge-soft-success font-size-10" > Packed</span>  
                                                    <?php 
                                                    }
                                                    else if($ostatus=="s") {
                                                        ?>
                                                           <span class=" badge badge-pill badge-soft-success font-size-10" > Shipped</span> 
                                                    <?php
                                                    }
                                                    else if($ostatus=="d")
                                                    {
                                                        ?>
                                                         <span class=" badge badge-pill badge-soft-success font-size-10" > Delivered</span> 
                                                        <?php
                                                    }
                                                    else if($ostatus=="c")
                                                    { 
                                                      ?>  
                                                      <span class="badge badge-pill badge-soft-danger font-size-10"> Cancal Order</span>
                                                    <?php
                                                    } 
                                                    else if($ostatus=="r")
                                                    {
                                                        ?>  
                                                     <span class="badge badge-pill badge-soft-warning font-size-10" > Returned  Order</span>
                                                    <?php
                                                    }
                                                    else if($ostatus=="f")
                                                    {
                                                        ?>
                                                        <span class="badge badge-pill badge-soft-danger font-size-10" >Payment Failed</span>
                                                        <?php
                                                    }
                                                    ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Payment Status:</label>
                                            <div class="col-sm-10">
                                             <span class="badge badge-pill badge-soft-danger font-size-10" ><?php echo $paystatus;?></span>
                                                
                                            </div>
                                        </div>

                                        <b><hr></b>
                                        
                                    <?php }}}?>
<br>                            
                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <?php
                                    if ($ostatus=="o") {
                                        ?>
                                         <a href="del_order.php?id=<?php echo $pid; ?>"><input type="button" class="btn btn-primary"  value="Cancel order" ></a>
                                            
                                        <!-- </div> -->
                                    <?php } 
                                    if ($ostatus=="o" || $ostatus=="p" || $ostatus=="s" || $ostatus=="d") {
                                        ?>
                                        <!-- <div class="form-group col-md-6"> -->
                                        <a href="Generate_bill.php?or_id=<?php echo $pid; ?>"><input type="button" class="btn btn-primary"  value="Bill" ></a>
                                        
                                    <?php } ?>
                                    </div>
                                        <div class="form-group col-md-6">
                                        
                                            <a href="feedback.php" class="btn btn-primary" style="margin-left:190px;"><i class="fas fa-comment-dots"></i>Give Feedback</a>
                                        </div>

                                    </div>

                    </form>
</div>
</div>
</div>
</div>
</div>
<br>
<?php 
include("footer.php");
ob_end_flush();
?>