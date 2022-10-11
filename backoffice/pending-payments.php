<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

//get office from fetchuserdetails.php
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

    <title>Pending Payments</title>
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


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if ($office == "Accounting") {
            $pageValue = 2;
        } else {
            header("Location:index.php");
        }

        if ($usertype != "Admin") {
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
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-money-bill fa-fw"></i> Pending Payments

                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="pendingpaymentsTable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Student No.</th>
                                            <th>Student Name</th>
                                            <th>Year Level</th>
                                            <th>Course</th>
                                            <th>Amount Paid</th>
                                            <th width="70">Attachments</th>


                                            <th width=30>Actions</th>
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
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->


</body>

</html>

<div id="paymentdetailsModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="ackForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900 font-weight-bold"> <i class="far fa-fw fa-credit-card"></i> <span class="title">Add User</span></h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                <div class="form-group">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="email" id="email" class="form-control">
                                    <input type="hidden" name="txtName" id="txtName" class="form-control" readonly>
                                    <input type="hidden" name="fullname" id="fullname" class="form-control" readonly>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Student Number:</label>
                                    <input type="text" name="txtsnum" id="txtsnum" class="form-control" readonly>
                                </div> -->

                                <div class="col-sm-4"><label class="font-weight-bold text-gray-900">Date of Payment:</label>
                                    <input type="text" name="date" id="date" class="form-control" readonly>
                                </div>
                                <div class="col-sm-4"><label class="font-weight-bold text-gray-900">Time:</label>
                                    <input type="text" name="timePaid" id="time" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Tuition Fee Term:</label>
                                        <input type="text" name="term" id="term" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Applicable SY:</label>
                                        <input type="text" name="appsy" id="appsy" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Amount:</label>
                                        <input type="text" name="tfee" id="tfee" class="form-control modal-currency text-right" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-8">
                                        <label class="font-weight-bold text-gray-900">Others:</label>
                                        <input type="text" name="others" id="others" class="form-control" readonly>
                                        <!-- <textarea name="txtParticulars" id="txtParticulars" class="form-control" cols="30" rows="10"></textarea> -->

                                    </div>
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Other Fees Total:</label>
                                        <input type="text" name="others_total" id="others_total" class="form-control modal-currency text-right" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Payment Method:</label>
                                        <input type="text" name="paymethod" id="paymethod" class="form-control" readonly>


                                    </div>
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Sent Via:</label>
                                        <input type="text" name="sentvia" id="sentvia" class="form-control" readonly>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="font-weight-bold text-gray-900">Total Amount Paid:</label>
                                        <input type="text" name="gtotal" id="gtotal" class="form-control modal-currency text-right" readonly>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <label class="font-weight-bold text-gray-900">Note:</label>
                                        <textarea name="note" id="note" cols="30" rows="2" class="form-control" readonly></textarea>
                                    </div>

                                </div>

                               
                            </div>
                        </div>

                    <div class="modal-footer">
                        <input type="hidden" name="payment_id" id="payment_id">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Register">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
<script src="js/pending-payments.js"></script>
</div>