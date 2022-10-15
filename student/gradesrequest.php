<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
require_once("codes/fetchcurrentsyandsem.php");

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

    <title>Request of Grades</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--Jquery Datatables Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>


    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>





</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 0;
        require_once("includes/sidebar.php");

        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require_once("includes/header.php");

                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h3 class="h3 mb-4 text-gray-900">Request of Grades</h3>
                    <div class="main-body">
                        <div class="row">


                            <div class="col-lg-5" id="gradereqform">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-upload"></i> Request Grades</h6>
                                    </div>




                                    <div class="card-body text-gray-900">

                                        <form action="codes/gradereq.php" method="POST" enctype="multipart/form-data">


                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="sy1"><strong>School Year</strong></label>
                                                    <input name="sy1" type="text" value="<?= $currentsyval ?>" class="form-control">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="sem1" class="text-gray-900"><b>Semester</b></label>
                                                    <select class="form-control" id="sem1" name="sem1" required>
                                                        <option selected="" disabled>Select Semester..</option>
                                                        <?php
                                                        $sql = "select * from semester where isVisible=?";
                                                        $data = array(1);
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value=' . $row['semester'] . '>' . $row['semester'] . '</option>';
                                                        }
                                                        $stmt = null;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="text-right"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i> Submit</button></div>
                                            </div>

                                        </form>

                                    </div>


                                </div>

                            </div>

                            <div class="col-sm-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Request History</h6>
                                    </div>

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered " id="reqTable" width="100%" cellspacing="0">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>S.Y.</th>
                                                        <th>Semester</th>
                                                        <th>Requested</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="text-center" width="40">Actions</th>
                                                    </tr>
                                                </thead>

                                                <tbody>

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


            </div>
            <!-- End of Content Wrapper -->
            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->

        </div>

    </div>


    <?php
    include_once("includes/scripts.php");


    ?>


</body>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- DataTable CDN JS -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/header.js"></script>
<script src="js/gradereq.js"></script>

</html>