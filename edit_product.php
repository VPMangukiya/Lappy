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
              if (!preg_match("/^[a-zA-Z0-9-]*$/", $model))
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
              if (!preg_match("/^[a-zA-Z0-9-]*$/", $processor))
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
              if (!preg_match("/^[a-zA-Z0-9-]*$/", $storage))
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
              if (!preg_match("/^[a-zA-Z-]*$/", $color))
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
              if (!preg_match("/^[0-9][a-zA-Z-]*$/", $size))
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
    $id=$_GET['id'];
    $select = "select * from tbl_product where product_id=$id";
   // $pro="select p.product_id,c.category_type,p.brand_name,p.product_cate_id,p.model_name,p.ram,p.product_image,p.processor,p.size,p.price,p.storage,p.color,p.description from tbl_product as p inner join tbl_product_category as c on p.product_cate_id = c.category_id";
        $result = mysqli_query($con, $select);
        $pid=$pcid=$bn=$mn=$pi=$pro=$ram=$storage=$color=$size=$price=$desc="";

       while($row=mysqli_fetch_array($result))
                    {
                        $pid=$row['product_id'];
                        $pcid=$row['product_cate_id'];
                        //$pci=$row['product_cate_id'];
                        $pi=$row['product_image'];
                        $bn=$row['brand_name'];
                        $mn=$row['model_name'];
                        $pro=$row['processor'];
                        $ram=$row['ram'];
                        $storage=$row['storage'];
                        $color=$row['color'];
                        $size=$row['size'];
                        $price=$row['price'];
                        $desc=$row['description'];

                    }
                 
?>
<!--
<form method="POST" action="#" enctype="multipart/form-data">
    <div class="container">
      <br><br><br>
        <div class="box" style="margin-bottom: 0px;">
              <div class="form-row">
                  <h1 style="margin-left:35%; color:grey;">Update Product</h1>
                  <hr>
              </div>-->
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-17 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Edit Laptop</h4>
                             </div>
                        </div><hr>
                        <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="inputBrand"></label><br>
                                        <!-- <input type="text" name="brand" class="form-control" id="inputBrand4" value="<?php echo $bn; ?>"> -->
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputModel4"></label>
                                        <img src="image/<?php echo $pi?>" width="100" height="100">
                                      </div>
                                    </div>
                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="inputBrand">Category Id</label><br>
                                      <!--  <select name="cateid" id = "id" size="1">
                                        <option value="">Select Laptop Category</option>
                                          <?php 
                                          // $result= mysqli_query($con,"select * from tbl_product_category");
                                          // while($row=mysqli_fetch_array($result))
                                          // {      
                                          ?>     
                                          <option value="<?php //echo $row["category_id"]?>"><?php //echo $row["category_type"]?></option>
                                        
                                        // <?php //  }?>
                                        </select> -->
                                        <input type="text" name="cateid" value="<?php echo $pcid; ?>">
                                        
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputImage">Image</label>
                                        <input type="file" name="uploadfile" value="<?php echo $pi; ?>" accept="image/jpeg">
                                      </div>
                                    </div>

                                    <div class="form-row" style="padding-top: px;">
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $cateidErr; ?></span>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $imgErr; ?></span>
                                      </div>
                                    </div>

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="inputBrand">Brand</label><br>
                                        <input type="text" name="brand" class="form-control" id="inputBrand4" value="<?php echo $bn; ?>">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputModel4">Model</label>
                                        <input type="text" name="model" class="form-control" id="inputModel4" value="<?php echo $mn; ?>">
                                      </div>
                                    </div>

                                    <div class="form-row" style="padding-top: px;">
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $brandErr; ?></span>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $modelErr; ?></span>
                                      </div>
                                    </div> 

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="inputProcessor">Processor</label><br>
                                        <input type="text" name="processor" class="form-control" id="inputProcessor4" value="<?php echo $pro; ?>">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputRam">RAM</label><br>
                                        <input type="text" name="ram" class="form-control" id="inputBrand4" value="<?php echo $ram; ?>">
                                      </div>
                                    </div>

                                    <div class="form-row" style="padding-top: px;">
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $processorErr; ?></span>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $ramErr; ?></span>
                                      </div>
                                    </div> 

                                    <div class="form-row">   
                                      <div class="form-group col-md-6">
                                        <label for="inputStorage">Storage</label><br>
                                        <input type="text" name="storage" class="form-control" id="inputBrand4" value="<?php echo $storage; ?>">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputColor">Color</label><br>
                                        <input type="text" name="color" class="form-control" id="inputBrand4" value="<?php echo $color; ?>">
                                      </div>
                                    </div>

                                    <div class="form-row" style="padding-top: px;">   
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $storageErr; ?></span>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $colorErr; ?></span>
                                      </div>
                                    </div>

                                    <div class="form-row">   
                                      <div class="form-group col-md-6">
                                        <label for="inputSize">Size</label>
                                        <input type="text" name="size" class="form-control" id="inputBrand4" value="<?php echo $size; ?>">
                                      </div>

                                      <div class="form-group col-md-6">
                                        <label for="inputprice">Price</label>
                                        <input type="text" name="price" class="form-control" value="<?php echo $price; ?>">
                                      </div>
                                    </div>

                                    <div class="form-row" style="padding-top: px;">   
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $sizeErr; ?></span>
                                      </div>

                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $priceErr; ?></span>
                                      </div>
                                    </div>

                                    <div class="form-row">   
                                      <div class="form-group col-md-6">
                                        <label for="inputdescription" style="text-align:center;">Description</label><br>
                                        <textarea  name="desc" rows="5" cols="70" >
                                        <?php echo $desc; ?>
                                      </textarea>

                                      </div>      
                                    </div>

                                    <div class="form-row" style="padding-top: px;">   
                                      <div class="form-group col-md-6">
                                          <span style="color:red;"><?php echo $descriptionErr; ?></span>
                                      </div>
<br>
                                <button type="submit" name="add" class="btn btn-primary" style="margin-left:2px;">Update</button>
                              </form>
                          </div>
                      </div>
              </div>
      </div>
</div>
                      


<?php

 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["add"]))
{
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];    
      $folder = "image/".$filename;
      echo $filename."gjhgk";
      if(empty($filename))
      {
        $filename = $pi;
        echo $pi."pi";

      }

      if($cateidErr == "" && $brandErr == "" && $modelErr == "" && $processorErr == "" && $ramErr == "" && $storageErr == "" && $colorErr == "" && $sizeErr == "" && $priceErr == "" && $descriptionErr == "")
        {  //echo "<script>alert('2')</script>";
            
            // Insert image content into database 
            $update ="update tbl_product set product_cate_id = '".$_POST['cateid']."',product_image = '$filename',brand_name='".$_POST['brand']."', model_name='".$_POST['model']."', processor='".$_POST['processor']."',ram='".$_POST['ram']."',storage='".$_POST['storage']."',color='".$_POST['color']."',size='".$_POST['size']."' , price='".$_POST['price']."', description='".$_POST['desc']."' where product_id = $pid";
             
            if(mysqli_query($con,$update))
            { 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
                echo '<script>
                            swal({
                            title: "Update Product successfully..",                              
                            icon: "success",
                          });
                          </script>';
                //echo "<script>alert('insert')</script>";
                echo "<script>window.location.href='view_product.php';</script>";

            }else
            { 
                $statusMsg = "File upload failed, please try again."; 
                echo '<script>
                            swal({
                            title: "Oops..! Try Again!s",                              
                            icon: "error",
                          });
                          </script>';
                
                //echo "<script>alert('error')</script>";
            }  
        }

}
    
// Display status message 
include("adminfooter.php");
echo $statusMsg; 

ob_end_flush();
?>