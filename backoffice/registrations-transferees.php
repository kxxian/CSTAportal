<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

//get office from fetchuserdetails.php
$office = $Office;


if (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])) {
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

    <title>Registrations</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable css -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!--Jquery Datatables Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

    <!-- Export -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <style>
        .account-settings .user-profile {
            margin: 0 0 1rem 0;
            padding-bottom: 1rem;
            text-align: center;
        }

        .account-settings .user-profile .user-avatar {
            margin: 0 0 1rem 0;
        }

        .account-settings .user-profile .user-avatar img {
            width: 90px;
            height: 90px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            border-radius: 100px;
        }

        .account-settings .user-profile h5.user-name {
            margin: 0 0 0.5rem 0;
        }

        .account-settings .user-profile h6.user-email {
            margin: 0;
            font-size: 0.8rem;
            font-weight: 400;
            color: #9fa8b9;
        }

        .account-settings .about {
            margin: 2rem 0 0 0;
            text-align: center;
        }

        .account-settings .about h5 {
            margin: 0 0 15px 0;
            color: #007ae1;
        }

        .account-settings .about p {
            font-size: 0.825rem;
        }

        .form-control {
            border: 1px solid #cfd1d8;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            font-size: .920rem;
            background: #ffffff;
            color: #2e323c;
        }
    </style>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if ($office == "Registrar") {
            $pageValue = 2;
        } else {
            header("Location:index.php");
        }

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
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-user-plus fa-fw"></i> Registrations - Transferees

                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="transfereesTable" class="table table-bordered text-gray-900" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Student No.</th>
                                            <th class="text-center">Student Name</th>
                                            <th class="text-center">Year Level</th>
                                            <th class="text-center">Course</th>
                                            <th class="text-center">Date Registered</th>
                                            <th width="120" class="text-center">Actions</th>
                                        </tr>

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

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
    <!-- <script src="js/pending-payments.js"></script> -->
  
    <script src="js/sweetalert.min.js"></script>
    
    <!-- Choose which counter should be included in the script -->
    <?php
    if ($office == "Registrar") {
    ?>
        <!-- script here -->
        <script src="js/counter-registrar.js"></script>

    <?php
    } else if ($office == "Dean") {
    ?>
        <!-- script here -->
        <script src="js/counter-dean.js"></script>


    <?php
    } else if ($office == "Accounting") {
    ?>
        <!-- script here -->
        <script src="js/counter-dean.js"></script>

    <?php
    }

    ?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->


</body>

</html>

<div id="declineModal" class="modal fade">
    <div class="modal-dialog modal-md">
        <form method="POST" id="declineForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900 font-weight-bold"> <i class="far fa-fw fa-thumbs-down"></i> <span class="title"></span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="fullname" class="text-gray-900 font-weight-bold">To:</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="fullname" id="fullname" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" readonly>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900"><strong>Reason</strong> (Separate by comma if multiple)</label>
                            <input type="text" name="reason" id="reason" class="form-control" placeholder="Enter Reason..">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Decline">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
<div id="studinfoModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <form method="POST" id="acceptForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900 font-weight-bold"> <i class="fas fa-fw fa-user"></i> <span class="title"></span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row gutters">

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card h-100">
                                <div class="card-body text-gray-900">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <label for="studtype" class="font-weight-bold">Student Type</label>
                                            <input readonly type="text" class="form-control" id="studtype" name="studtype">
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <label for="snum" class="font-weight-bold">Student Number</label>
                                            <input readonly type="text" class="form-control" id="snum" name="snum">
                                        </div>
                                    </div>
                                    <div class="row gutters">

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                            <div class="form-group">
                                                <label for="fullnames" class="font-weight-bold">Full Name</label>
                                                <input readonly type="text" class="form-control" id="fullnames" name="fullnames">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                                            <div class="form-group">
                                                <label for="yrcourse" class="font-weight-bold">Year Level and Course</label>
                                                <input type="text" class="form-control" id="yrcourse" name="yrcourse" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="bday" class="font-weight-bold">Birthdate</label>
                                                <input type="text" class="form-control" id="bday" name="bday" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="gender" class="font-weight-bold">Gender</label>
                                                <input type="text" class="form-control" id="gender" name="gender" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gutters">

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="cstatus" class="font-weight-bold">Civil Status</label>
                                                <input type="name" class="form-control" id="cstatus" name="cstatus" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="emails" class="font-weight-bold">Email Address</label>
                                                <input type="emails" class="form-control" id="emails" name="emails" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="address" class="font-weight-bold">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" readonly>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card h-100 text-gray-900">
                                <div class="card-body">
                                    <div class="row gutters">

                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="mothermaiden" class="font-weight-bold">Mother's Maiden Name</label>
                                                <input type="text" class="form-control" id="mothermaiden" name="mothermaiden" readonly>
                                            </div>
                                        </div>



                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-gray-900 font-weight-bold">Emergency Contact Person</h6>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="guardian" class="font-weight-bold">Name</label>
                                                <input type="name" class="form-control" id="guardian" name="guardian" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="phone1" class="font-weight-bold">Contact Number 1</label>
                                                <input type="name" class="form-control" id="phone1" name="phone1" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label for="phone2" class="font-weight-bold">Contact Number 2</label>
                                                <input type="name" class="form-control" id="phone2" name="phone2" readonly>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="text-right">
                                                <input type="hidden" name="operations" id="operations">
                                                <input type="hidden" name="acc_id" id="acc_id">
                                                <button type="button" id="close" name="submit" class="btn btn-secondary">Cancel</button>
                                                <input type="submit" id="submit" name="submit" class="btn btn-success" value="Accept">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

</div>






<script src="js/registrations-transferees.js"></script>
</div>