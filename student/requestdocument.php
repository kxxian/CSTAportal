<?php
//ession_start();
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
if ($snum=="NA"){
    header('location:index.php');
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

    <title>Document Request</title>

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
                                        <a href="#payverif" class="nav-link active"><i class="fas fa-folder fa-fw"></i>Document Request</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#payhistory" class="nav-link"><i class="fas fa-file-alt fa-fw"></i>Request History</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="payverif">
                                <div class="row gutters-sm">
                                    <div class="col-sm-12">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-fw fa-folder"></i> Document Request</h6>
                                            </div>
                                            <div class="card-body text-gray-900">


                                                <div class="form-group">
                                                    <form method="POST" action="codes/reqdoc.php" enctype="multipart/form-data">
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label><strong>Request Number </strong>(For Updating Requests Only)</label>
                                                                <input type="text" maxlength="10" name="reqno" id="reqno" class="form-control" placeholder="Leave blank if this is a new request" oninput="reqnum()" onkeypress="return (event.charCode > 47 && 
	                                                         event.charCode < 58) ">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label><strong>Place of Birth </strong>(City or Municipality Only)</label>
                                                                <input type="text" name="birthplace" id="birthplace" class="form-control" placeholder=".." onkeypress="return (event.charCode > 64 && 
	                                                         event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" required>

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label><strong>Student Status</strong></label>
                                                                <select name="studstat" id="studstat" class="form-control" required>
                                                                    <option disabled selected value="">..</option>
                                                                    <option value="1">Graduate</option>
                                                                    <option value="2">Undergraduate</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label><strong>Year Graduated</strong> (If <strong>UNDERGRADUATE</strong>, Add Last Semester Attended) </label>
                                                                <input name="yearGrad" id="yearGrad" type="text" class="form-control" placeholder=".." onkeypress="return (event.charCode > 64 && 
                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode>=48 && event.charCode<=57) 
                                                            || (event.charCode==45)" maxlength="30" required>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label><strong>Last School Attended Before CSTA</strong></label>
                                                                <input name="lastSchool" id="lastSchool" type="text" class="form-control" placeholder=".." onkeypress="return (event.charCode > 64 && 
	                                                              event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="100" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group documents">
                                                            <div class="row">
                                                                <div class="col-sm-12">

                                                                    <label><strong>Certifications</strong> </label>

                                                                    <?php
                                                                    $sql = "select * from documents where isActive=?";
                                                                    $data = array('1');
                                                                    $stmt = $con->prepare($sql);
                                                                    $stmt->execute($data);

                                                                    while ($row = $stmt->fetch()) {
                                                                        echo '
                                                                <div class="form-check documents" id="chkdoc">
                                                                <input class="form-check-input" type="checkbox" value="' . $row['doc'] . '" id="doc" name="doc[]">
                                                                <label class="form-check-label" for="">
                                                                    ' . $row['doc'] . '
                                                                </label>
                                                                </div>';
                                                                    }
                                                                    $stmt = null;
                                                                    ?>

                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label><strong>Transcript of Records(TOR)</strong> </label>
                                                                <select name="trans" id="trans" class="form-control">
                                                                    <option selected value="" disabled>..</option>
                                                                    <option value="1">First Copy</option>
                                                                    <option value="2">Duplicate</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6" id="tor2div" style="display:none">
                                                                <label><strong>TOR - Duplicate Copy</strong> (Scanned PDF Copy of Original)</label>
                                                                <input type="file" accept=".pdf" name="tor2" id="tor2" class="form-control">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">

                                                            <div class="col-sm-12" id="transpurp" style="display:none">
                                                                <label><strong>Transcript of Records - Purpose of Request</strong> </label>
                                                                <input type="text" name="tor" id="tor" class="form-control" placeholder="eg. Visa Application / Employment / Copy for <Name of School>" onkeypress="return (event.charCode > 64 && 
	                                                          event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32">

                                                            </div>


                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label><strong>Diploma</strong></label><br>
                                                                <div class="form-check form-check-inline dips">
                                                                    <input class="form-check-input" type="radio" name="diploma" id="diploma" value="1">
                                                                    <label class="form-check-label" for="inlineRadio1">First Copy</label>
                                                                </div>
                                                                <div class="form-check form-check-inline dips">
                                                                    <input class="form-check-input" type="radio" name="diploma" id="diploma" value="2">
                                                                    <label class="form-check-label" for="inlineRadio2">Second Copy (Affidavit of Loss is required.)</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">

                                                                <label><strong>Documents for Authentication/Certified True Copy</strong> </label>

                                                                <input type="text" name="authdocs" id="authdocs" class="form-control" placeholder="Enter documents">

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-6">
                                                                <label><strong>Receiver/Representative</strong></label>
                                                                <input type="text" name="rep" id="rep" class="form-control" placeholder="Enter Name of Receiver" onkeypress="return (event.charCode > 64 && 
	                                                             event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" required>

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label><strong>Contact Number</strong></label>
                                                                <input type="number" name="repmob" id="repmob" class="form-control" placeholder="Enter Receiver's Contact Number" onKeyPress="if(this.value.length==11) return false;" required>

                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <label><strong>Delivery Address</strong>(Unit/House Number, Street Name, Subdivision/Village, Barangay/District Name, City/Municipality)</label>
                                                                <input type="text" name="deladd" id="deladd" class="form-control" placeholder="eg. #124, Don Vicente St., Brgy. Bagong Silangan, Quezon City" onkeypress="return (event.charCode > 64 && 
	                                                             event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode>=48 && event.charCode<=57) 
                                                                     || (event.charCode==45)" required>

                                                            </div>


                                                        </div>



                                                        <div class="col-sm-12">
                                                            <div class="text-right"> <input type="submit" name="submit" id="action" class="btn btn-success" value="Submit"></div>
                                                        </div>
                                                    </form>

                                                </div>


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
                                                <h5 class="header-title pb-3 mt-0 text-gray-900 font-weight-bold">History</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-hover mb-0">
                                                        <thead>
                                                            <tr class="align-self-center">
                                                                <th class="text-gray-900 font-weight-bold text-center">Request No.</th>
                                                                <th class="text-gray-900 font-weight-bold text-center">Date Sent</th>




                                                                <th class="text-gray-900 font-weight-bold text-center">Status</th>
                                                                <th class="text-gray-900 font-weight-bold text-center" width="99">Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $sql = "SELECT * FROM vwdocureq where sid=$sid order by reqdoc_ID asc";
                                                            $stmt = $con->query($sql);
                                                            $count = $stmt->rowCount();
                                                            $strreq = '';


                                                            foreach ($stmt as $rows) {

                                                                //change badge based on payment status
                                                                if ($rows['status'] == 'Sent') {
                                                                    $class = "primary";
                                                                    $disabled = "";
                                                                } elseif ($rows['status'] == 'Acknowledged') {
                                                                    $class = "info";
                                                                    $disabled = "disabled";
                                                                } elseif ($rows['status'] == 'Cleared' || $rows['status'] == 'Completed') {
                                                                    $class = "success";
                                                                    $disabled = "disabled";
                                                                } elseif ($rows['status'] == 'Pending') {
                                                                    $class = "warning";
                                                                    $disabled = "";
                                                                }elseif ($rows['status'] == 'Waiting Payment'){
                                                                    $class = "warning";
                                                                    $disabled = "";
                                                                    
                                                                }


                                                                $strreq .= '<tr>';
                                                                $strreq .= ' <td class="text-center text-gray-900 font-weight-bold">' . $rows['requestno'] . '</td>';
                                                                $strreq .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['date_sent'] . '</td>';



                                                                $strreq .= '<td class="text-center"><span class="badge badge badge-' . $class . '">' . $rows['status'] . '</span></td>';
                                                                $strreq .= '<td class="text-center">';
                                                                $strreq .= '    <button class="btn btn-info btn-sm viewreqdetails"  title="View Payment Details" id="' . $rows['reqdoc_ID'] . '"><i class="fa fa-fw fa-eye"></i></button>';
                                                                $strreq .= '    <button class="btn btn-danger btn-sm cancel" ' . $disabled . ' title="Delete" id="' . $rows['reqdoc_ID'] . '"><i class="fa fa-fw fa-times"></i></button>';
                                                                $strreq .= '</td>';
                                                                $strreq .= '</tr>';
                                                            }

                                                            echo $strreq;


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
                                                                            Birthplace
                                                                            <p class="m-0 text-muted">

                                                                            </p>
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



<script src="js/header.js"></script>
<!-- <script src="js/counter.js"></script> -->
<script src="js/notifications.js"></script>
<script src="js/reqdoc.js"></script>



</html>