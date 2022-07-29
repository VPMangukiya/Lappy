<?php
    require 'header.php';
    require 'db.php';
    if(!isset($_SESSION['uname'])){
        //header('location: Login.php');
        echo "<script>window.location.href='index.php';</script>";
    }
    //$user_id=$_SESSION['uname'];
    $user_products_query="select p.product_id,p.model_name,p.brand_name,p.product_image ,p.price from tbl_product  as p inner join wish_list  as w on w.product_id=p.product_id where w.user_id = '".$_SESSION['uid']."'";
    $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
    $no_of_user_products= mysqli_num_rows($user_products_result);
    $sum=0;
    if($no_of_user_products==0){
        //echo "Add items to cart first.";
        echo '<script>
        swal({
        title: "Add items to wish list first.",                              
        icon: "error",
      });
      </script>';
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
                        <th>Item Number</th><th>Image</th><th>Model Name</th><th>Brand Name</th><th></th><th></th>
                        </tr>
                       <?php 
                        $user_products_result=mysqli_query($con,$user_products_query) or die(mysqli_error($con));
                        $no_of_user_products= mysqli_num_rows($user_products_result);
                        $counter=1;
                       while($row=mysqli_fetch_array($user_products_result)){
                           
                           $id=$row['product_id'];
                           
                         ?>
                        <tr>
                            <th><?php echo $counter ?></th>
                            <th><img src="image/<?php echo $row['product_image']?>" width="100" height="100"></th>
                            <th><?php echo $row['model_name']?></th>
                            <th><?php echo $row['brand_name']?></th>
                            <th><a href='rm_list.php?id=<?php echo $row['product_id'] ?>'>Remove</a></th>
                            <th><a  href='w_add_cart.php?wid=<?php echo $id; ?>'>Add to cart</a></th>
                        </tr>
                       <?php $counter=$counter+1;}?>
                        
                    </tbody>
                </table>
            </div>
            <br><br><br><br><br><br><br><br><br><br>
           
        </div>
        <?php include 'footer.php'; ?>