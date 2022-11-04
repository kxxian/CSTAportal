<?php
session_start();
require("includes/connect.php");
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

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- jquery validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- Google Recaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>



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
    </style>



</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        require_once("includes/guest_sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                require('includes/guest_header.php');
                ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-5">
                                <div class="card-header text-gray-900">
                                    <h7 class="h7 font-weight-bold">
                                        <i class="fas fa-credit-card"></i>
                                        &nbsp;
                                        Payment Verification Form
                                    </h7>
                                </div>
                                <div class="card-body">
                                    <form action="./codes/guest_paymentverif.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="txtStudID" id="txtStudID" value="<?= $id ?>">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-dark"><b>Last Name</b> (include name suffix if any.)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For married teresians only.)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship" name="citizenship" placeholder="Citizenship" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="selGender" class="form-label text-gray-900"><b>Gender</b></label>
                                                    <select id="selGender" name="selGender" class="form-control" required>
                                                        <option selected value="" disabled>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="selCstatus" class="form-label text-gray-900"><b>Civil Status</b></label>
                                                    <select id="selCstatus" name="selCstatus" class="form-control" required>
                                                        <option selected value="" disabled>Select Civil status</option>
                                                        <option>Single</option>
                                                        <option>Married</option>
                                                        <option>Widowed</option>
                                                        <option>Separated</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="dtBday" class="form-label text-gray-900"><b>Date of Birth</b></label>
                                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" onchange="validateReg()" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="birthplace" class="form-label text-gray-900"><b>Place of Birth</b> (Please use CITY or MUNICIPALITY only)</label>
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>



                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile" oninput="validateReg()" required>

                                                </div>


                                                <div class="col-sm-8">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Juandelacruz@sample.com" oninput="validateReg()" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region" class="form-label text-gray-900"><b>Region</b></label>
                                                    <select id="region" name="region" class="form-control" required>
                                                        <option selected value="" disabled>Select Region</option>
                                                        <?php
                                                        require_once("includes/connect.php");

                                                        $sql = "select * from refregion where regCode=?";
                                                        $data = array('13');
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value=' . $row['regCode'] . '>' . $row['regDesc'] . '</option>';
                                                        }
                                                        $stmt = null;

                                                        ?>


                                                    </select>
                                                </div>


                                                <div class="col-sm-3">
                                                    <label for="provinces" class="form-label text-gray-900"><b>Province</b></label>
                                                    <select id="provinces" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city" class="form-label text-gray-900"><b>City</b></label>
                                                    <select id="city" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay" class="form-label text-gray-900"><b>Barangay</b></label>
                                                    <select id="barangay" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-gray-900"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Payment For</legend>
                                            <br><label>
                                                <h5 class="font-weight-bold text-gray-900">Tuition Fee</h5>
                                            </label>
                                            <div class="form-group row" id="inputtfee">
                                                <div class="col-sm-6">
                                                    <label class="form-check-label font-weight-bold text-gray-900" for="chktfee">
                                                        School Year
                                                    </label>


                                                    <input type="text" name="selsy" id="selsy" class="form-control" placeholder="ex. 2022-2023">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label class="form-check-label font-weight-bold text-gray-900" for="chktfee">
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
                                                    <label class="form-check-label font-weight-bold text-gray-900" for="chktfee">
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
                                                    <label class="form-check-label font-weight-bold text-gray-900" for="chktfee">
                                                        Amount
                                                    </label>
                                                    <i style="font-size: 0.9rem;color:#808080">*Enter tuition fee amount paid</i>
                                                    <input type="number" placeholder="0.00" class="form-control" id="tfeeamount" name="tfeeamount" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="1" maxlength="7" style="text-align:right">
                                                </div>
                                            </div><br>
                                            <label>
                                                <h5 class="font-weight-bold text-gray-900">Additional (Others Fees)</h5>
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
                                                                <label class="form-check-label font-weight-bold text-gray-900" for="particulars">
                                                                    ' . $row['particular'] . '
                                                                </label>
                                                                </div>';
                                                    }
                                                    $stmt = null;
                                                    ?>
                                                </div><br>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="font-weight-bold text-gray-900">
                                                            Total (Other Fees)
                                                        </label>
                                                        <i style="font-size: 0.9rem;color:#808080">*Enter total amount for other fees</i>
                                                        <input type="number" class="form-control" placeholder="0.00" id="totalothers" name="totalothers" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" min="1" maxlength="7" style="text-align:right">
                                                    </div>


                                                </div>



                                            </div>

                                        </fieldset>

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Total</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-3">

                                                    <?php
                                                    ?>

                                                    <input type="hidden" class="form-control" id="totaldue" name="totaldue" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">

                                                    <input type="text" class="form-control" id="totaldue1" name="totaldue1" style="pointer-events: none; height:55px; 
                                                                    font-size:20pt; font-weight:bold; color:red; text-align:right">
                                                </div>
                                                <i style="font-size: 1rem;color:#808080">*Total amount should be similar on what is on your proof of payment</i>

                                            </div>
                                        </fieldset>

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Payment Details</legend>
                                            <i style="font-size: 1rem;color:red">*Fill all the details as indicated on your proof of payment</i>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="paymentamount" class="text-gray-900"><strong>Amount Paid</strong></label>
                                                    <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="7" class="form-control" name="amtpaid" id="amtpaid" placeholder="0.00" style="text-align:right;" required>
                                                    <p class="font-weight-bold" id="errmsg" style="display:none; color:red">Please Enter a Valid Amount !</p>
                                                </div>
                                                <div class="col-sm-6">

                                                    <label for="sentthru" class="text-gray-900"><strong>Sent Thru</strong></label>
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
                                                    <label for="paymethod" class="text-gray-900"><strong>Payment Method</strong></label>
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
                                                    <label for="dop" class="text-gray-900"><strong>Payment Date</strong></label>
                                                    <input type="date" class="form-control" id="DoP" name="DoP" required>
                                                </div>
                                                <div class="col-sm-3">
                                                    <label for="dop" class="text-gray-900"><strong>Time</strong></label>
                                                    <input type="time" step="1" class="form-control" id="ToP" name="ToP" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6" id="reqform">
                                                    <label for="" class="text-gray-900"><strong>Assessment Form</strong> <i style="font-size: 0.9rem;color:#808080"> *Attach assessment/disbursement form here </i></label>
                                                    <input type="file" accept=".jpg" class="form-control-file" name="reqform">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="paymentproof" class="text-gray-900"><strong>Proof of Payment</strong></label>
                                                    <input type="file" accept=".jpg" class="form-control-file" name="paymentproof" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="tuitionpaynote" class="text-gray-900"><strong>Notes (Optional)</strong></label>
                                                    <textarea class="form-control" id="note" name="note" rows="4" maxlength="200" placeholder="Maximum of 200 characters.."></textarea>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <br>
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                        </center> <br>

                                        <div class="che-box text-center">
                                            <label class="checkbox-in">
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-dark"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge.</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit" id="submit" class="btn btn-rounded btn-success" style="width:200px;">Submit</button>

                                        </div>


                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php
            require_once("includes/guest_footer.php");
            ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php
    require_once 'includes/scripts.php';

    ?>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="js/guest_payverif.js"></script>


</body>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


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

</html>