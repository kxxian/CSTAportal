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

    <title>CSTA Admin | Module Switches</title>
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

    <!-- Bootstrap CSS  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 8;
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




                    <div class="row">
                        <!-- Enrollment Switch -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-university"></i> Enrollment
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>

                                                    <th>Status</th>
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
                                                        $toggle = '<input type="checkbox" unchecked data-toggle="toggle"  data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
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


                        <!-- Grades Release Switch -->
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-award"></i> Requesting of Grades 
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>

                                                    <th>Status</th>
                                                    <th>Toggle</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM requestgrade_switch ";
                                                $stmt = $con->prepare($sql);
                                                $stmt->execute();



                                                while ($row = $stmt->fetch()) {
                                                    $gstatus = $row['gstatus'];

                                                    if ($gstatus == "CLOSED") {
                                                        $toggle = '<input type="checkbox" unchecked data-toggle="toggle"  data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'red;';
                                                    } else {
                                                        $toggle = ' <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color = 'green;';
                                                    }
                                                    echo '<tr> 
                                                        
                                                        <td style="color:' . $color . '"><strong>' . $row['gstatus'] . '</strong></td>
                                                        <td>
                                                        <form action="requestgradeonoff.php?id=' . $row['switch_ID'] . '" method="POST"> 
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


    <!-- Add school Year Modal-->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="addsy.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Add School Year</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>School Year</label>
                            <input type="text" class="form-control" name="txtSY" required>
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


    <!-- TURN OFF SY MODAL-->
    <div id="togglemodaloff" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="updatesy.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Remove current school year</h4>
                        <button type="button" class="close" id="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Are you sure you want to turn this off?</label>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <!-- <input type="button" class="btn btn-default" id="close"  data-dismiss="modal" value="Cancel" > -->
                        <a href="" data-dismiss="modal"><input type="button" class="btn btn-default" id="close" value="Cancel"></a>
                        <input type="submit" name="removeCurrent" class="btn btn-success" value="YES">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- TURN ON SY MODAL-->
    <div id="togglemodalon" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="addsy.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Set Current School Year</h4>
                        <button type="button" class="close" id="exit" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Are you sure you want to turn this on?</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="" data-dismiss="modal"><input type="button" class="btn btn-default" id="close" value="Cancel"></a>
                        <input type="submit" name="setCurrent" class="btn btn-success" value="YES">
                    </div>
                </form>
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


    <script>
        //show modal when school yr is toggled on or off
        function toggleSY_Function() {
            var toggleSY = document.getElementById("toggleSY");
            var close = document.getElementById("close");

            if (toggleSY.checked == true) {
                $('#togglemodalon').modal('toggle');


            } else if (toggleSY.checked == false) {
                $('#togglemodaloff').modal('toggle');

            }
        }
        $("#close").click(function() {

            $("#togglemodaloff").modal('hide');
        });

        $("#exit").click(function() {
            $("#togglemodalon").modal('hide');
        });
    </script>

    <?php
    require_once 'includes/scripts.php';

    ?>
</body>

</html>