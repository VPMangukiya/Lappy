<?php 
include("header.php");
    include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>All laptop</title>
        <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body style="margin-top:100px;">

<h3 class="text-center text-light bg-info p-2" >All Laptop Details</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <h5>Filter Product</h5>
            <hr>
            <!--BRAND WISE-->
            <h6 class="text-info">Select Brand</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT brand_name FROM tbl_product ORDER BY brand_name";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['brand_name'];?>" id="brandname"><?= $row['brand_name']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>    

                <!--PROCESSOR WISE-->
                <h6 class="text-info">Select Processor</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT processor FROM tbl_product ORDER BY processor";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['processor'];?>" id="processor"><?= $row['processor']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>  

                           
                <!--RAM WISE-->
                <h6 class="text-info">Select RAM</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT ram FROM tbl_product ORDER BY ram";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['ram'];?>" id="ram"><?= $row['ram']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>  

                           
                <!--STORAGE WISE-->           
                <h6 class="text-info">Select Storage</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT storage FROM tbl_product ORDER BY storage";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['storage'];?>" id="storage"><?= $row['storage']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>  

                           
                <!--COLOR WISE-->
                <h6 class="text-info">Select Color</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT color FROM tbl_product ORDER BY color";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['color'];?>" id="color"><?= $row['color']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>  

                          
                <!--SIZE WISE-->          
                <h6 class="text-info">Select Size</h6>
                <ul class="list-group">
                    <?php
                        $sql="SELECT DISTINCT size FROM tbl_product ORDER BY size";

                        $result=$con->query($sql);
                        while($row=$result->fetch_assoc())
                        {
                    
                    ?>
                    <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input product_check" value="<?= $row['size'];?>" id="size"><?= $row['size']; ?>
                                </label>
                            </div>
                    </li>
                    <?php }?>
                </ul>      

        </div>
        
        <div class="col-lg-9">
            <h5 class="text-center" id="textChange">All Laptops</h5>
            <hr>

            <div class="row" id="result">
                <?php 
                    $sql="select * from tbl_product";
                    $result=$con->query($sql);
                    while($row=$result->fetch_assoc())
                    {
                ?>
                <div class="col-md-3 mb-2">
                    <div class="card-desk" style="height: 100%;">
                        <div class="card border-secondary">
                            <!--<img src="<?= $row['product_image'] ?>" class="card-img-top">-->
                            <img src="image/<?php echo $row['product_image']; ?>" alt="Laptop" height="100%" class="card-img-top" >
                            <br>
                            <br>
                            <div class="card-img-overlay">
                                <h6 style="margin-top:200px;" class="text-light bg-info text-center rounded p-1"><?= $row['brand_name'];?></h6>
                            </div><br>
                            <div class="card-body">
                                <p>
                                    Model : <?php echo $row['model_name'];?><br>
                                </p>
                                <h4 class="card-title text-danger">Price:
                                <?= number_format($row['price']); ?>/-</h4>
                                <p>
                                Processor : <?php echo $row['processor'];?><br>
                                RAM : <?php echo $row['ram'];?><br>
                                Storage : <?php echo $row['storage'];?><br>
                                Color : <?php echo $row['color'];?><br> 
                                Size : <?php echo $row['size'];?><br>
                                <br>
                                </p>
                               
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".product_check").click(function(){
            $("#loader").show();
            var action = 'data';
            var brand = get_filter_text('brandname');
            var model = get_filter_text('model_name');
            var image = get_filter_text('product_image');
            var processor = get_filter_text('processor');
            var ram = get_filter_text('ram');
            var storage = get_filter_text('storage');
            var color = get_filter_text('color');
            var price = get_filter_text('price');
            var size = get_filter_text('size');
            var description = get_filter_text('description');
            $.ajax({
                url:'action.php',
                method:'POST',
                data:{action:action,brand:brand,image:image,model:model,processor:processor,ram:ram,storage:storage,color:color,price:price,size:size,description:description},
                success:function(response){
                    $("#result").html(response);
                    $("#loader").hide();
                    $("#textChange").text("Filtered Products");
                                                      
                }
            });

        });
        function get_filter_text(text_id){
            var filterData = [];
            $('#'+text_id+':checked').each(function(){
                filterData.push($(this).val());
            });
            return filterData;
        }
    });
</script>
</body>
</html>