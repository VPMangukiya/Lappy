<?php
include("db.php");
    $id=$_GET['id'];
    $os="c";
    //$del="delete from customer_orders  where id = $id";
    $update="update customer_orders set order_status='".$os."' where order_id='".$id."' and order_status = 'o'";

    if(mysqli_query($con,$update))
    {
        echo '<script>
            swal({
            title: "Cancel Order successfully..",                              
            icon: "success",
          });
          </script>';
          header("location:yourorder.php");
        //echo '<script>alert("Add category sucessfully")</script>';
       // header("location:Login.php")
    }
?>