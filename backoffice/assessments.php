<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';
require_once 'codes/fetchuser_session.php';

$office = $Office;

// echo $office;
if (!isset($_SESSION['username_admin']) && !isset($_SESSION['password_admin'])) {
    header('location:login.php');
}

//Prohibits the user to be logged in more than once at a time
if ($user_token!=$_SESSION['user_token']) {
    header('location:logout.php');
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

    <title>Assessments</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- datatable css -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> -->

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


    <!--Jquery Datatables Bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.js"></script>

    <!-- Export -->
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        //  if ($office=="Dean"){
        $pageValue = 2;
        // }else{
        //     header("Location:index.php");
        // }

        // if ($usertype!="Admin"){
        //     header("Location:index.php");
        // }
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

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="" class="form-label text-gray-900 font-weight-bold">
                            Filter by Department
                            </label>
                         
                            <select name="deptdropdown" id="deptdropdown" class="form-control mb-3">
                            <option selected="" disabled>..</option>
                                <?php
                                
                                $sql = "select * from departments where admin_only=?";
                                 $data = array('0');
                                $stmt = $con->prepare($sql);
                                $stmt->execute($data);

                                while ($row = $stmt->fetch()) {
                                    echo '<option value="' . $row['dept'] . '">' . $row['dept'] . '</option>';
                                }
                                $stmt = null;

                                ?>

                                
                                ?>


                            </select>
                        </div>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-book fa-fw"></i> Assessment

                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="assessTable" class="table table-bordered text-gray-900" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">Student No.</th>
                                            <th class="text-center">Student Type</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Year Level</th>
                                            <th class="text-center">Course</th>
                                            <th class="text-center">Grades</th>
                                            <th class="text-center">Actions</th>
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
    <!-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->


</body>

</html>

<div id="assessModal" class="modal fade">
    <div class="modal-dialog modal-md">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900 font-weight-bold"> <i class="far fa-fw fa-envelope" ></i> <span class="title"></span></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">


                    <!-- return request-->
                <form method="POST" id="returnassess" action="codes/sendassessment.php" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="fullname" class="text-gray-900 font-weight-bold">To:</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="return_fullname" id="return_fullname" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="return_email" id="return_email" class="form-control" placeholder="Enter Email.." readonly>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900 font-weight-bold">Message</label>
                            <textarea name="return_message" id="return_message" cols="30" rows="3" class="form-control"></textarea>    
                        </div>

                    </div>

                    <div class="modal-footer">
                        <input type="hidden" name="assess_id" id="assess_id">
                        <!-- <input type="text" name="return_sid" id="return_sid">
                        <input type="text" name="return_operation" id="return_operation"> -->
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="return_assess" id="action" class="btn btn-success" >

                    </div>
                </form>
                    <!-- send assessment -->
                <form method="POST" id="assessForm" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="fullname" class="text-gray-900 font-weight-bold">To:</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="fullname" id="fullname" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email.." readonly>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="email" class="text-gray-900 font-weight-bold">Assessment Form</label>
                            <input type="file" name="attachment[]" accept=".jpg" id="attachment" class="form-control" placeholder="Enter Email.." required>
                        </div>

                    </div>



                    <div class="modal-footer">
                        <input type="hidden" name="enroll_id" id="enroll_id">
                        <input type="hidden" name="sid" id="sid">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action_s" class="btn btn-success">

                    </div>
                </form>






            </div>
        </div>
    </div>

</div>
<script src="js/assessment.js"></script>
</div>