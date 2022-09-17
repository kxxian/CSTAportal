<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchuserdetails.php';

//get office from fetchuserdetails.php
$office=$Office;


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

    <title>CSTA Admin | Dashboard</title>
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
        if ($office=="Accounting"){
            $pageValue = 3;
        }elseif($office=="Dean"){
            $pageValue = 3;
        }elseif($office=="Registrar"){
            $pageValue = 6;
        }

        
        if ($usertype!="Admin"){
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

                    <div class=" mb-4">
                        <h1 class="h2 mb-0 text-gray-900 "><strong>Users</strong></h1>
                    </div>


                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-user-tie fa-fw"></i> Users
                                <button type="button" id="addUser" data-toggle="modal" data-target="#usersModal" class="btn btn-success  float-right">Add User</button>
                            </h6>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="usersTable" class="table table-bordered" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Name</th>
                                            <th>Office</th>
                                            <th>Department</th>
                                            <th>User Type</th>
                                            <th>isActive</th>
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

<div id="usersModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <form method="POST" id="usersForm" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title text-gray-900 font-weight-bold"> <i class="fa fa-fw fa-user-tie"></i> <span class="title">Add User</span></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="lname" class="text-gray-900 font-weight-bold">Last Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32"  name="lname" id="lname" class="form-control" placeholder="Last Name..">
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="text-gray-900 font-weight-bold">First Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="fname" id="fname" class="form-control" placeholder="First Name..">
                        </div>
                        <div class="col-md-4">
                            <label for="mname" class="text-gray-900 font-weight-bold">Middle Name</label>
                            <input type="text" onkeypress="return (event.charCode > 64 && 
	                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode)==32" name="mname" id="mname" class="form-control" placeholder="Middle Name..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <label for="gender" class="text-gray-900 font-weight-bold">Gender</label>
                            <select id="gender" name="gender" class="form-control" required>
                                <option selected="" disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="email" class="text-gray-900 font-weight-bold">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email..">
                        </div>
                        <div class="col-md-4">
                            <label for="mobile" class="text-gray-900 font-weight-bold">Mobile No.</label>
                            <input type="number" name="mobile" id="mobile" class="form-control" onKeyPress="if(this.value.length==11) return false;" placeholder="Enter Mobile No..">
                        </div>
                    </div>
                    <div class="form-group row">

                        <div class="col-md-4">
                            <label for="office" class="text-gray-900 font-weight-bold">Office</label>
                            <select id="office" name="office" class="form-control" required>
                                <option selected="" disabled>Select Office</option>
                                <option value="Accounting">Accounting</option>
                                <option value="Dean">Dean</option>
                                <option value="Registrar">Registrar</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="dept" class="text-gray-900 font-weight-bold">Department</label>
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
                        <div class="col-md-4">
                            <label for="role" class="text-gray-900 font-weight-bold">User</label>
                            <select id="role" name="role" class="form-control" required>
                                <option selected="" disabled>Select Role</option>
                                <?php
                                require_once("includes/connect.php");

                                $sql = "select * from role";
                                $stmt = $con->prepare($sql);
                                $stmt->execute();

                                while ($row = $stmt->fetch()) {
                                    echo '<option value=' . $row['role_ID'] . '>' . $row['role'] . '</option>';
                                }
                                $stmt = null;

                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="operation" id="operation">
                        <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action" class="btn btn-success" value="Register">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>
<script src="js/users.js"></script>
</div>

