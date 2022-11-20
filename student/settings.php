<?php

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

    <title>Change Password</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">


    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        ::-webkit-scrollbar {
            width: .5em;
        }

        .address {
            text-transform: capitalize;
        }

        /* .card{
      border: 1px solid black;
   
    } */
        /*Profile Pic Start*/
        .picture-container {
            position: relative;
            cursor: pointer;
            text-align: center;
        }

        .picture {
            width: 106px;
            height: 106px;
            background-color: #999999;
            border: 4px solid #CCCCCC;
            color: #FFFFFF;
            border-radius: 50%;
            margin: 0px auto;
            overflow: hidden;
            transition: all 0.2s;
            -webkit-transition: all 0.2s;
        }

        .picture:hover {
            border-color: gray;
        }

        .picture input[type="file"] {
            cursor: pointer;
            display: block;
            height: 100%;
            left: 0;
            opacity: 0 !important;
            position: absolute;
            top: 0;
            width: 100%;
        }

        .picture-src {
            width: 100%;

        }

        /*Profile Pic End*/
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 5;
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
                    <!-- <h1 class="h4 mb-4 text-gray-900 font-weight-bold">Change Password</h1> -->

                    <div class="main-body">

                        <!-- Breadcrumb -->
                        <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
                            </ol>
                        </nav> -->

                        <div class="main-body">
                            <div class="row gutters-sm">
                                <div class="col-md-4 mb-3" hidden>
                                    <div class="card">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-gray-900 text-center"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile Picture</h6>
                                        </div>
                                        <h6 class="text-center text-gray-800" style="font-weight:bold; margin-top:10px;
                                             margin-bottom:10px;">
                                        </h6>
                                        <form action="profilepicupload.php" method="post" enctype="multipart/form-data">
                                            <div class="picture-container">
                                                <div class="picture">

                                                    <?php
                                                    $file = 'uploads/users/' . $sid . '.jpg';
                                                    if (!file_exists($file)) {
                                                        $dp = 'default.jpg';
                                                    } else {
                                                        $dp = $sid . '.jpg';
                                                    }
                                                    echo '<img  src="uploads/users/' . $dp . '" class="picture-src" id="wizardPicturePreview" width="150" title="Choose Picture">' ?>
                                                    <input type="file" id="wizard-picture" name="picture" accept=".jpg" class="">
                                                </div><br>

                                            </div>
                                            <center><button style="margin-bottom:15px; margin-top:15px;" type="submit" onclick="upload()" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Save Picture</button></center>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="card mb-3">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fa fa-key fa-fw" aria-hidden="true"></i> Change Password</h6>
                                        </div>
                                        <div class="card-body">
                                            <form action="codes/changepass.php" method="POST" id="myForm">
                                                <!-- <form id="myForm"> -->
                                                <div class="row">

                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Current Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">

                                                        <input type="password" class="form-control" name="txtcurrentpass" id="txtcurrentpass">
                                                        <input type="checkbox" onclick="showPassword()"> Show Password
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">New Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <input type="password" class="form-control" name="txtnewpass" id="txtnewpass">
                                                        <input type="checkbox" onclick="showPassword2()"> Show Password
                                                        <p id="length" style="font-weight:bold;"></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Re-type Password</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <input type="password" class="form-control" name="txtrepass" id="txtrepass">
                                                        <input type="checkbox" onclick="showPassword3()"> Show Password
                                                        <p id="message" style="font-weight:bold;"></p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-sm-12">
                                                    <button type="submit" id="btnSubmit" class="btn btn-success float-right" name="changepass"><i class="fa fa-check fa-fw"></i> Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>

        </div>
        <!-- End of Page Wrapper -->

        <script type="text/javascript">
            $(function() {
                $("#changepw").click(function() {
                    if ($(this).is(":checked")) {
                        $("#oldpw").removeAttr("disabled");
                        $("#newpw").removeAttr("disabled");
                        $("#confirmnew").removeAttr("disabled");
                        $("#oldpw").focus();
                    } else {
                        $("#oldpw").attr("disabled", "disabled");
                        $("#newpw").attr("disabled", "disabled");
                        $("#confirmnew").attr("disabled", "disabled");
                    }
                });
            });


            $(document).ready(function() {
                // Prepare the preview for profile picture
                $("#wizard-picture").change(function() {
                    readURL(this);
                });
            });

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>

        <script type="text/javascript">
            $('#txtnewpass, #txtrepass').on('keyup', function() {

                if ($('#txtnewpass').val() == "" && $('#txtrepass').val() == "") {
                    $('#message').html('');
                } else {

                    if ($('#txtnewpass').val().length <= 7) {
                        $('#length').html('Weak Password').css('color', 'red');
                    } else if ($('#txtnewpass').val().length = 0) {
                        $('#length').html('');
                    } else {
                        $('#length').html('Great!').css('color', 'green');
                    }
                }

                if ($('#txtnewpass').val() == "" && ($('#txtrepass').val() == "")) {
                    $('#length').html('');
                } else if ($('#txtrepass').val() == "") {
                    $('#message').html('');
                } else if ($('#txtnewpass').val() == $('#txtrepass').val()) {
                    $('#message').html('Passwords Matched!').css('color', 'green');
                } else {
                    $('#message').html("Passwords do not Match!").css('color', 'red');
                }
            });
        </script>

        <script type="text/javascript">
            function showPassword() {
                let show = document.getElementById("txtcurrentpass");
                if (show.type == "password") {
                    show.type = "text"
                } else {
                    show.type = "password"
                }
            }

            function showPassword2() {
                let show = document.getElementById("txtnewpass");
                if (show.type == "password") {
                    show.type = "text"
                } else {
                    show.type = "password"
                }
            }

            function showPassword3() {
                let show = document.getElementById("txtrepass");
                if (show.type == "password") {
                    show.type = "text"
                } else {
                    show.type = "password"
                }
            }
        </script>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>




        <?php
        include_once("includes/scripts.php");
        ?>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- <script src="js/header.js"></script> -->
        <!-- <script src="js/settings.js"></script> -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script src="js/counter.js"></script>
        <script src="js/notifications.js"></script>
</body>

</html>