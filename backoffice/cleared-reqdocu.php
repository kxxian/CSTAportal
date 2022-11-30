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

    <title>Documents Requests</title>
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
        .card {
            border: none;
            -webkit-box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            margin-bottom: 30px;
        }

        .custom-table th {
            font-weight: 500;
            color: #827fc0;
        }

        .custom-table thead {
            background-color: #f3f2f7;
        }

        .custom-table>tbody>tr>td,
        .custom-table>tfoot>tr>td,
        .custom-table>thead>tr>td {
            padding: 14px 12px;
            vertical-align: middle;
        }

        .custom-table tr td {
            color: #8887a9;
        }

        .thumb-sm {
            height: 32px;
            width: 32px;
        }

        .badge-soft-warning {
            background-color: rgba(248, 201, 85, .2);
            color: #f8c955;
        }

        .badge {
            font-weight: 500;
        }

        .badge-soft-primary {
            background-color: rgba(96, 93, 175, .2);
            color: #605daf;
        }



        /* invoice */
        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #bcd0f7;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #8a99b5;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: white;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #272e48;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #8a99b5;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #1a233a;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }

        .card-invoice {
            background: white;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .custom-table {
            border: 1px solid #2b3958;
        }

        .custom-table thead {
            background: #f3f2f7;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }


        .custom-table>tbody tr:nth-of-type(even) {
            background-color: white;
        }

        .custom-table>tbody td {
            border: 1px solid #2e3d5f;
        }

        .custom-table {
            background: white;
            color: #bcd0f7;
            font-size: .75rem;
        }

        .text-success {
            color: #c0d64a !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if ($office == "Registrar") {
            $pageValue = 5;
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
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-folder fa-fw"></i> Cleared Requests

                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="p_reqdocuTable" class="table table-bordered text-gray-900" width="100%" cellspacing="0">
                                    <thead class="thead-dark">  
                                        <tr>
                                            <th>Stud No.</th>
                                            <th>Student Name</th>
                                            <th>Status</th>
                                            <th>Course</th>
                                            <th width="120">Actions</th>
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
    <script src="js/pending-payments.js"></script>

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
    <script src="js/sweetalert.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->


</body>

</html>
<div id="reqdocModal" class="modal fade">
    <div class="modal-dialog modal-xl">
        <form method="POST" id="usersForm" enctype="multipart/form-data">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="container">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card-invoice">
                                    <div class="card-body p-0">
                                        <div class="invoice-container">
                                            <div class="invoice-header">
                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <h3 class="invoice-logo text-primary text-center">
                                                            Request # <span id="reqnum"></span>
                                                        </h3>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <address class="text-right text-gray-900 font-weight-bold">
                                                            Date Sent: <span id="date_sent"></span><br>



                                                        </address>
                                                    </div>
                                                </div>
                                                <!-- Row end -->



                                            </div>

                                            <div class="invoice-body">

                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table custom-table m-0 mb-2">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-gray-900 font-weight-bold text-center" colspan="2">Information</th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Name

                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="sname"></span> <span id="cert"></span></td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Student Number

                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="snum"></span> <span id="cert"></span></td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Course

                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="scourse"></span> <span id="cert"></span></td>


                                                                    </tr>

                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Birthplace

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="bplace"></span> <span id="cert"></span></td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Birthday
                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="bday"></p>

                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Last School Attended
                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="sch"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Present Address

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="address"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Contact Number
                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="mobile"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Purpose

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="purpose"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Student Status

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="stat"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Year Graduated

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="yeargrad"></p>
                                                                        </td>


                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table custom-table m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-gray-900 font-weight-bold text-center">Documents</th>
                                                                        <th class="text-gray-900 font-weight-bold text-center">Description</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Certifications

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="certi"></span> <span id="cert"></span></td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Transcript of Records

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="transs"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Diploma

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="dip"></p>
                                                                        </td>


                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Documents for Authentication

                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="ctc"></p>
                                                                        </td>


                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->

                                            </div>

                                            <div class="invoice-footer">

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-sm-12">
                                                    <div class="invoice-details">
                                                        <div class="invoice-num text-gray-900 font-weight-bold">

                                                            <div><span class="font-weight-bold">DELIVERY INFO</span></div>
                                                            <div><span id="del"></span></div>
                                                            <div><span class="h6 font-weight-bold" id="repr"></span></div>
                                                            <div><span id="cnum"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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




<div id="pendingModal" class="modal fade">
    <div class="modal-dialog modal-md">
        <form method="POST" id="pendingForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900 font-weight-bold"> <i class="far fa-fw fa-envelope"></i> <span class="title"></span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="fullname" class="text-gray-900 font-weight-bold">To:</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32"  name="fullname" id="fullname" class="form-control" readonly>
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
                            <label for="email" class="text-gray-900"><strong>Summary of Payment</strong> </label>
                            <input type="file" name="sumpay" id="sumpay" class="form-control" placeholder="Enter Reason..">
                        </div>
                        
                    </div>
                    
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="operation" id="operation">
                        <input type="hidden" name="reqdoc_ID" id="reqdoc_ID">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Decline">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>

<script src="js/c_reqdocu.js"></script>
</div>
