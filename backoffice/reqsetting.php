<?php

session_start();
require_once('includes/connect.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Colegio de Sta. Teresa de Avila - CSTA Portal - Admin</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!--Bootstrap toggle-->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <!-- Custom styles for  DataTable -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 7;
        require_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                <?php require_once('includes/header.php'); ?>
                <!-- End of Header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Requirements Setting</h1>
                    </div>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Requirements</li>

                        </ol>
                    </nav>
                    <!-- End of Breadcrumb -->
                    <div class="row" hidden>
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>

                                                    <th>Enrollment Status</th>
                                                    <th>Toggle</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM enrollment_switch ";
                                                $stmt = $con->prepare($sql);
                                                $stmt->execute();



                                                while ($row = $stmt->fetch()) {
                                                    $status = $row['enrollment_status'];

                                                    if ($status == "CLOSED") {
                                                        $toggle = '<input type="checkbox" unchecked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'red;';
                                                    } else {
                                                        $toggle = ' <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'green;';
                                                    }
                                                    echo '<tr> 
                                                        
                                                        <td style="color:' . $color . '"><strong>' . $row['enrollment_status'] . '</strong></td>
                                                        <td>
                                                        <form action="enrollmentonoff.php?id=' . $row['switch_ID'] . '" method="POST"> 
                                                        ' . $toggle . '
                                                        </form>
                                                                
                                                        </td>
                                                      </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-12">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 " style="width: 100%;">
                                <div class="row">
                                    <div class="col-sm-6" style="margin-top:10px; margin-left:10px;">
                                        <a href="#addreqModal" class="btn btn-primary" data-toggle="modal"><i class="fas fa-plus"></i> <span>Add Requirement</span></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th hidden>#</th>
                                                    <th>Requirement Name</th>
                                                    <th>Status</th>
                                                    <!-- <th width="50">Delete</th> -->
                                                    <th width="50">Active</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM requirements";
                                                $stmt = $con->prepare($sql);
                                                $stmt->execute();

                                                $sql2 = "SELECT * FROM requirements where isActive= 1";
                                                $stmt2 = $con->prepare($sql2);
                                                $stmt2->execute();
                                                $countActive = $stmt2->rowCount(); // count 'ACTIVE' in status column

                                                if ($countActive >= 1) {
                                                    $disabled = 'disabled';   //disable switch button if active exists in table 

                                                } else {
                                                    $disabled = '';
                                                }

                                                while ($row = $stmt->fetch()) {
                                                    $status = $row['isActive'];
                                                    $active = "1";


                                                    if ($status == "INACTIVE") {
                                                        $toggle = '<input type="checkbox" ' . $disabled . '  unchecked data-toggle="toggle" data-onstyle="success" 
                                                   data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'red;';
                                                    } else {
                                                        $toggle = ' <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" 
                                                    data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'green;';
                                                    }

                                                    echo '<tr> 
                                                        <td hidden>' . $row['req_ID'] . '</td>
                                                        <td>' . $row['reqname'] . '</td>
                                                        <td style="color:' . $color . '"><strong>' . $row['isActive'] . '</strong></td> 
                                                        <!--<td>
                                                            <form action="deletereq.php?id=' . $row['req_ID'] . '" method="POST"> 
                                                                <button  type="submit" class="btn btn-danger" data-toggle="modal" data-target="#add_data_modal"  name="edit" id="edit" title="Delete"><i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </td>-->

                                                        <td>
                                                        <form action="updatereq.php?id=' . $row['req_ID'] . '" method="POST"> 
                                                        ' . $toggle . '
                                                        </form>
                                                                
                                                        </td>
                                                      </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Add requirement Modal-->
    <div id="addreqModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="addreq.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Requirement</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Document Name</label>
                            <input type="text" class="form-control" name="txtreqName" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add semester Modal-->
    <div id="addSemModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="addsem.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Semester</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="text" class="form-control" name="txtSem" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

    <?php
        require_once 'includes/scripts2.php';
    
    ?>
</body>

</html>