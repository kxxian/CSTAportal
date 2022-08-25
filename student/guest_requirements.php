<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Requirements</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap.min.css">    
    
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
                    

                    <div class="card shadow mt-5 mb-5">
                        <h5 class="card-header text-gray-900">
                        <i class="fas fa-tasks"></i>
                            &nbsp;
                            Requirements
                        </h5>
                        <div class="card-body">
                            <p><b class="text-gray-900">NOTE:</b> Submit the required documents to the school's registrar. </p>
                            <p>*Hand-carried F137A must be in a sealed enveloped with flaps signed by the School Registrar.</p>
                            <p>*It is not recommended to submit these papers online, physical copies are required unless there are constraints.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card shadow">
                                         <div class="card-header text-gray-900">
                                         <i class="fas fa-male"></i>
                                            &nbsp;
                                             Freshmen
                                         </div>
                                         <div class="card-body">
                                            <ul class="text-gray-900">
                                                <li>Form 138</li>
                                                <li>Form 137A</li>
                                                <li>Good Moral Certificate</li>
                                                <li>Birth Certificate (PSA)</li>
                                            </ul>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card shadow">
                                        <div class="card-header text-gray-900">
                                        <i class="fas fa-exchange-alt"></i>
                                            &nbsp;
                                            Transferees
                                        </div>
                                        <div class="card-body">
                                            <ul class="text-gray-900">
                                                <li>Transcript of Record</li>
                                                <li>Honorable Dismissal</li>
                                                <li>Good Moral Certificate</li>
                                                <li>Birth Certificate (PSA)</li>
                                            </ul>
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

</body>

</html>
