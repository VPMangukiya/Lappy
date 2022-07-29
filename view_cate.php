
<?php
//include("adminheader.php");
include("db.php");
$view_cate = "select * from tbl_product_category";
$result = mysqli_query($con,$view_cate);
?>


<br>  
<br><br>  
        <div class="row">
                       <a href="demo.php" class="btn btn-primary" style="margin-left:1270px;">Home</a>
        </div>
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
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td style="width:100px;">ID</td>  
                                    <td style="width:100px;">Category</td>  
                                    <td style="width:100px;">Action</td>  
                             
                               </tr>  
                          </thead>  
                            <tbody>

                                    <?php
                                
                                    $id=0;
                                    while($rows=mysqli_fetch_array($result))
                                    {
                                                    $id=$rows['category_id'];
                                            ?>
                                
                                            <tr>
                                                <!--FETCHING DATA FROM EACH   product_image
                                                    ROW OF EVERY COLUMN-->
                                                <td style="color: black;"><?php echo $rows['category_id'];?></td>
                                                <td style="color: black;"><?php echo $rows['category_type'];?></td>
                                                <td style="color: black;"><?php echo "<button><a href ='edit_cate.php?id=$id'>Edit</a></button><button><a href ='del_cate.php?id=$id''>Delete</a></button>"; ?></td>
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
//include("adminfooter.php");
?>