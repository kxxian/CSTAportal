<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Main</title>

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

                <div>
                    <h1 class="text-gray-900 ml-3 mb-3 mt-3">
                    Courses Offered 
                    </h1>
                </div>
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card shadow mb-5">
                                <div class="card-header text-gray-900">
                                <i class="fas fa-scroll"></i>
                                    &nbsp;
                                    Courses
                                </div>
                                <div class="card-body text-gray-900">
                                    <ul>
                                        <li>Bachelor of Science in Information Technology</li>
                                        <li>Bachelor of Science in Hospitality Managemet</li>
                                        <li>Bachelor of Science in Tourism Management</li>
                                        <li>Bachelor of Science in Secondary Education</li>
                                        Major in:
                                        <ul>
                                            <li>English</li>
                                            <li>Filipino</li>
                                            <li>Mathematics</li>
                                            <li>Social Science</li>
                                        </ul>
                                        <li>Bachelor of Science in Elementary Education</li>
                                        Major in:
                                        <ul>
                                            <li>Preschool Education</li>
                                            <li>General Education</li>
                                        </ul>
                                        <li>Certificate of Professional Education (CPE)</li>
                                    </ul>
                                    <a href="guest_register.php" title="Go to registration page">Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-5">
                                <div class="card-header text-gray-900">
                                <i class="fas fa-user-graduate"></i>
                                    &nbsp;
                                    TESDA Courses
                                </div>
                                <div class="card-body text-gray-900">
                                    <ul>
                                        <li>Bartending NCII</li>
                                        <li>Bread and Pastry Production NCII</li>
                                        <li>Food and Bevarage Services NCII</li>
                                        <li>Front Office Servcies NCII</li>
                                        <li>Housekeeping NCII</li>
                                        <li>Tourguiding NCII</li>
                                        <li>Cookery NCII</li>
                                        <li>Caregiving NCII</li>
                                    </ul>
                                    <div class="card-body text-gray-900">
                                        Contact Us:
                                            <ul>
                                                <li>827-539-16</li>
                                                <li>893-991-38</li>
                                                <li>835-591-16</li>
                                            </ul>
                                        </div>
                                    <a href="guest_register_tesda.php" title="Go to registration page">Register</a>
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
