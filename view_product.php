<?php
include 'adminheader.php';
include 'db.php';
 $select = "select * from tbl_product";
 $view_stock= "select s.stock_id,s.quantity, p.model_name from tbl_stock  as s inner join tbl_product  as p on s.product_id=p.product_id";

 $pro= "select p.product_id,c.category_type,p.brand_name,p.model_name,p.ram,p.product_image,p.processor,p.size,p.price,p.storage,p.color,p.description from tbl_product as p inner join tbl_product_category as c on p.product_cate_id = c.category_id";
       
        $result = mysqli_query($con, $pro);
?>
 <br><br>  <br><br>
        <!-- <div class="row">
                       <a href="demo.php" class="btn btn-primary" style="margin-left:1270px;">Home</a>
        </div> -->

                            <br>  
<div class="row">       
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>    
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
</div>          
      
      <div class="row" width="100">  
           <br /><br />  
           <div class="container">  
               
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered" >  
                          <thead>  
                               <tr>  
                                    <td style="width:100px;">Id</td>  
                                    <td style="width:100px;">category</td>  
                                    <td style="width:100px;">Image</td>  
                                    <td style="width:100px;">Brand Name</td>  
                                    <td style="width:100px;">Model Name</td>  
                                    <td style="width:100px;">Processor</td>  
                                    <td style="width:100px;">RAM</td>  
                                    <td style="width:100px;">Storage</td>  
                                    <td style="width:100px;">Color</td>  
                                    <td style="width:100px;">size</td>  
                                    <td style="width:100px;">Price</td>  
                                    <td style="width:100px;">Description</td>  
                                    <td style="width:100px;">Action</td>  
                             
                               </tr>  
                          </thead>  
                            <tbody>
   
                                <?php
                            
                                $id=0;
                                while($rows=mysqli_fetch_array($result))
                                {
                                                $id=$rows['product_id'];
                                        ?>
                            
                                        <tr>
                                            <!--FETCHING DATA FROM EACH   product_image
                                                ROW OF EVERY COLUMN-->
                                            <td style="color: black;"><?php echo $rows['product_id'];?></td>
                                            <td style="color: black;"><?php echo $rows['category_type'];?></td>
                                            <td style="color: black;"><img src="image/<?php echo $rows['product_image']?>" width="100" height="100"></td>
                                            <td style="color: black;"><?php echo $rows['brand_name'];?></td>
                                            <td style="color: black;"><?php echo $rows['model_name'];?></td>
                                            <td style="color: black;"><?php echo $rows['processor'];?></td>
                                            <td style="color: black;"><?php echo $rows['ram'];?></td>
                                            <td style="color: black;"><?php echo $rows['storage'];?></td>
                                            <td style="color: black;"><?php echo $rows['color'];?></td>
                                            <td style="color: black;"><?php echo $rows['size'];?></td>
                                            <td style="color: black;"><?php echo $rows['price'];?></td>
                                            <td style="color: black;"><?php echo $rows['description'];?></td>
                                            <td style="color: black;"><?php echo "<button><a href ='edit_product.php?id=$id'>Edit</a></button><button><a href ='del_product.php?id=$id''>Delete</a></button>"; ?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                            </tbody>
                                
                                </table> 
                                
        
                        </div>  
                   </div>  
              </div>  
        <br><br>
    
           
         
         <script>  
         $(document).ready(function(){  
              $('#employee_data').DataTable();  
         });  
         </script> 

<?php
//include 'adminfooter.php';
?>