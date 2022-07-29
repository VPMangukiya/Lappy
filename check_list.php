<?php
    function check_if_added_to_list($Product_id){
        //session_start();    
        require 'db.php';
        $user_id=$_SESSION['uid'];
        $product_check_query="select * from wish_list where Product_id='$Product_id' and user_id='$user_id' and status='added'";
        $product_check_result=mysqli_query($con,$product_check_query) or die(mysqli_error($con));
        $num_rows=mysqli_num_rows($product_check_result);
        if($num_rows>=1)return 1;
        return 0;
    }
?>
