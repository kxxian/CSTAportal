<?php
//ession_start();
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");

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

    <title>Payment Verification</title>

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

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

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




    <style>
        fieldset.scheduler-border {
            border: 1px groove gray !important;
            padding: 0 1.4em 1.4em 1.4em !important;
            margin: 0 0 1.5em 0 !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {

            font-size: 1.2em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: inherit;
            /* Or auto */
            padding: 0 10px;
            /* To give a bit of padding on the left and right */
            border-bottom: none;
        }

        .card {
            border: none;
            -webkit-box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            box-shadow: 1px 0 20px rgba(96, 93, 175, .05);
            margin-bottom: 30px;
        }

        .table th {
            font-weight: 500;
            color: #827fc0;
        }

        .table thead {
            background-color: #f3f2f7;
        }

        .table>tbody>tr>td,
        .table>tfoot>tr>td,
        .table>thead>tr>td {
            padding: 14px 12px;
            vertical-align: middle;
        }

        .table tr td {
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
    </style>



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 0;
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
                    <!-- <h3 class="h3 mb-4 text-gray-900">Online Payment Verification</h3> -->

                    <div class="main-body">

                        <div class="row gutters-sm">
                            <div class="col-md-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#payverif" id="pv_tab" class="nav-link active"><i class="fas fa-credit-card"></i> Payment Verification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#payhistory" id="ph_tab" class="nav-link"><i class="fas fa-file"></i> Payment History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="payverif">
                                <div class="row gutters-sm">
                                    <div class="col-sm-12">

                                        <!-- Basic Card Example -->
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-fw fa-credit-card"></i> Payment Verification</h6>
                                            </div>
                                            <div class="card-body text-gray-900">
                                                <form action="uploadpay.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Payment For</legend>
                                                            <br><label>
                                                                <h5 class="font-weight-bold">Tuition Fee</h5>
                                                            </label>
                                                            <div class="form-group row" id="inputtfee">
                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="chktfee">
                                                                        School Year
                                                                    </label>


                                                                    <input type="text" name="selsy" id="selsy" class="form-control" placeholder="ex. 2022-2023">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="chktfee">
                                                                        Semester
                                                                    </label>
                                                                    <select name="selsem" id="selsem" class="form-control">
                                                                        <option selected="" disabled>..</option>
                                                                        <?php
                                                                        require_once("includes/connect.php");

                                                                        $sql = "select * from semester where isVisible=? ";
                                                                        $data = array('1');
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute($data);

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option value=' . $row['semester_ID'] . '>' . $row['semester'] . '</option>';
                                                                        }
                                                                        $stmt = null;

                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row" id="inputtfee2">
                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="chktfee">
                                                                        Term
                                                                    </label>
                                                                    <select name="selterm" id="selterm  " class="form-control">
                                                                        <option selected="" disabled>..</option>
                                                                        <?php
                                                                        require_once("includes/connect.php");

                                                                        $sql = "select * from terms where isVisible=?";
                                                                        $data = array(1);
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute($data);

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option value=' . $row['terms_ID'] . '>' . $row['term'] . '</option>';
                                                                        }
                                                                        $stmt = null;

                                                                        ?>
                                                                    </select>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="chktfee">
                                                                        Amount
                                                                    </label>
                                                                    <i style="font-size: 0.9rem;color:#808080">*Enter tuition fee amount paid</i>
                                                                    <input type="number" placeholder="0.00" class="form-control" id="tfeeamount" name="tfeeamount" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="1" maxlength="7" style="text-align:right">
                                                                </div>
                                                            </div><br>
                                                            <label>
                                                                <h5 class="font-weight-bold">Additional (Others Fees)</h5>
                                                                <i style="font-size: 0.9rem;color:#808080">*Select other fees indicated on your assessment / disbursement form </i>
                                                            </label>

                                                            <br><br>
                                                            <div class="form-group" id="othersopt">
                                                                <div class="col-sm-12">

                                                                    <?php
                                                                    $sql = "select * from particulars where isActive='Active'";
                                                                    $stmt = $con->prepare($sql);
                                                                    $stmt->execute();

                                                                    while ($row = $stmt->fetch()) {
                                                                        echo '
                                                                <div class="form-check form-check-inline mb-2">
                                                                <input class="form-check-input" type="checkbox" value="' . $row['particular'] . '" id="particulars" name="particulars[]">
                                                                <label class="form-check-label font-weight-bold" for="particulars">
                                                                    ' . $row['particular'] . '
                                                                </label>
                                                                </div>';
                                                                    }
                                                                    $stmt = null;
                                                                    ?>
                                                                </div><br>
                                                                <div class="form-group row">
                                                                    <div class="col-sm-6">
                                                                        <label class="font-weight-bold">
                                                                            Total (Other Fees)
                                                                        </label>
                                                                        <i style="font-size: 0.9rem;color:#808080">*Enter total amount for other fees</i>
                                                                        <input type="number" class="form-control" placeholder="0.00" id="totalothers" name="totalothers" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="1" maxlength="7" style="text-align:right">
                                                                    </div>


                                                                </div>



                                                            </div>

                                                        </fieldset>

                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Total</legend>
                                                            <div class="form-group row">
                                                                <div class="col-sm-3">

                                                                    <?php
                                                                    ?>

                                                                    <input type="hidden" class="form-control" id="totaldue" name="totaldue" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">

                                                                    <input type="text" class="form-control" id="totaldue1" name="totaldue1" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">
                                                                </div>
                                                                <i style="font-size: 1rem;color:#808080">*Total amount should be same on what is on your proof of payment</i>

                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Payment Information</legend>
                                                            <i style="font-size: 1rem;color:red">*Fill all the details as indicated on your proof of payment</i>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label for="paymentamount"><strong>Amount Paid</strong></label>
                                                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="7" class="form-control" name="amtpaid" id="amtpaid" placeholder="0.00" style="text-align:right;" required>
                                                                    <p class="font-weight-bold" id="errmsg" style="display:none; color:red">Please Enter a Valid Amount !</p>
                                                                </div>
                                                                <div class="col-sm-6">

                                                                    <label for="sentthru"><strong>Sent Thru</strong></label>
                                                                    <select class="form-control" id="sentthru" name="sentthru" required>
                                                                        <option selected="" disabled>..</option>
                                                                        <?php
                                                                        $sql = "select * from sentvia where isActive='ACTIVE'";
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute();

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option  value=' . $row['sentvia_ID'] . '>' . $row['sentvia'] . '</option>';
                                                                        }
                                                                        $stmt = null;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label for="paymethod"><strong>Payment Method</strong></label>
                                                                    <select class="form-control" id="paymethod" name="paymethod" required>
                                                                        <option selected="" disabled>..</option>
                                                                        <?php
                                                                        $sql = "select * from paymethod where isActive='ACTIVE'";
                                                                        $stmt = $con->prepare($sql);
                                                                        $stmt->execute();

                                                                        while ($row = $stmt->fetch()) {
                                                                            echo '<option  value=' . $row['paymethod_ID'] . '>' . $row['paymethod'] . '</option>';
                                                                        }
                                                                        $stmt = null;
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="dop"><strong>Payment Date</strong></label>
                                                                    <input type="date" class="form-control" id="DoP" name="DoP" required>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <label for="dop"><strong>Time</strong></label>
                                                                    <input type="time" step="1" class="form-control" id="ToP" name="ToP" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6" id="reqform">
                                                                    <label for=""><strong>Assessment Form</strong> <i style="font-size: 0.9rem;color:#808080"> *Attach assessment/disbursement form here </i></label>
                                                                    <input type="file" accept=".jpg" class="form-control" name="reqform">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="paymentproof"><strong>Proof of Payment</strong></label>
                                                                    <input type="file" accept=".jpg" class="form-control" name="paymentproof" required>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <label for="tuitionpaynote"><strong>Notes (Optional)</strong></label>
                                                                    <textarea class="form-control" id="note" name="note" rows="4" maxlength="200" placeholder="Maximum of 200 characters.."></textarea>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="text-right"><button type="submit" class="btn btn-success" name="uploadpayments"><i class="fas fa-check"></i> Submit</button></div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payhistory">
                                <div class="row gutters-sm">
                                    <div class="col-sm-12">
                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="header-title pb-3 mt-0 text-gray-900 font-weight-bold">Payment History</h5>
                                                    <div class="table-responsive">
                                                        <table class="table table-hover mb-0">
                                                            <thead>
                                                                <tr class="align-self-center">

                                                                    <th class="text-gray-900 font-weight-bold text-center">Sent Thru</th>
                                                                    <th class="text-gray-900 font-weight-bold text-center">Date Sent</th>
                                                                    <th class="text-gray-900 font-weight-bold text-center">Amount</th>
                                                                    <th class="text-gray-900 font-weight-bold text-center">Status</th>
                                                                    <th class="text-gray-900 font-weight-bold text-center">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sql = "SELECT * FROM vwpayverif where sid=$sid order by pv_ID asc";
                                                                $stmt = $con->query($sql);
                                                                $count = $stmt->rowCount();
                                                                $strpayhistory = '';


                                                                foreach ($stmt as $rows) {
                                                                    if ($rows['payment_status'] == 'Verified') {
                                                                        $class = "success";
                                                                    } elseif ($rows['payment_status'] == 'Received') {
                                                                        $class = "info";
                                                                    } elseif ($rows['payment_status'] == 'For Receipt') {
                                                                        $class = "primary";
                                                                    } elseif ($rows['payment_status'] == 'Pending') {
                                                                        $class = "warning";
                                                                    }

                                                                    $strpayhistory .= '<tr>';
                                                                    $strpayhistory .= ' <td class="text-center text-gray-900">' . $rows['sentvia'] . '</td>';
                                                                    $strpayhistory .= '<td class="text-center text-gray-900">' . $rows['date_sent'] . '</td>';
                                                                    $strpayhistory .= '<td class="text-center text-gray-900">' . $rows['gtotal'] . '</td>';
                                                                    $strpayhistory .= '<td class="text-center"><span class="badge badge-boxed badge-' . $class . '">' . $rows['payment_status'] . '</span></td>';
                                                                    $strpayhistory .= '<td class="text-center">';
                                                                    $strpayhistory .= '    <button class="btn btn-info btn-sm" title="View Payment Details" id="'.$rows['pv_ID'].'"><i class="fa fa-fw fa-eye"></i></button>';
                                                                    $strpayhistory .= '    <button class="btn btn-danger btn-sm cancel" title="Delete" id="'.$rows['pv_ID'].'"><i class="fa fa-fw fa-times"></i></button>';
                                                                    $strpayhistory .= '</td>';
                                                                    $strpayhistory .= '</tr>';
                                                                }

                                                                echo $strpayhistory;


                                                                ?>


                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!--end table-responsive-->

                                                </div>
                                            </div>
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


    <script type="text/javascript">
        //showhide tuition payment controls
        $(function() {
            $("#chktfee").click(function() {
                if ($(this).is(":checked")) {
                    $("#inputtfee").removeAttr('hidden');
                    $("#inputtfee2").removeAttr('hidden');

                } else {
                    $("#inputtfee").attr('hidden', 'hidden');
                    $("#inputtfee2").attr('hidden', 'hidden');


                }

            });
        });


        //showhide other payments
        $(function() {
            $("#chkothers").click(function() {
                if ($(this).is(":checked")) {
                    $("#othersopt").removeAttr('hidden');
                    $("#reqform").removeAttr('hidden');


                } else {
                    $("#othersopt").attr('hidden', 'hidden');
                    $("#reqform").attr('hidden', 'hidden');
                }

            });
        });
    </script>

    <script type="text/javascript"></script>
    <script>
        $(document).ready(function() {


            // Get value on keyup function
            $("#tfeeamount, #totalothers, #amtpaid").keyup(function() {


                var x = Number($("#tfeeamount").val());
                var y = Number($("#totalothers").val());
                var amtpaid = Number($("#amtpaid").val());
                var total = x + y;

                // hidden input
                $('#totaldue').val(total);

                //input displayed
                $('#totaldue1').val(total);


                //Philippine Currency
                let amtdue = total.toLocaleString("fil-PH", {
                    style: "currency",
                    currency: "PHP"
                })
                var total_amt = document.getElementById("totaldue1");

                total_amt.value = amtdue;


                //Amounts Validation
                if (amtpaid >= 1 && amtpaid < total) {
                    $(':input[type="submit"]').prop('disabled', true);
                    $("#errmsg").show();
                } else {
                    $(':input[type="submit"]').prop('disabled', false);
                    $("#totaldue").prop('value', total);
                    $("#errmsg").hide();
                }




            });
        });
    </script>


    <?php
    include_once("includes/scripts.php");
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</body>
<script src="js/header.js"></script>
<script src="js/counter.js"></script>
<script src="js/notifications.js"></script>


<script src="js/payhistory.js"></script>

</html>