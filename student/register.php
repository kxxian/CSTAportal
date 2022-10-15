<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="img/logo1.png">


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


    <link rel="stylesheet" href="css/style2.css">
    <style type="text/css">
        body {
            color: black;
        }


        .bg {
            background: url("img/BG_REGFORM.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            overflow: visible;
            position: fixed;
            background-position: center;
            display: table;
            width: 100%;
        }

        .container {
            padding: 30px 0px;
            width: 100%;

        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #824d1b;
            border-radius: 0;
        }

        .message {
            color: rgba(255, 255, 255, 0);
        }

        /* change the color of the button if disabled */
        #submit:disabled {
            background-color: red;
            opacity: 0.5;
        }

        .error {
            color: #df4759;
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-top: 5px;
            width: 100%;
        }

        input.error {
            border: 2px solid #df4759;
            font-weight: 300;
            color: #df4759;
        }

        select.error {
            border: 2px solid #df4759;
            font-weight: 300;

        }
    </style>


</head>

<body id="page-top">
    <div class="bg"></div>
    <div class="container">
        <div class="card border-1 shadow-lg  ">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="col">
                    <div class="p-5">
                        <div class="text-center">
                            <img src="img/CSTA_SMALL.png" class="rounded" width="130">
                        </div><br>

                        <div class="text-center">

                            <h1 class="h4 text-black-900 mb-4"><strong>CSTA Student Portal Registration</strong></h1><br><br>
                        </div>
                        <form action="./codes/addstudent.php" id="regForm" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="txtStudID" id="txtStudID" value="<?= $id ?>">
                            <h6>STUDENT INFORMATION</h6>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtSnum" class="form-label">Student Number</label>
                                    <input type="text" class="form-control" name="txtSnum" id="txtSnum" oninput="validateReg()" onkeypress="return (event.charCode > 47 && 
	                                event.charCode < 58 || event.charCode==45) " placeholder="xx-xxxxx" maxlength="8" required autofocus>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div id="regAlert">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="txtLname" class="form-label"><b>Last Name</b> (indicate suffix if any..)</label>
                                    <input type="text" class="form-control" name="txtLname" id="txtLname" oninput="validateReg();  " onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32 || (event.charCode)==46 || (event.charCode)==165|| (event.charCode)==164" maxlength="20" placeholder="Dela Cruz Jr." required>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtFname" class="form-label"><b>First Name</b></label>
                                    <input type="text" class="form-control" name="txtFname" id="txtFname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" placeholder="Juan" required>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtMname" class="form-label"><b>Middle Name</b></label>
                                    <input type="text" class="form-control" name="txtMname" id="txtMname" oninput="validateReg()" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" placeholder="Leave blank if none ">
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtCitizenship" class="form-label"><b>Citizenship</b></label>
                                    <input type="text" class="form-control" id="txtCitizenship" name="txtCitizenship" placeholder="Citizenship" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" maxlength="20" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="selGender" class="form-label"><b>Gender</b></label>
                                    <select id="selGender" name="selGender" class="form-control" required>
                                        <option selected="" disabled>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>


                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="dtBday" class="form-label"><b>Birthday</b></label>
                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" onchange="validateReg()" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div id="identityAlert">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-group col-md-3">
                                    <label for="yrlevel" class="form-label"><b>Year Level</b></label>
                                    <select id="yrlevel" name="yrlevel" class="form-control" required>
                                        <option selected="" disabled>Select Year Level</option>
                                        <?php
                                        require_once("includes/connect.php");

                                        $sql = "select * from yrlevel where status='VISIBLE'";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {
                                            echo '<option value=' . $row['yrlevel_ID'] . '>' . $row['yrlevel'] . '</option>';
                                        }
                                        $stmt = null;

                                        ?>


                                    </select>
                                </div>


                                <div class="form-group col-md-5">
                                    <label for="dept" class="form-label"><b>Department</b></label>
                                    <select id="dept" name="dept" class="form-control" required>
                                        <option selected="" disabled>Select Department</option>
                                        <?php
                                        require_once("includes/connect.php");

                                        $sql = "select * from departments";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {
                                            echo '<option value=' . $row['deptid'] . '>' . $row['dept'] . '</option>';
                                        }
                                        $stmt = null;

                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="courses" class="form-label"><b>Course</b></label>
                                    <select id="courses" name="courses" class="form-control" required>
                                    </select>
                                </div>

                            </div>



                            <div class="form-group row">

                                <div class="col-md-4">
                                    <label for="txtContactno" class="form-label"><b>Mobile</b></label>
                                    <input type="number" class="form-control" onKeyPress="if(this.value.length==11) return false;" id="txtContactno" name="txtContactno" placeholder="Mobile" oninput="validateReg()" required>

                                </div>


                                <div class="col-md-8">
                                    <label for="txtEmail" class="form-label"><b>Email</b></label>
                                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Juandelacruz@sample.com" oninput="validateReg()" required>
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div id="mobileAlert">
                                    </div>
                                </div>
                            </div>





                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="txtCityadd" class="form-label"><b>City Address</b></label>
                                    <input type="text" class="form-control" id="txtCityadd" name="txtCityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="form-group col-md-2">
                                    <label for="region" class="form-label"><b>Region</b></label>
                                    <select id="region" name="region" class="form-control" required>
                                        <option selected="" disabled>Select Region</option>
                                        <?php
                                        require_once("includes/connect.php");

                                        $sql = "select * from refregion where regCode=?";
                                        $data=array('13');
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute($data);

                                        while ($row = $stmt->fetch()) {
                                            echo '<option value=' . $row['regCode'] . '>' . $row['regDesc'] . '</option>';
                                        }
                                        $stmt = null;

                                        ?>


                                    </select>
                                </div>


                                <div class="form-group col-md-3">
                                    <label for="provinces" class="form-label"><b>Province</b></label>
                                    <select id="provinces" name="provinces" class="form-control" required>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="city" class="form-label"><b>City</b></label>
                                    <select id="city" name="city" class="form-control" required>
                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="barangay" class="form-label"><b>Barangay</b></label>
                                    <select id="barangay" name="barangay" class="form-control" required>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="txtguardian" class="form-label"><b>Guardian</b></label>
                                    <input type="text" class="form-control" id="txtguardian" name="txtguardian" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)  || (event.charCode)==32 || (event.charCode)==45|| (event.charCode)==46" placeholder="Guardian's Name" maxlength="50" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="txtguradiancontact" class="form-label"><b>Contact Number</b></label>
                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" onKeyPress="if(this.value.length==11) return false;" placeholder="Contact Number" required>
                                </div>
                            </div>


                            <div class="form-group row">

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="form-label"><b>Username</b></label>
                                    <input type="text" class="form-control" id="txtUsername" name="txtUsername" onInput="checkUserName()" placeholder="Username" required>
                                    <span id="check-username"></span>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtPassword" class="form-label"><b>Password</b></label>
                                    <input type="password" class="form-control password" id="txtPassword" name="txtPassword" placeholder="Password" required>
                                    <p id="length"></p>

                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="confirmpassword" class="form-label"><b>Repeat Password</b></label>
                                    <input type="Password" class="form-control password" id="confirmpassword" name="confirmpassword" placeholder="Password" required>
                                    <p id="message"></p>

                                </div>

                            </div>


                            <center>
                                <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                            </center> <br>

                            <div class="che-box text-center">
                                <label class="checkbox-in">
                                    <input name="checkbox" type="checkbox" tabindex="" id="chkagree" name="chkagree" required> <span></span>
                                    I have read and understand the <a target="__blank" href="terms.php">Data Privacy and Policy</a> of using this service.
                                </label>
                            </div><br>
                            <div class="text-center">

                                <button type="submit" name="submit" id="submit" class="btn btn-rounded btn-primary" style="width:200px;"><i class="far fa-save pr-2" aria-hidden="true"></i>Register</button>

                            </div>


                            <br>
                        </form>
                        <div class="text-center">
                            <a href="login.php" style="color:white"><button class="btn btn-secondary" style=" border-color:#824d1b; width:200px; "><i class="fas fa-redo pr-2" aria-hidden="true"></i>Back</button></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="js/register-page.js"></script>

    <!-- Sweet Alert -->
    <script src="js/sweetalert.min.js"></script>



    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

   


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

</html>