<?php
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

    <title>Enrollment</title>


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
                                        Enrollment Form
                                    </h7>
                                </div>
                                <div class="card-body">
                                    <form action="./codes/guest_enroll.php" id="regForm" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="txtStudID" id="txtStudID" value="<?= $id ?>">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-dark">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-dark"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-dark"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-dark"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-dark"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-dark"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" required>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="selGender" class="form-label text-dark"><b>Gender</b></label>
                                                    <select id="selGender" name="selGender" class="form-control" required>
                                                        <option selected value="" disabled>Select Gender</option>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="selCstatus" class="form-label text-dark"><b>Civil Status</b></label>
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
                                                    <label for="dtBday" class="form-label text-dark"><b>Date of Birth</b></label>
                                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" onchange="validateReg()" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="birthplace" class="form-label text-dark"><b>Place of Birth</b> (Please use CITY or MUNICIPALITY only)</label>
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>



                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-dark"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile" oninput="validateReg()" required>

                                                </div>


                                                <div class="col-sm-8">
                                                    <label for="txtEmail" class="form-label text-dark"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Juandelacruz@sample.com" oninput="validateReg()" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-dark"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region" class="form-label text-dark"><b>Region</b></label>
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
                                                    <label for="provinces" class="form-label text-dark"><b>Province</b></label>
                                                    <select id="provinces" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city" class="form-label text-dark"><b>City</b></label>
                                                    <select id="city" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay" class="form-label text-dark"><b>Barangay</b></label>
                                                    <select id="barangay" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-dark"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-dark"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-dark">Enrollment Application</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="region" class="form-label text-dark"><b>Application Status</b></label>
                                                    <select id="appstat" name="appstat" class="form-control" onchange="showDiv(this)" required>
                                                        <option selected value="" disabled>Select Application Status</option>
                                                        <option value="Freshman">Freshman (SHS Graduate, HS Graduate, ALS Completer)</option>
                                                        <option value="Transferee">Transferee (From Another College or University)</option>
                                                        <option value="Second Course Taker / Unit Earner">Second Course Taker / Unit Earner (Bachelor's Degree Holder)</option>
                                                        <option value="Cross-Enrollee">Cross-Enrollee</option>


                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group row" id="bp" style="display:none;">
                                                <div class="col-sm-12">
                                                    <label for="bp_input" class="form-label text-dark"><b>Baccalaureate Programs</b></label>
                                                    <select id="bp_input" name="bp_input" class="form-control">
                                                        <option selected value="" disabled>Select Program</option>
                                                        <?php
                                                        require_once("includes/connect.php");

                                                        $sql = "select * from courses where visible=?";
                                                        $data = array('VISIBLE');
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value=' . $row['course_ID'] . '>' . $row['course'] . '</option>';
                                                        }
                                                        $stmt = null;

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row" id="pdsc" style="display:none;">
                                                <div class="col-sm-12">
                                                    <label for="pdsc_input" class="form-label text-dark"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50">
                                                </div>
                                            </div>


                                            <div class="form-group row" id="ce" style="display:none;">
                                                <div class="col-sm-12">
                                                    <label for="ce_input" class="form-label text-dark"><b>Course / Subject to be Enrolled</b> (For Cross-Enrollees)</label>
                                                    <input type="text" class="form-control" id="ce_input" name="ce_input" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Enter subject/ course to be cross-enrolled or NA if not Applicable" maxlength="50">
                                                </div>

                                            </div>
                                            <div class="form-group row" id="ndp" style="display:none;">
                                                <div class="col-sm-12">
                                                    <label for="ndp_input" class="form-label text-dark"><b>Non Degree Programs</b> (For unit earners)</label>
                                                    <select id="ndp_input" name="ndp_input" class="form-control">
                                                        <option selected value="" disabled>Select Program</option>
                                                        <?php
                                                        require_once("includes/connect.php");

                                                        $sql = "select * from courses where visible=?";
                                                        $data = array('VISIBLE');
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value=' . $row['course_ID'] . '>' . $row['course'] . '</option>';
                                                        }
                                                        $stmt = null;

                                                        ?>


                                                    </select>
                                                </div>
                                            </div>


                                        </fieldset>
                                        <fieldset class="scheduler-border" id="FREQ" style="display:none;">
                                            <legend class="scheduler-border text-dark">Requirements (Freshman)</legend>
                                            <label class="form-label text-dark">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="freshbc" id="freshbc" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Good Moral Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="freshgmc" id="freshgmc" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Form 138 / SCHOOL FORM 9 / REPORT CARD / CERTIFICATE OF RATING
                                                        </b></label>
                                                    <input type="file" accept="application/pdf" name="freshf138" id="freshf138" class="form-control">
                                                </div>

                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border" id="TRANSREQ" style="display:none;">
                                            <legend class="scheduler-border text-dark">Requirements (Transferee)</legend>
                                            <label class="form-label text-dark">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="transbc" id="transbc" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Good Moral Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="transgmc" id="transgmc" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Honorable Dismissal</b></label>
                                                    <input type="file" accept="application/pdf" name="transhd" id="" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>TOR / Copy of Grades</b></label>
                                                    <input type="file" accept="application/pdf" name="transtor" id="transtor" class="form-control">
                                                </div>
                                            </div>
                                        </fieldset>


                                        <fieldset class="scheduler-border" id="SCTREQ" style="display:none;">
                                            <legend class="scheduler-border text-dark">Requirements(Second Course Taker)</legend>
                                            <label class="form-label text-dark">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="sctbc" id="sctbc" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Transcript of Records</b></label>
                                                    <input type="file" accept="application/pdf" name="scttor" id="scttor" class="form-control">
                                                </div>
                                            </div>

                                        </fieldset>
                                        <fieldset class="scheduler-border" id="CEREQ" style="display:none;">
                                            <legend class="scheduler-border text-dark">Requirements(Cross-Enrollee)</legend>
                                            <label class="form-label text-dark">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="cereqbc" id="cereqbc" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-dark"><b>Permit to Cross Enroll</b></label>
                                                    <input type="file" accept="application/pdf" name="cereqpermit" id="cereqpermit" class="form-control">
                                                </div>
                                            </div>

                                        </fieldset>
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

                                            <button type="submit" name="submit" id="submit" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

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
    <script src="js/guest_enrollment.js"></script>

    <script type="text/javascript">
        function showDiv(select) {


            if (select.value == "Freshman") {

                //clear selections
                $('#bp_input').prop('selectedIndex', 0);
                $('#pdsc_input').val('');
                $('#ndp_input').prop('selectedIndex', 0);
                $('#ce_input').val('');




                document.getElementById('bp').style.display = "block";
                document.getElementById('pdsc').style.display = "block";

                //require inputs
                document.getElementById('bp_input').required = true;
                document.getElementById('pdsc_input').required = true;
                document.getElementById('ndp_input').required = false;
                document.getElementById('ce_input').required = false;

                //hide 
                document.getElementById('ce').style.display = "none";
                document.getElementById('ndp').style.display = "none";

                //show requirements
                document.getElementById('FREQ').style.display = "block";

                //hide requirements
                document.getElementById('TRANSREQ').style.display = "none";
                document.getElementById('SCTREQ').style.display = "none";
                document.getElementById('CEREQ').style.display = "none";


                //require freshman requirements
                document.getElementById('freshbc').required = true;
                document.getElementById('freshgmc').required = true;
                document.getElementById('freshf138').required = true;

                document.getElementById('transbc').required = false;
                document.getElementById('transgmc').required = false;
                document.getElementById('transhd').required = false;
                document.getElementById('transtor').required = false;

                document.getElementById('sctbc').required = false;
                document.getElementById('scttor').required = false;

                document.getElementById('cereqbc').required = false;
                document.getElementById('cereqpermit').required = false;






            } else if (select.value == "Transferee") {
                //clear selections
                $('#bp_input').prop('selectedIndex', 0);
                $('#pdsc_input').val('');
                $('#ndp_input').prop('selectedIndex', 0);
                $('#ce_input').val('');

                document.getElementById('bp').style.display = "block";
                document.getElementById('pdsc').style.display = "block";

                //require inputs
                document.getElementById('bp_input').required = true;
                document.getElementById('pdsc_input').required = true;
                document.getElementById('ndp_input').required = false;
                document.getElementById('ce_input').required = false;

                //hide 
                document.getElementById('ce').style.display = "none";
                document.getElementById('ndp').style.display = "none";

                //show requirements
                document.getElementById('TRANSREQ').style.display = "block";

                //hide requirements
                document.getElementById('FREQ').style.display = "none";
                document.getElementById('SCTREQ').style.display = "none";
                document.getElementById('CEREQ').style.display = "none";


                //require transferee requirements


                document.getElementById('freshbc').required = false;
                document.getElementById('freshgmc').required = false;
                document.getElementById('freshf138').required = false;

                document.getElementById('sctbc').required = false;
                document.getElementById('scttor').required = false;

                document.getElementById('cereqbc').required = false;
                document.getElementById('cereqpermit').required = false;

                document.getElementById('transbc').required = true;
                document.getElementById('transgmc').required = true;
                document.getElementById('transhd').required = true;
                document.getElementById('transtor').required = true;

            } else if (select.value == "Second Course Taker / Unit Earner") {
                //clear selections
                $('#bp_input').prop('selectedIndex', 0);
                $('#pdsc_input').val('');
                $('#ndp_input').prop('selectedIndex', 0);
                $('#ce_input').val('');

                document.getElementById('pdsc').style.display = "block";
                document.getElementById('ndp').style.display = "block";

                //hide requirements
                document.getElementById('ce').style.display = "none";
                document.getElementById('FREQ').style.display = "none";
                document.getElementById('TRANSREQ').style.display = "none";
                document.getElementById('CEREQ').style.display = "none";

                //show requirements
                document.getElementById('SCTREQ').style.display = "block";

                //require second course taker requirements
                document.getElementById('sctbc').required = true;
                document.getElementById('scttor').required = true

                document.getElementById('transbc').required = false;
                document.getElementById('transgmc').required = false;
                document.getElementById('transhd').required = false;
                document.getElementById('transtor').required = false;
                document.getElementById('ce_input').required = false;



                document.getElementById('freshbc').required = false;
                document.getElementById('freshgmc').required = false;
                document.getElementById('freshf138').required = false;

                document.getElementById('cereqbc').required = false;
                document.getElementById('cereqpermit').required = false;
                ;

                //require inputs
                document.getElementById('pdsc_input').required = true;
                document.getElementById('ndp_input').required = true;
                document.getElementById('bp_input').required = false;
                document.getElementById('ce_input').required = false;

                //hide
                document.getElementById('bp').style.display = "none";
                document.getElementById('ce').style.display = "none";



            } else if (select.value == "Cross-Enrollee") {

                //clear selections
                $('#bp_input').prop('selectedIndex', 0);
                $('#pdsc_input').val('');
                $('#ndp_input').prop('selectedIndex', 0);
                $('#ce_input').val('');
                //hide
                document.getElementById('bp').style.display = "none";
                document.getElementById('pdsc').style.display = "none";
                document.getElementById('ndp').style.display = "none";

                //hide requirements
                document.getElementById('TRANSREQ').style.display = "none";
                document.getElementById('FREQ').style.display = "none";
                document.getElementById('SCTREQ').style.display = "none";

                //show requirements
                document.getElementById('CEREQ').style.display = "block";

                //require inputs
                document.getElementById('ce').style.display = "block";

                document.getElementById('ce_input').required = true;
                document.getElementById('ndp_input').required = false;
                document.getElementById('bp_input').required = false;
                document.getElementById('pdsc_input').required = false;

                // require cross-enrollee requirements

                document.getElementById('cereqbc').required = true;
                document.getElementById('cereqpermit').required = true;

                document.getElementById('sctbc').required = false;
                document.getElementById('scttor').required = false;

                document.getElementById('transbc').required = false;
                document.getElementById('transgmc').required = false;
                document.getElementById('transhd').required = false;
                document.getElementById('transtor').required = false;

                document.getElementById('freshbc').required = false;
                document.getElementById('freshgmc').required = false;
                document.getElementById('freshf138').required = false;

              

            }
        }
    </script>
</body>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>