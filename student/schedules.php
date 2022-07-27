<?php

require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");


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

        <title>CSTA Portal | Class Schedules</title>

        <!-- Site Icons -->
        <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    </head>
    <body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
<?php
$pageValue = 3;
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
                    <h1 class="h3 mb-4 text-gray-800">Class Schedules</h1>

                    <div class="main-body">
                        <div class="main-body">				
                            <div class="row gutters-sm">	
                                <div class="col-md-8 mb-3">	
                                    <div class="card">
                                      <div class="card-header">
                                        <h6 class="m-0 font-weight-bold text-gray-900">Add Class Schedule</h6>	
                                      </div>
                                      <div class="card-body">
                                            <button id="btnSched" class="btn btn-success w-100" data-toggle="modal">
                                                <i class="fas fa-plus"></i>	
                                                &nbsp;
                                                Add Schedule
                                            </button>
                                            <div class="card-body">
                                                <table class="table table-bordered table-primary">
                                                  <thead>
                                                    <tr>
                                                      <th scope="col" class="text-gray-900">Subject</th>
                                                      <th scope="col" class="text-gray-900">Day</th>
                                                      <th scope="col" class="text-gray-900">Time</th>
                                                      <th scope="col" class="text-gray-900">Prof</th>
                                                      <th scope="col" class="text-gray-900">Actions</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="tblSched"></tbody>
                                                </table>
                                            </div>
                                      </div>
                                </div>
                            </div>
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-header font-weight-bold text-gray-900" style="background: #fff3cd">
                                            Side Notes
                                            <button id="btnNote" data-toggle="modal" class="btn btn-success btn-sm float-md-right" title="Add new side note"><i class="fas fa-plus"></i></button>                                     
                                        </div>
                                        <div class="card-body" style="background: #fff3cd">
                                                <table>
                                                    <tbody id="tblNotes"></tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                    <!-- /.container-fluid -->

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-gray-900" id="modal-title">
                        <i class="fas fa-thumbtack"></i>
                        &nbsp;
                        Class Schedule
                        </h5>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="txtId" class="form-control">
                        <label for="subj" class="font-weight-bold text-gray-900">Subject</label>
                        <input type="text" id="subj" name="subj" class="form-control mb-2" placeholder="e.g System Integration Architecture" autofocus>
                        <label for="day" class="font-weight-bold text-gray-900">Day</label>
                        <input type="text" id="day" name="day" class="form-control mb-2" placeholder="e.g MTTH">
                        <label for="time" class="font-weight-bold text-gray-900">Time</label>
                        <input type="text" id="time" name="time" class="form-control mb-2" placeholder="e.g 7:00am-12:00pm or 07:00-12:00">
                        <label for="prof" class="font-weight-bold text-gray-900">Prof</label>
                        <input type="text" id="prof" name="prof" class="form-control mb-2" placeholder="e.g John Doe">
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="btnSave" class="btn btn-success">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
                </div>

                <!-- Modal Side note -->
                    <div class="modal fade" id="modalNote" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-gray-900" id="modal-title">
                                <i class="fas fa-sticky-note"></i>
                                &nbsp;
                                Side Note
                            </h5>
                          </div>
                          <div class="modal-body">
                                <input type="hidden" id="noteId" class="form-control">
                                <label for="note" class="font-weight-bold text-gray-900">Note</label>
                                <input type="text" id="note" name="note" class="form-control" placeholder="e.g Quiz on monday" autofocus>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button id="btnSave_note" type="button" class="btn btn-success">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <!-- End of modal side note -->

                <!-- End of Main Content -->

            </div>
            <!-- End of Content Wrapper -->

            <!-- Footer -->
<?php
require_once("includes/footer.php");
?>

            <!-- End of Footer -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Plugins -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <!-- Scripts -->
        <script src="js/schedules.js"></script>			
        <script src="js/notes.js"></script>			
    </body>
</html>
