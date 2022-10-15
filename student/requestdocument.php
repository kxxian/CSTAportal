<?php

require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
require_once("codes/fetchcurrentsyandsem.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<style>

</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Document Request</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>
    <style>
        .error {
            color: #df4759;
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-top: 5px;
            width: 100%;
        }

        /* input.error {
            border: 2px solid #df4759;
            font-weight: 300;
            color: #df4759;
        } */

        select.error {
            border: 2px solid #df4759;
            font-weight: 300;

        }
    </style>


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
                    <!-- <h3 class="h3 mb-4 text-gray-900">Request of Documents</h3> -->
                    <div class="main-body">
                        <div class="row">
                            <div class="col-sm-12" id="gradereqform">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-upload"></i> Request Document</h6>
                                    </div>
                                    <div class="card-body text-gray-900">

                                        <form method="POST" id="reqdocx" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><strong>Place of Birth </strong>(City or Municipality Only)</label>
                                                        <input type="text" name="birthplace" id="birthplace" class="form-control" placeholder="eg. Quezon City">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label><strong>Student Status</strong></label>
                                                        <select name="" id="" class="form-control">
                                                            <option value="Graduate">Graduate</option>
                                                            <option value="Undergraduate">Undergraduate</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><strong>Year Graduated</strong> (If <strong>UNDERGRADUATE</strong>, Add Last Semester Attended) </label>
                                                        <input name="yearGrad" id="yearGrad" type="text" class="form-control" placeholder="e.g 2021-2022 First Semester " required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label><strong>Last School Attended Before CSTA</strong></label>
                                                        <input name="lastSchool" id="lastSchool" type="text" class="form-control" placeholder="e.g. STI College Novaliches" required>
                                                    </div>
                                                </div>
                                                <div class="form-group documents">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <label><strong>Certifications</strong> </label>

                                                            <?php
                                                            $sql = "select * from documents where isActive=?";
                                                            $data = array('1');
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->execute($data);

                                                            while ($row = $stmt->fetch()) {
                                                                echo '
                                                                <div class="form-check documents" id="chkdoc">
                                                                <input class="form-check-input" type="checkbox" value="' . $row['doc'] . '" id="doc" name="doc[]">
                                                                <label class="form-check-label" for="">
                                                                    ' . $row['doc'] . '
                                                                </label>
                                                                </div>';
                                                            }
                                                            $stmt = null;
                                                            ?>

                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="form-group purpose">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <label><strong>Transcript of Records - First Copy</strong> (Enter Purpose of Request)</label>
                                                            <input type="text" name="" id="" class="form-control" placeholder="eg. Visa Application, Employment">

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label><strong>Transcript of Records - Duplicate Copy</strong> (Attach Copy of Original TOR)</label>
                                                            <input type="file" name="" id="" class="form-control">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">

                                                        <label><strong>Authentication/Certified True Copy</strong> </label>

                                                        <?php
                                                        $sql = "select * from documents where isActive=?";
                                                        $data = array('1');
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '
                                                            <div class="form-check documents" id="chkdoc">
                                                            <input class="form-check-input" type="checkbox" value="' . $row['doc'] . '" id="doc" name="doc[]">
                                                            <label class="form-check-label" for="">
                                                                ' . $row['doc'] . '
                                                            </label>
                                                            </div>';
                                                        }
                                                        $stmt = null;
                                                        ?>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label><strong>Receiver/Representative</strong></label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="Enter Name of Receiver">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label><strong>Contact Number</strong></label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="Enter Receiver's Contact Number">

                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label><strong>Delivery Address</strong>(Unit/House Number, Street Name, Subdivision/Village, Barangay/District Name, City/Municipality)</label>
                                                        <input type="text" name="" id="" class="form-control" placeholder="eg. #124, Don Vicente St., Brgy. Bagong Silangan, Quezon City">

                                                    </div>


                                                </div>



                                                <div class="col-lg-12">
                                                    <div class="text-right"> <input type="submit" name="action" id="action" class="btn btn-success" value="Submit"></div>
                                                </div>
                                        </form>

                                    </div>


                                </div>

                            </div>


                        </div>


                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- FULL DETAILS OF REQUEST -->
            <div class="modal fade" id="viewfulldetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg " role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="fa fa-list"></i><strong> Request Details</strong> </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="sendassessment.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="form-group">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="font-weight-bold text-gray-900">Date Requested:</label>
                                            <input type="hidden" name="enroll_id" id="assess_id" class="form-control">
                                            <input type="hidden" name="sid" id="sid" class="form-control">
                                            <input type="text" name="datereq" id="datereq" class="form-control" readonly>

                                        </div>
                                        <div class="col-lg-6">
                                            <label class="font-weight-bold text-gray-900">Status:</label>
                                            <input type="text" name="status" id="status" class="form-control" readonly>

                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="font-weight-bold text-gray-900">Course:</label>
                                            <input type="text" name="course" id="course" class="form-control" readonly>

                                        </div><br>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="font-weight-bold text-gray-900" for="attachment">Last School Attended:</label>
                                            <input type="text" name="lschool" id="lschool" class="form-control" readonly>

                                        </div><br>
                                        <div class="col-md-6">
                                            <label class="font-weight-bold text-gray-900" class="form-label">Year Graduated:</label>
                                            <input type="text" name="ygrad" id="ygrad" class="form-control" readonly>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="font-weight-bold text-gray-900">Documents Requested:</label>
                                            <textarea class="form-control" id="docrq" name="docrq" rows="4" readonly></textarea>
                                        </div><br>
                                        <div class="col-lg-6">
                                            <label class="font-weight-bold text-gray-900">Purpose of Request:</label>
                                            <textarea class="form-control" id="docp" name="docp" rows="4" readonly></textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-info" id="done" name="done"> Done</button>

                                </div>
                        </form>
                    </div>
                </div>
            </div>



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



    <script type="text/javascript" src="js/requestdocument.js">

    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
<script src="js/header.js"></script>


</html>