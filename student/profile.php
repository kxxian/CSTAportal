<?php

require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
// require_once("codes/fetchstudenttable.php");

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

    <title>My Profile</title>

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
            cursor: pointer;
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
        $pageValue = 2;
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
                    <h1 class="h4 mb-4 text-gray-900 font-weight-bold">My Profile</h1>
                    <div class="main-body">
                        <div class="row gutters-sm">
                            <div class="col-md-7 mb-3">
                                <ul class="nav nav-pills" id="myTab">
                                    <li class="nav-item">
                                        <a href="#profile" class="nav-link active"><i class="fas fa-user"></i> Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#subreq" class="nav-link"><i class="fas fa-file"></i> Requirements</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="row gutters-sm">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-body">

                                                <div class="d-flex flex-column align-items-center text-center">
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
                                                        <center><button style="margin-bottom:15px; margin-top:15px;" type="submit" onclick="upload()" class="btn btn-primary"> Change</button></center>
                                                    </form>
                                                    <div class="mt-2">
                                                        <h4 class="text-gray-900 font-weight-bold"><?= $fullname ?> </h4>
                                                        <p class="text-secondary mb-1 text-gray-900"><?= $snum ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $yrlevel ?></p>
                                                        <p class="text-muted font-size-sm text-gray-900"><?= $course ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="card mb-3">



                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Full Name</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $fullname ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Birthdate</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $bday
                                                        ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3 ">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $email ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <?= $mobile ?>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Address</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $address ?>, <?= $region ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Guardian</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardian ?></span>
                                                    </div>
                                                </div>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0 text-gray-900 font-weight-bold">Mobile</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary text-gray-900">
                                                        <span class="address"> <?= $guardiancontact . $guardiancontact2 ?></span>
                                                        <!-- <button class="btn btn-success btn-sm" title="Add New Mobile Number"><i class="fas fa-phone"></i></button> -->
                                                    </div>
                                                </div>
                                                <hr>


                                                <div class="col-sm-12">
                                                    <button type="button" class="btn btn-info editinfo" id="<?= $sid ?>">
                                                        Edit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="subreq">
                                <?php include_once("includes/req.php")
                                ?>
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
<!-- <script src="js/counter.js"></script> -->
<script src="js/notifications.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>

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
                            <input type="text" name="mobile" id="mobile" class="form-control" onKeyPress="if(this.value.length==11) return false; return (event.charCode > 47 && 
	                                event.charCode < 58)" placeholder="Enter Mobile No..">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="cityadd" class="text-gray-900 font-weight-bold">City Address</label>
                            <input type="text" name="cityadd" id="cityadd" class="form-control">
                        </div>

                        <div class="col-sm-4">
                            <label for="region" class="form-label text-gray-900"><b>Region</b></label>
                            <select id="region" name="region" class="form-control" required>
                                <option selected="" disabled>Select Region</option>
                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from refregion";
                                // $data = array('13');
                                $stmt = $con->prepare($sql);
                                $stmt->execute();

                                while ($row = $stmt->fetch()) {
                                    echo '<option value=' . $row['regCode'] . '>' . $row['regDesc'] . '</option>';
                                }
                                $stmt = null;

                                ?>


                            </select>
                        </div>


                        <div class="col-md-4">
                            <label for="district" class="text-gray-900 font-weight-bold">District</label>
                            <select id="district" name="district" class="form-control" required>
                                <option selected value="" disabled>Select District</option>
                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from refprovince";
                                // $data = array('13');
                                $stmt = $con->prepare($sql);
                                $stmt->execute();

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
                        <div class="col-md-4">
                            <label for="guardian" class="text-gray-900 font-weight-bold mb-3">Guardian</label>
                            <input type="text" name="guardian" id="guardian" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="gcontact" class="text-gray-900 font-weight-bold mb-3">Phone number 1</label>
                            <input type="text" maxlength="11" name="gcontact" id="gcontact" class="form-control" onkeypress="return (event.charCode > 47 && 
	                                event.charCode < 58)">
                        </div>
                        <div class="col-md-4">
                            <label for="gcontact" class="text-gray-900 font-weight-bold mb-3">Phone number 2</label>
                            <input type="text" maxlength="11" name="gcontact2" id="gcontact2" class="form-control" onkeypress="return (event.charCode > 47 && 
	                                event.charCode < 58)">
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