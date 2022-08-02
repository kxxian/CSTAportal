<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSTA Portal | Assessment</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap plugins -->
    <link rel="stylesheet" href="plugins/bootstrap.bundle.min.js">

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
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="text-gray-900 font-weight-bold mb-3">Welcome, to Assessment Page!</h3>
                        <a href="enrollment.php" type="button" class="btn btn-primary mb-3" title="Back to enrollment page">Go back</a>
                        <div class="row">
                            <p class="text-gray-900 font-weight-bold mx-2">NOTE:</p>
                            <p>please upload your required documents/files to be assessed.</p>
                        </div>
                        <form id="myForm">
                            <div class="card shadow">
                                <div class="card-header text-gray-900 font-weight-bold">
                                    <i class="fas fa-tasks"></i>    
                                    &nbsp;
                                    Assessment Form
                                </div>
                                <div class="card-body">
                                    <label for="filename" class="text-gray-900 font-weight-bold">File Name</label>
                                    <input type="text" id="filename" name="filename" class="form-control mb-3" placeholder="e.g copyofgrades_2022_2023" required autofocus>
                                    <label for="fileupload" class="text-gray-900 font-weight-bold">File Upload</label>
                                    <input type="file" id="fileupload" name="fileupload" class="form-control mb-3" required>
                                    <button id="btnSubmit" class="btn btn-success w-100">Submit</button>
                                    <a href="assess_upload_history.php" class="float-right m-1">View upload history</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
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



    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="js/assessment.js"></script>
</body>
</html>