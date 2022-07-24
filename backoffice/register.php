<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchstudentdetails.php';


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

    <title>CSTA Admin | Registration</title>
    <link rel="icon" type="image/x-icon" href="img/logo1.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>


    <!-- Google Recaptcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Custom fonts for this template-->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#region').on('change', function() {
                var regCode = $(this).val();
                if (regCode) {
                    $.ajax({
                        type: 'POST',
                        url: 'phlocation.php',
                        data: 'regCode=' + regCode,
                        success: function(html) {
                            $('#provinces').html(html);
                        }
                    });
                } else {
                    $('#provinces').html('<option selected="" disabled>Select Province</option>');
                }
            })
            $('#provinces').on('change', function() {
                var provCode = $(this).val();
                if (provCode) {
                    $.ajax({
                        type: 'POST',
                        url: 'phlocation.php',
                        data: 'provCode=' + provCode,
                        success: function(html) {
                            $('#city').html(html);
                        }
                    });
                } else {
                    $('#provinces').html('<option selected="" disabled>Select Province</option>');
                    $('#city').html('<option selected="" disabled>Select City</option>');
                }
            });

            $('#city').on('change', function() {
                var citymunCode = $(this).val();
                if (citymunCode) {
                    $.ajax({
                        type: 'POST',
                        url: 'phlocation.php',
                        data: 'citymunCode=' + citymunCode,
                        success: function(html) {
                            $('#barangay').html(html);
                        }

                    });
                } else {
                    $('#provinces').html('<option selected="" disabled>Select Province</option>');
                    $('#city').html('<option selected="" disabled>Select City</option>');
                    $('#barangay').html('<option selected="" disabled>Select Barangay</option>');
                }
            });


        });
    </script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
    </style>


</head>

<body>

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

                            <h1 class="h4 text-black-900 mb-4"><strong>CSTA Admin Registration</strong></h1><br><br>
                        </div>
                        <form action="addstudent.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="txtStudID" id="txtStudID" value="<?= $id ?>">
                            <h6 class="font-weight-bold">ADMIN INFORMATION</h6>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtSnum" class="form-label">Student Number</label>
                                    <input type="text" class="form-control" name="txtSnum" id="txtSnum" placeholder="Type NA if None" required>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="txtLname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="txtLname" id="txtLname" placeholder="Last Name" required>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtFname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="txtFname" id="txtFname" placeholder="First Name" required>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtMname" class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="txtMname" id="txtMname" placeholder="Middle Name">
                                </div>

                            </div>

                            <div class="form-group row">

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtCitizenship" class="form-label">Citizenship</label>
                                    <input type="text" class="form-control" id="txtCitizenship" name="txtCitizenship" placeholder="Citizenship" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="selGender" class="form-label">Gender</label>
                                    <select id="selGender" name="selGender" class="form-control" required>
                                        <option selected="" disabled>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>


                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="dtBday" class="form-label">Birthday</label>
                                    <input type="date" class="form-control" name="dtBday" id="dtBday" placeholder="Birthday" required>
                                </div>

                            </div>
                            <div class="form-group row">

                                <div class="col-md-4">
                                    <label for="txtContactno" class="form-label">Mobile</label>
                                    <input type="number" class="form-control" maxlength="11" id="txtContactno" name="txtContactno" placeholder="Mobile" required>
                                </div>


                                <div class="col-md-8">
                                    <label for="txtEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Juandelacruz@sample.com" required>
                                </div>


                            </div>


                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label for="txtCityadd" class="form-label">City Address</label>
                                    <input type="text" class="form-control" id="txtCityadd" name="txtCityadd" placeholder="Unit/House Number, Street Name, Subdivision/Village" required>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="form-group col-md-3">
                                    <label for="region" class="form-label">Region</label>
                                    <select id="region" name="region" class="form-control" required>
                                        <option selected="" disabled>Select Region</option>
                                        <?php
                                        require_once("includes/connect.php");

                                        $sql = "select * from refregion where regCode=13";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {
                                            echo '<option value=' . $row['regCode'] . '>' . $row['regDesc'] . '</option>';
                                        }
                                        $stmt = null;

                                        ?>


                                    </select>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="provinces" class="form-label">Province</label>
                                    <select id="provinces" name="provinces" class="form-control" required>
                                    </select>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="city" class="form-label">City</label>
                                    <select id="city" name="city" class="form-control" required>
                                    </select>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <select id="barangay" name="barangay" class="form-control" required>


                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="txtguardian" class="form-label">Guardian</label>
                                    <input type="text" class="form-control" id="txtguardian" name="txtguardian" placeholder="Guardian's Name" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="txtguradiancontact" class="form-label">Contact Number</label>
                                    <input type="number" class="form-control" id="txtguardiancontact" name="txtguardiancontact" placeholder="Contact Number" required>
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" id="txtUsername" name="txtUsername" onInput="checkUserName()" placeholder="Username" required>
                                    <span id="check-username"></span>
                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="txtPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control password" id="txtPassword" name="txtPassword" placeholder="Password" required>
                                    <p id="length"></p>

                                </div>

                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="confirmpassword" class="form-label">Repeat Password</label>
                                    <input type="Password" class="form-control password" id="confirmpassword" name="confirmpassword" placeholder="Password" required>
                                    <p id="message"></p>

                                </div>

                            </div>


                            <center>
                                <div class="g-recaptcha" data-sitekey="6Le4tLIeAAAAAKRymUDQbzHC_OiDqANrdAGSUQGn"></div>
                            </center> <br>

                            <div class="che-box text-center">
                                <label class="checkbox-in">
                                    <input name="checkbox" type="checkbox" tabindex="" id="remember" required> <span></span>
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


    <?php
    require_once('includes/scripts.php');
    ?>

    <script src="js/script.js"></script>

    <script type="text/javascript">
        $('#txtPassword, #confirmpassword').on('keyup', function() {

            if ($('#txtPassword').val() == "" && $('#confirmpassword').val() == "") {
                $('#message').html('');
            } else {

                if ($('#txtPassword').val().length <= 7) {
                    $('#length').html('Weak Password').css('color', 'red');
                    $('#length').html('Weak Password').css('font-weight', 'bold');
                } else if ($('#txtPassword').val().length = 0) {
                    $('#length').html('');
                } else {
                    $('#length').html('Great!').css('color', 'green');
                    $('#length').html('Great!').css('font-weight', 'bold');
                }
            }

            if ($('#txtPassword').val() == "" && ($('#confirmpassword').val() == "")) {
                $('#length').html('');
            } else if ($('#confirmpassword').val() == "") {
                $('#message').html('');
            } else if ($('#txtPassword').val() == $('#confirmpassword').val()) {
                $('#message').html('Passwords Matched!').css('color', 'green');
            } else {
                $('#message').html("Passwords do not Match!").css('color', 'red');
            }
        });
    </script>

    <script>
        function checkUserName() {
            $.ajax({
                type: "POST",
                url: "check_username.php",
                data: 'userName=' + $("#txtUsername").val(),
                success: function(data) {
                    $("#check-username").html(data);
                },
                error: function() {}
            });
        }
    </script>



    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>