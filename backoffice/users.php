<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
require_once 'includes/fetchstudentdetails.php';


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

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">


    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 9;
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
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- DataTable CDN JS -->
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>







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
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name..">
                        </div>
                        <div class="col-md-4">
                            <label for="fname" class="text-gray-900 font-weight-bold">First Name</label>
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name..">
                        </div>
                        <div class="col-md-4">
                            <label for="mname" class="text-gray-900 font-weight-bold">Middle Name</label>
                            <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name..">
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
                            <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile No..">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                            <label for="role" class="text-gray-900 font-weight-bold">Role</label>
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
                        <button type="button" id="close"class="btn btn-danger" data-dismiss="modal">Close</button>
                        <input type="submit" name="action" id="action"  class="btn btn-success" value="Register">

                    </div>
                </div>
            </div>
    </div>
    </form>
</div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#addUser').click(function() {
            $('#usersForm')[0].reset();
            $('.title').text(' Add User');
            $('#action').val("Register");
            $('#operation').val("Add");
        })

        var usersTable = $('#usersTable').dataTable({
            "paging": true,
            "processing": false,
            "serverSide": true,
            "order": [],
            "info": true,
            "ajax": {
                url: "codes/fetch_users.php",
                type: "POST"

            },
            "columnDefs": [{
                "target": [0, 1, 2, 3, 4, 5,6],
                "orderable": false,
            }, ],
        });

        $(document).on('submit', '#usersForm', function(event) {
            event.preventDefault();
            var lname = $("#lname").val();
            var fname = $("#fname").val();
            var mname = $("#mname").val();
            var gender = $("#gender").val();
            var email = $("#email").val();
            var gender = $("#gender").val();
            var mobile = $("#mobile").val();
            var dept = $("#dept").val();
            var role = $("#role").val();


            if (lname == "" || fname == "" || mname == "" || gender == "" || email == "" || mobile == "" || dept == "" ||
                email == "" || gender == "" || mobile == "" || !dept || !role) {

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops!',
                    text: 'Insufficient Data!'
                })
            } else {
                $.ajax({
                    url: "codes/userscrud.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data) {
                      
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Record Updated!',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('#usersModal').modal('hide');
                       
                        $('#usersForm')[0].reset();

                        usersTable.api().ajax.reload();
                    }

                })
            }
        })


        $(document).on('click', '.update', function() {
            var user_id = $(this).attr('id');


            $.ajax({
                url: "codes/userscrud.php",
                method: "POST",
                data: {
                    user_id: user_id
                },
                dataType: "json",
                success: function(data) {
                    $('#usersModal').modal('show');
                    $('#user_id').val(data.id);
                    $('#lname').val(data.lname);
                    $('#fname').val(data.fname);
                    $('#mname').val(data.mname);
                    $('#gender').val(data.Gender);
                    $('#email').val(data.email);
                    $('#mobile').val(data.mobile);
                    $("#dept").val();
                    $("#role").val();


                    $('.title').text(' Edit User');
                    $('#user_id').val(user_id);

                    $('#operation').val("Edit");
                    $('#action').val("Save");

                }
            })
        })

        $(document).on('click', '.delete', function() {
            var user_id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"codes/userscrud.php",
                        method: "POST",
                        data:
                        {delete_id:user_id},
                        success:function(data){
                            usersTable.api().ajax.reload();
                        }
                    })
                    Swal.fire(
                        'Deleted!',
                        'User has been deleted.',
                        'success'
                    )
                }
            })

        })

        $(document).on('click', '.close', function() {
            $('#usersModal').modal('hide');
        })

        $(document).on('click', '#close', function() {
            $('#usersModal').modal('hide');
        })


    });
</script>