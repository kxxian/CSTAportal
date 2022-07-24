<?php

require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
require_once("codes/fetchcurrentsyandsem.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}
?>

<?php
// check if grades releasing is open
$sqlquery = "select * from requestgrade_switch";
$statement = $con->prepare($sqlquery);
$statement->execute();
$item = $statement->fetch();
$status = $item['gstatus'];


if ($status == 'CLOSED') { // display enrollment page if open

    header("location:index.php");
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

    <title>Online Payments</title>

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

    <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script>

    <style>
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

        .tago {
            display: none;

        }

        .show {
            display: block;

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
                    <h3 class="h3 mb-4 text-gray-900">Request of Grades</h3>
                    <div class="main-body">
                        <div class="row">

                            <?php

                            try {
                                $sql = "select * from gradereq where sid=? ";
                                $data = array($sid);
                                $stmt = $con->prepare($sql);
                                $stmt->execute($data);
                                $row = $stmt->fetch();
                                $count = $stmt->rowCount();
                            } catch (PDOException $e) {
                                $e->getMessage();
                            }

                            if ($count >= 1) {

                                $disablegradereq = '        
                                                     <script>
                                                    $("#gradereqform").css("pointer-events","none");
                                                    $("#gradereqform").css("opacity","0.6");
                                                    
                                                    </script>';
                            } else {
                                $disablegradereq = '';
                            }

                            ?>
                            <div class="col-lg-6" id="gradereqform">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-file-upload"></i> Request Grades</h6>
                                    </div>
                                    <?php
                                    $sql = "SELECT * FROM vwgradereq where sid=? and schoolyr=? and semester=? ";
                                    $data = array($sid, $currentsyval, $currentsemval); // sid of current user
                                    $stmt = $con->prepare($sql);
                                    $stmt->execute($data);
                                    $ctr = $stmt->rowCount();

                                    if ($ctr >= 1) {
                                        $showalert = '';
                                    } else {
                                        $showalert = 'hidden';
                                    }


                                    ?>


                                    <div class="alert alert-info" role="alert" <?= $showalert ?>>
                                        You've already responded!
                                    </div>
                                    <div class="card-body text-gray-900">

                                        <form action="codes/gradereq.php" method="POST" enctype="multipart/form-data">

                                            <div class="form-group">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label for="sy1"><strong>School Year</strong></label>
                                                        <input name="sy1" type="text" value="<?= $currentsyval ?>" class="form-control" disabled>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <label for="sem1"><strong>School Year</strong></label>
                                                        <input name="sem1" type="text" value="<?= $currentsemval ?>" class="form-control" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="text-right"><button type="submit" class="btn btn-success" name="submit"><i class="fas fa-check"></i> Submit</button></div>
                                                </div>
                                        </form>

                                    </div>


                                </div>

                            </div>


                        </div>
                        <div class="col-lg-6" id="enrolldetailsdiv">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-gray-800"><i class="fas fa-file-alt"></i> Request Details</h6>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <!-- <th>#</th> -->
                                                    <!-- <th>Course</th> -->
                                                    <th>S.Y.</th>
                                                    <th>Semester</th>
                                                    <th>Date Requested</th>
                                                    <th class="text-center">Status</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php // displays the submitted request of the student


                                                while ($row = $stmt->fetch()) {
                                                    //$enrolldate = $row['date_enrolled'];
                                                    if ($row['status'] == 'PENDING') {
                                                        $style = 'style="color:#ffbb33;
                                                        font-weight:bold;"';
                                                    } else {
                                                        $style = '';
                                                    }


                                                    echo '<tr> 
                                                
                                                <td>' . $row['schoolyr'] . '</td> 
                                                <td>' . $row['semester'] . '</td> 
                                                <td class="text-center">' . $row['date_req'] . '</td>
                                                <td class="text-center" ' . $style . ' >' . $row['status'] . '</td>
                                            </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->
        <!-- Footer -->
        <?php
        require_once("includes/footer.php");
        ?>
        <!-- End of Footer -->

    </div>

    </div>


    <?php
    include_once("includes/scripts.php");

    echo $disablegradereq;
    ?>


</body>

</html>
