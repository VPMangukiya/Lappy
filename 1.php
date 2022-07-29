<?php
include("db.php");

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
    </head>
    <body>
       
        <form action="#" method="post" enctype="multipart/form-data">
       
            <input type="file" name="uploadfile" required="">
        <input type="submit" name="submit" value="upload">
        <input type="submit" name="display" value="Display">
       
         </form>
        <?php
error_reporting(0);
?>
<?php
  $msg = "";
 
  // If upload button is clicked ...
  if (isset($_POST['submit']))
  {
 
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];    
        $folder = "image/".$filename;

 
        // Get all the submitted data from the form
        $sql = "insert into tbl_product(product_Id,product_image) values (1,'$filename')";
 
        // Execute query
        mysqli_query($con, $sql);
         
        // Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder))  
        {
            echo "Image upload successfully";
           
            //$msg = "Image uploaded successfully";
        }
        else
        {
            echo "Image not uploaded";
            //$msg = "Failed to upload image";
        }
  }
  /*else if(isset($_POST["display"]))
  {
    $query= mysqli_query($conn,"select image from tbl_image");

while ($row = mysqli_fetch_array($query)) {    

      echo "<img src='image/".$row['image']."' >";  
     
 }  
  }*/
  else
  {
      echo "error";
  }

//echo '<img src="image/'.$query.'.jpg">';


mysqli_close($conn);
 
?>

    </body>
</html>
