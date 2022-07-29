



        <!-- end slider -->

        <!-- Main content -->
      
        <!-- End Main content -->




        
        <!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Dancing+Script" rel="stylesheet">
</head>
<body>
<div  class="container">
    <?php
    // include './cust_header.php';
?>

	<div class="row">
            
	<?php
    $id= $_GET['id'];
        include 'db.php';
        $pro= "select s.stock,c.category_type,p.brand_name,p.model_name,p.ram,p.product_image,p.processor,p.size,p.price,p.storage,p.color,p.description from tbl_product as p inner join tbl_product_category as c on p.product_cate_id = c.category_id where p.product_cate_id=$id";

        //$insert = "select * from tbladdproduct p INNER JOIN tblcategory c on p.pcatname = c.catname inner join tblsubcategory sc on p.psubcatname = sc.subcatname"; 
        $query= mysqli_query($con, $pro);
        $num = mysqli_num_rows($query);
        $id=0;
        if($num > 0)
        {
            while ($row = mysqli_fetch_array($query))
            {
                  $id=$row['product_id'];
    ?>
		<div class="col-lg-3 col-md-3 col-sm-12">
			
			<form>
				<div class="card" style="margin-top:80px;">
					<h6 class="card-title text-white p-2 text-uppercase" style="background :#778899;
"> <?php echo
					 $row['model_name'];  ?>   </h6>

					<div class="card-body">
                                            <img src="image/<?php echo $row['product_image']; ?>" alt="phone" class="img-fluid mb-2" >

					 <h6> Price: &#8377 <?php echo $row['price'];  ?> </h6> 
                                         <h6> Weight: <?php echo $row['size'];?>gm. </h6>
                                         <h5><?php echo $row['description'];?></h5>

					<input type="text" name="" class="form-control" placeholder="Quantity">

					</div>
					<div class="btn-group d-flex">
                                            <button class="btn btn-success flex-fill" name="add" style="background: #16A085;"><a style="text-decoration:none; color:white;" href='cart.php?id=<?php echo $id; ?>'> Add to cart </a></button> <button class="btn flex-fill text-white" style="background: #20b2aa;"><a style="text-decoration:none; color:white;" href='order.php?id=<?php echo $id; ?>'> Buy Now </a> </button>
					</div>
                                </div>
			</form>

		</div>
	<?php		
		}
	}
	?>
        </div>
</div>
</body>
</html>
<?php 
      if(isset($_POST['add']))
?>