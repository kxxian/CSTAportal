<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Document Requests</title>
    <link rel="icon" type="image/x-icon" href="img/logo.png">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
    require_once("includes/sidebar-docsrequest.php");
  
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
                    <h1 class="h3 mb-2 text-gray-800">Document Requests</h1>
                    

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="main-breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Document Requests</li>
                            </ol>
                        </nav>
                    <!-- Breadcrumb -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student No.</th>
                                            <th>Name</th>
                                            <th>Document</th>
                                            <th>No. of Copies</th>
                                            <th>Request Date</th>
                                            <th>Semester</th>
                                            <th>Purpose</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>20-14567</td>
                                            <td>Jason B. Muñoz</td>
                                            <td>TOR</td>
                                            <td>2011/04/25</td>
                                            <td>2021-2022</td>
                                            <td>1st</td>
                                            <td>Image</td>
                                            <td width="70px">
                                            <a href="approve_user.php?id='.$row['id'].'"><button class="badge bg-success">Done <i class="far fa-edit"></i></button></a><br>
                                            <a href="delete_user.php?id='.$row['id'].'"><button class="badge bg-danger">Delete<i class="fas fa-trash-alt"></i></button></a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>19-77286</td>
                                            <td>Aila Marie B. Taruc</td>
                                            <td>Diploma</td>
                                            <td>2011/04/25</td>
                                            <td>2021-2022</td>
                                            <td>1st</td>
                                            <td>Image</td>
                                            <td>
                                            <a href="approve_user.php?id='.$row['id'].'"><button class="badge bg-success">Done <i class="far fa-edit"></i></button></a><br>
                                            <a href="delete_user.php?id='.$row['id'].'"><button class="badge bg-danger">Delete<i class="fas fa-trash-alt"></i></button></a> 
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>