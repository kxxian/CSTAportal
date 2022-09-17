<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once('includes/fetchuserdetails.php');

//get office from fetchuserdetails.php
$office=$Office;

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

    <title>CSTA Admin | Payment Verification</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

     <!-- Custom fonts for this template-->
     <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- JQuery -->
    <script
    src="https://code.jquery.com/jquery-1.12.4.min.js"
    integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
    crossorigin="anonymous"></script>

     <!-- Bootstrap 4 -->
     <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
    
    <!--Jquery Datatables Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    



   

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        
        //office conditions for sidebar menu
        if ($office=="Accounting"){
            $pageValue = 2;
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
                            <h5 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-users"></i> Pending Payments<button type="button" name="bulkReceive" id="bulkReceive" class="btn btn-success bulkReceive float-right" data-action="bulk">Acknowledge</button>
                            </h5>

                          
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th></th>
                                            <th hidden>sid</th>
                                            <th>Student No.</th>
                                            <th width="200">Name</th>
                                            <th hidden>Tuition Fee</th>
                                            <th hidden>Email</th>
                                            <th hidden>Mobile</th>
                                            <th>Course</th>
                                            <th hidden>S.Y</th>
                                            <th hidden>Semester</th>
                                            <th hidden>Term</th>
                                            <th hidden>Others</th>
                                            <th hidden>Others Total</th>
                                            <th>Attachment/s</th>
                                            <th hidden>Total</th>
                                            <th hidden>Amount1</th>
                                            <th>Amount</th>
                                            <th hidden>Change</th>
                                            <th hidden>Sent Via</th>
                                            <th hidden>Payment Method</th>
                                            <th hidden>Notes</th>
                                            <th hidden>Date of Payment</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwpayverif WHERE payment_status=? order by date_sent"  ;
                                        $data = array('Pending');
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
                                                        <td>
                                                            <input type="checkbox" name="single_select" 
                                                            class="form-control-sm single_select" data-id="' . $row['pv_ID'] . '"
                                                            data-email="' . $row['email'] . '" data-name="' . $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] . '"


                                                            >
                                                        </td>


                                                        <td hidden>' . $row['sid'] . '</td>
                                                        <td>' . $row['snum'] . '</td>
                                                        <td>' . $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] . '</td>
                                                        <td hidden>' . $row['email'] . '</td>
                                                        <td hidden>' . $row['mobile'] . '</td>
                                                        <td >' . $row['course'] . '</td>

                                                        <td hidden>' . $row['tfeepayment'] . '</td>
                                                        <td hidden>' . $row['schoolyr'] . '</td>
                                                        <td hidden>' . $row['semester'] . '</td>
                                                        <td hidden>' . $row['term'] . '</td>
                                                        <td hidden>' . $row['particulars'] . '</td>
                                                        <td hidden>₱ ' . $row['particulars_total'] . '</td>
                                                        


                                                        <td>
                                                        ' . $img . '
                                                        ' . $img2 . '
                                                        </td>
                                                       
                                                        <td hidden>' . $row['gtotal'] . '</td>
                                                        <td hidden class="hiddenamt">' . $row['amtpaid'] . '</td>
                                                        <td class="currency">' . $row['amtpaid'] . '</td>

                                                        <td hidden>' . $row['amtchange'] . '</td>
                                                        <td hidden>' . $row['sentvia'] . '</td>
                                                        <td hidden>' . $row['paymethod'] . '</td>
                                                        <td hidden>' . $row['note'] . '</td>
                                                        <td hidden>' . $row['date_paid'] . '</td>
                                                        

                                                        <td> 
                                                        <button class="btn btn-info btnPaymentDetails" onclick="loadRecord(' . $row['pv_ID'] . ')" title="Payment Details"><i class="fa fa-list fa-fw"></i></button>
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

    <div class="modal fade" id="viewpaydetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="fa fa-list"></i><strong> Payment Details</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="codes/receive-payments.php" method="POST" enctype="multipart/form-data" >
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <input type="hidden" name="pv_id" id="pv_id" class="form-control">
                                    <input type="hidden" name="sid" id="txtsid" class="form-control">
                                    <input type="hidden" name="txtemail" id="txtemail" class="form-control">
                                    <input type="hidden" name="txtName" id="txtName" class="form-control" readonly>
                                </div>
                                <!-- <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Student Number:</label>
                                    <input type="text" name="txtsnum" id="txtsnum" class="form-control" readonly>
                                </div> -->

                                <div class="col-lg-4"><label class="font-weight-bold text-gray-900">Date of Payment:</label>
                                    <input type="text" name="dtDatePaid" id="dtDatePaid" class="form-control" readonly>
                                </div>
                                <div class="col-lg-4"><label class="font-weight-bold text-gray-900">Time:</label>
                                    <input type="text" name="timePaid" id="timePaid" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                              
                                    
                                       
                                   
                                    
                           
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Tuition Fee:</label>
                                    <input type="text" name="txtTerm" id="txtTerm" class="form-control" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Applicable SY:</label>
                                    <input type="text" name="txtSySem" id="txtSySem" class="form-control" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Amount:</label>
                                    <input type="text" name="txtTfee" id="txtTfee" class="form-control modal-currency" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8">
                                    <label class="font-weight-bold text-gray-900">Particulars:</label>
                                    <input type="text" name="txtParticulars" id="txtParticulars" class="form-control" readonly>
                                    <!-- <textarea name="txtParticulars" id="txtParticulars" class="form-control" cols="30" rows="10"></textarea> -->

                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Other Fees Total:</label>
                                    <input type="text" name="txtOthers" id="txtOthers" class="form-control modal-currency" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Payment Method:</label>
                                    <input type="text" name="txtPaymethod" id="txtPaymethod" class="form-control" readonly>
                                    

                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Sent Via:</label>
                                    <input type="text" name="txtSentVia" id="txtSentVia" class="form-control" readonly>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-bold text-gray-900">Total Amount Paid:</label>
                                    <input type="text" name="txtGtotal" id="txtGtotal" class="form-control modal-currency" readonly>
                                   
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Note:</label>
                                    <textarea name="txtNotes" id="txtNotes" cols="30" rows="2" class="form-control" readonly></textarea>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success ackpayment" name="acknowledge"><i class="fas fa-hand"></i> Acknowledge</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>



    <!-- JS -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <?php
        require_once 'includes/scripts.php';
    ?>



   










</body>

</html>