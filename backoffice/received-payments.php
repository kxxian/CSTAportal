<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
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

    <title>CSTA Admin | Payment Verification</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for  DataTable -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap CSS  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 6;
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




                    <!-- For Assessment Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-users"></i> For Payment Verification
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th hidden>#</th>
                                            <th hidden>sid</th>
                                            <th>Student No.</th>
                                            <th>Name</th>
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
                                            <th>Amount</th>
                                            <th hidden>Change</th>

                                            <th hidden>Sent Via</th>
                                            <th hidden>Payment Method</th>
                                            <th hidden>Notes</th>
                                            <th hidden>Date of Payment</th>
                                            <th width="140" class="text-center">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwpayverif WHERE payment_status=?";
                                        $data = array('Pending');
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute($data);

                                        while ($row = $stmt->fetch()) {

                                            $payment = "../student/uploads/payverif/payments/{$row['pv_ID']}.jpg";
                                            $reqform = "../student/uploads/payverif/docrequestform/{$row['pv_ID']}.jpg";

                                            if (file_exists($payment)) {

                                                $img = '
                                                    <a href="../student/uploads/payverif/payments/' . $row['pv_ID'] . '.jpg"   title="Proof of Payment" class="btn btn-success" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img = "";
                                            }

                                            if (file_exists($reqform)) {
                                                $img2 = '<a href="../student/uploads/payverif/docrequestform/' . $row['pv_ID'] . '.jpg" title="Request Form" class="btn btn-warning" >
                                                    <i class="fa fa-file-invoice fa-fw"></i>
                                                    </a>';
                                            } else {
                                                $img2 = "";
                                            }

                                            $reqform = "";
                                            echo '<tr> 
                                                        <td hidden>' . $row['pv_ID'] . '</td>
                                                        <td hidden>' . $row['sid'] . '</td>
                                                        <td>' . $row['snum'] . '</td>
                                                        <td>' . $row['fullname'] . '</td>
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
                                                        <td >' . $row['amtpaid'] . '</td>
                                                        <td hidden>' . $row['amtchange'] . '</td>
                                                        <td hidden>' . $row['sentvia'] . '</td>
                                                        <td hidden>' . $row['paymethod'] . '</td>
                                                        <td hidden>' . $row['note'] . '</td>
                                                        <td hidden>' . $row['datepaid'] . '</td>
                                                        

                                                        <td> 
                                                        <button type="button"  title="View Payment Details" class="btn btn-info viewpaydetails" >
                                                        <i class="fa fa-credit-card fa-fw"></i>
                                                        </button>

                                                        <input type="hidden" class="rcvpaymentval" value="' . $row['sid'] . '">
                                                        <button type="button"  title="Receive" class="btn btn-info rcvpayment " >
                                                        <i class="fas fa-hand-holding fa-fw"></i>
                                                        </button>


                                                       
                                                        <button type="button"  title="Mark as Verified" class="btn btn-success verifypayment" >
                                                        <i class="fa fa-check fa-fw"></i>
                                                        </button>

                                                       
                                                        <button hidden type="button"  title="Return" class="btn btn-danger " >
                                                        <i class="fa fa-times fa-fw"></i>
                                                        </button>


                                                        
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

    <div class="modal fade" id="codes/sendreceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="far fa-envelope"></i><strong> Send Receipt</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sendreceipt.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">To:</label>
                                    <input type="text" name="enroll_id" id="assess_id" class="form-control">
                                    <input type="text" name="sid" id="sid" class="form-control">
                                    <input type="text" name="name" id="name" class="form-control" disabled>

                                </div><br>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-5">
                                    <label class="font-weight-bold text-gray-900" for="attachment">OR No. :</label>
                                    <input type="number" name="attachment" id="attachment" class="form-control" accept=".jpg" required>

                                </div><br>
                                <div class="col-lg-7">
                                    <label class="font-weight-bold text-gray-900" for="attachment">Official Receipt:</label>
                                    <input type="file" name="officialreceipt" id="officialreceipt" class="form-control" accept=".jpg" required>

                                </div><br>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-5">
                                    <label class="font-weight-bold text-gray-900" for="attachment">A.R. No. :</label>
                                    <input type="number" name="ackreceipt" id="ackreceipt" class="form-control" accept=".jpg" required>

                                </div><br>
                                <div class="col-lg-7">
                                    <label class="font-weight-bold text-gray-900" for="attachment">Acknowledgement Receipt:</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control" accept=".jpg" required>

                                </div><br>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Remarks:</label>
                                    <textarea class="form-control" id="assessnotes" name="assessnotes" rows="2"></textarea>
                                </div><br>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-paper-plane"></i> Send</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <!-- View Payment Details Modal -->
    <div class="modal fade" id="viewfulldetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg  " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="fa fa-credit-card"></i><strong> Payment Details</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sendassessment.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">


                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Tuition Fee:</label>
                                    <input type="text" class="form-control" id="tfeepay" name="tfeepay" rows="4" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Amount:</label>
                                    <input type="text" class="form-control" id="tfeeamt" name="tfeeamt" rows="4" readonly>
                                </div>


                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Others:</label>
                                    <textarea class="form-control" id="payfor" name="payfor" rows="4" readonly></textarea>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Amount:</label>
                                    <input type="text" class="form-control" id="othersamt" name="othersamt" rows="4" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-info" id="done" name="done"> Done</button>

                        </div>
                </form>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>



    <?php
    require_once 'includes/scripts.php';

    ?>

    <script>
        //Acknowledge payment
        $(document).ready(function() {
            $('.rcvpayment').click(function(e) {
                e.preventDefault;
                var rcvpayid = $(this).closest("tr").find('.rcvpaymentval').val();
                console.log(rcvpayid);

                swal({
                        title: "Acknowledge Payment?",
                        //text: "This Action Cannot be Undone!",
                        icon: "info",
                        buttons: true,
                        dangerMode: false,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "POST",
                                url: "rcvpayment.php",
                                data: {
                                    "rcv_btn_set": 1,
                                    "rcv_id": rcvpayid,
                                },
                                success: function(response) {
                                    swal("Payment Acknowledged!", {
                                        icon: "success",
                                    }).then((result) => {
                                        location.replace("payverif.php");
                                    });
                                }
                            });
                        }
                    });
            });
        });
    </script>

    <script type="text/javascript">
        //MArk As verified
        $(document).ready(function() {
            $('.verifypayment').on('click', function() {
                $('#sendreceipt').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                //fetch data from payverif datatable
                $('#assess_id').val(data[0]);
                $('#sid').val(data[1]);
                $('#name').val(data[3]);

            });

            //close payment details modal
            $('#done').on('click', function() {
                $('#sendreceipt').modal('hide');

            });

            //close payment details modal
            $('.close').on('click', function() {
                $('#sendreceipt').modal('hide');

            });

        });
    </script>


    <!-- scripts -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>



</body>

</html>