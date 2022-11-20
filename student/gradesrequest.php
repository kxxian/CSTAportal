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

    <title>Request of Grades</title>

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
                            <div class="col-sm-5">

                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-fw fa-file-alt"></i> Request of Grades</h6>
                                    </div>
                                    <div class="card-body text-gray-900">

                                        <form action="codes/gradereq.php" method="POST" enctype="multipart/form-data">


                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="sy1"><strong>School Year</strong></label>
                                                    <input name="sy1" type="text" value="<?= $currentsyval ?>" class="form-control">
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="sem1" class="text-gray-900"><b>Semester</b></label>
                                                    <select class="form-control" id="sem1" name="sem1" required>
                                                        <option selected value="" disabled>Select Semester..</option>
                                                        <?php
                                                        $sql = "select * from semester where isVisible=?";
                                                        $data = array(1);
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value="' . $row['semester'] . '">' . $row['semester'] . '</option>';
                                                        }
                                                        $stmt = null;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="text-right"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i> Submit</button></div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-7">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="header-title pb-3 mt-0 text-gray-900 font-weight-bold">Request Logs</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr class="align-self-center">
                                                        <th class="text-gray-900 font-weight-bold text-center">School Year</th>
                                                        <th class="text-gray-900 font-weight-bold text-center">Semester</th>
                                                        <th class="text-gray-900 font-weight-bold text-center">Date Requested</th>
                                                        <th class="text-gray-900 font-weight-bold text-center">Status</th>
                                                        <th class="text-gray-900 font-weight-bold text-center">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM vwgradereq where sid=$sid order by gradereq_ID asc";
                                                    $stmt = $con->query($sql);
                                                    $count = $stmt->rowCount();
                                                    $strpayhistory = '';


                                                    foreach ($stmt as $rows) {

                                                        //change badge based on payment status
                                                        if ($rows['status'] == 'Done') {
                                                            $class = "success";
                                                            $disabled = "disabled";
                                                        } elseif ($rows['status'] == 'Pending') {
                                                            $class = "warning";
                                                            $disabled = "disabled";
                                                        }


                                                        $strpayhistory .= '<tr>';
                                                        $strpayhistory .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['schoolyr'] . '</td>';
                                                        $strpayhistory .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['semester'] . '</td>';
                                                        $strpayhistory .= '<td class="text-center text-gray-900 font-weight-bold">' . $rows['date_req'] . '</td>';
                                                        $strpayhistory .= '<td class="text-center"><span class="badge badge badge-' . $class . '">' . $rows['status'] . '</span></td>';
                                                        $strpayhistory .= '<td class="text-center">';
                                                        $strpayhistory .= '    <button class="btn btn-danger btn-sm cancel" ' . $disabled . ' title="Cancel" id="' . $rows['gradereq_ID'] . '"><i class="fa fa-fw fa-times"></i></button>';
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
<script src="js/reqgradehistory.js"></script>

</html>