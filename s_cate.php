<?php
ob_start();
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
	require 'check_cart.php';
	require 'check_list.php';
?>
<div class="row" style = "margin-top:100px;">        
	<?php
        include 'db.php';
		if(isset($_GET['id']))
		{
			$_SESSION['cate_id']=$_GET['id'];
		}
		
        $insert = "select * from tbl_product where product_cate_id = '".$_SESSION['cate_id']."'"; 
        
        $query= mysqli_query($con, $insert);
        $num = mysqli_num_rows($query);
        $id=0;
		$price=0;
		
        if(empty($num))
		{
		 ?><div class="col-lg-3 col-md-8 col-sm-12">
		 		
		 			<center><h1>Not Found</h1></center>
				
			</div><?php
		}
		else
        { echo "sddg";
            while ($row = mysqli_fetch_array($query))
            {
				$qty="qty";
				$btn="btn";
                $id=$row['product_id'];
				$price=$row['price'];
				$qty=$qty.$id;
				$btn=$btn.$id;
				
    ?>
	<br><br><br>
		<div class="col-lg-3 col-md-8 col-sm-12">
			
			<form method="GET" action="#">
				<div class="card" style="height:100%;">

					<h6 class="card-title text-white p-2 text-uppercase" style="background :#778899;
					"> <?php echo
					 $row['brand_name'];  ?> 
					 
					 <?php 
						if(isset($_SESSION['uname'])){
							if(check_if_added_to_list($id)){
					?>
						
					 <?php
						}
						else
						{
					?>
					
					<?php } } ?>
					   </h6>

					   <img class="card-img-top" style="height:220px;" src="image/<?php echo $row['product_image']; ?>" class="img-fluid mb-2" alt="Card image cap">

					<div class="card-body">

							<h5 class="card-title"></h5>

                            

                            <p class="card-text">
                            
                            				<h5 style="color:red;"> Price: &#8377 <?php echo $row['price'];?> </h5> 
										 	<h6> Model Name: <?php echo $row['model_name'];?> </h6>
											
											<h6> Processor: <?php echo $row['processor'];?> </h6>
											<h6> Ram: <?php echo $row['ram'];?> </h6>
											<h6> Storage: <?php echo $row['storage'];?> </h6>
											<h6> Colour: <?php echo $row['color'];?> </h6>
                                         	<h6> Size: <?php echo $row['size'];?> </h6>

                            </p>

									<?php 
											if(isset($_SESSION['uname'])){
									?>
					 						<input type="number" name="<?php echo $qty; ?>" min="1" class="form-control" value="1">


					</div>
					
					<div class="btn-group d-flex">
						<?php
						
							if(check_if_added_to_cart($id)){
						?>
								<button class="btn btn-success flex-fill disabled" name="add" style="background: #16A085; cursor: not-allowed;" disabled><i class="fas fa-shopping-cart"></i> Add to cart </button>
								<button class="btn flex-fill text-white" style="background: #20b2aa;">
								<i class="fa fa-heart-o" ></i><a href='add_wish.php?id=<?php echo $id; ?>'style="color:white;">Wish-List</a></button>
						
								<?php
									}
									else
									{
								?>
								<button class="btn btn-success flex-fill" name="<?php echo $btn; ?>" style="background: #16A085;"><i class="fas fa-shopping-cart"></i>Add to cart</button>
								<button class="btn flex-fill text-white" style="background: #20b2aa;">
								<i class="fas fa-heart" ></i><a href='add_wish.php?id=<?php echo $id; ?>'style="color:white;">Wish-List</a></button>

								<?php } }?>
					</div>
                </div>
			</form>
						
			<?php

			
				$bn="btn".$id;
				if(isset($_GET[$bn]))
				{
					$stock=0;
					$qty  = $_GET['qty'.$id];
					$cqty =  "select quantity from tbl_stock where product_id  = $id";
					$cnum  = mysqli_query($con,$cqty);
					if($cnum->num_rows > 0)
					{
						while ($row = mysqli_fetch_array($cnum))
						{
							$stock = $row['quantity'];
						}
					}
					if($stock < $qty)
					{
						echo '<script>
                        swal({
                        title: "stock is not avilable",                              
                        icon: "error",
                    	});
                     	</script>'; 
					}
					else
					{
						$_SESSION['q']=$qty;
						$_SESSION['i']=$id;
						$_SESSION['p']=$price;
						//header("location:add_cart.php");	
						echo "<script>window.location.href='add_cart.php';</script>";	
					}	
				}
			?>	

		</div>
	<?php		
		}
	}
	?>
        </div>
</div>
<?php
ob_end_flush();
include 'footer.php';
	?>

