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

                        <div class="col-lg-7">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 " style="width: 100%;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-university"></i> School Year   <a href="#addSYModal" class="btn btn-primary float-right" style="height:35px;" title="Add School Year" data-toggle="modal"><i class="fas fa-plus"></i> </a>
                                    </h6>
                                </div>
                                <div class="row">
                                    <!-- <div class="col-sm-6" style="margin-top:10px; margin-left:20px;">
                                       
                                    </div> -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th hidden>#</th>
                                                    <th>School Year</th>
                                                    <th>Status</th>

                                                    <th width="50">Toggle</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM schoolyr where isVisible=?";
                                                $data=array('1');
                                                $stmt = $con->prepare($sql);
                                                $stmt->execute($data);

                                                $sql2 = "SELECT * FROM schoolyr where status= 'ACTIVE'";
                                                $stmt2 = $con->prepare($sql2);
                                                $stmt2->execute();
                                                $countActive = $stmt2->rowCount(); // count 'ACTIVE' in status column

                                                if ($countActive >= 1) {
                                                    $disabled = 'disabled';   //disable switch button if active exists in table 

                                                } else {
                                                    $disabled = '';
                                                }

                                                while ($row = $stmt->fetch()) {
                                                    $status = $row['status'];
                                                    $active = "ACTIVE";


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
                                    <td hidden>' . $row['schoolyr_ID'] . '</td>
                                    <td>' . $row['schoolyr'] . '</td>
                                    <td style="color:' . $color . '"><strong>' . $row['status'] . '</strong></td> 

                                    <td>
                                    <form action="updatesy.php?id=' . $row['schoolyr_ID'] . '" method="POST"> 
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

                        <div class="col-lg-5">
                            <!-- DataTales Example -->
                            <div class="card shadow mb-4 " style="width: 100%;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-university"></i> Semester
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th hidden>#</th>
                                                    <th>Semester</th>
                                                    <th>Status</th>

                                                    <th width="50">Toggle</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $sql = "SELECT * FROM semester where isVisible=?";
                                                $data=array('1');
                                                $stmt = $con->prepare($sql);
                                                $stmt->execute($data);

                                                $sql3 = "SELECT * FROM semester where status= ?";
                                                $data3=array('ACTIVE');
                                                $stmt3 = $con->prepare($sql3);
                                                $stmt3->execute($data3);
                                                $countActivesem = $stmt3->rowCount(); // count 'ACTIVE' in status column

                                                if ($countActivesem >= 1) {
                                                    $disabledsem = 'disabled';   //disable switch button if active exists in table 

                                                } else {
                                                    $disabledsem = '';
                                                }

                                                while ($row = $stmt->fetch()) {
                                                    $status = $row['status'];
                                                    $active = "ACTIVE";


                                                    if ($status == "INACTIVE") {
                                                        $toggle = '<input type="checkbox" ' . $disabledsem . '  unchecked data-toggle="toggle" data-onstyle="success" 
                               data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color1 = 'red;';
                                                    } else {
                                                        $toggle = ' <input type="checkbox" checked data-toggle="toggle" data-onstyle="success" 
                                data-offstyle="danger" name="sytoggle" onchange="this.form.submit()">';
                                                        $color1 = 'green;';
                                                    }

                                                    echo '<tr> 
                                    <td hidden>' . $row['semester_ID'] . '</td>
                                    <td>' . $row['semester'] . '</td> 
                                    <td style="color:' . $color1 . '"><strong>' . $row['status'] . '</strong></td>
                                    <td>
                                    <form action="updatesem.php?id=' . $row['semester_ID'] . '" method="POST"> 
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



            <div class="modal fade" id="addSYModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="fas fa-briefcase"></i><strong> Add School Year</strong> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="addsy.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-group">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="font-weight-bold text-gray-900">School Year:</label>

                                            <input type="text" name="txtSY" id="txtSY" class="form-control">

                                        </div><br>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i> Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>





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