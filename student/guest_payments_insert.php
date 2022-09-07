
<?php 
    require('includes/connect.php');
 ?>
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
                        <h1 class="text-gray-900">Payments</h1>
                    </div>
                    <div>
                        <a href="guest_payments.php">
                            <button class="btn btn-primary" title="Go back to account details">Go Back</button>
                        </a>
                    </div>         
                        <div class="card-body text-gray-900 mb-5">
                            <div class="row">
                                <div class="col-md-11">
                                    <form id="myForm">
                                        <div class="card shadow">
                                            <div class="card-header ">
                                            <i class="fas fa-coins"></i>
                                                &nbsp;
                                                Payment
                                            </div>
                                            <div class="card-body">
                                                <div class="card shadow mb-3">
                                                    <div class="card-body">
                                                        <p class="text-gray-600"><b class="text-gray-900">NOTE:</b> Please use the same email address you used to register.</p>
                                                        <div class="row mb-3">
                                                    <div class="col-md-4">
                                                            <label for="trackerId" class="font-weight-bold">Tracker Id:</label>
                                                            <input type="text" id="trackerId" name="trackerId" value="<?php echo uniqid()?>" class="form-control" placeholder="Match the tracker Id shown above" required readonly>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span>*If you wish to monitor your payment status, save your tracker id.</span>
                                                    </div>
                                                    </div>
                                                        <a href="guest_check_payment.php" title="Click to continue">Check Payment Status</a>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="dateOfPayment">Date & time of Payment:</label>
                                                        <input type="datetime-local" id="dateOfPayment" name="dateOfPayment" class="form-control" step="1" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="tutionFee">Tution Fee:</label>
                                                        <select name="tutionFee" id="tutionFee" class="form-control" required>
                                                            <option value="" selected disabled>Choose...</option>
                                                            <option value="Downpayment">Downpayment</option>
                                                            <option value="Cash">Cash</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="schoolYear">School Year:</label>
                                                        <select name="schoolYear" id="schoolYear" class="form-control" style="pointer-events: none;">
                                                            <?php 
                                                                $sql = "SELECT * FROM schoolyr WHERE status='ACTIVE'";
                                                                $stmt = $con->query($sql);
                                                                
                                                                foreach ($stmt as $row) {
                                                                    echo '<option value="'.$row['schoolyr_ID'].'">'.$row['schoolyr'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="paymentMethod">Payment Method:</label>
                                                        <select name="paymentMethod" id="paymentMethod" class="form-control" required>
                                                            <option value="" selected disabled>Choose...</option>
                                                            <?php 
                                                                $sql = "SELECT * FROM paymethod";
                                                                $stmt = $con->query($sql);
                                                                
                                                                foreach ($stmt as $row) {
                                                                    echo '<option value="'.$row['paymethod_ID'].'">'.$row['paymethod'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="sentVia">Sent Via:</label>
                                                        <select name="sentVia" id="sentVia" class="form-control" required>
                                                            <option value="" selected disabled>Choose...</option>
                                                            <?php 
                                                                $sql = "SELECT * FROM sentvia";
                                                                $stmt = $con->query($sql);
                                                                
                                                                foreach ($stmt as $row) {
                                                                    echo '<option value="'.$row['sentvia_ID'].'">'.$row['sentvia'].'</option>';
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="totalAmount">Total Amount (Minimum 3000):</label>
                                                        <input type="number" id="" name="totalAmount" class="form-control" placeholder="0" style="text-align:right;" required>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="image">Proof of Payment:</label>
                                                        <input type="file" id="image" name="image" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="studentName">Student Name:</label>
                                                        <input type="text" id="studentName" name="studentName" class="form-control" placeholder="e.g John Doe" required>
                                                    </div>
                                                    <div class="col-md-4 mt-3">
                                                        <label for="email">Email:</label>
                                                        <input type="email" id="email" name="email" class="form-control" placeholder="e.g sample@mail.com" required>
                                                    </div>
                                                    
                                                    <div class="col-md-4 mt-3">
                                                        <label for="image2">Assessment Form:</label>
                                                        <input type="file" id="image2" name="image2" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4 mt-5">
                                                        <input type="hidden" name="guest_status" value="PENDING" class="form-control" readonly>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <button id="btnSubmit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="js/guest_payments_insert.js"></script>
</body>

</html>
