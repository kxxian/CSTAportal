<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Payments</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap.min.css">    

    <!-- Animate CSS  -->
    <link rel="stylesheet" href="plugins/animate_css/animate.min.css">
    
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


   
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
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    

                    <div class="card shadow mt-5">
                        <div class="card-header text-gray-900">
                        <i class="fas fa-coins"></i>
                            &nbsp;
                            Payments
                        </div>
                        <div class="card-body text-gray-900">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="card shadow">
                                        <div class="card-header ">
                                        <i class="fas fa-info-circle"></i>
                                            &nbsp;
                                            CSTA Bank Details
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li>METROBANK (MBTC)
                                                    <ul>
                                                        <li>Account Name: <b>COLEGIO DE STA. TERESA DE AVILA, INC.</b></li>
                                                        <li>Account Number: <b>190-7-19081612-1</b></li>
                                                    </ul>
                                                </li>
                                                <li>BANCO DE ORO (BDO)
                                                    <ul>
                                                        <li>Account Name: <b>COLEGIO DE STA. TERESA DE AVILA, INC.</b></li>
                                                        <li>Account Number: <b>00127-149-55-95</b></li>
                                                    </ul>
                                                </li>
                                                <li>CSTA GCASH
                                                    <ul>
                                                        <li>Gcash Number: <b>09664635789</b></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card shadow">
                                        <div class="card-header">
                                        <i class="fas fa-upload"></i>
                                            &nbsp;
                                            Upload Proof of Payment
                                        </div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <label for="fileName">File Name:</label>
                                                <input type="text" id="fileName" name="fileName" class="form-control" placeholder="e.g proofPayment_JohnDoe" autofocus required>
                                                <label for="fileUpload" class="mt-3">File Upload:</label>
                                                <input type="file" id="file" name="file" class="form-control" required>
                                                <label for="email" class="mt-3">Email:</label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Current Email Address" required>
                                                <label for="fullName" class="mt-3">Fullname:</label>
                                                <input type="text" id="fullName" name="fullName" class="form-control" placeholder="Enter Fullname" required>
                                                <div class="mt-3">
                                                    <button id="btnSubmit" class="btn btn-success">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="js/guest_payments.js"></script>
</body>

</html>
