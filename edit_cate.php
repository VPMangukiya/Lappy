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
$cate="";
?>

<?php
   // The preg_match() function searches a string for pattern, returning
    //   true if the pattern exists, and false otherwise.
                
    $cateErr="";
    //$cate="";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["category"])) 
            {
                $cateErr = "category is required";
            } 
            else 
            {
                $cate = test_input($_POST["category"]);
                // check if name only contains letters
                if (!preg_match("/^[a-zA-Z ]*$/", $cate))
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

        $view_cate = "select * from tbl_product_category where category_id = $id";
        $result = mysqli_query($con,$view_cate);
        
        if(mysqli_num_rows($result)>0)
        {
            while($row=mysqli_fetch_array($result))
            {
               $cate=$row['category_type'];
              // echo "<tr><td>".$id=$row['category_id']."</td><td>".$cate."</td>/tr>";
            }
        }
       // echo "category  ". $cate;
        ?>

    <br>
    <br>
<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 50%; ">
              <div class="form-row">
                  <h1 style="margin-left:30%; color:grey;">Update Category</h1>
                  <hr>
              </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                  <label style="margin-right:-90%;">Category Type</label>
                  <input type="text" name="category" class="form-control" value="<?php echo $cate ?>" style="margin-left: 70px;width:400px;">
                  <span style="color:red; margin:0px;"><?php echo $cateErr ?></span>
                </div>
            </div>
-->

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Update Category</h4>
                             </div>
                        </div><hr>
                        <form method="POST">

                            <div class="form-row">
                                
                                <label >Category Type</label>
                                <input type="text" name="category" class="form-control" placeholder="Category" pattern="^[a-zA-Z]*$" title="Only Latters available" required value="<?php echo $cate; ?>">
                                       
                            </div>
                            <br>   
                            <button type="submit" name="Update" class="btn btn-primary">Update</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php

//$view_cate = "select * from tbl_product_category";
//$result = mysqli_query($con,$view_cate);

?>

</body>
</html>
<?php
        if(isset($_POST['Update']))
    {
        if($cateErr == "")
        {
                    $update = "update tbl_product_category set category_type = '".$_POST['category']."'where category_id = $id";
            
                    if(mysqli_query($con,$update))
                    {
                        echo '<script>
                            swal({
                            title: "Update Category successfully..",                              
                            icon: "success",
                          });
                          </script>';
                        //echo '<script>alert("Add category sucessfully")</script>';
                        //header("location:edit_cate.php");
                    }
                    else{
                        echo '<script>
                        swal({
                        title: "Product is not added!!",                              
                        icon: "error",
                      });
                      </script>'; 
                        //echo '<script>alert("not Add")</script>';
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