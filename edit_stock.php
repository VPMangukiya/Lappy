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
                $cateErr = "category is required";
            } 
            else 
            {
                $cate = test_input($_POST["quantity"]);
                // check if name only contains letters
                if (!preg_match("/^[0-9 ]*$/", $cate))
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

        $id=$_GET['id'];

        $view_cate = "select * from tbl_stock where stock_id = $id";
        $sto = "select s.quantity ,p.model_name from tbl_stock as s inner join tbl_product as p on s.product_id = p.product_id where s.stock_id =$id";
        $result = mysqli_query($con,$sto);
        $product_id=$qty=0;
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
               $product_id=$row['model_name'];
               $qty=$row['quantity'];
              // echo "<tr><td>".$id=$row['category_id']."</td><td>".$cate."</td>/tr>";
            }
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
                  <h1 style="margin-left:30%; color:grey;">Update Stock</h1>
                  <hr>
              </div>
-->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Update Stock</h4>
                             </div>
                        </div><hr>
                        <form method="POST">
                                <div class="form-row">             
                                        <label for="inputBrand" >Model</label>
                                        <input type="text" name="productid" value="<?php echo $product_id; ?>">
                                </div>

                                <div class="form-row">
                                    <label >Quantity</label>
                                        <input type="text" name="quantity" class="form-control" pattern="^[0-9]*$" title="Enter digit only" required  value="<?php echo $qty; ?>" > 
                                </div>
                                <br>
                            <button type="submit" name="add" class="btn btn-primary">Update</button>
                        </form>
                </div>
             </div>   
        </div>
    </div>
</div>

<br><br>
<?php

include("adminfooter.php");

?>

</body>
</html>
<?php
        if(isset($_POST['add']))
    {
        if($cateErr == "")
        {
                    $insert = "update tbl_stock set quantity='".$_POST['quantity']."' where stock_id  = $id";
            
                    if(mysqli_query($con,$insert))
                    {
                        echo '<script>
                            swal({
                            title: "Update stock successfully..",                              
                            icon: "success",
                          });
                          </script>';
                        //echo '<script>alert(" sucessfully")</script>';
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
        else{
            echo '<script>
                        swal({
                        title: "All Fields are mandatory. please try again!!",                              
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