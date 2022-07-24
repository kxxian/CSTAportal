<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchuserdetails.php');


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

    <title>Colegio de Sta. Teresa de Avila - CSTA Portal - Admin</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for  DataTable -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap CSS  -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 2;
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

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Students</h1>
                    </div> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-users"></i> Active Student Accounts</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <input type="hidden" name="txtstudId" id="txtstudId" value="<?= $selId ?>">
                                    <thead class="thead-dark">
                                        <tr>
                                            <!-- <th width="60">Photo</th> -->
                                            <!-- <th>#</th> -->
                                            <th>Student No.</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th width="65">Picture</th>
                                            <th hidden>Status</th>
                                            <th width="120">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwstudents WHERE status='Approved'";
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute();

                                        while ($row = $stmt->fetch()) {
                                            $file = "../student/uploads/users/" . $row['username'] . '-' . $row['bday'] . ".jpg";
                                            if (file_exists($file)) {
                                                $dp = $row['username'] . '-' . $row['bday'] . '.jpg';
                                            } else {

                                                $dp = "default.jpg";
                                            }


                                            echo '<tr> 
                                                        <td>' . $row['snum'] . '</td>
                                                        <td>' . $row['fname'] . " " . $row['mname'] . " " . $row['lname'] . '</td>
                                                        <td>' . $row['gender'] . '</td>
                                                        <td > <img src="../student/uploads/users/' . $dp . '" class="img-profile rounded-circle" height="80" width="80"></td> 
                                                        <td hidden style="color:red;font-weight:bold;">' . $row['status'] . '</td>

                                                        <td> 
                                                            <a href="viewstudinfo.php?id=' . $row['id'] . '">
                                                                <button" class="userinfo btn btn-info" title="Student Information">
                                                                    <i class="far fa-eye"></i>
                                                                </button>
                                                            </a>

                                                            <input type="hidden" class="approvereqval" value="' . $row['id'] . '">
                                                            <a href="javascript:void(0)" >
                                                                <button" class="approvereq btn btn-success" title="Approve">
                                                                    <i class="fas fa-check"></i>
                                                                </button>
                                                            </a>
                                                            <input type="hidden" class="deletereqval" value="' . $row['id'] . '">
                                                            <a href="javascript:void(0)" ><button" class="deleteaccreq btn btn-danger" title="Delete">
                                                            <i class="fas fa-trash"></i></button>
                                                            </a>

                                                            

                                                            </td>
                                                      </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal -->
            <div class="modal fade" id="studModal" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"><b>STUDENT INFO</b></h5>
                            <button type="button" class="btn btn-danger" title="Close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i></button> -->
                        </div>
                        <div class="modal-body">
                            <!-- <p>Modal body text goes here.</p> -->
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Modal -->

            <!-- Footer -->
            <?php require_once('includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    
   

   <?php
    require_once 'includes/scripts2.php';
                                        
   ?>

</body>

</html>