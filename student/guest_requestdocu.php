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

    <title>Request of Documents</title>


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
                                        <i class="fas fa-edit"></i>
                                        &nbsp;
                                        Request of Documents Form
                                    </h7>
                                </div>
                                <div class="card-body">
                                    <form action="./codes/guest_reqdocu.php" id="regForm" method="POST" enctype="multipart/form-data">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
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
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
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
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile" oninput="validateReg()" required>

                                                </div>

                                            </div>



                                            <div class="form-group row">




                                                <div class="col-sm-12">
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
                                            <legend class="scheduler-border text-gray-900">Request Details</legend>
                                            <div class="form-group">

                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="text-gray-900"><strong>Request Number </strong>(For Updating Requests Only)</label>
                                                        <input type="text" name="reqno" id="reqno" class="form-control" placeholder="Leave blank if this is a new request" oninput="reqnum()" onkeypress="return (event.charCode > 47 && 
	                                                         event.charCode < 58) ">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Place of Birth </strong>(City or Municipality Only)</label>
                                                        <input type="text" name="birthplace" id="birthplace" class="form-control" placeholder="Quezon City" onkeypress="return (event.charCode > 64 && 
	                                                         event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" required>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Student Status</strong></label>
                                                        <select name="studstat" id="studstat" class="form-control" required>
                                                            <option disabled selected value="">..</option>
                                                            <option value="1">Graduate</option>
                                                            <option value="2">Undergraduate</option>
                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Year Graduated</strong> (If <strong>UNDERGRADUATE</strong>, include Last Semester) </label>
                                                        <input name="yearGrad" id="yearGrad" type="text" class="form-control" placeholder="2021-2022 First Semester " onkeypress="return (event.charCode > 64 && 
                                                            event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode>=48 && event.charCode<=57) 
                                                            || (event.charCode==45)" maxlength="30" required>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Last School Attended Before CSTA</strong></label>
                                                        <input name="lastSchool" id="lastSchool" type="text" class="form-control" placeholder="e.g. STI College Novaliches" onkeypress="return (event.charCode > 64 && 
	                                                              event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="100" required>
                                                    </div>
                                                </div>
                                                <div class="form-group documents">
                                                    <div class="row">
                                                        <div class="col-sm-12">

                                                            <label class="text-gray-900"><strong>Certifications</strong> </label>

                                                            <?php
                                                            $sql = "select * from documents where isActive=?";
                                                            $data = array('1');
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->execute($data);

                                                            while ($row = $stmt->fetch()) {
                                                                echo '
                                                                <div class="form-check documents" id="chkdoc">
                                                                <input class="form-check-input" type="checkbox" value="' . $row['doc'] . '" id="doc" name="doc[]">
                                                                <label class="form-check-label text-gray-900" for="">
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
                                                        <label class="text-gray-900"><strong>Transcript of Records(TOR)</strong> </label>
                                                        <select name="trans" id="trans" class="form-control">
                                                            <option selected value="" disabled>..</option>
                                                            <option value="1">First Copy</option>
                                                            <option value="2">Duplicate</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6" id="tor2div" style="display:none">
                                                        <label class="text-gray-900"><strong>TOR - Duplicate Copy</strong> (Attach Scanned Copy of Original)</label>
                                                        <input type="file" accept=".pdf" name="tor2" id="tor2" class="form-control">

                                                    </div>
                                                </div>
                                                <div class="form-group row">

                                                    <div class="col-sm-12" id="transpurp" style="display:none">
                                                        <label class="text-gray-900"><strong>Transcript of Records - Purpose of Request</strong> </label>
                                                        <input type="text" name="tor" id="tor" class="form-control" placeholder="eg. Visa Application / Employment / Copy for <Name of School>" onkeypress="return (event.charCode > 64 && 
	                                                          event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32">

                                                    </div>


                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="text-gray-900"><strong>Diploma</strong></label><br>
                                                        <div class="form-check form-check-inline dips">
                                                            <input class="form-check-input" type="radio" name="diploma" id="diploma" value="1">
                                                            <label class="form-check-label text-gray-900" for="inlineRadio1">First Copy</label>
                                                        </div>
                                                        <div class="form-check form-check-inline dips">
                                                            <input class="form-check-input" type="radio" name="diploma" id="diploma" value="2">
                                                            <label class="form-check-label text-gray-900" for="inlineRadio2">Second Copy (Affidavit of Loss is required.)</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">

                                                        <label class="text-gray-900"><strong>Documents for Authentication/Certified True Copy</strong> </label>

                                                        <input type="text" name="authdocs" id="authdocs" class="form-control" placeholder="Enter documents">

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Receiver/Representative</strong></label>
                                                        <input type="text" name="rep" id="rep" class="form-control" placeholder="Enter Name of Receiver" onkeypress="return (event.charCode > 64 && 
	                                                             event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" required>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="text-gray-900"><strong>Contact Number</strong></label>
                                                        <input type="number" name="repmob" id="repmob" class="form-control" placeholder="Enter Receiver's Contact Number" onKeyPress="if(this.value.length==11) return false;" required>

                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <label class="text-gray-900"><strong>Delivery Address</strong>(Unit/House Number, Street Name, Subdivision/Village, Barangay/District Name, City/Municipality)</label>
                                                        <input type="text" name="deladd" id="deladd" class="form-control" placeholder="eg. #124, Don Vicente St., Brgy. Bagong Silangan, Quezon City" onkeypress="return (event.charCode > 64 && 
	                                                             event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode>=48 && event.charCode<=57) 
                                                                     || (event.charCode==45)" required>

                                                    </div>


                                                </div>



                                            </div>


                                            <br>
                                            <center>
                                                <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                            </center> <br>

                                            <div class="che-box text-center">
                                                <label class="checkbox-in">
                                                    <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-dark"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                                </label>
                                            </div><br>
                                            <div class="text-center">

                                                <button type="submit" name="submit" id="submit" class="btn btn-rounded btn-success" style="width:200px;">Submit</button>

                                            </div>


                                            <br>

                                        </fieldset>
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
    <script src="js/guest_enrollment.js"></script>

    <script type="text/javascript">
        //show/hide transcript dependent fields
        $('#trans').on('change', function() {
            var seltrans = this.value;
            $('#tor2').val();
            //alert( seltrans );
            if (seltrans == 2) {
                $('#tor2div').css('display', 'block');
                $('#transpurp').css('display', 'block');

                $("#tor2").prop('required', true);
                $("#tor").prop('required', true);
            } else {
                $('#tor2div').hide();
                $('#transpurp').hide();

                $("#tor2").prop('required', false);
                $("#tor").prop('required', false);

                $("#tor2").val("");
                $("#tor").val("");


            }


        });
    </script>
</body>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>