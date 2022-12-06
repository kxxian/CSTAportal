<?php
session_start();
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");

require_once 'codes/fetchuser_session.php';

$office = $Office;

// echo $office;
if (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])) {
    header('location:login.php');
}

//Prohibits the user to be logged in more than once at a time
if ($user_token!=$_SESSION['user_token']) {
    header('location:logout.php');
}


if (isset($_GET['stud'])) {
    $sid = $_GET['stud'];

    $sql = "SELECT * from vwstudents where id=? ";
    $data = array($sid);
    $stmt = $con->prepare($sql);
    $stmt->execute($data);


    if ($row = $stmt->fetch()) {
        $fullname = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
        $bday = date_create($row['bday']);


        $email = $row['email'];
        $studmobile = $row['mobile'];
        $address = ucwords(strtolower($row['completeaddress']));
        //$region=ucwords($row['region']);
        $guardian = $row['guardian'];
        $guardiancontact = $row['guardiancontact'];

        if ($row['snum'] == "NA") {
            $snum = "New Student";
        } else {
            $snum = $row['snum'];
        }
        $yrlevel = $row['yrlevel'];
        $course = $row['course'];
    } else {
        header('location: requirements-checking.php');
    }
} else {
    header('location: index.php');
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

    <title><?php echo $row['fname'] ?>'s' Payment History</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- bootstrap5 cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

        .address {
            text-transform: capitalize;
        }

        /* 
    .card{
     
      background-color: #e9e7e5;

    } */
        .picture-container {
            position: relative;
            text-align: center;
        }

        .picture {
            width: 140px;
            height: 140px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }




        .picture-src {
            width: 100%;

        }

        /*Profile Pic End*/

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

        if ($Office == "Accounting") {
            $pageValue = 3;
        }

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
                    <h1 class="h4 mb-4 text-gray-900 font-weight-bold"><?= $row['fname'] ?>'s Payment History</h1>
                    <div class="main-body">
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
                                                        <th class="text-gray-900 font-weight-bold text-center">View</th>
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
                                                            $img = '<a title="Proof of Payment" class="btn btn-primary btn-sm" target="_blank" href="../student/uploads/payverif/payments/' . $rows['payproof'] . '">
                                                                        <i class="fa fa-receipt fa-fw"></i></a>';
                                                        } else {
                                                            $img = "";
                                                        }

                                                        if ($rows['reqform'] != "") {
                                                            $img2 = '
                                                                         <a title="Assessment/Disbursement" class="btn btn-warning btn-sm" target="_blank" href="../student/uploads/payverif/docrequestform/' . $rows['reqform'] . '">
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
                                                        $strpayhistory .= '    <button class="btn btn-info btn-sm viewpaydetails"  title="View Payment Details" id="' . $rows['pv_ID'] . '"><i class="fa fa-fw fa-search"></i></button>';
                                                        // $strpayhistory .= '    <button class="btn btn-danger btn-sm cancel" ' . $disabled . ' title="Delete" id="' . $rows['pv_ID'] . '" pp="' . $rows['payproof'] . '" rf="' . $rows['reqform'] . '" ><i class="fa fa-fw fa-times"></i></button>';
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
    <!-- End of Page Wrapper -->


    <?php
    include("includes/scripts.php");
    ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>






</body>


</html>

<script src="js/header.js"></script>
<script src="js/edit_info.js"></script>
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
        <script src="js/counter-accounting.js"></script>

    <?php
    }

    ?>
<script src="js/notifications.js"></script>

<div id="editinfoModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="editinfoForm" action="codes/editinfo.php" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-user"></i> <span class="title">Edit Information</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="lname" class="text-gray-900 font-weight-bold">Last Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="lname" id="lname" class="form-control" placeholder="Last Name.." readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="text-gray-900 font-weight-bold">First Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="fname" id="fname" class="form-control" placeholder="First Name.." readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="mname" class="text-gray-900 font-weight-bold">Middle Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="mname" id="mname" class="form-control" placeholder="Middle Name.." readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="bday" class="text-gray-900 font-weight-bold">Birthday</label>
                            <input type="date" name="bday" id="bday" class="form-control" readonly>

                        </div>
                        <div class="col-md-4">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..">
                        </div>
                        <div class="col-md-4">
                            <label for="mobile" class="text-gray-900 font-weight-bold">Mobile No.</label>
                            <input type="number" name="mobile" id="mobile" class="form-control" onKeyPress="if(this.value.length==11) return false;" placeholder="Enter Mobile No..">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-8">
                            <label for="cityadd" class="text-gray-900 font-weight-bold">City Address</label>
                            <input type="text" name="cityadd" id="cityadd" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="district" class="text-gray-900 font-weight-bold">District</label>
                            <select id="district" name="district" class="form-control" required>
                                <option selected value="" disabled>Select District</option>
                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from refprovince where regCode=?";
                                $data = array('13');
                                $stmt = $con->prepare($sql);
                                $stmt->execute($data);

                                while ($row = $stmt->fetch()) {
                                    echo '<option value=' . $row['provCode'] . '>' . $row['provDesc'] . '</option>';
                                }
                                $stmt = null;

                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="city" class="text-gray-900 font-weight-bold">City</label>
                            <select id="city" name="city" class="form-control" required>
                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from refcitymun where regDesc=?";
                                $data = array('13');
                                $stmt = $con->prepare($sql);
                                $stmt->execute($data);

                                while ($row = $stmt->fetch()) {
                                    echo '<option value=' . $row['citymunCode'] . '>' . $row['citymunDesc'] . '</option>';
                                }
                                $stmt = null;

                                ?>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="barangay" class="text-gray-900 font-weight-bold">Barangay</label>
                            <select id="barangay" name="barangay" class="form-control" required>

                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from refbrgy where regCode=?";
                                $data = array('13');
                                $stmt = $con->prepare($sql);
                                $stmt->execute($data);

                                while ($row = $stmt->fetch()) {
                                    echo '<option value=' . $row['brgyCode'] . '>' . $row['brgyDesc'] . '</option>';
                                }
                                $stmt = null;

                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="guardian" class="text-gray-900 font-weight-bold mb-3">Guardian</label>
                            <input type="text" name="guardian" id="guardian" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="gcontact" class="text-gray-900 font-weight-bold mb-3">Guardian Contact</label>
                            <input type="text" name="gcontact" id="gcontact" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-6">

                            <span></span><input type="password" placeholder="Password Required" class="form-control" name="password" id="password" required>
                        </div>
                        <input type="hidden" name="user_id" id="user_id">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="save" id="action" class="btn btn-success" value="Save">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>

<script type="text/javascript">
    $(document).on('click', '.viewpaydetails', function() {
        var payment_id = $(this).attr('id');

        $.ajax({
            url: "codes/pvcrud.php",
            method: "POST",
            data: {
                payment_id: payment_id
            },
            dataType: "json",
            success: function(data) {
                $('#payverifModal').modal('show');
                $('#payment_id').val(data.id);
                $('#date_sent').html(data.date_sent);
                $('#sent_via').html(data.sent_via);
                $('#pay').html(data.paymethod);
                $('#dop').html(data.dop);
                $('#top').html(data.top);
                $('#term').html(data.term);
                $('#tfee').html(data.tfee);
                $('#gtotal').html(data.gtotal);
                $('#sysem').html(data.sysem);
                $('#part').html(data.part);
                $('#ptotal').html(data.ptotal);
                $('#paynum').html(data.paynum);
                // $('#fname').val(data.fname);
                // $('#mname').val(data.mname);
                // $('#gender').val(data.Gender);
                // $('#email').val(data.email);
                // $('#mobile').val(data.mobile);
                // $("#office").val(data.office);
                // $("#dept").val(data.dept);
                // $("#position").val(data.position);
                // $("#role").val(data.role);



                $('.title').text(' Payment Details');
                $('#payment_id').val(payment_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })
</script>

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