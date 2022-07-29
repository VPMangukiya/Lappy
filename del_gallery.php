<?php
include("db.php");
    $id=$_GET['id'];
    echo $id;
    $del="delete from tbl_gallery where gallery_id = $id";
    $result = mysqli_query($con,$del);
    if($result)
    {
       /* echo '<script>
            swal({
            title: "Add Category successfully..",                              
            icon: "success",
          });
          </script>';*/
          header("location:view_gallery.php");
        //echo '<script>alert("Add category sucessfully")</script>';
       // header("location:Login.php")
    }
    else
    {echo "else";}
?>