<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

//get office from fetchuserdetails.php
$office = $Office;

/* $_SESSION['dept'] = $_POST['dept']; */
/* echo $_SESSION['dept']; */

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

    <title>Announcements</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

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

    <!-- datatables -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert 2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if ($office == "Accounting") {
            $pageValue = 5;
        } elseif ($office == "Dean") {
            $pageValue = 3;
        } elseif ($office == "Registrar") {
            $pageValue = 7;
        }


        if ($usertype != "Admin") {
            header("Location:index.php");
        }
        require_once('includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Header -->
                <?php require_once('includes/header.php'); ?>
                <!-- End of Header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- <div class=" mb-4">
                        <h1 class="h2 mb-0 text-gray-900 "><strong>Announcements</strong></h1>
                    </div> -->


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-bullhorn fa-fw"></i> Announcements
                                <button type="button" id="addAnnouncement" data-toggle="modal" data-target="#a_modal" class="btn btn-success  float-right">Add</button>
                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="a_table" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Day</th>
                                            <th>Month</th>
                                            <th>Department</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th width="85">Actions</th>
                                        </tr>

                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>





            <!-- Content Row -->


            <!-- /.container-fluid -->
            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->


    </div>


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- scripts -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


</body>

</html>

<div id="a_modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-md">
        <form method="POST" id="myForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-bullhorn"></i> <span class="title">Add Announcement</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="selday" class="text-gray-900 font-weight-bold">Day:</label>
                            <select id="selday" name="selday" class="form-control">
                                <?php $day = date('j'); ?>
                                <option value="" disabled>----------------------Current day--------------------</option>
                                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
                                <option value="">---------------------------------------------------------</option>
                                <?php
                                for ($i = 1; $i <= 31; $i++) {
                                    echo '
												<option value="' . $i . '">' . $i . '</option>
											';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="selmonth" class="text-gray-900 font-weight-bold">Month:</label>
                            <select id="selmonth" name="selmonth" class="form-control">
                                <?php
                                for ($i = 0; $i < 12; $i++) {
                                    $time = strtotime(sprintf('%d months', $i));
                                    $label = date('F', $time);
                                    $value = date('F', $time);
                                    echo "<option value='$value'>$label</option>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="txttitle" class="text-gray-900 font-weight-bold">Title:</label>
                            <input type="text" id="txttitle" name="txttitle" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="txtdesc" class="text-gray-900 font-weight-bold">Description:</label>
                            <textarea id="txtdesc" name="txtdesc" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="empid" id="empid" value="<?=$eid?>">
                        <input type="hidden" name="a_id" id="a_id">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit"  name="action" id="action" class="btn btn-success" >

                    </div>

                </div>
            </div>
    </div>
    </form>
</div>
<script src="js/announcements.js"></script>
</div>
