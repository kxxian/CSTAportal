
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
                    

                    <div class="card shadow mt-5">
                        <div class="card-body text-gray-900">
                           <h5 class="card-title">Welcome, to CSTA Portal you are currently logged in as guest!</h5>
                           <div class="card-body text-gray-900" style="text-align: justify;">Guest users must not have a student ID if so, just return and sign in. You are being informed that this website will collect personal data in order to fulfill any transactions and kindly provide the necessary information. Please wait for the response to be sent via Gmail after submitting we'll make sure that all provided information is protected. We really hope you enjoy your time at Colegio de Sta. Teresa de Avila. Enjoy your day! </div>
                           <div class="card-body">
                               <a href="guest_main.php" title="Go to main page">Proceed</a>
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