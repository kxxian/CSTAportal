<?php 
    require('includes/connect.php');

    if (isset($_GET['trackerId'])) {
        $trackerId = $_GET['trackerId'];
        $sql = "SELECT * FROM vwguest_payments WHERE guest_trackerId=?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$trackerId]);
        $pull = $stmt->fetch();

        // TODO: fetch guest payments based on tracker id
        $guest_dtPayment = $pull['guest_dtPayment'];
        $guest_tfee = $pull['guest_tfee'];
        $guest_schoolYear = $pull['schoolyr'];
        $guest_payMethod = $pull['paymethod'];
        $guest_sentVia = $pull['sentvia'];
        $guest_totalAmt = $pull['guest_totalAmt'];
        $guest_proofPayIMG = $pull['guest_proofPayIMG'];
        $guest_studName = $pull['guest_studName'];
        $guest_email = $pull['guest_email'];
        $guest_trackerId = $pull['guest_trackerId'];
        $guest_assessForm = $pull['guest_assessForm'];
        $guest_status = $pull['guest_status'];
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

    <title>CSTA Portal Guest | Tracker</title>

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
                <?php 
                    require('includes/guest_header.php');
                ?>
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    <div class="mb-3">
                        <h1 class="text-gray-900">Payment Status</h1>
                    </div>
                    <div>
                        <a href="guest_payments.php">
                            <button class="btn btn-primary" title="Go back to account details">Go Back</button>
                        </a>
                    </div>         
                        <div class="card-body text-gray-900 mb-5">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="card shadow">
                                        <div class="card-header">
                                        <i class="fas fa-search"></i>
                                            &nbsp;
                                            Tracker Id
                                        </div>
                                        <div class="card-body">
                                            <form id="myForm">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="text" id="trackerId" name="trackerId" onInput="checkTrackerId()" class="form-control" placeholder="e.g 630ac94fe6622" required autofocus>
                                                        <span id="valid_trackerId"></span>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button id="btnSubmit" class="btn btn-success">Done</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card shadow">
                                        <div class="card-header">
                                        <i class="fas fa-info-circle"></i>
                                            &nbsp;
                                            Payment Information
                                        </div>
                                        <div class="card-body"> 
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="dateTimePayment">Date & Time of Payment:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_dtPayment ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>  
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="tfee">Tution Fee:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_tfee ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="schoolYear">School Year:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_schoolYear ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="payMethod">Payment Method:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_payMethod ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="sentVia">Sent Via:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_sentVia ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="totalAmount">Total Amount:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_totalAmt ?>" style="text-align:right;" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="0" style="text-align:right;" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="studentName">Student Name:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_studName ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="email">Email:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_email ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="trackerId">Tracker Id:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_trackerId ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label for="status">Payment Status:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <input type="text" class="form-control" value="<?php echo $guest_status ?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" value="N/A" readonly>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Uploaded File 1:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <a href="uploads/guest/payments/<?php echo $guest_proofPayIMG ?>">Proof of Payment</a>
                                                    <?php } else { ?>
                                                        <a href="#">N/A</a>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <label>Uploaded File 2:</label>
                                                    <?php if (isset($_GET['trackerId'])) { ?>
                                                        <a href="uploads/guest/payments/<?php echo $guest_assessForm ?>">Assessment Form</a>
                                                    <?php } else { ?>
                                                        <a href="#">N/A</a>
                                                    <?php } ?>
                                                </div>
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
    <script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/guest_check_payment.js"></script>
</body>

</html>
