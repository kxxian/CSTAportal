<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

//get office from fetchuserdetails.php
$office = $Office;


if (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])) {
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

    <title>S.Y. & Sem</title>
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

    <!-- Bootstrap Toggle -->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        if ($office == "Accounting") {
            $pageValue = 7;
        } elseif ($office == "Dean") {
            $pageValue = 4;
        } elseif ($office == "Registrar") {
            $pageValue = 8;
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
                <?php require_once('includes/header.php');

                $sql = "SELECT * FROM enrollment_switch where switch_ID=?";
                $data = array(1);
                $stmt = $con->prepare($sql);
                $stmt->execute($data);
                $row = $stmt->fetch();


                $status = $row['enrollment_status'];

                if ($status == "CLOSED") {
                    $toggle = '  <span class="float-right"> <label for="" class="h3 text-dark mr-2" >Enrollment: </label><input type="checkbox" unchecked data-toggle="toggle" data-on="Open" data-off="Closed" data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()"></span>';
                                
                } else {
                    $toggle = ' <span class="float-right"> <label for="" class="h3 text-dark mr-2" >Enrollment: </label> <input type="checkbox" checked data-toggle="toggle"  data-on="Open" data-off="Closed"  data-onstyle="success" data-offstyle="danger" name="sytoggle" onchange="this.form.submit()"></span>';
           
                }
              


                ?>
                <!-- End of Header -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class=" mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <span>
                                <h1 class="h2 mb-0 text-gray-900 "><strong>School Year</strong></h1>
                            </div>
                            <div class="col-sm-6">
                           
                                <?php echo 
                                
                                    '
                                  
                                    <form action="codes/enrollmentonoff.php?id=' . $row['switch_ID'] . '" method="POST"> 
                                    ' . $toggle . '
                                    </form>';
                                
                                
                                
                                
                                
                                ?> </span>
                            </div>
                        </div>







                        </span>
                    </div>



                    <div class="row">
                        <div class="col-sm-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <button type="button" id="addSy" data-toggle="modal" data-target="#syModal" class="btn btn-success  float-right">Add School Year</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="syTable" class="table table-bordered" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">School Year</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center" width="85">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">



                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <button type="button" id="addSem" data-toggle="modal" data-target="#semModal" class="btn btn-success  float-right">Add Semester</button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="semTable" class="table table-bordered" width="100%" cellspacing="0">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th class="text-center">Semester</th>
                                                    <th class="text-center">Status</th>
                                                    <th class="text-center" width="85">Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
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

<div id="syModal" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form method="POST" id="syForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="h5 modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-university"></i> <span class="title">Add School Year</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="lname" class="text-gray-900 font-weight-bold">School Year</label>
                            <input type="text" maxlength="9" onkeypress="return (event.charCode > 47 && 
	                                event.charCode < 58) || (event.charCode == 45)" name="sy" id="sy" class="form-control" placeholder="School Year">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="sy_id" id="sy_id">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Save">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>


<div id="semModal" class="modal fade">
    <div class="modal-dialog modal-sm">
        <form method="POST" id="semForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="h5 modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-university"></i> <span class="title">Add Semester</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="lname" class="text-gray-900 font-weight-bold">Semester</label>
                            <input type="text" maxlength="20" name="sem" id="sem" class="form-control" placeholder="Semester">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="sem_id" id="sem_id">
                        <input type="hidden" name="operation_sem" id="operation_sem">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action_sem" id="action_sem" class="btn btn-success" value="Save">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
<script src="js/acadyear.js"></script>
</div>
