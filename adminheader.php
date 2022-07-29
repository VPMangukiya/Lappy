<?php 
	session_start();	
	// if(isset($_REQUEST['btnAddSoc']))
	// {
	// 	echo "<script>alert('s');</script>";
	// 	// echo "<script>alert(".$sname.");</script>";


	// }
?>
<?php
if(!isset($_SESSION['aname']))
{

	echo '<script>
					swal({
					title: "Do not Access this Page!!",                              
					icon: "error",
				  });
				  </script>';
	header("location:Login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="lhlogo.png" />
  <title>Admin Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

  <!-- data table link -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

  <!-- main css-->
  <link rel="stylesheet" href="css/style5.css" type="text/css">
 <!-- main css end-->

<script src="sweetalert.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- form end-->
<!-- Table -->

<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
</style>

<!-- table end -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

             <!-- Brand Logo -->
            <a href="demo.php" class="brand-link">
              <img src="lhlogo.png" alt="LH Logo" class="brand-image img-circle elevation-3"/>Laptop House</a>
                 
        </ul> 
    </nav>
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
       

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="adminlogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">Laptop House</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  <li class="nav-item">
                      <a href="demo.php" class="nav-link active">
                        <i class="nav-icon fas fa-home"></i>Home
                      </a>
                  </li>

                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Manage Gallary
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="add_gallery.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Add Gallary</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="view_gallery.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View Gallary</p>
                        </a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                      <i class="nav-icon fa fa-plus-square"></i>
                      <p>
                        Manage Product
                        <i class="right fas fa-angle-left"></i>
                      </p>
                      </a>  

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="add_product_cate.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="add_stock.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Stock</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="add_product.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Product</p>
                          </a>
                        </li>
                      </ul>
                </li>

                <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                        Display Product
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>

                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="view_cate.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View Category</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="view_stock.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View Stock</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="view_product.php" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>View Product</p>
                        </a>
                      </li>
                    </ul>
                  </li>


                  <li class="nav-item has-treeview menu-open">
                      <a href="#" class="nav-link active">
                      <i class="fas fa-clipboard"></i>
                      <p>
                        Report
                        <i class="right fas fa-angle-left"></i>
                      </p>
                      </a>  

                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="view_order.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>View Order
                          </a>
                        </li>

                        <li class="nav-item">
                          <a href="view_feedback.php" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>View Feedback</p>
                          </a>
                        </li>
                      </ul>
                  </li>
       

                <li class="nav-item">
                      <a href="logout.php" class="nav-link active">
                        <i class="nav-icon fa fa-sign-out"></i>Logout
                      </a>
                </li>
          

        </ul>
      </nav>
           <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>