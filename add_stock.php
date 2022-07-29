<?php
include("adminheader.php");
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
   // The preg_match() function searches a string for pattern, returning
    //   true if the pattern exists, and false otherwise.
                
    $cateErr=$idErr="" ;
    $cate="";
   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_POST["productid"]=="") 
            {
                $idErr = "Category type is required.";
            }

            if (empty($_POST["quantity"])) 
            {
                $cateErr = "quantity is required";
            } 
            else 
            {
                $cate = test_input($_POST["quantity"]);
                // check if name only contains letters
                if (!preg_match("/^[0-9]*$/", $cate))
                {
                    $cateErr = "Only alphabet";
                }
            }

        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

    <br>
    <br>
    
<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 50%; ">
              <div class="form-row">
                  <h1 style="margin-left:30%; color:grey;">Add Stock</h1>
                  <hr>
              </div>-->

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Add Stock</h4>
                             </div>
                        </div><hr>
                        <form method="POST">

                            <div class="form-row">
                                
                                <label for="inputBrand" >Model</label><br><!--style="margin-right:-90%;"-->
                                <select name="productid" id = "id" size="1" class="form-control" required><!--style="margin-left: 50px;"-->
                                <option value="">Select Model</option>
                                    <?php 
                                    $result= mysqli_query($con,"select * from tbl_product");
                                    while($row=mysqli_fetch_array($result))
                                    {      
                                    ?>     
                                    <option value="<?php echo $row["product_id"]?>"><?php echo $row["model_name"]?></option>
                                
                                    <?php   }?>
                                    <br><br>
                                </select>
                                
                                <div class="form-row">
                                        <span><?php echo $idErr ?></span> <!--style="color:red; margin:0px;"-->
                                </div>
                            </div>

                            <div class="form-row">
                                
                                <label>Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantaity" pattern="^[0-9]*$" title="Enter digit only" required >
                                <span><?php echo $cateErr ?></span>
                                
                            </div>
                            <br>
                            <button type="submit" name="add" class="btn btn-primary">Add</button>
                        </form>                   
                </div>
            </div>
        </div>
    </div>
</div>

<br><br>
<?php

/*$view_cate = "select * from tbl_product_category";
$result = mysqli_query($con,$view_cate);
echo "<table>";

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_array($result))
    {
        echo "<tr><td>".$row['category_id']."</td><td>".$row['category_type']."</td></tr>";
        
    }
}
echo "</table>";*/
include("adminfooter.php");

?>

</body>
</html>
<?php
        if(isset($_POST['add']))
    {
        if($cateErr == "")
        {
            $select = "select * from tbl_stock where product_id= '".$_POST['productid']."'";
            $run = mysqli_query($con,$select);
            if($run->num_rows>0)
            {
                $aqty=0;
                while($row = mysqli_fetch_array($run))
                {
                    $aqty = $row['quantity'];
                }
                $nqty = $aqty + $_POST['quantity'];
                $update = "update tbl_stock set quantity='$nqty' where product_id= '".$_POST['productid']."'";
                $rupdate = mysqli_query($con,$update);

                if(mysqli_query($con,$update))
                    {
                        echo '<script>
                            swal({
                            title: "Add stock successfully.. up",                              
                            icon: "success",
                          });
                          </script>';
                        //echo '<script>alert("Add category sucessfully")</script>';
                       // header("location:Login.php")
                    }
                    else{
                        echo '<script>
                        swal({
                        title: "stock is not added!! up",                              
                        icon: "error",
                      });
                      </script>'; 
                        //echo '<script>alert("not Add")</script>';
                    }
            }
            else
            {
                $insert = "insert into tbl_stock(product_id,quantity) values ('".$_POST['productid']."','".$_POST['quantity']."')";
            
                if(mysqli_query($con,$insert))
                {
                    echo '<script>
                           swal({
                            title: "Add stock successfully..",                              
                            icon: "success",
                          });
                          </script>';
                        //echo '<script>alert("Add category sucessfully")</script>';
                       // header("location:Login.php")
                }
                 else{
                     echo '<script>
                        swal({
                        title: "stock is not added!!",                              
                        icon: "error",
                      });
                      </script>'; 
                        //echo '<script>alert("not Add")</script>';
                }
            }
             
        }
        else{
            echo '<script>
                        swal({
                        title: "All Filds are mandatory. please try again!!",                              
                        icon: "error",
                      });
                      </script>'; 
            //echo '<script>alert("Enter proper value ")</script>';
        }

    }
    else{
        exit();
    }


    

    ob_end_flush();
?>