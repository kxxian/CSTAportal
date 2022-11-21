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
<?php
// check if enrollment is open
$sqlquery = "select * from enrollment_switch";
$statement = $con->prepare($sqlquery);
$statement->execute();
$item = $statement->fetch();
$status = $item['enrollment_status'];


if ($status == 'CLOSED') { // display enrollment page if open

    header("location:index.php");
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

    <title>Enrollment</title>
    <!-- bootstrap5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

</head>

<style>
    ::-webkit-scrollbar {
        width: .5em;
    }
</style>

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
                    <div class="main-body">
                        <?php
                        include('step_wizard_bar.php');
                        ?>
                        <br>
                        <div class="row gutters-sm">
                            <div class="col-sm-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#enrollment" class="nav-link active"><i class="fas fa-fw fa-edit"></i> 1. Assessment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#validation" class="nav-link" id="enroll_tab"><i class="fas fa-fw fa-user-check"></i> 2. Enrollment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="enrollment">
                                <div class="row gutters-sm">
                                    <div class="row">
                                        <div class="col-sm-6" id="enrolldiv">
                                            <!-- Basic Card Example -->
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-edit"></i> Enrollment Form</h6>
                                                </div>
                                                <div class="card-body" id="enroll_div">
                                                    <form action="codes/enroll.php" method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <div class="col-lg-12">
                                                                    <label for="seldept" class="text-gray-900"><b>Student Type</b></label>
                                                                    <select class="form-control" id="seldept" name="seldept" required>
                                                                        <option selected value="" disabled>Select Department..</option>
                                                                        <?php
                                                                        $sql = "select * from departments where admin_only=?";
                                                                        $data = array(0);
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute($data);

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option value=' . $row['deptid'] . '>' . $row['dept'] . '</option>';
                                                                        }
                                                                        $stmt = null;
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label for="sy" class="text-gray-900"><b>School Year</b></label>
                                                                    <input type="text" class="form-control" value="<?= $currentsyval ?>" disabled>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="sem" class="text-gray-900"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" value="<?= $currentsemval ?>" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label for="seldept" class="text-gray-900"><b>Department</b></label>
                                                                    <select class="form-control" id="seldept" name="seldept" required>
                                                                        <option selected value="" disabled>Select Department..</option>
                                                                        <?php
                                                                        $sql = "select * from departments where admin_only=?";
                                                                        $data = array(0);
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute($data);

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option value=' . $row['deptid'] . '>' . $row['dept'] . '</option>';
                                                                        }
                                                                        $stmt = null;
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label for="selCourse" class="text-gray-900"><b>Course</b></label>
                                                                    <select class="form-control" id="selCourse" name="selCourse" required>

                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="selyrlevel" class="text-gray-900"><b>Year Level</b></label>
                                                                    <select class="form-control" name="selyrlevel" required>
                                                                        <option selected value="">Select Year Level..</option>
                                                                        <option value="1">1st Year</option>
                                                                        <option value="2">2nd Year</option>
                                                                        <option value="3">3rd Year</option>
                                                                        <option value="4">4th Year</option>
                                                                    </select>
                                                                </div>


                                                            </div>





                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <label for="fileupload" class="text-gray-900"><b>Copy of Grades</b><i> *previous semester</i></label>
                                                                    <input type="file" id="grade" name="grade" class="form-control mb-4" required>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="text-right"><button type="submit" class="btn btn-success" name="enroll"><i class="fas fa-check"></i> Submit</button></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6" id="enrolldetails">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Enrollment Application Details</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered " id="enrollTable" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <!-- <th>#</th> -->
                                                                    <!-- <th>Department</th> -->
                                                                    <th class="text-center">Year Level</th>
                                                                    <th class="text-center">Course</th>
                                                                    <th class="text-center">Attachment</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Cancel</th>
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
                            </div>

                            <div class="tab-pane fade" id="validation">
                                <div class="row">
                                    <div class="col-sm-6" id="enroll_content">
                                        <!-- Basic Card Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-user-check"></i> Validation</h6>
                                            </div>
                                            <div class="card-body">
                                                <form action="codes/enroll_validate.php" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label for="enroll_receipt" class="text-gray-900"><b>Official Receipt</b></label>
                                                                <input type="file" id="enroll_receipt" name="enroll_receipt" accept=".jpg" class="form-control mb-4" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label for="enroll_assessment_form" class="text-gray-900"><b>Assessment Form</b></label>
                                                                <input type="file" id="enroll_assessment_form" name="enroll_assessment_form" accept=".jpg" class="form-control mb-4" required>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="text-right"><button type="submit" class="btn btn-success mb-3" name="ev"><i class="fas fa-check"></i> Submit</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6" id="enrollvaldetails">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Enrollment Validation</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " id="enrollvalTable" width="100%" cellspacing="0">
                                                        <thead class="thead-dark">
                                                            <tr>

                                                                <th class="text-center">Files</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Actions</th>

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
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->


</body>

<?php
include("includes/scripts.php");
?>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<!-- DataTable CDN JS -->
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<!-- <script src="plugins/jquery/jquery.min.js"></script> -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/header.js"></script>
<script src="js/enrollment.js"></script>
<script src="js/counter.js"></script>
<script src="js/notifications.js"></script>

</html>

<!-- Modal -->
<div class="modal fade" id="instruct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg    modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <!-- <img src="img/enroll_guide/g1.png" alt="" width="100%" height="400px"> -->

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="img/enroll_guide/g1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="img/enroll_guide/g2.png" alt="First slide">
                        </div>

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>