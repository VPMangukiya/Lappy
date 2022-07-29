<?php
include("db.php");
    $id=$_GET['id'];
    $del="delete from tbl_product_category where category_id = $id";
    if(mysqli_query($con,$del))
    {
        echo '<script>
            swal({
            title: "Add Category successfully..",                              
            icon: "success",
          });
          </script>';
          header("location:view_cate.php");
        //echo '<script>alert("Add category sucessfully")</script>';
       // header("location:Login.php")
    }
?>