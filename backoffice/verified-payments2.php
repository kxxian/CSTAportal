<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once('includes/fetchuserdetails.php');

//get office from fetchuserdetails.php
$office=$Office;

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

    <title>Verified Payments</title>
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
         //office conditions for sidebar menu
         if ($office=="Accounting"){
            $pageValue = 5;
        }else{
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

                    <!-- Pending Payments Table -->
                    <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-check fa-fw"></i> Verified Payments

                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-gray-900" id="forreceiptTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th class="text-center">Student #</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Course</th>
                                            <th class="text-center" hidden>Tuition Fee</th>
                                            <th class="text-center" hidden>Applicable S.Y</th>
                                            <th class="text-center" hidden>Term</th>
                                            <th class="text-center">Amount Paid</th>
                                            <th class="text-center" hidden>Others</th>
                                            <th class="text-center" hidden>Others Total</th>
                                            <th class="text-center" hidden>SentVia</th>
                                            <th class="text-center" hidden>Method</th>
                                            <th class="text-center" hidden>Payment Date</th>
                                            <th class="text-center" hidden>Time</th>
                                            <th class="text-center" hidden>Verified</th>
                                            <th class="text-center" hidden>Verification Code</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center" hidden>OR</th>
                                            <th class="text-center" hidden>AR</th>
                                            <th class="text-center" hidden>Remarks</th>
                              
                                            <th class="text-center" hidden>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwpayverif WHERE payment_status=?";
                                        $data = array("Verified");
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute($data);
                                        $result = $stmt->fetchAll();

                                        foreach ($result as $row) {

                                            $payment = "../student/uploads/payverif/payments/{$row['pv_ID']}.jpg";
                                            $reqform = "../student/uploads/payverif/docrequestform/{$row['pv_ID']}.jpg";

                                            if (file_exists($payment)) {

                                                $img = '
                                                    <a href="../student/uploads/payverif/payments/' . $row['pv_ID'] . '.jpg"   title="Proof of Payment" class="btn btn-warning" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img = "";
                                            }

                                            if (file_exists($reqform)) {
                                                $img2 = '<a href="../student/uploads/payverif/docrequestform/' . $row['pv_ID'] . '.jpg" title="Request Form" class="btn btn-info" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img2 = "";
                                            }

                                            $reqform = "";
                                            echo '<tr> 
                             


                                                       
                                                        <td class="text-center">' . $row['snum'] . '</td>
                                                        <td class="text-center">' . $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] . '</td>
                                                        <td class="text-center">' . $row['abbr'] . '</td>
                                                        <td class="text-center" hidden>' . $row['tfeepayment'] . '</td>
                                                        <td class="text-center"  hidden>' . $row['schoolyr'] .' '. $row['semester'] .'  </td>
                                                      
                                                        <td class="text-center" hidden>' . $row['term'] . '</td>
                                                        <td class="text-right">' . $row['amtpaid'] . '</td>
                                                        <td hidden>' . $row['particulars'] . '</td>
                                                        <td hidden> ' . $row['particulars_total'] . '</td>
                                                        <td class="text-center" hidden>' . $row['sentvia'] . '</td>
                                                        <td class="text-center" hidden>' . $row['paymethod'] . '</td>
                                                        <td hidden>' . $row['date_paid'] . '</td>
                                                        <td hidden>' . $row['time_paid'] . '</td>
                                                        <td class="text-center" hidden>' . $row['payment_status'] . '</td>
                                                        <td hidden>' . $row['verif_code'] . '</td>
                                                        <td class="text-center">' . $row['date_verified'] . '</td>
                                                        <td hidden>' . $row['OR'] . '</td>
                                                        <td hidden>' . $row['AR'] . '</td>
                                                        <td hidden>' . $row['remarks'] . '</td>
                                                        


                                                       
                                                       
                                                       
                                                        
                                                        
                                                       
                                                        
                                                        

                                                        <td hidden> 
                                                        <button hidden class="btn btn-info btnPaymentDetails" onclick="loadRecord2(' . $row['pv_ID'] . ')" title="Payment Details"><i class="fa fa-list fa-fw"></i></button>
                                                        <button hidden class="btn btn-success" onclick="loadRecord(' . $row['pv_ID'] . ')" title="Send Receipt"><i class="fa fa-envelope fa-fw"></i></button>
                                                        </td>
                                                      </tr>';
                                        }
                                        ?>


                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <div class="modal fade" id="sendreceipt" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="far fa-envelope"></i><strong> Send Receipt</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <form action="codes/sendreceipt.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">

                            <!-- <label class="font-weight-bold text-gray-900">Payment For:</label> -->
                            <input type="hidden" name="pv_ID" id="pv_ID" class="form-control">
                            <input type="hidden" name="sid" id="txtsid" class="form-control">
                            <input type="hidden" name="txtemail" id="txtemail" class="form-control">
                            <input type="hidden" name="txtname" id="txtname" class="form-control">

                            <div class="form-group row">
                                <div class="col-lg-12">
                                <label class="font-weight-bold text-gray-900">Choose Receipt/s:</label><br>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="OR" onclick="toggle();">
                                        <label class="form-check-label text-gray-900" for="flexCheckDefault">
                                            Official Receipt
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="AR" onclick="toggle();">
                                        <label class="form-check-label text-gray-900" for="flexCheckDefault">
                                            Acknowledgement Receipt
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">O.R Number:</label>
                                    <input type="text" name="OrNum" id="OrNum" class="form-control" disabled>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">A.R Number:</label>
                                    <input type="text" name="ArNum" id="ArNum" class="form-control"  disabled>
                                </div>
                                
                            </div>
                            <div class="form-group row">
                            <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Attachment/s:</label>
                                    <input type="file" name="OReceipt[]" id="OReceipt" multiple="multiple" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Remarks:</label>
                                    <input type="text" name="Remarks" id="Remarks" value="Done" class="form-control text-gray-900" disabled>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-success" id="btn" name="sendreceipt"  value="Send" disabled> 
                            </div>
                </form>
            </div>
        </div>
    </div>

   
    <!-- scripts -->
    <script src="js/verifiedpayments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->

    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != "") {

    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                // text: ""
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Done",
                timer: 5000
            });
        </script>

    <?php
        unset($_SESSION['status']);
    }
    ?>
















</body>

</html>
