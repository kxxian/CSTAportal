<?php
session_start();
require_once("includes/connect.php");
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Home</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">

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


    <!-- Google Recaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



    <style>
        .item img {
            height: 280px;
        }

        .row a {
            text-decoration: none;
        }

        * {
            box-sizing: border-box;
        }

        /* Style the search field */
        form.example input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: 1px solid grey;
            float: left;
            width: 80%;
            background: #f1f1f1;
        }

        /* Style the submit button */
        form.example button {
            float: left;
            width: 20%;
            padding: 10px;
            background: #2196F3;
            color: white;
            font-size: 17px;
            border: 1px solid grey;
            border-left: none;
            /* Prevent double borders */
            cursor: pointer;
        }

        form.example button:hover {
            background: #0b7dda;
        }

        /* Clear floats */
        form.example::after {
            content: "";
            clear: both;
            display: table;
        }




        .search-form {
            width: 80%;
            margin: 0 auto;
            margin-top: 1rem;
        }

        .search-form input {
            height: 100%;
            background: transparent;
            border: 0;
            display: block;
            width: 100%;
            padding: 1rem;
            height: 100%;
            font-size: 1rem;
        }

        .search-form select {
            background: transparent;
            border: 0;
            padding: 1rem;
            height: 100%;
            font-size: 1rem;
        }

        .search-form select:focus {
            border: 0;
        }

        .search-form button {
            height: 100%;
            width: 100%;
            font-size: 1rem;
        }

        .search-form button svg {
            width: 24px;
            height: 24px;
        }

        .search-body {
            margin-bottom: 1.5rem;
        }

        .search-body .search-filters .filter-list {
            margin-bottom: 1.3rem;
        }

        .search-body .search-filters .filter-list .title {
            color: #3c4142;
            margin-bottom: 1rem;
        }

        .search-body .search-filters .filter-list .filter-text {
            color: #727686;
        }

        .search-body .search-result .result-header {
            margin-bottom: 2rem;
        }

        .search-body .search-result .result-header .records {
            color: #3c4142;
        }

        .search-body .search-result .result-header .result-actions {
            text-align: right;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .search-body .search-result .result-header .result-actions .result-sorting {
            display: flex;
            align-items: center;
        }

        .search-body .search-result .result-header .result-actions .result-sorting span {
            flex-shrink: 0;
            font-size: 0.8125rem;
        }

        .search-body .search-result .result-header .result-actions .result-sorting select {
            color: #68CBD7;
        }

        .search-body .search-result .result-header .result-actions .result-sorting select option {
            color: #3c4142;
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            .search-body .search-filters {
                display: flex;
            }

            .search-body .search-filters .filter-list {
                margin-right: 1rem;
            }
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        require_once("includes/guest_sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require('includes/guest_header.php');
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- The form -->



                    <div class="row">
                        <div class="col-lg-12 card-margin">
                            <div class="card search-form">
                                <div class="card-body p-0">
                                    <form id="search-form" action="" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row no-gutters">
                                                    <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                                        <select class="form-control" id="exampleFormControlSelect1" required>
                                                            <option selected value="" disabled>Student Type</option>
                                                            <option>Freshman</option>
                                                            <option>Transferee</option>
                                                            <option>Second Course Taker</option>
                                                            <option>Cross-Enrollee</option>
                                                            <option>Unit Earner</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-8 col-md-6 col-sm-12 p-0">
                                                        <input type="text" maxlength="10" placeholder="Enter enrollment number..." class="form-control" id="enrollnum" name="enrollnum">
                                                    </div>
                                                    <div class="col-lg-1 col-md-3 col-sm-12 p-0">
                                                        <button type="submit" name="submit" class="btn btn-base">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                                <circle cx="11" cy="11" r="8"></circle>
                                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>


                    <!-- Page Heading -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="header-title pb-3 mt-0 text-gray-900 font-weight-bold">Enrollment Details</h5>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr class="align-self-center">

                                            <th class="text-gray-900 font-weight-bold text-center">Student Name</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Course</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Email</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Attachments</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Date Sent</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Status</th>
                                            <th class="text-gray-900 font-weight-bold text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        if (isset($_POST['submit'])) {
                                            $enrollno = $_POST['enrollnum'];
                                            //echo "<script>alert($enrollno)</script>";
                                            $sql = "SELECT * from `vwguest_enrollment_freshman` where enroll_no=?";
                                            $data = array($enrollno);
                                            $stmt = $con->prepare($sql);
                                            $stmt->execute($data);
                                            // $row = $stmt->fetch();

                                            while ($row = $stmt->fetch()) {

                                            

                                                //check attachments in directory
                                                $bc = "uploads/requirements/freshman/bc/{$row['ge_id']}.pdf";
                                                $form = "uploads/requirements/freshman/f138/{$row['ge_id']}.pdf";
                                                $gm = "uploads/requirements/freshman/gmc/{$row['ge_id']}.pdf";

                                                //birth certificate
                                                if (file_exists($bc)) {
                                                    $birth = '
                                                         <a title="Birth/Marriage Certificate" class="btn btn-warning btn-sm" target="_blank" href="uploads/payverif/docrequestform/' . $row['ge_id'] . '.jpg">
                                                         <i class="fa fa-receipt fa-fw"></i></a>
                                                         ';
                                                } else {
                                                    $birth = "";
                                                }

                                                if (file_exists($form)) {
                                                    $f138 = '<a title="Form 138" class="btn btn-primary btn-sm" target="_blank" href="uploads/payverif/payments/' . $row['ge_id'] . '.jpg">
                                                        <i class="fa fa-receipt fa-fw"></i></a>';
                                                } else {
                                                    $f138 = "";
                                                }

                                                if (file_exists($gm)) {
                                                    $gmc = '<a title="Form 138" class="btn btn-info btn-sm" target="_blank" href="uploads/payverif/payments/' . $row['ge_id'] . '.jpg">
                                                        <i class="fa fa-receipt fa-fw"></i></a>';
                                                } else {
                                                    $gmc = "";
                                                }

                                        ?>
                                                <tr>

                                                    <td class="text-center text-gray-900"><?php echo $row['lname'] . ", " . $row['fname'] . " " . $row['mname'] ?></td>
                                                    <td class="text-center text-gray-900"><?php echo $row['course'] ?></td>
                                                    <td class="text-center text-gray-900"><?php echo $row['email'] ?></td>
                                                    <td class="text-center text-gray-900"><?php echo $birth.$f138.' '.$gmc  ?></td>

                                                    <td class="text-center text-gray-900"><?php echo $row['date_submitted'] ?></td>
                                                    <td class="text-center text-gray-900"><span class="badge badge badge-warning"><?php echo $row['enrollment_status'] ?></span></td>
                                                    <td class="text-center text-gray-900">
                                                        <button type="button" name="delete" id="<?= $row["ge_id"] ?>" class="btn btn-danger btn-sm delete" title="Cancel"><i class="fa fa-fw fa-times"></i></button>
                                                    </td>
                                                </tr>

                                    </tbody>
                                <?php
                                            }
                                        } else {
                                ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            <?php }

                            ?>











                                </table>
                            </div>
                            <!--end table-responsive-->

                        </div>
                    </div>
                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require_once("includes/guest_footer.php");
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Jquery
    <script src="plugins/jquery/jquery.min.js"></script>-->

    <!-- Owl Carousel -->
    <!-- <script src="plugins/owl_carousel/owl.carousel.min.js"></script> -->

</body>


<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>

<script type="text/javascript" src="js/trackenrollment.js"></script>