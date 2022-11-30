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
        ::-webkit-scrollbar {
            width: .5em;
        }

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

        .table {
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

        /* Payments */
        .payment-card {
            background: #ffffff;
            padding: 20px;
            margin-bottom: 25px;
            border: 1px solid #e7eaec;
        }

        .payment-icon-big {
            font-size: 60px;
            color: #d1dade;
        }

        .payments-method.panel-group .panel+.panel {
            margin-top: -1px;
        }

        .payments-method .panel-heading {
            padding: 15px;
        }

        .payments-method .panel {
            border-radius: 0;
        }

        .payments-method .panel-heading h5 {
            margin-bottom: 5px;
        }

        .payments-method .panel-heading i {
            font-size: 26px;
        }

        .payment-icon-big {
            font-size: 60px !important;
            color: #d1dade;
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
                                        <a href="#payhistory" id="ph_tab" class="nav-link"><i class="fas fa-file"></i> Payment Logs</a>
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

                                                <!--    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
                                                <form action="uploadpay.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Bank Details</legend>
                                                            <p style="font-size: 1rem;color:gray">Payments can be made thru Bank Deposit or Online Bank Transfer</p>
                                                            <div class="row">
                                                            <?php
                                                               $sql = "SELECT * FROM payoptions";
                                                               $stmt = $con->prepare($sql);
                                                               $stmt->execute();

                                                               while ($row = $stmt->fetch()){

                                                                    echo '<div class="col-sm-4">
                                                                    <div class="payment-card">
                                                                       <h5>'.$row['provider'].'</h5>
                                                                        <h3 class="font-weight-bold">
                                                                            '.$row['accnumber'].'
                                                                        </h3>
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <small>
                                                                                    <strong>'.$row['accname'].'</strong> 
                                                                                </small>
                                                                            </div>
                                                                          
                                                                        </div>
                                                                    </div>
                                                                </div>';

                                                               }
                                                            
                                                            
                                                            ?>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Payment For</legend>

                                                            <br><label>
                                                                <h5 class="font-weight-bold">Tuition Fee</h5>

                                                            </label>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="paynumsearch">
                                                                        Payment No. (For updating existing payments only)
                                                                    </label>
                                                                    <input type="text" name="paynumsearch" id="paynumsearch" oninput="paynum()" class="form-control" maxlength="10" onkeypress="return (event.charCode > 47 && event.charCode <58 )" maxlength="10">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row" id="inputtfee">
                                                                <div class="col-sm-6">
                                                                    <label class="form-check-label font-weight-bold" for="chktfee">
                                                                        School Year
                                                                    </label>


                                                                    <input type="text" name="selsy" id="selsy" class="form-control" placeholder="..." onkeypress="return (event.charCode > 47 && event.charCode < 58) || (event.keyCode==45)" maxlength="9">
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
                                                                    <select name="selterm" id="selterm" class="form-control">
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
                                                                    <input type="number" placeholder="0.00" class="form-control" id="tfeeamount" name="tfeeamount" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="1" maxlength="7" style="text-align:right">
                                                                </div>
                                                            </div><br>
                                                            <label>
                                                                <h5 class="font-weight-bold">Additional (Others Fees)</h5>
                                                                <p style="font-size: 0.9rem;color:#808080">*Enter other fees indicated in your disbursement form separated by comma(,) </p>
                                                            </label>


                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <textarea type="text" rows="3" class="form-control" name="otherpart" id="otherpart"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    &nbsp;
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label class="font-weight-bold">
                                                                        Total for Other Fees
                                                                    </label>
                                                                    <p style="font-size: 0.9rem;color:#808080">*Enter total amount for other fees</p>
                                                                    <input type="number" class="form-control" placeholder="0.00" id="totalothers" name="totalothers" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="0" maxlength="7" style="text-align:right">
                                                                </div>


                                                            </div>





                                                        </fieldset>

                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Total Amount</legend>
                                                            <div class="form-group row">
                                                                <div class="col-sm-3">

                                                                    <?php
                                                                    ?>

                                                                    <input type="text" hidden class="form-control" id="totaldue" name="totaldue" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">

                                                                    <input type="text" class="form-control" id="totaldue1" name="totaldue1" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">
                                                                </div>
                                                                <p style="font-size: 1rem;color:#808080">*Total amount should be exactly on what is on your proof of payment</p>

                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="scheduler-border">
                                                            <legend class="scheduler-border">Payment Information</legend>
                                                            <p style="font-size: 1rem;color:red">*Fill all the details as indicated on your proof of payment</p>
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
                                                                    <label for=""><strong>Assessment/Disbursement Form</strong></label>
                                                                    <input type="file" class="form-control" name="reqform">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <label for="paymentproof"><strong>Proof of Payment</strong></label>
                                                                    <input type="file" class="form-control" name="paymentproof" required>
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
                                                        <div class="text-right"><button type="submit" class="btn btn-success" name="sendpay"><i class="fas fa-check"></i> Submit</button></div>
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

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="header-title pb-3 mt-0 text-gray-900 font-weight-bold">Payment Logs</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr class="align-self-center">
                                                                <th class="text-gray-900 font-weight-bold text-center">Payment No.</th>
                                                                <th class="text-gray-900 font-weight-bold text-center">Sent Thru</th>
                                                                <th class="text-gray-900 font-weight-bold text-center">Date Sent</th>
                                                                <th class="text-gray-900 font-weight-bold text-center">Amount Paid</th>
                                                                <th class="text-gray-900 font-weight-bold text-center">Attachment/s</th>
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

                                                                //change badge based on payment status
                                                                if ($rows['payment_status'] == 'Verified') {
                                                                    $class = "success";
                                                                    $disabled = "disabled";
                                                                } elseif ($rows['payment_status'] == 'Received') {
                                                                    $class = "info";
                                                                    $disabled = "disabled";
                                                                } elseif ($rows['payment_status'] == 'For Receipt') {
                                                                    $class = "primary";
                                                                    $disabled = "disabled";
                                                                } elseif ($rows['payment_status'] == 'Pending') {
                                                                    $class = "warning";
                                                                    $disabled = "";
                                                                }
                                                                //check attachments in directory
                                                                $payment = "uploads/payverif/payments/{$rows['payproof']}";
                                                                $reqform = "uploads/payverif/docrequestform/{$rows['reqform']}";

                                                                if ($rows['payproof'] != "") {
                                                                    $img = '<a title="Proof of Payment" class="btn btn-primary btn-sm" target="_blank" href="uploads/payverif/payments/' . $rows['payproof'] . '">
                                                                        <i class="fa fa-receipt fa-fw"></i></a>';
                                                                } else {
                                                                    $img = "";
                                                                }

                                                                if ($rows['reqform'] != "") {
                                                                    $img2 = '
                                                                         <a title="Assessment/Disbursement" class="btn btn-warning btn-sm" target="_blank" href="uploads/payverif/docrequestform/' . $rows['reqform'] . '">
                                                                         <i class="fa fa-receipt fa-fw"></i></a>
                                                                         ';
                                                                } else {
                                                                    $img2 = "";
                                                                }


                                                                $strpayhistory .= '<tr>';
                                                                $strpayhistory .= ' <td class="text-center text-gray-900 font-weight-bold">' . $rows['paynum'] . '</td>';
                                                                $strpayhistory .= ' <td class="text-center text-gray-900 font-weight-bold">' . $rows['sentvia'] . '</td>';
                                                                $strpayhistory .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['date_sent'] . '</td>';
                                                                $strpayhistory .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['amtpaid'] . '</td>';
                                                                $strpayhistory .= '<td class="text-center text-gray-900">' . $img . ' ' . $img2 . '
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                </td>';







                                                                $strpayhistory .= '<td class="text-center"><span class="badge badge badge-' . $class . '">' . $rows['payment_status'] . '</span></td>';
                                                                $strpayhistory .= '<td class="text-center">';
                                                                $strpayhistory .= '    <button class="btn btn-info btn-sm viewpaydetails"  title="View Payment Details" id="' . $rows['pv_ID'] . '"><i class="fa fa-fw fa-eye"></i></button>';
                                                                $strpayhistory .= '    <button class="btn btn-danger btn-sm cancel" ' . $disabled . ' title="Delete" id="' . $rows['pv_ID'] . '" pp="' . $rows['payproof'] . '" rf="' . $rows['reqform'] . '" ><i class="fa fa-fw fa-times"></i></button>';
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


<div id="payverifModal" class="modal fade">
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
                                                <div class="row gutters" hidden>
                                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                        <div class="custom-actions-btns mb-5">
                                                            <a href="#" class="btn btn-primary">
                                                                <i class="icon-download"></i> Download
                                                            </a>
                                                            <a href="#" class="btn btn-secondary">
                                                                <i class="icon-printer"></i> Print
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->

                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <a href="#" class="invoice-logo text-primary">
                                                            Payment Details
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <address class="text-right text-gray-900 font-weight-bold">
                                                            Date Sent: <span id="date_sent"></span>


                                                        </address>
                                                    </div>
                                                </div>
                                                <!-- Row end -->

                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-sm-12">
                                                        <div class="invoice-details">
                                                            <address class="text-gray-900  font-weight-bold">
                                                                Sent Thru: <span id="sent_via"></span><br>
                                                                Payment Method: <span id="pay"></span><br>

                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-sm-12">
                                                        <div class="invoice-details">
                                                            <div class="invoice-num text-gray-900 font-weight-bold">
                                                                <div>Date of Payment: <span id="dop"></span></div>
                                                                <div>Time of Payment: <span id="top"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Row end -->

                                            </div>

                                            <div class="invoice-body">

                                                <!-- Row start -->
                                                <div class="row gutters">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="table-responsive">
                                                            <table class="table custom-table m-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-gray-900 font-weight-bold text-center">Items</th>
                                                                        <th class="text-gray-900 font-weight-bold text-center">Description</th>
                                                                        <th class="text-gray-900 font-weight-bold text-center">Amount
                                                                        <th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Tuition Fee
                                                                            <p class="m-0 text-muted">

                                                                            </p>
                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center"><span id="term"></span> <span id="sysem"></span></td>
                                                                        <td colspan="3" class="text-right text-gray-900 font-weight-bold"><span id="tfee"></span></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            Other Fees
                                                                            <p class="m-0 text-muted">

                                                                            </p>
                                                                        </td>
                                                                        <td class="text-gray-900 font-weight-bold text-center">
                                                                            <p id="part"></p>
                                                                        </td>
                                                                        <td colspan="3" class="text-right text-gray-900 font-weight-bold"><span id="ptotal"></span></td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td>


                                                                        </td>

                                                                        <td colspan="3" class="text-right text-gray-900 font-weight-bold">
                                                                            <h5 class="text-success float-left"><strong>Total</strong> </h5>

                                                                            <span id="gtotal"></span>

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



    <script src="js/header.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/notifications.js"></script>
    <script src="js/payhistory.js"></script>

</html>