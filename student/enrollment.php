<?php
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
                        <p>
                            <a class="btn btn-info float-right" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-info"></i> Info
                            </a>

                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card shadow my-5">
                                <div class="card-header text-gray-900 font-weight-bold">
                                    <i class="fas fa-chalkboard-teacher"></i>
                                    &nbsp;
                                    Enrollment Guidelines
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <p><b class="text-gray-900 ">For Old Students</b> - Submit a copy of your grades emailed by the Registar Office.</p>
                                            <p><b class="text-gray-900 ">For New Students</b> - Provide an original hard copy of your Form 137A, Form 138, Good Moral and Birth Certificates.</p>
                                            <p>*Hand-carried F137A must be in a sealed envelope with flaps signed by the School Registrar.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">

                            </div>
                        </div>

                        <!--TAB MENU-->
                        <div class="row gutters-sm">
                            <div class="col-md-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#profile" class="nav-link active"><i class="fas fa-edit"></i> Assessment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#subreq" class="nav-link"><i class="fas fa-file"></i> Enrollment</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="row gutters-sm">
                                    <div class="col-lg-6">
                                        <form id="myForm">
                                            <div class="card shadow">
                                                <div class="card-header text-gray-900 font-weight-bold">
                                                    <i class="fas fa-tasks"></i>
                                                    &nbsp;
                                                    Assessment
                                                </div>
                                                <div class="card-body">
                                                    <!-- <label for="filename" class="text-gray-900 font-weight-bold">File Name</label> -->
                                                    <!-- <input type="text" id="filename" name="filename" class="form-control mb-3" placeholder="e.g copyofgrades_2022_2023" required autofocus> -->
                                                    <label for="fileupload" class="text-gray-900 font-weight-bold">T.O.R / Copy of Grades</label>
                                                    <input type="file" id="fileupload" name="fileupload" class="form-control mb-4" required>

                                                    <div class="col-lg-12">
                                                        <div class="text-right"><button id="btnSubmit" class="btn btn-success w-100 ">Submit</button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6" id="enrolldetailsdiv">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-file-alt"></i> Assessment Status</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <!-- <th>#</th> -->
                                                                <th>Department</th>
                                                                <th>Course</th>
                                                                <th hidden>SY</th>
                                                                <th>Semester</th>
                                                                <th>Status</th>
                                                                <th class="text-center">Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php // displays all the submitted requirements of the student
                                                            $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
                                                            $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->execute($data);
                                                            while ($row = $stmt->fetch()) {
                                                                $enrolldate = $row['date_enrolled'];

                                                                echo '<tr> 
                                                                <td>' . $row['dept'] . '</td>
                                                                <td>' . $row['course'] . '</td>
                                                                <td hidden>' . $row['schoolyr'] . '</td> 
                                                                <td>' . $row['semester'] . '</td>
                                                                <td>' . $row['enrollment_status'] . '</td>
                                                                <td>

                                                                <button" class="btn btn-warning" id="enrolledit" title="Edit">
                                                                <i class="fas fa-edit"></i>
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

                            <div class="tab-pane fade" id="subreq">

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
                                                                <label for="exampleFormControlSelect1">School Year</label>
                                                                <input type="text" class="form-control" value="<?= $currentsyval ?>" disabled>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="exampleFormControlSelect1">Semester</label>
                                                                <input type="text" class="form-control" value="<?= $currentsemval ?>" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label for="exampleFormControlSelect1">Department</label>
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
                                                            <div class="col-lg-6">
                                                                <label for="exampleFormControlSelect1">Course</label>
                                                                <select class="form-control" id="selCourse" name="selCourse" required>
                                                                    <?php

                                                                    $sql = 'SELECT * FROM courses';
                                                                    $stmt = $con->query($sql);

                                                                    foreach ($stmt as $rows) {
                                                                        echo '<option value=' . $rows['course_ID'] . '>' . $rows['course'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <label for="exampleFormControlSelect1" hidden>School Year</label>
                                                            <select class="form-control" id="exampleFormControlSelect1" hidden>
                                                                <?php
                                                                $sql = "select * from schoolyr where status='ACTIVE'";
                                                                $stmt = $con->prepare($sql);
                                                                $stmt->execute();

                                                                while ($row = $stmt->fetch()) {
                                                                    echo '<option selected value=' . $row['schoolyr_ID'] . '>' . $row['schoolyr'] . '</option>';
                                                                }
                                                                $stmt = null;
                                                                ?>
                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="text-right"><button type="submit" class="btn btn-success" name="enroll" id="btnEnroll"><i class="fas fa-check"></i> Submit</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" id="enrolldetailsdiv">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-file-alt"></i> Enrollment Details</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <!-- <th>#</th> -->
                                                                <th>Department</th>
                                                                <th>Course</th>
                                                                <th hidden>SY</th>
                                                                <th>Semester</th>
                                                                <th>Status</th>
                                                                <th class="text-center">Edit</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php // displays all the submitted requirements of the student
                                                            $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
                                                            $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->execute($data);
                                                            while ($row = $stmt->fetch()) {
                                                                $enrolldate = $row['date_enrolled'];

                                                                echo '<tr> 
                                                                <td>' . $row['dept'] . '</td>
                                                                <td>' . $row['course'] . '</td>
                                                                <td hidden>' . $row['schoolyr'] . '</td> 
                                                                <td>' . $row['semester'] . '</td>
                                                                <td>' . $row['enrollment_status'] . '</td>
                                                                <td>

                                                                <button" class="btn btn-warning" id="enrolledit" title="Edit">
                                                                <i class="fas fa-edit"></i>
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
<script src="js/assessment.js"></script>

</html>