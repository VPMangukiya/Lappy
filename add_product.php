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

<?php
      $cateidErr=$brandErr=$modelErr=$processorErr=$ramErr=$storageErr=$colorErr=$sizeErr=$priceErr=$descriptionErr="";
     $cateid=$brand=$model=$processor=$ram=$storage=$color=$size=$price=$description=$imgErr="";
      if ($_SERVER["REQUEST_METHOD"] == "POST")
      {
          //category validation
          if ($_POST["cateid"]=="") 
          {
              $cateidErr = "Category type is required.";
          } 
         /* else 
          {
              $cateid = test_input($_POST["category_id"]);
              // check if name only contains letters
              if (!preg_match("/^[1-9]{1}[0-9]{1,3}*$/", $cateid))
              {
                  $cateidErr = "Enter only alphabat.";
              }
          }*/

         /* if (! file_exists($_FILES[""]["tmp_name"])) {
              $response = array(
              "type" => "error",
              "message" => "Choose image file to upload."
                 );
          } */ 

          //image validation
          if(empty($_FILES["uploadfile"]))
          {
            $imgErr ="image is required";
          }

          //brand validation

          if (empty($_POST["brand"])) 
          {
              $brandErr = "Brand name is required";
          } 
          else 
          {
              $brand = test_input($_POST["brand"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z ]*$/", $brand))
              {
                  $brandErr = "Enter only alphabat";
              }
          }

          //model validation

          if (empty($_POST["model"])) 
          {
              $modelErr = "Model name is required";
          } 
          else 
          {
              $model = test_input($_POST["model"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z1-9-]*$/", $model))
              {
                  $modelErr = "Enter Only Latter And Digit";
              }
          }
        
          //processor validation

          if (empty($_POST["processor"])) 
          {
              $processorErr = "Processor name is required";
          }
          else 
          {
              $processor = test_input($_POST["processor"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z1-9-]*$/", $processor))
              {
                  $processorErr = "Enter Only Latter And Digit ";
              }
          }

          //Ram validation

          if (empty($_POST["ram"])) 
          {
              $ramErr = "RAM type is required";
          }
          else 
          {
              $ram = test_input($_POST["ram"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z1-9-]*$/", $ram))
              {
                  $ramErr = "Enter Only Latter And Digit";
              }
          }

          //Storage validation

          if (empty($_POST["storage"])) 
          {
              $storageErr = "Storage is required";
          }
          else 
          {
              $storage = test_input($_POST["storage"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z1-9-]*$/", $storage))
              {
                  $storageErr = "Enter Only Latter And Digit";
              }
          }

          //Color validation

          if (empty($_POST["color"])) 
          {
              $colorErr = "Color name is required";
          }
          else 
          {
              $color = test_input($_POST["color"]);
              // check if name only contains letters
              if (!preg_match("/^[a-zA-Z]*$/", $color))
              {
                  $colorErr = "Enter only alphabat";
              }
          }
          
          //Size validation

          if (empty($_POST["size"])) 
          {
              $sizeErr = "Size is required";
          }
          else 
          {
              $size = test_input($_POST["size"]);
              // check if name only contains letters
              if (!preg_match("/^[0-9][a-zA-Z]*$/", $size))
              {
                  $sizeErr = "";
              }
          }

          //Price validation

          if (empty($_POST["price"])) 
          {
              $priceErr = "Price is required";
          }
          else 
          {
              $price = test_input($_POST["price"]);
              // check if name only contains letters
              if (!preg_match("/^[0-9]*$/", $price))
              {
                  $priceErr = "Enter only digits value";
              }
          }

        //Description validation

        if (empty($_POST["desc"])) 
        {
           $descriptionErr = "Description is required";
        }
        else 
        {
              //$description = test_input($_POST["desc"]);
                        // check if name only contains letters
              /*if (!preg_match("/^[a-zA-Z][1-9]*$/", $description))
              {
                    $descriptionErr = "Not Special Character Use";
             }*/   
        }

      }
      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<br><br><br>


<div class="container">
    <div class="row">
        <div class="col-md-17 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Add Laptop</h4>
                             </div>
                        </div><hr>
                        
                        <form method="POST" action="#" enctype="multipart/form-data">         
                        <div class="form-row">
                              <div class="form-group col-md-6">
                                  <label for="inputBrand">Category Type</label><br>
                                  <select name="cateid" id = "id" size="1" style="margin-right:32px;margin-left:7px;" required>
                                  <option value="" >Select Laptop Category</option>
                                    <?php 
                                    $result= mysqli_query($con,"select * from tbl_product_category");
                                    while($row=mysqli_fetch_array($result))
                                    {      
                                    ?>     
                                    <option value="<?php echo $row["category_id"]?>"><?php echo $row["category_type"]?></option>
                                  
                                    <?php   }?>
                                  </select>
                              </div>
                            
                            
                        
                            <div class="form-group col-md-6">
                                  <label for="inputImage" style="margin-left:15px;">Image</label>
                                  <input type="file" name="uploadfile" class="form-control"  style="margin-right:15px;margin-left:1px;" accept="image/jpeg" required><!--style="background: none;
                margin:20px auto;border: 1px solid green;padding:auto;outline:none;color: gray;border-radius: 10px;transition: 0.25s;width:450px;" -->
                                
                              </div>
                            </div>

<!--
                            <div class="col-md-6">
                              <div class="form-group">
                                <span style="color:red;"><?php //echo $cateidErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo $imgErr; ?></span>
                            </div>
                          </div>
-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                  <label for="inputBrand" style="margin-left:10px;">Brand</label>
                                  <input type="text"  style="margin-right:32px;margin-left:7px;" name="brand" class="form-control" id="inputBrand4" placeholder="Enter Brand Name" pattern="^[a-zA-Z ]*$" title="Enter Only Latter" required>
                              </div>       
               
                            <div class="form-group col-md-6">
                                  <label for="inputModel4" style="margin-left:15px;">Model</label>
                                  <input type="text" style="margin-right:15px;margin-left:1px;" name="model" class="form-control" id="inputModel4" placeholder="Enter Model Name" pattern="^[a-zA-Z1-9-]*$" title="Enter Latters and digits only" required>
                                </div>       
                            </div>
                          </div>
                      
                       
<!--
                          <div class="form-row" style="padding-top: px;">
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo $brandErr;?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo $modelErr; ?></span>
                            </div>
                          </div> 
-->                     
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                    <label for="inputProcessor" style="margin-left:15px;">Processor</label><br>
                                    <input type="text" name="processor" class="form-control" id="inputProcessor4" placeholder="Enter Processor Name" style="margin-right:32px;margin-left:7px;" pattern="^[a-zA-Z1-9-]*$" title="Enter Latter and digit only" required>
                              </div>
      
                            <div class="form-group col-md-6">
                                  <label for="inputRam" style="margin-left:15px;">RAM</label><br>
                                  <input type="text" name="ram" class="form-control" id="inputBrand4" placeholder="Enter RAM Type" style="margin-right:15px;margin-left:1px;" pattern="^[a-zA-Z1-9-]*$" title="Enter Latter and digit only" required>
                              </div>
                            </div>
               
<!--
                          <div class="form-row" style="padding-top: px;">
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo //$processorErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo //$ramErr; ?></span>
                            </div>
                          </div> 
-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                  <label for="inputStorage" style="margin-left:15px;">Storage</label><br>
                                  <input type="text" name="storage" class="form-control" id="inputBrand4" placeholder="Enter Storage Type" style="margin-right:32px;margin-left:7px;" pattern="^[a-zA-Z1-9-]*$" title="Enter Latter and digit only" required>
                              </div>       
        
                            <div class="form-group col-md-6">
                                  <label for="inputColor" style="margin-left:15px;">Color</label><br>
                                  <input type="text" name="color" class="form-control" id="inputBrand4" placeholder="Enter Color" style="margin-right:15px;margin-left:1px;" pattern="^[a-zA-Z]*$" title="Enter Latters only" required>
                              </div>  
                            </div>
                      

<!--
                          <div class="form-row" style="padding-top: px;">   
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo $storageErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php// echo $colorErr; ?></span>
                            </div>
                          </div>
-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                  <label for="inputSize" style="margin-left:15px;">Size</label>
                                  <input type="text" name="size" class="form-control" id="inputBrand4" placeholder="Enter Size" style="margin-right:32px;margin-left:7px;" pattern="^[0-9]{1,}[a-zA-Z]*$" title="Enter Latter and digit only" required>
                              </div>
                 
                            <div class="form-group col-md-6">
                                  <label for="inputprice" style="margin-left:15px;">Price</label>
                                  <input type="text" name="price" class="form-control" placeholder="Enter Price"   style="margin-right:15px;margin-left:1px;" pattern="^[0-9]*$" title="Enter digits only" required>
                              </div>  
                            </div>
                          
<!--
                          <div class="form-row" style="padding-top: px;">   
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php// echo $sizeErr; ?></span>
                            </div>

                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php //echo $priceErr; ?></span>
                            </div>
                          </div>
-->
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                  <label for="inputdescription"  style="margin-left:15px;">Description</label><br>
                                  <textarea  name="desc" rows="5" cols="60" style="margin-left:15px;" required></textarea><!--style="background: none;text-align:center;margin:20px auto;border: 1px solid green;padding: 14px 14px;outline:none;color: gray;border-radius: 25px;transition: 0.25s;width:450px;" -->
                              </div>
                            </div>  
<!--
                          <div class="form-row" style="padding-top: px;">   
                            <div class="form-group col-md-6">
                                <span style="color:red;"><?php// echo $descriptionErr; ?></span>
                            </div>
-->
<br>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                                  <button type="submit" name="add" class="btn btn-primary" style="margin-left:15px;">Add</button>
                              </div>
                            </div>
                          
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

      if($cateidErr == "" && $brandErr == "" && $modelErr == "" && $processorErr == "" && $ramErr == "" && $storageErr == "" && $colorErr == "" && $sizeErr == "" && $priceErr == "" && $descriptionErr == "")
        { 
            
            // Insert image content into database 
            $insert ="insert into tbl_product(product_cate_id,product_image,brand_name,model_name,processor,ram,storage,color,price,size,description) values('".$_POST['cateid']."','$filename','".$_POST['brand']."','".$_POST['model']."','".$_POST['processor']."','".$_POST['ram']."','".$_POST['storage']."','".$_POST['color']."','".$_POST['price']."','".$_POST['size']."','".$_POST['desc']."')"; 
             
            if(mysqli_query($con,$insert))
            { 
                move_uploaded_file($tempname, $folder);
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                echo '<script>
                swal({
                title: "Product is Inserted..",                              
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
}

ob_end_flush();
?>