<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

$office=$Office;

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Admin | Maintenance</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this table -->
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
        if ($office=="Accounting"){
            $pageValue = 3;
        }elseif($office=="Dean"){
            $pageValue = 3;
        }elseif($office=="Registrar"){
            $pageValue = 6;
        }

        
        if ($usertype!="Admin"){
            header("Location:index.php");
        }

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

                    <div class=" mb-4">
                        <h1 class="h2 mb-0 text-gray-900 "><strong>Maintenance</strong></h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Users -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <!-- <div class="card border shadow h-100 py-2"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-center text-uppercase mb-1">
                                            <a class="text-success" href="users.php"><img src="img/settings (1).png" width="100" alt="">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-center text-gray-900">
                                            Users</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>


                        <!-- School Year -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <!-- <div class="card border shadow h-100 py-2"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-center text-uppercase mb-1">
                                            <a class="text-success" href="sysetting.php"><img src="img/calendar (1).png" width="100" alt="">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-center text-gray-900">
                                            School Year</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>

                        <!-- Courses -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <!-- <div class="card border shadow h-100 py-2"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-center text-uppercase mb-1">
                                            <a class="text-success" href="coursesetting.php"><img src="img/online-learning (1).png" width="100" alt="">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-center text-gray-900">
                                            Courses</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>

                        <!-- Courses -->
                        <div class="col-xl-2 col-md-6 mb-4">
                            <!-- <div class="card border shadow h-100 py-2"> -->
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-center text-uppercase mb-1">
                                            <a class="text-success" href="coursesetting.php"><img src="img/department (1).png" width="100" alt="">
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-center text-gray-900">
                                            Departments</a>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- </div> -->
                        </div>


                    </div>
                    <div class="row">



                    </div>


                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->
            </div>





            <!-- Content Row -->


            <!-- /.container-fluid -->
            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->


    </div>


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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


    <!-- scripts -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>


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

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>







</body>

</html>