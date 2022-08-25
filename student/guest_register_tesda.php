<?php 
    require("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Guest Register TESDA</title>

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
             

                <div>
                    <h1 class="text-gray-900 ml-3 mb-3 mt-3">Guest Registration TESDA</h1>
                </div>
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    <div class="row">
                        <a href="guest_main.php">
                                <button class="btn btn-primary mb-5" title="Go back to main page">
                                  Go Back
                                </button>
                        </a>
                        <div class="col-md-12">
                            <p><b class="text-gray-900">NOTE:</b> Please provide the needed requirements after registering.
                                <a href="guest_requirements.php">Click Here</a>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow mb-5">
                                <div class="card-header text-gray-900">Requirerment Form</div>
                                <div class="card-body">
                                    <form id="myForm" class="row g-3">
                                        <div class="col-md-3">
                                            <label for="firstName" class="text-gray-900">First Name:</label>
                                            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter First Name" required autofocus>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="lastName" class="text-gray-900">Last Name:</label>
                                            <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter Last Name" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="middleName" class="text-gray-900">Middle Name:</label>
                                            <input type="text" id="middleName" name="middleName" class="form-control" placeholder="Enter Middle Name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="suffix" class="text-gray-900">Suffix:</label>
                                            <input type="text" id="suffix" name="suffix" maxlength="10" class="form-control" placeholder="e.g Jr., Sr., I, II, III, IV (Optional)">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="address" class="text-gray-900">Address:</label>
                                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter Current Address" required>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="email" class="text-gray-900">Email:</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Current Email Address" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="mobile" class="text-gray-900">Mobile:</label>
                                            <input type="text" id="mobile" name="mobile" maxlength="11" class="form-control" placeholder="Enter Current Mobile" required>
                                        </div>
                                        <div class="col-md-3 mt-3">
                                            <label for="telno" class="text-gray-900">Telephone:</label>
                                            <input type="text" id="telno" name="telno" maxlength="10" class="form-control" placeholder="Enter Current Telephone #" required>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label for="course" class="text-gray-900">Course:</label>
                                            <select name="course" id="course" class="form-control" required>
                                                <option value="" selected disabled>Choose...</option>
                                                <?php 
                                                    $sql = "SELECT * FROM course_tesda";
                                                    $stmt = $con->query($sql);

                                                    foreach ($stmt as $row) {
                                                        echo '<option value="'.$row['cid'].'">'.$row['course'].'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="guardian" class="text-gray-900">Guardian:</label>
                                            <input type="text" id="guardian" name="guardian" class="form-control" placeholder="Enter Guardian Name" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="guardianNo" class="text-gray-900">Guardian No.:</label>
                                            <input type="text" id="guardianNo" name="guardianNo" maxlength="11" class="form-control" placeholder="Enter Guardian #" required>
                                        </div>
                                        <div class="col-md-4 mt-3">
                                            <label for="guardianEmail" class="text-gray-900">Guardian Email:</label>
                                            <input type="text" id="guardianEmail" name="guardianEmail" class="form-control" placeholder="Enter Guardian Email" required>
                                        </div>
                                        <div class="col-md-12">
                                            <button id="btnSubmit" class="btn btn-success mt-3">Submit</button>
                                        </div>
                                    </form>
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
    <script src="js/guest_register_tesda.js"></script>
</body>

</html>
