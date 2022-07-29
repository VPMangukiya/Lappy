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
                
    $cateErr="";
    $cate="";
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
        ?>

    <br>
    <br>
<!--
<form method="POST">
   <div class="container">
      <br><br><br>
        <div class="box" style="margin:auto; width: 50%; ">
              <div class="form-row">
                  <h1 style="margin-left:30%; color:grey;"></h1>
                  <hr>
              </div>-->

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                             <div class="col">
                                <h4> Add Category</h4>
                             </div>
                        </div><hr>
                        <form method="POST">

                            <div class="form-row">
                                
                                <label >Category Type</label>
                                <input type="text" name="category" class="form-control" placeholder="Category" pattern="^[a-zA-Z]*$" title="Only Latters available" required >
                                
                                
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
include("adminfooter.php");

?>

</body>
</html>
<?php
        if(isset($_POST['add']))
    {
        if($cateErr == "")
        {
                    $insert = "insert into tbl_product_category(category_type) values ('".$_POST['category']."')";
            
                    if(mysqli_query($con,$insert))
                    {
                        echo '<script>
                            swal({
                            title: "Add Category successfully..",                              
                            icon: "success",
                          });
                          </script>';
                        //echo '<script>alert("Add category sucessfully")</script>';
                       // header("location:Login.php")
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
    include("adminfooter.php");
    ob_end_flush();
?>