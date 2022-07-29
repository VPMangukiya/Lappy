<?php include("adminheader.php"); ?>
<?php
    require_once 'db.php';
   // include 'headerAdmin.php';
   
?>
<br>
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
                         $selectTodayOrder="SELECT COUNT(*) FROM orders";
                         $resultTodayOrder= mysqli_query($con, $selectTodayOrder);
                         $rowTodayOrder= mysqli_fetch_array($resultTodayOrder);
                         $todayOrder=$rowTodayOrder[0];
                     ?>
                     <h3><b><?php echo $todayOrder?></b></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                    $selectLastSevenDayOrder="SELECT COUNT(*) FROM customer_orders where order_status = 'c'";
                    $resultLastSevenDayOrder= mysqli_query($con, $selectLastSevenDayOrder);
                    $rowLastSevenDayOrder= mysqli_fetch_array($resultLastSevenDayOrder);
                    $lastSevenDayOrder=$rowLastSevenDayOrder[0];
                ?>
                <h3><b><?php echo $lastSevenDayOrder?></b></h3>
                <h6>Cancel Order</h6>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
        </div>
       
          
     </div>
</section>
          <br><br><br><br><br><br><br>
 <section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
                $get_user = "select count(user_id) from tbl_registration";
                $set_user = mysqli_query($con,$get_user);
                $cu=0;
                while($row = mysqli_fetch_array($set_user))
                {
                    $cu = $row['count(user_id)'];
                }

              ?>
                <h3><?php echo $cu; ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                         $selectTotalProduct="select count(*) from tbl_product";
                         $resultTotalProduct= mysqli_query($con, $selectTotalProduct);
                         $rowTotalProduct= mysqli_fetch_array($resultTotalProduct);
                         $totalProduct=$rowTotalProduct[0];
                     ?>
                     <h3><b><?php echo $totalProduct?></b></h3>
                     <h6>Total Product</h6>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
        </div>
          
    </div>
</section>
<?php include("adminfooter.php"); ?>
