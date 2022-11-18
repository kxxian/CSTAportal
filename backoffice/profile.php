<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'codes/fetchuserdetails.php';

$office = $Office;

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

    <title>Profile</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <!-- Bootstrap CSS  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->



    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <style>
        .main-body {
            padding: 5px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 140px;
            height: 140px;
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
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 1;
        require_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                <?php require_once('includes/header.php'); ?>
                <!-- End of Header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class=" mb-4">
                        <h3 class="h3 mb-0 text-gray-900 "><strong>My Profile</strong></h3>
                    </div>

                    <!-- Content Row -->
                    <div class="container">
                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="d-flex flex-column align-items-center text-center">
                                                <form action="profilepicupload.php" method="post" enctype="multipart/form-data">
                                                    <div class="picture-container">
                                                        <div class="picture">

                                                            <?php
                                                            $file = 'uploads/users/' . $empid . '.jpg';
                                                            if (!file_exists($file)) {
                                                                $dp = 'default.jpg';
                                                            } else {
                                                                $dp = $empid . '.jpg';
                                                            }
                                                            echo '<img  src="uploads/users/' . $dp . '" class="picture-src" id="wizardPicturePreview" width="150" title="Choose Picture">' ?>
                                                            <input type="file" id="wizard-picture" name="picture" accept=".jpg" class="">
                                                        </div><br>

                                                    </div>
                                                    <center><button style="margin-bottom:15px; margin-top:15px;" type="submit" onclick="upload()" class="btn btn-primary"><i class="fas fa-save"></i> Change</button></center>
                                                </form>
                                                <div class="mt-2">
                                                    <h4 class="text-gray-900 font-weight-bold"><?= $empname ?></h4>
                                                    <p class="text-secondary mb-1 text-gray-900"><?= $position ?></p>
                                                    <p class="text-muted font-size-sm text-gray-900">Office of <?= $office ?></p>


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
                                                    <h6 class="font-weight-bold text-gray-900">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?= $empname ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="font-weight-bold text-gray-900">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?= $useremail ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="font-weight-bold text-gray-900">Mobile</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?= $mobile ?>
                                                </div>
                                            </div>
                                            <hr>



                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="font-weight-bold text-gray-900">Office</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?= $office ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="font-weight-bold text-gray-900">Designation</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <?= $position ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-sm-12">
                                                <button type="button" class="btn btn-info editinfo" id="<?= $empid ?>">
                                                    Edit
                                                </button>
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





            <!-- Content Row -->


            <!-- /.container-fluid -->
            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->


    </div>


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- scripts -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>






</body>
<?php
include_once("includes/scripts.php");
?>


<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/edit_info.js"></script>

</html>

<div id="editinfoModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editinfoForm" action="codes/editinfo.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-user"></i> <span class="title">Edit Information</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row" hidden>
                        <div class="col-sm-12">
                            <span class="   font-weight-bold" style="color:red;">*Reselect District, City and Barangay when editing your information</span>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="lname" class="text-gray-900 font-weight-bold">Last Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="lname" id="lname" class="form-control" placeholder="Last Name.." readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="text-gray-900 font-weight-bold">First Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="fname" id="fname" class="form-control" placeholder="First Name.." readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="mname" class="text-gray-900 font-weight-bold">Middle Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="mname" id="mname" class="form-control" placeholder="Middle Name.." readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..">
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="text-gray-900 font-weight-bold">Mobile No.</label>
                            <input type="number" name="mobile" id="mobile" class="form-control" onKeyPress="if(this.value.length==11) return false;" placeholder="Enter Mobile No..">
                        </div>
                    </div>


                    <div class="modal-footer">
                        <div class="col-sm-6">
                           
                            <span></span><input type="password" placeholder="Password Required" class="form-control" name="password" id="password" required>
                        </div>

                        <input type="hidden" name="user_id" id="user_id">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="save" id="action" class="btn btn-success" value="Save">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>