<html>
<body>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="text" name="name">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
</body>
<?php 
// Include the database configuration file  
require_once 'db.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        
        $path = basename($_FILES["image"]["name"]);

       // $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($path, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert ="insert into tbl_gallery (gallery_name, gallery_img) VALUES ('".$_POST['name']."','$imgContent')"; 
             
            if(mysqli_query($con,$insert)){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 

} 
 
// Display status message 
echo $statusMsg; 
?>
<?php
$result = mysqli_query($con,"select gallery_img FROM tbl_gallery ORDER BY gallery_id DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ 
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['gallery_img'] ).'"/>';

}?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
</html>

