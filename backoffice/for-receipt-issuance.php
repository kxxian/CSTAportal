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

    <!-- DataTable CDN CSS  -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

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

                    <!-- Pending Payments Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-check"></i> Verified / For Receipt
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>

                                            <th hidden>sid</th>
                                            <th>Student No.</th>
                                            <th>Name</th>
                                            <th hidden>Tuition Fee</th>
                                            <th hidden>Email</th>
                                            <th hidden>Mobile</th>
                                            <th hidden>Course</th>

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
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwpayverif WHERE payment_status=?";
                                        $data = array('Received');
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
                             


                                                        <td hidden>' . $row['sid'] . '</td>
                                                        <td>' . $row['snum'] . '</td>
                                                        <td>' . $row['lname'] . ',' . ' ' . $row['fname'] . ' ' . $row['mname'] . '</td>
                                                        <td hidden>' . $row['email'] . '</td>
                                                        <td hidden>' . $row['mobile'] . '</td>
                                                        <td hidden>' . $row['course'] . '</td>
                                                       

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
                                                        <td class="currency">' . $row['amtpaid'] . '</td>
                                                        <td hidden>' . $row['amtchange'] . '</td>
                                                        <td hidden>' . $row['sentvia'] . '</td>
                                                        <td hidden>' . $row['paymethod'] . '</td>
                                                        <td hidden>' . $row['note'] . '</td>
                                                        <td hidden>' . $row['date_paid'] . '</td>
                                                        

                                                        <td> 
                                                        <button class="btn btn-success" onclick="loadRecord(' . $row['pv_ID'] . ')" title="Send Receipt"><i class="fa fa-envelope fa-fw"></i></button>
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

    <div class="modal fade" id="verifypayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="far fa-envelope"></i><strong> Send Receipt</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="codes/verify-payments.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">

                            <!-- <label class="font-weight-bold text-gray-900">Payment For:</label> -->
                            <input type="hidden" name="pv_ID" id="txt_id" class="form-control">
                            <input type="hidden" name="sid" id="txtsid" class="form-control">
                            <input type="hidden" name="name" id="txtemail" class="form-control" disabled>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-gray-900" for="flexCheckDefault">
                                            Official Receipt
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label text-gray-900" for="flexCheckDefault">
                                            Acknowledgement Receipt
                                        </label>
                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">O.R Number:</label>
                                    <input type="text" name="verif_code" id="verif_code" class="form-control" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Official Receipt:</label>
                                    <input type="file" name="verif_code" id="verif_code" class="form-control" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">A.R Number:</label>
                                    <input type="text" name="verif_code" id="verif_code" class="form-control" required>
                                </div>
                                <div class="col-lg-6">
                                    <label class="font-weight-bold text-gray-900">Acknowledgmenet Receipt:</label>
                                    <input type="file" name="verif_code" id="verif_code" class="form-control" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Remarks:</label>
                                    <input type="text" name="verif_code" id="verif_code" class="form-control" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btnVerify" name="verifypayment"><i class="fas fa-hand"></i> Send</button>
                            </div>
                </form>
            </div>
        </div>
    </div>



    <!-- scripts -->
    <script src="js/verify-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>

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

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>












</body>

</html>