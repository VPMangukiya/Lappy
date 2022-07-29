<?php
    require 'header.php';
    require 'db.php';
    if(!isset($_SESSION['uname'])){
        //header('location: Login.php');
        echo "<script>window.location.href='index.php';</script>";
    }
   
   
   // $user_id=$_SESSION['uname'];
    $user_products_query="select p.product_id,p.model_name,p.brand_name,p.product_image ,p.price,c.quantity,c.total from tbl_product  as p inner join cart  as c on c.product_id=p.product_id where c.user_id = '".$_SESSION['uid']."'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
    
        echo '<script>
        swal({
        title: "oops! cart is empty.",                              
        icon: "error",
      });
      </script>';
    }
    else{
        while($row=mysqli_fetch_array($user_products_result)){
            $sum=$sum+$row['total']; 
       }
    }
?>

        <div>
        <?php 
               require 'header.php';
            ?>
            <br>
            <div class="container" style="margin-top:30px;">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                        <th>Item Number</th><th>Image</th><th>Model Name</th><th>Brand Name</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           $qty=$row['quantity'];
                           $id=$row['product_id'];
                           $price=$row['price'];
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th>
                            <th><img src="image/<?php echo $row['product_image']?>" width="100" height="100"></th>
                            <th><?php echo $row['model_name']?></th>
                            <th><?php echo $row['brand_name']?></th>
                            <th><?php echo $row['price']?></th>
                            <th><button name="dec"><a href='dec_cart.php?qty=<?php echo $qty; ?>&id=<?php echo $id; ?>&price=<?php echo $price; ?>'>-</a></button>
                            <input type="number" name="qty" value="<?php echo $qty; ?>" style="width:50px">
                            <button name="inc"><a href='inc_cart.php?qty=<?php echo $qty; ?>&id=<?php echo $id; ?>&price=<?php echo $price; ?>'>+</a></button></th>
                            <th><?php echo $row['total']?></th>
                            <th><a href='rm_cart.php?id=<?php echo $row['product_id'] ?>'>Remove</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th><th></th><th></th><th></th><th></th>
                            <th><b>Total</b></th><th><b>Rs <?php echo $sum;?>/-</b></th><th>
                            <form name="postForm" action="pgRedirect.php" method="POST">
                                <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID"
                                    autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                                <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID"
                                    autocomplete="off" value="<?php echo $_SESSION['uid']; ?>">
                                <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID"
                                    autocomplete="off" value="Retail">
                                <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID"
                                    autocomplete="off" value="WEB">
                                    <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text"
                                                        name="TXN_AMOUNT" value="<?php echo $sum; ?>">
                                <input type="submit" id="CHANNEL_ID"  name="submit" value="Confirm Order">    
                                    </form>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
           
        </div>
        <?php include 'footer.php'; ?>