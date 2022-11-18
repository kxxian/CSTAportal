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
                                    <fieldset class="scheduler-border">
                                        <legend class="scheduler-border text-gray-900">Enrollment Application </legend>
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <label for="appstat" class="form-label text-gray-900"><b>Application Status</b></label>
                                                <select id="appstat" name="appstat" class="form-control" onchange="showDiv(this)" required>
                                                    <option selected value="" disabled>Select Application Status</option>
                                                    <option value="Freshman">Freshman (SHS Graduate, HS Graduate, ALS Completer)</option>
                                                    <option value="Transferee">Transferee (From Another College or University)</option>
                                                    <option value="Second Course Taker">Second Course Taker</option>
                                                    <option value="Unit Earner">Unit Earner (Bachelor's Degree Holder)</option>
                                                    <option value="Cross-Enrollee">Cross-Enrollee</option>


                                                </select>
                                            </div>

                                        </div>

                                    </fieldset>

                                    <!-- freshman form -->
                                    <form action="./codes/guest_enroll.php" id="freshmanForm" method="POST" enctype="multipart/form-data" style="display:none;">

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname_f" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname_f" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname_f" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname_f" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship_f" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
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
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace_f" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile" required>

                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Juandelacruz@sample.com" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Confirm Email</b></label>
                                                    <input type="email" class="form-control" id="email2" name="email" placeholder="Juandelacruz@sample.com" required>
                                                    <p id="message"></p>
                                                </div>


                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd_f" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
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
                                                    <input type="text" class="form-control" id="txtguardian_f" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Enrollment Details</legend>

                                            <div class="form-group row" id="bp">
                                                <div class="col-sm-6">
                                                    <label for="bp_input" class="form-label text-gray-900"><b>Baccalaureate Programs</b></label>
                                                    <select id="bp_input" name="bp_input" class="form-control" required>
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
                                                <div class="col-sm-6">
                                                    <label for="pdsc_input" class="form-label text-gray-900"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input_f" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50" required>
                                                </div>
                                            </div>







                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Requirements (Freshman)</legend>
                                            <label class="form-label text-gray-900">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="freshbc" id="freshbc" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Good Moral Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="freshgmc" id="freshgmc" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Form 138 / School Form 9 / Report Card / Certificate of Rating
                                                        </b></label>
                                                    <input type="file" accept="application/pdf" name="freshf138" id="freshf138" class="form-control" required>
                                                </div>

                                            </div>
                                        </fieldset>





                                        <br>
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                        </center> <br>

                                        <div class="checkbox-box text-center">
                                            <label class="checkbox-in">
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-gray-900"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit_freshman" id="submit" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

                                        </div>


                                        <br>
                                    </form>

                                    <!-- transferee form -->
                                    <form action="./codes/guest_enroll.php" id="transfereeForm" method="POST" enctype="multipart/form-data" style="display:none;">

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname_t" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname_t" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname_t" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname_t" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship_t" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
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
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace_t" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>



                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile" required>

                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="emailtrans" name="email" placeholder="Juandelacruz@sample.com"  required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Confirm Email</b></label>
                                                    <input type="email" class="form-control" id="emailtrans2" name="email" placeholder="Juandelacruz@sample.com"  required>
                                                        <p id="message2"></p>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd_t" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region_trans" class="form-label text-gray-900"><b>Region</b></label>
                                                    <select id="region_trans" name="region" class="form-control" required>
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
                                                    <label for="provinces_trans" class="form-label text-gray-900"><b>Province</b></label>
                                                    <select id="provinces_trans" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city_trans" class="form-label text-gray-900"><b>City</b></label>
                                                    <select id="city_trans" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay_trans" class="form-label text-gray-900"><b>Barangay</b></label>
                                                    <select id="barangay_trans" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-gray-900"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian_t" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Enrollment Details</legend>

                                            <div class="form-group row" id="bp">
                                                <div class="col-sm-6">
                                                    <label for="bp_input" class="form-label text-gray-900"><b>Baccalaureate Programs</b></label>
                                                    <select id="bp_input" name="bp_input" class="form-control" required>
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
                                                <div class="col-sm-6">
                                                    <label for="pdsc_input" class="form-label text-gray-900"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input_t" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50" required>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <fieldset class="scheduler-border" id="TRANSREQ">
                                            <legend class="scheduler-border text-gray-900">Requirements (Transferee)</legend>
                                            <label class="form-label text-gray-900">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="transbc" id="transbc" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Good Moral Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="transgmc" id="transgmc" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Honorable Dismissal</b></label>
                                                    <input type="file" accept="application/pdf" name="transhd" id="" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>TOR / Copy of Grades</b></label>
                                                    <input type="file" accept="application/pdf" name="transtor" id="transtor" class="form-control" required>
                                                </div>
                                            </div>
                                        </fieldset>



                                        <br>
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                        </center> <br>

                                        <div class="che-box text-center">
                                            <label class="checkbox-in">
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-gray-900"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit_transferee" id="submittrans" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

                                        </div>


                                        <br>
                                    </form>

                                    <!-- second course taker form -->
                                    <form action="./codes/guest_enroll.php" id="sctForm" method="POST" enctype="multipart/form-data" style="display:none">

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname_sct" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname_sct" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname_sct" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname_sct" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship_sct" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
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
                                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="birthplace" class="form-label text-gray-900"><b>Place of Birth</b> (Please use CITY or MUNICIPALITY only)</label>
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace_sct"  onkeypress="return (event.charCode > 64 && 
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


                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="emailsct" name="email" placeholder="Juandelacruz@sample.com" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Confirm Email</b></label>
                                                    <input type="email" class="form-control" id="emailsct2" name="email" placeholder="Juandelacruz@sample.com" required>
                                                        <p id="message3"></p>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd_sct" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region_sct" class="form-label text-gray-900"><b>Region</b></label>
                                                    <select id="region_sct" name="region" class="form-control" required>
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
                                                    <label for="provinces_sct" class="form-label text-gray-900"><b>Province</b></label>
                                                    <select id="provinces_sct" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city_sct" class="form-label text-gray-900"><b>City</b></label>
                                                    <select id="city_sct" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay_sct" class="form-label text-gray-900"><b>Barangay</b></label>
                                                    <select id="barangay_sct" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-gray-900"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian_sct" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Enrollment Details</legend>

                                            <div class="form-group row" id="bp">
                                                <div class="col-sm-6">
                                                    <label for="bp_input" class="form-label text-gray-900"><b>Baccalaureate Programs</b></label>
                                                    <select id="bp_input_sct" name="bp_input" class="form-control" required>
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
                                                <div class="col-sm-6">
                                                    <label for="pdsc_input" class="form-label text-gray-900"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input_sct" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border" id="SCTREQ">
                                            <legend class="scheduler-border text-gray-900">Requirements(Second Course Taker)</legend>
                                            <label class="form-label text-gray-900">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="sctbc" id="sctbc" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Transcript of Records</b></label>
                                                    <input type="file" accept="application/pdf" name="scttor" id="scttor" class="form-control" required>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <br>
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                        </center> <br>

                                        <div class="che-box text-center">
                                            <label class="checkbox-in">
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-gray-900"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit_sct" id="submitsct" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

                                        </div>


                                        <br>
                                    </form>

                                    <!-- cross-enrollee form -->
                                    <form action="./codes/guest_enroll.php" id="ceForm" method="POST" enctype="multipart/form-data" style="display:none">
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname_ce" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname_ce" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname_ce" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname_ce" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship_ce" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
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
                                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="birthplace" class="form-label text-gray-900"><b>Place of Birth</b> (Please use CITY or MUNICIPALITY only)</label>
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace_ce"    onkeypress="return (event.charCode > 64 && 
	                                                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile"  required>

                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="emailce" name="email" placeholder="Juandelacruz@sample.com" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="emailce2"  placeholder="Juandelacruz@sample.com"  required>
                                             <p id="message5"></p>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd_ce" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region_ce" class="form-label text-gray-900"><b>Region</b></label>
                                                    <select id="region_ce" name="region" class="form-control" required>
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
                                                    <label for="provinces_ce" class="form-label text-gray-900"><b>Province</b></label>
                                                    <select id="provinces_ce" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city_ce" class="form-label text-gray-900"><b>City</b></label>
                                                    <select id="city_ce" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay_ce" class="form-label text-gray-900"><b>Barangay</b></label>
                                                    <select id="barangay_ce" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-gray-900"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian_ce" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Enrollment Details</legend>



                                            <div class="form-group row" id="ce">
                                                <div class="col-sm-6">
                                                    <label for="ce_input" class="form-label text-gray-900"><b>Course / Subject to be Enrolled</b> (For Cross-Enrollees)</label>
                                                    <input type="text" class="form-control" id="ce_input_ce" name="ce_input" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Enter subject/ course to be cross-enrolled" maxlength="50">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="pdsc_input" class="form-label text-gray-900"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input_ce" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50" required>
                                                </div>

                                            </div>


                                        </fieldset>



                                        <fieldset class="scheduler-border" id="CEREQ">
                                            <legend class="scheduler-border text-gray-900">Requirements(Cross-Enrollee)</legend>
                                            <label class="form-label text-gray-900">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="cereqbc" id="cereqbc" class="form-control">
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Permit to Cross Enroll</b></label>
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
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-gray-900"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit_ce" id="submitce" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

                                        </div>


                                        <br>
                                    </form>


                                    <!-- unit earner form -->
                                    <form action="./codes/guest_enroll.php" id="ueForm" method="POST" enctype="multipart/form-data" style="display:none">

                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Student Information</legend>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Last Name</b> (indicate suffix if any..)</label>
                                                    <input type="text" class="form-control" name="lname" id="lname_ue" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="50" placeholder="Dela Cruz Jr." required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtFname" class="form-label text-gray-900"><b>First Name</b></label>
                                                    <input type="text" class="form-control" name="fname" id="fname_ue" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Juan" required>
                                                </div>

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtMname" class="form-label text-gray-900"><b>Middle Name</b></label>
                                                    <input type="text" class="form-control" name="mname" id="mname_ue" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                                     event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="50" placeholder="Leave blank if Not Applicable ">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtLname" class="form-label text-gray-900"><b>Maiden Name</b> (For Married Teresians Only)</label>
                                                    <input type="text" class="form-control" name="maidname" id="maidname_ue" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Leave blank if Not Applicable">
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <div class="col-sm-4 mb-3 mb-sm-0">
                                                    <label for="txtCitizenship" class="form-label text-gray-900"><b>Citizenship</b></label>
                                                    <input type="text" class="form-control" id="citizenship_ue" name="citizenship" value="Filipino" onkeypress="return (event.charCode > 64 && 
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
                                                    <input type="text" class="form-control" name="birthplace" id="birthplace_ue" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                                  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="e.g. Quezon City" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                            </div>



                                            <div class="form-group row">

                                                <div class="col-sm-4">
                                                    <label for="txtContactno" class="form-label text-gray-900"><b>Mobile</b></label>
                                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="mobile" name="mobile" placeholder="Mobile"  required>

                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Email</b></label>
                                                    <input type="email" class="form-control" id="emailue" name="email" placeholder="Juandelacruz@sample.com"  required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <label for="txtEmail" class="form-label text-gray-900"><b>Confirm Email</b></label>
                                                    <input type="email" class="form-control" id="emailue2" placeholder="Juandelacruz@sample.com" required>
                                                        <p id="message4"></p>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <label for="txtCityadd" class="form-label text-gray-900"><b>City Address</b></label>
                                                    <input type="text" class="form-control" id="cityadd_ue" name="cityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                    <label for="region_ue" class="form-label text-gray-900"><b>Region</b></label>
                                                    <select id="region_ue" name="region" class="form-control" required>
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
                                                    <label for="provinces_ue" class="form-label text-gray-900"><b>Province</b></label>
                                                    <select id="provinces_ue" name="provinces" class="form-control" required>
                                                    </select>
                                                </div>

                                                <div class="col-sm-3">
                                                    <label for="city_ue" class="form-label text-gray-900"><b>City</b></label>
                                                    <select id="city_ue" name="city" class="form-control" required>
                                                    </select>
                                                </div>


                                                <div class="col-sm-4">
                                                    <label for="barangay_ue" class="form-label text-gray-900"><b>Barangay</b></label>
                                                    <select id="barangay_ue" name="barangay" class="form-control" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="txtguardian" class="form-label text-gray-900"><b>Guardian</b></label>
                                                    <input type="text" class="form-control" id="txtguardian_ue" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                                    event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                                </div>

                                                <div class="col-sm-6">
                                                    <label for="txtguradiancontact" class="form-label text-gray-900"><b>Contact Number</b></label>
                                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border">
                                            <legend class="scheduler-border text-gray-900">Enrollment Details</legend>

                                            <div class="form-group row" id="bp">
                                                <div class="col-sm-6">
                                                    <label for="ndp_input" class="form-label text-gray-900"><b>Non-Degree Programs</b></label>
                                                    <select id="ndp_input_ue" name="ndp_input" class="form-control" required>
                                                        <option selected value="" disabled>Select Program</option>
                                                        <?php
                                                        require_once("includes/connect.php");

                                                        $sql = "select * from nondegreeprograms where isVisible=?";
                                                        $data = array('1');
                                                        $stmt = $con->prepare($sql);
                                                        $stmt->execute($data);

                                                        while ($row = $stmt->fetch()) {
                                                            echo '<option value=' . $row['ndp_ID'] . '>' . $row['ndp'] . '</option>';
                                                        }
                                                        $stmt = null;

                                                        ?>


                                                    </select>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="pdsc_input" class="form-label text-gray-900"><b>Previous Degree / Course / Strand
                                                        </b> </label>
                                                    <input type="text" class="form-control" id="pdsc_input_ue" name="pdsc_input" onkeypress="return (event.charCode > 64 && 
	                                                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Degree / Course / Strand" maxlength="50" required>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset class="scheduler-border" id="SCTREQ">
                                            <legend class="scheduler-border text-gray-900">Requirements(Unit Earner)</legend>
                                            <label class="form-label text-gray-900">Attach the <b>SCANNED COPY OF THE ORIGINAL DOCUMENT IN PDF FORMAT</b> / The original document must be submitted to CSTA.</label>
                                            <div class="form-group row">
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Birth / Marriage Certificate</b></label>
                                                    <input type="file" accept="application/pdf" name="sctbc" id="sctbc" class="form-control" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="region" class="form-label text-gray-900"><b>Transcript of Records</b></label>
                                                    <input type="file" accept="application/pdf" name="scttor" id="scttor" class="form-control" required>
                                                </div>
                                            </div>

                                        </fieldset>

                                        <br>
                                        <center>
                                            <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                                        </center> <br>

                                        <div class="che-box text-center">
                                            <label class="checkbox-in">
                                                <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span class="text-gray-900"> I hereby certify that all of the information and documents given are true <br> and correct as to the best of my knowledge</span>

                                            </label>
                                        </div><br>
                                        <div class="text-center">

                                            <button type="submit" name="submit_ue" id="submitue" class="btn btn-rounded btn-success" style="width:200px;">Enroll</button>

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
                $('#freshmanForm').css('display', 'block')
                $('#transfereeForm').css('display', 'none')
                $('#sctForm').css('display', 'none')
                $('#ceForm').css('display', 'none')
                $('#ueForm').css('display', 'none')

            } else if (select.value == "Transferee") {
                $('#freshmanForm').css('display', 'none')
                $('#transfereeForm').css('display', 'block')
                $('#sctForm').css('display', 'none')
                $('#ceForm').css('display', 'none')
                $('#ueForm').css('display', 'none')

            } else if (select.value == "Second Course Taker") {
                $('#freshmanForm').css('display', 'none')
                $('#transfereeForm').css('display', 'none')
                $('#sctForm').css('display', 'block')
                $('#ceForm').css('display', 'none')
                $('#ueForm').css('display', 'none')
            } else if (select.value == "Cross-Enrollee") {
                $('#freshmanForm').css('display', 'none')
                $('#transfereeForm').css('display', 'none')
                $('#sctForm').css('display', 'none')
                $('#ceForm').css('display', 'block')
                $('#ueForm').css('display', 'none')
            } else if (select.value == "Unit Earner") {
                $('#freshmanForm').css('display', 'none')
                $('#transfereeForm').css('display', 'none')
                $('#sctForm').css('display', 'none')
                $('#ceForm').css('display', 'none')
                $('#ueForm').css('display', 'block')
            }

        }

        //Email addressVALIDATION
        $('#email, #email2').on('keyup', function() {

            if ($('#email').val() == "" || $('#email2').val() == "") {
                $('#message').html('');
            } else {
                if ($('#email').val() == $('#email2').val()) {
                    $('#message').html('Email Address Matched!').css('color', 'green');
                    $('#message').html('Email Address Matched!').css('font-weight', 'bold');
                    $('#submit').css('pointer-events', 'auto');
                } else {
                    $('#message').html("Email Address do not Match!").css('color', 'red');
                    $('#message').html("Email Address do not Match!").css('font-weight', 'bold');
                    $('#submit').css('pointer-events', 'none');
                }

            }

        });
        //Email validation trans
        $('#emailtrans, #emailtrans2').on('keyup', function() {

            if ($('#emailtrans').val() == "" && $('#emailtrans2').val() == "") {
                $('#message2').html('');
            } else {
                if ($('#email').val() == $('#email2').val()) {
                    $('#message2').html('Email Address Matched!').css('color', 'green');
                    $('#message2').html('Email Address Matched!').css('font-weight', 'bold');
                    $('#submittrans').css('pointer-events', 'auto');
                } else {
                    $('#message2').html("Email Address do not Match!").css('color', 'red');
                    $('#message2').html("Email Address do not Match!").css('font-weight', 'bold');
                    $('#submittrans').css('pointer-events', 'none');
                }

            }

        });

           //Email validation sct
           $('#emailsct, #emailsct2').on('keyup', function() {

if ($('#emailsct').val() == "" && $('#emailsct2').val() == "") {
    $('#message3').html('');
} else {
    if ($('#emailsct').val() == $('#emailsct2').val()) {
        $('#message3').html('Email Address Matched!').css('color', 'green');
        $('#message3').html('Email Address Matched!').css('font-weight', 'bold');
        $('#submitsct').css('pointer-events', 'auto');
    } else {
        $('#message3').html("Email Address do not Match!").css('color', 'red');
        $('#message3').html("Email Address do not Match!").css('font-weight', 'bold');
        $('#submitsct').css('pointer-events', 'none');
    }

}



});


  //Email validation ue
  $('#emailue, #emailue2').on('keyup', function() {

if ($('#emailue').val() == "" && $('#emailue2').val() == "") {
    $('#message4').html('');
} else {
    if ($('#emailue').val() == $('#emailue2').val()) {
        $('#message4').html('Email Address Matched!').css('color', 'green');
        $('#message4').html('Email Address Matched!').css('font-weight', 'bold');
        $('#submitue').css('pointer-events', 'auto');
    } else {
        $('#message4').html("Email Address do not Match!").css('color', 'red');
        $('#message4').html("Email Address do not Match!").css('font-weight', 'bold');
        $('#submitue').css('pointer-events', 'none');
    }

}



});

  //Email validation ce
  $('#emailce, #emailce2').on('keyup', function() {

if ($('#emailce').val() == "" && $('#emailce2').val() == "") {
    $('#message5').html('');
} else {
    if ($('#emailce').val() == $('#emailce2').val()) {
        $('#message5').html('Email Address Matched!').css('color', 'green');
        $('#message5').html('Email Address Matched!').css('font-weight', 'bold');
        $('#submitce').css('pointer-events', 'auto');
    } else {
        $('#message5').html("Email Address do not Match!").css('color', 'red');
        $('#message5').html("Email Address do not Match!").css('font-weight', 'bold');
        $('#submitce').css('pointer-events', 'none');
    }

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