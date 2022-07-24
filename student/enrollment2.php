<?php
require_once("includes/connect.php");
require_once("includes/fetchuserdetails.php");
require_once("includes/fetchcurrentsyandsem.php");
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

    <title>Enrollment</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .progress {
            /* height: 120px;*/
            background-color: white;
            margin-left: 10px auto;
            position: sticky;
        }

        .proglabel {
            margin-top: 9px;
        }

        .progress img {
            width: 50px;
            margin: 10px auto;
        }

        .line {
            text-align: center;
            font-weight: bold;

        }

        .line #icons {
            display: inline-block;
            width: 162px;
            position: sticky;

        }

        .line #icons .fa {
            background: #ccc;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            padding: 3px;
        }

        .line #icons .fa::after {
            content: '';
            background: #ccc;
            height: 5px;
            width: 166px;
            display: block;
            position: absolute;
            left: 0;
            top: 77px;
            z-index: -1;
        }

        .line #icons:nth-child(1) .fa,
        .line #icons:nth-child(2) .fa,
        .line #icons:nth-child(3) .fa,
        .line #icons:nth-child(4) .fa,
        .line #icons:nth-child(5) .fa,
        .line #icons:nth-child(6) .fa {
            background: #28a745;
        }

        .line #icons:nth-child(1) .fa::after,
        .line #icons:nth-child(2) .fa::after,
        .line #icons:nth-child(3) .fa::after,
        .line #icons:nth-child(4) .fa::after,
        .line #icons:nth-child(5) .fa::after,
        .line #icons:nth-child(6) .fa::after {
            background: #28a745;
            /*
            #28a745 success
            #ffc107 warning
            #dc3545 danger
            */
        }
    </style>

    <!-- <script>
        $(document).ready(function() {
            $("#myTab a").click(function(e) {
                e.preventDefault();
                $(this).tab("show");
            });
        });
    </script> -->
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
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900 text-center"> Enrollment Progress</h6>
                                    </div>
                                    <!--Step Progress-->
                                    <div class="progress" style="height:150px;">
                                        <ul class="line" id="myTab2" role="tablist">
                                            <!-- Upload Requirements -->
                                            <li id="icons">
                                                <img src="img/icons/checklist.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="#uloadreq" data-toggle="tab" role="tab" aria-controls="uloadreq" aria-selected="false">
                                                    <p class="proglabel">Upload Requirements</p><br>
                                                </a>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                            <!-- Request Assessment -->
                                            <li id="icons">
                                                <img src="img/icons/list.png"><br>
                                                <i class="fa fa-times"></i>
                                                <a class="text-info" href="#subreq" data-toggle="tab" role="tab" aria-controls="subreq" aria-selected="false">
                                                    <p class="proglabel">Request for Assessment</p>
                                                </a><br>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                            <!-- Requirements Validation -->
                                            <li id="icons">
                                                <img src="img/icons/checked.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="#">
                                                    <p class="proglabel">Requirements Validation</p>
                                                </a><br>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                            <!-- Assessment Form Sent -->
                                            <li id="icons">
                                                <img src="img/icons/bill.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="#">
                                                    <p class="proglabel">Assessment Form</p>
                                                </a><br>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                            <!-- Payment Validation -->
                                            <li id="icons">
                                                <img src="img/icons/debit-card.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="#">
                                                    <p class="proglabel">Payment Verification</p>
                                                </a><br>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                            <!-- Issuance of RegForm -->
                                            <li id="icons">
                                                <img src="img/icons/register.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="#">
                                                    <p class="proglabel">Issuance of Regform</p>
                                                </a><br>
                                                <p class="proglabel">Date: </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--TAB MENU-->
                        <div class="tab-content">
                            <div class="tab-pane fade" id="uloadreq" >
                                <div class="row gutters-sm">
                                    <div class="col-md-5 mb-3">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-upload"></i> Upload Requirements</h6>
                                            </div>
                                            <div class="card-body">

                                                <form action="uploadrequirement.php" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="col-lg-12">
                                                            <label for="selDocument" style="font-weight:bold;" class="text-gray-800">Document Name</label>
                                                            <select class="form-control text-gray-800" id="selDocument" name="selDocument" required>
                                                                <option selected="" disabled>Select Document..</option>
                                                                <?php
                                                                $sql = "select * from requirements where isActive='ACTIVE'";
                                                                $stmt = $con->prepare($sql);
                                                                $stmt->execute();

                                                                while ($row = $stmt->fetch()) {
                                                                    echo '<option value=' . $row['req_ID'] . '>' . $row['reqname'] . '</option>';
                                                                }
                                                                $stmt = null;
                                                                ?>
                                                            </select>
                                                        </div> <br>
                                                        <div class="col-lg-12">

                                                            <label for="requirement" style="font-weight:bold;" class="text-gray-800">Upload Document Here. <span style="color:red;">**Use .jpg format.</span></label>
                                                            <input type="file" class="form-control-file" name="requirement" id="requirement" accept="image/jpeg" required><span style="color:Green; font-weight:bold;"><br>NOTE: If you wish to update an uploaded file, select the type of document and upload the new file.</span>
                                                        </div>

                                                    </div>

                                                    <div class="text-right"> <button type="submit" class="btn btn-success" name="uploadReq"><i class="fas fa-upload"></i> Upload</button></div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file-alt"></i> Files Uploaded</h6>
                                            </div>

                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <!-- <th>#</th> -->
                                                                <th>File</th>
                                                                <th>View</th>

                                                                <th>Date Uploaded</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php // displays all the submitted requirements of the student
                                                            $sql = "SELECT * FROM vwsubmittedreq where id=? order by sr_ID";
                                                            $data = array($sid); // sid of current user
                                                            $stmt = $con->prepare($sql);
                                                            $stmt->execute($data);
                                                            while ($row = $stmt->fetch()) {
                                                                $newname = sha1($row['reqname'] . '-' . $username . '-' . $bday);

                                                                echo '<tr> 
                                                        <!--<td>' . $row['sr_ID'] . '</td>-->
                                                        <td>' . $row['reqname'] . '</td> 
                                                        <td>
                                                        
                                                        <a href="uploads/requirements/' . $newname . '.jpg" target="_blank"><button" class="userinfo btn btn-info" title="View">
                                                        <i class="far fa-eye"></i></button></a></td>

                                                        <td>' . $row['date_submitted'] . '</td>
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

                            <div class="tab-pane fade" id="subreq" >
                            <?php
                                // check if enrollment is open
                                $sqlquery = "select * from enrollment_switch";
                                $statement = $con->prepare($sqlquery);
                                $statement->execute();
                                $item = $statement->fetch();
                                $status = $item['enrollment_status'];

                                if ($status == 'OPEN') { // display enrollment page if open

                                    include("enrollmentpage.php");
                                } else { //redirect to index.php when closed
                                    //include("404.php");
                                    header("location:index.php");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->

         
            <?php
            include_once("includes/scripts.php");
            ?>

</body>

</html>