<?php
include("adminheader.php");
ob_start();
   /* session_start();

    if(!isset($_SESSION['aname']))
{
    header("location:Login.php");
}*/
//include("header.php");
//include("Admin_Dashboard.php");
include("db.php");
?>
   <!-- 
<form method="POST" action="#" enctype="multipart/form-data">
    <div class="container">
      <br><br><br>
        <div class="box" style="margin-bottom: 0px;">
              <div class="form-row">
                  <h1 style="margin-left:40%; color:grey;">gallery</h1>
                  <hr>
              </div>-->
              <br>  <br>  <br>
<div class="container">
  <div class="row">
      <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Add Gallary Image</h4>
                             </div>
                        </div><hr>
                        <form method="POST" actio="#" enctype="multipart/form-data">

                            <div class="form-row">

                              <div class="form-group col-md-10">
                                <label for="inputImage">Image</label>
                                <input type="file" name="uploadfile" class="form-control" required >
                              </div>
                            </div>

                            <div class="form-row">
                              <div class="form-group col-md-10">
                                <label for="inputBrand">Gallery name</label><br>
                                <input type="text" name="name" class="form-control" id="inputBrand4" placeholder="Enter Brand Name" pattern="^[a-zA-Z]*$" title="only alphabate" required>
                              </div>
                            </div>

                            <button type="submit" name="add" class="btn btn-primary" style="margin-left:2px;">Add</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
<?php
include("adminfooter.php");
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["add"]))
{
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];    
  $folder = "./image/".$filename;

            // Insert image content into database 
            $insert ="insert into tbl_gallery (gallery_name, gallery_img) VALUES ('".$_POST['name']."','$filename')";             
           
           if(mysqli_query($con,$insert))
            { 
                move_uploaded_file($tempname, $folder);
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                echo '<script>
                swal({
                title: "Image uploaded successfully...",                              
                icon: "success",
              });
              </script>';
                //echo "<script>alert('insert')</script>";

            }else
            { 
                $statusMsg = "File upload failed, please try again."; 
                echo '<script>
                swal({
                title: "Oops..! Please Try Again!",                              
                icon: "error",
              });
              </script>';
                //echo "<script>alert('error')</script>";
            }  
       

}

ob_end_flush();
?>