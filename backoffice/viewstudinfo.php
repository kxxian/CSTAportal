<?php
session_start();
require_once("includes/connect.php");
require_once("includes/fetchstudentdetails.php");
require_once('includes/fetchuserdetails.php');

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
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

    <title>CSTA Admin | Student Information</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>
    <style>
        .address {
            text-transform: capitalize;
        }

        /* 
    .card{
     
      background-color: #e9e7e5;

    } */


        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: gray;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src {
            width: 100%;

        }

        /*Profile Pic End*/
    </style>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 2;
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
                    <h1 class="h4 mb-4 text-gray-900"><i class="fas fa-user"></i> Student Information</h1>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><i class="fas fa-arrow-left"></i> <a href="students-registered.php">Back</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Information</li>
                        </ol>
                    </nav>
                    <div class="main-body">





                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <?php
                                                    //check if picture is existing in uploads/users   
                                                    $file = '../student/uploads/users/' . $username . '-' . $bday . '.jpg';
                                                    if (!file_exists($file)) {
                                                        $dp = 'default.jpg';
                                                    } else {
                                                        $dp = $username . '-' . $bday . '.jpg';
                                                    }
                                                    echo '<img  src="../student/uploads/users/' . $dp . '" alt="Admin" class="rounded-circle" width="120">';
                                                    ?>
                                                    <div class="mt-3">
                                                        <h4 class="text-gray-900"><?= $fullname ?></h4>
                                                        <p class="text-secondary mb-1 text-gray-900"><?= $snum ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $yrlevel ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $course ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $fullname ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Birthday</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $bday ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3 ">
                                                        <h6 class="mb-0 text-gray-900">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $email ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $mobile ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $address ?>, <?= $region ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Guardian</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardian ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardiancontact ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="subreq">
                                <div class="row gutters-sm">


                                    <div class="col-md-12">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fa-solid fa-file-circle-check"></i><i class="fas fa-file-alt"></i> Requirements Uploaded</h6>
                                            </div>
                                            <?php
                                            $query = "Select * from studreq where sid=?";
                                            $dataa = array($_GET['id']);
                                            $stmtt = $con->prepare($query);
                                            $stmtt->execute($dataa);
                                            $count = $stmtt->rowCount();

                                            if ($count == 0) {

                                                echo '<h6 class="text-center" style="font-weight:bold; color:red;">No File Available</h6>';
                                            } else {

                                                include('includes/uploadedreqs.php');
                                            }

                                            ?>
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

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->


    </div>

    </div>



    <!-- End of Page Wrapper -->
    <script>
        $(document).ready(function() {
            // Prepare the preview for profile picture
            $("#wizard-picture").change(function() {
                readURL(this);
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>