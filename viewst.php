<?php
session_start();
include('adminheader.php');
include('db.php');
//Checking User Logged or Not
if (empty($_SESSION['aname'])) {
    header('location:Login.php');
}
else{
    header('location:demo.php');
}
//Restrict User or Moderator to Access Admin.php page

?>


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12 mb-4">
                <!-- Approach -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">View Stock List</h6>
                    </div>
                    <div class="card-body">

                        <form action="" method="get">
                            <div class="form-row">
                                <label class="col-sm-1">Search : </label>
                                <input type="text" placeholder="Search for Stock" value="<?php
                                    if (isset($_GET['search'])) {
                                        echo $_GET['search'];
                                    }
                                    ?>" class="col-sm-3 form-control" name="search" />
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                            </div>
                        </form><br>
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th>Model Name</th>
                                <th>Quantity</th>
  
                            </tr>
                            <?php
                               

                                if (!empty(($_GET['search']))) {
                                    $filtervalues = $_GET['search'];
                                    $q = "SELECT * FROM tbl_stock WHERE CONCAT(product_id,stock) LIKE '%$filtervalues%'";
                                    $query_run = mysqli_query($conn, $q);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                            <tr>

                                <td> <?php echo $items['model_name']; ?> </td>
                                <td> <?php echo $items['quantity']; ?> </td>

                                <td>
                                    <form action="viewst.php" method="post">
                                        <input type="hidden" name="view_id" value="<?php echo $items['stock_id']; ?>" />
                                        <button class="btn btn-dark btn-sm" name="View"> View</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="edit_stock.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $items['stock_id']; ?>">
                                        <button class="btn btn-primary btn-sm" name="edit"> Edit</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="del_stock.php" method="post">
                                        <input type="hidden" name="delete_stud_id"
                                            value="<?php echo $items['stock_id']; ?>">
                                        <input type="hidden" name="delete_username"
                                            value="<?php echo $items['uname']; ?>" />
                                        <button class="btn btn-danger btn-sm" name="delete_stud">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                                        }
                                    } else {
                                        ?>
                            <tr>
                                <td colspan="5"><b>No Records found</b></td>
                            </tr>

                            <?php
                                    }
                                } else {
                                    $conn = mysqli_connect('localhost', 'root', '', 'aas');
                                    $sql = "SELECT enro,fname,lname,email,contact,profile_image,status FROM `tblstudent` WHERE status = 'A' order by `enro` desc";
                                    $result = mysqli_query($conn, $sql);
                                    echo "<br>";

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                            <tr>
                                <td><?php echo '<img src="images/' . $row['profile_image'] . '" width="100px;" height="100px;" alt="Image">' ?>
                                </td>
                                <td><?php echo $row["fname"] ?></td>
                                <td><?php echo $row["lname"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><?php echo $row["contact"] ?></td>
                                <?php
                                                echo "<td>"
                                                ?>
                                <form action="view_stud_data.php" method="post">
                                    <input type="hidden" name="view_id" value="<?php echo $row['enro']; ?>" />
                                    <button class="btn btn-dark btn-sm" name="View"> View</button>
                                </form>

                                <?php
                                            "</td>";

                                            echo "<td>"
                                            ?>
                                <form action="edit_stud_data.php" method="post">
                                    <input type="hidden" name="edit_id" value="<?php echo $row['enro']; ?>">
                                    <button class="btn btn-primary btn-sm" name="edit"> Edit</button>
                                </form>

                                <?php
                                            "</td>";
                                            echo "<td>"
                                            ?>
                                <form action="delete_data.php" method="post">
                                    <input type="hidden" name="delete_stud_id" value="<?php echo $row['enro']; ?>" />
                                    <input type="hidden" name="delete_username" value="<?php echo $row['email']; ?>" />
                                    <button class="btn btn-danger btn-sm" name="delete_stud">Delete</button>
                                </form>
                                <?php
                                            "</td>";
                                        }
                                        echo "</tr>";
                                    } else {
                                        echo '<script>alert("Records Not Found.")</script>';
                                    }
                                }
                                ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include './admin_footer.php'; ?>
    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>