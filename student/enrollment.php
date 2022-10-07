<?php
// session_start();
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

    <title>CSTA Portal | Enrollment</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- bootstrap5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
                    <div class="main-body">
                        <?php
                        include('step_wizard_bar.php');
                        ?>
                        <br>
                        <div class="row gutters-sm">
                            <div class="col-md-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#enrollment" class="nav-link active"><i class="fas fa-fw fa-edit"></i> 1. Enrollment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#validation" class="nav-link"><i class="fas fa-fw fa-user-check"></i> 2. Validation</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="enrollment">
                                <div class="row gutters-sm">
                                    <div class="row">
                                        <div class="col-lg-6" id="enrolldiv">
                                            <!-- Basic Card Example -->
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-edit"></i> Enrollment Form</h6>
                                                </div>
                                                <div class="card-body">
                                                    <form action="codes/enroll.php" method="POST" enctype="multipart/form-data">

                                                        <div class="form-group">
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label for="sy" class="text-gray-900"><b>School Year</b></label>
                                                                    <input type="text" class="form-control" value="<?= $currentsyval ?>" disabled>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="sem" class="text-gray-900"><b>Semester</b></label>
                                                                    <input type="text" class="form-control" value="<?= $currentsemval ?>" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-lg-12">
                                                                    <label for="seldept" class="text-gray-900"><b>Department</b></label>
                                                                    <select class="form-control" id="seldept" name="seldept" required>
                                                                        <option selected="" disabled>Select Department..</option>
                                                                        <?php
                                                                        $sql = "select * from departments";
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute();

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option value=' . $row['deptid'] . '>' . $row['dept'] . '</option>';
                                                                        }
                                                                        $stmt = null;
                                                                        ?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-lg-6">
                                                                    <label for="selyrlevel" class="text-gray-900"><b>Year Level</b></label>
                                                                    <select class="form-control" name="selyrlevel" required>
                                                                        <option selected value="">Select Year Level..</option>
                                                                        <option value="1">1st Year</option>
                                                                        <option value="2">2nd Year</option>
                                                                        <option value="3">3rd Year</option>
                                                                        <option value="4">4th Year</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label for="selCourse" class="text-gray-900"><b>Course</b></label>
                                                                    <select class="form-control" id="selCourse" name="selCourse" required>

                                                                    </select>
                                                                </div>

                                                            </div>





                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <label for="fileupload" class="text-gray-900"><b>Copy of Grades</b><i> *previous semester</i></label>
                                                                    <input type="file" id="grade" name="grade" accept=".jpg" class="form-control mb-4" required>
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="text-right"><button type="submit" class="btn btn-success" name="enroll"><i class="fas fa-check"></i> Submit</button></div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6" id="enrolldetails">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Enrollment Application Details</h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <!-- <th>#</th> -->
                                                                    <!-- <th>Department</th> -->
                                                                    <th class="text-center">Year Level</th>
                                                                    <th class="text-center">Course</th>
                                                                    <th hidden>SY</th>
                                                                    <th hidden class="text-center">Semester</th>
                                                                    <th class="text-center">Attachment</th>
                                                                    <th class="text-center">Status</th>
                                                                    <th class="text-center">Cancel</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php
                                                                $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
                                                                $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                                                                $stmt = $con->prepare($sql);
                                                                $stmt->execute($data);
                                                                while ($row = $stmt->fetch()) {
                                                                    $enrolldate = $row['date_enrolled'];

                                                                    echo '<tr> 
                                                        <td class="text-center text-gray-900 font-weight-bold">' . $row['yrlevel'] . '</td>
                                                                <td class="text-center text-gray-900 font-weight-bold">' . $row['course'] . '</td>
                                                                <td hidden>' . $row['schoolyr'] . '</td> 
                                                                <td hidden>' . $row['semester'] . '</td>
                                                                <td class="text-center"><a class="font-weight-bold" href="uploads/copygrades/' . $row['enrollment_ID'] . '.jpg">Grades</a></td>
                                                                <td class="text-center  text-gray-900 font-weight-bold">' . $row['enrollment_status'] . '</td>
                                                                <td class="text-center">

                                                                <button" class="btn btn-danger btn-sm cancel_enroll" id="' . $row['enrollment_ID'] . '" title="Cancel">
                                                                <i class="fas fa-fw fa-times "></i>
                                                                </button>
                                                                         
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
                            </div>

                            <div class="tab-pane fade" id="validation">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <!-- Basic Card Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-user-check"></i> Validation</h6>
                                            </div>
                                            <div class="card-body">
                                                <form action="codes/enroll_validate.php" method="POST" enctype="multipart/form-data">

                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label for="enroll_receipt" class="text-gray-900"><b>Official Receipt</b></label>
                                                                <input type="file" id="enroll_receipt" name="enroll_receipt" accept=".jpg" class="form-control mb-4" required>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <label for="enroll_assessment_form" class="text-gray-900"><b>Assessment Form</b></label>
                                                                <input type="file" id="enroll_assessment_form" name="enroll_assessment_form" accept=".jpg" class="form-control mb-4" required>
                                                            </div>
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="text-right"><button type="submit" class="btn btn-success mb-3" name="ev"><i class="fas fa-check"></i> Submit</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" id="enrolldetails">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-alt"></i> Enrollment Validation</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                
                                                                <th class="text-center">Files</th>
                                                                <th class="text-center">Status</th>
                                                                <th class="text-center">Actions</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                                $sql = "SELECT * FROM vwenroll_validate where sid=? and schoolyr=? and semester=? ";
                                                                $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                                                                $stmt = $con->prepare($sql);
                                                                $stmt->execute($data);
                                                                while ($row = $stmt->fetch()) {
                                                                    

                                                                    echo '<tr> 
                                                                    <td class="text-center">
                                                                    <a type="button" name="sendassessment" target="_blank" href="uploads/enroll_val/enroll_receipt/' . $row['ev_ID'] . '.jpg" id="' . $row["ev_ID"] . '" 
                                                                        class="btn btn-success btn-sm sendassessment" title="Official Receipt"><i class="fa fa-fw fa-receipt"></i></a>

                                                                        <a type="button" name="sendassessment" target="_blank" href="uploads/enroll_val/enroll_assess/' . $row['ev_ID'] . '.jpg" id="' . $row["ev_ID"] . '" 
                                                                        class="btn btn-warning btn-sm sendassessment" title="Assessment Form"><i class="fa fa-fw fa-book"></i></a>
                                                                    </td>
                                                               
                                                                <td class="text-center  text-gray-900 font-weight-bold">' . $row['status'] . '</td>
                                                                
                                                                <td class="text-center">

                                                                <button" class="btn btn-danger btn-sm cancel_enroll_validate" id="' . $row['ev_ID'] . '" title="Cancel">
                                                                <i class="fas fa-fw fa-times "></i>
                                                                </button>
                                                                         
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

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/header.js"></script>
<script src="js/enrollment.js"></script>

</html>