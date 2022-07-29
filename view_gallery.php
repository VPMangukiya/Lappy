<?php
//include 'adminheader.php';
include 'db.php';
 $select = "select * FROM tbl_gallery";      
        $result = mysqli_query($con, $select);
?>

                         
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
                                    <td style="width:100px;">id</td>  
                                    <td style="width:100px;">Gallery name</td>
                                    <td style="width:100px;">Image</td> 
                                    <td style="width:100px;">Action</td>  
                             
                               </tr>  
                          </thead>  
                            <tbody>
                                    <?php
                                
                                    $id=0;
                                    while($rows=mysqli_fetch_array($result))
                                    {
                                                    $id=$rows['gallery_id'];
                                            ?>
                                
                                            <tr>
                                                <!--FETCHING DATA FROM EACH   product_image
                                                    ROW OF EVERY COLUMN-->
                                                <td style="color: black;"><?php echo $rows['gallery_id'];?></td>
                                                <td style="color: black;"><?php echo $rows['gallery_name'];?></td>
                                                <td style="color: black;"><img src="image/<?php echo $rows['gallery_img']?>" width="100" height="100"></td>
                                                <td style="color: black;"><?php echo "<button><a href ='del_gallery.php?id=$id''>Delete</a></button>"; ?></td>
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
