<?php
    require 'header.php';
    require 'db.php';
    if(!isset($_SESSION['uname'])){
        //header('location: Login.php');
        echo "<script>window.location.href='index.php';</script>";
    }

    $qty=$_GET['qty'];
    $id=$_GET['id'];
    $uid=$_SESSION['uid'];
    $price=$_GET['price'];

    $qty = $qty + 1;
    $stock=0;
					//$qty  = $_GET['qty'.$id];
					$cqty =  "select quantity from tbl_stock where product_id  = $id";
					$cnum  = mysqli_query($con,$cqty);
					if($cnum > 0)
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
                         echo "<script>window.location.href='cart.php';</script>";
					}
					else
					{
                        $total = $price*$qty;
                        $update = "update cart set quantity='$qty',total='$total' where product_id='$id' and user_id='$uid'";
                        //$update = "update tbl_registration set password='".$_POST['newpass']."' where email_id='".$_SESSION['uname']."' and password='".$_POST['oldpass']."'";
                        $num = mysqli_query($con,$update);
                        if($num > 0)
                        {
                            echo "<script>window.location.href='cart.php';</script>";
                        }
                    }
?>