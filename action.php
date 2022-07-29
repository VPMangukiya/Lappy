<?php
session_start();
include("db.php");

if(isset($_POST['action'])){
    $sql = "select * from tbl_product where brand_name !=''";

    if(isset($_POST['brand'])){
        $brand = implode("','", $_POST['brand']);
        $sql .="AND brand_name IN('".$brand."')";
    }
    if(isset($_POST['model_name'])){
        $model = implode("','", $_POST['model_name']);
        $sql .="AND model_name IN('".$model."')";
    }
    if(isset($_POST['processor'])){
        $processor = implode("','", $_POST['processor']);
        $sql .="AND processor IN('".$processor."')";
    }
    if(isset($_POST['ram'])){
        $ram = implode("','", $_POST['ram']);
        $sql .="AND ram IN('".$ram."')";
    }
    if(isset($_POST['storage'])){
        $storage = implode("','", $_POST['storage']);
        $sql .="AND storage IN('".$storage."')";
    }
    if(isset($_POST['color'])){
        $color = implode("','", $_POST['color']);
        $sql .="AND color IN('".$color."')";
    }
    if(isset($_POST['price'])){
        $price = implode("','", $_POST['price']);
        $sql .="AND price IN('".$price."')";
    }
    if(isset($_POST['size'])){
        $size = implode("','", $_POST['size']);
        $sql .="AND size IN('".$size."')";
    }
    /*if(isset($_POST['description'])){
        $description = implode("','", $_POST['description']);
        $sql .="AND description IN('".$description."')";
    }*/
    $result = $con->query($sql);
    $output='';

    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $id=$row['product_id'];
            $price=$row['price'];

            if(isset($_SESSION['uid']))
            {
                $output .=' <div class="col-md-3 mb-2">
            <div class="card" style="height:100%;">

               
                    
                        <img class="card-img-top" style="height:220px;" src="image/'.$row['product_image'].'" class="img-fluid mb-2"      alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <h6 style="margin-top:50px;" class="text-light bg-info text-center rounded p-1">'.$row['brand_name'].'</h6>


                            <p class="card-text">
                            
                            <h4 class="card-title text-danger">Price:
                            '.number_format($row['price']).' </h4>
                            <p>
                            <h6 style="margin-top:30px;">
                                Model : '.$row['model_name'].'<br>
                            </h6>
                            Processor : '.$row['processor'].'<br>
                            RAM : '.$row['ram'].'<br>
                            Storage : '.$row['storage'].'<br>
                            Color : '.$row['color'].'<br> 
                            Size : '.$row['size'].'<br>

                            </p>
                        
                            <a href="f_add_cart.php?id='.$id.'&price='.$price.'" class="btn btn-success"><i class="fas fa-shopping-cart"></i>Add to Cart</a>
                    </div>
               
            </div>
        </div>';
            }
            else{ 
            
            $output .=' <div class="col-md-3 mb-2">
            <div class="card" style="height:100%;">

               
                    
                        <img class="card-img-top" style="height:220px;" src="image/'.$row['product_image'].'" class="img-fluid mb-2"      alt="Card image cap">

                        <div class="card-body">
                            <h5 class="card-title"></h5>

                            <h6 style="margin-top:50px;" class="text-light bg-info text-center rounded p-1">'.$row['brand_name'].'</h6>


                            <p class="card-text">
                            
                            <h4 class="card-title text-danger">Price:
                            '.number_format($row['price']).' </h4>
                            <p>
                            <h6 style="margin-top:30px;">
                                Model : '.$row['model_name'].'<br>
                            </h6>
                            Processor : '.$row['processor'].'<br>
                            RAM : '.$row['ram'].'<br>
                            Storage : '.$row['storage'].'<br>
                            Color : '.$row['color'].'<br> 
                            Size : '.$row['size'].'<br>

                            </p>
                        
                            
                    </div>
               
            </div>
        </div>';
    }
        }
    }
    else{
        $output = "<h3> No Product Found!</h3>";
    }
    echo $output;
}
?>