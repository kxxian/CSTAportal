<?php
session_start();
require_once('includes/connect.php');
require_once('includes/fetchcurrentsyandsem.php');
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

    <title>CSTA Admin | Grade Requests</title>
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
        $pageValue = 5;
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



                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-gray-900"><i class="fas fa-users"></i> Grade Requests</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th hidden>#</th>
                                            <th hidden>sid</th>
                                            <th>Picture</th>
                                            <th>Student No.</th>
                                            <th>Name</th>

                                            <th>Year Level</th>
                                            <th>Course</th>


                                            <th hidden>Email</th>
                                            <th width="5">Send</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM vwgradereq WHERE status=? and schoolyr=? and semester=?";
                                        $data = array('Pending', $currentsyval, $currentsemval);
                                        $stmt = $con->prepare($sql);
                                        $stmt->execute($data);

                                        while ($row = $stmt->fetch()) {
                                            $file = "../student/uploads/users/" . $row['sid'] . ".jpg";
                                            if (file_exists($file)) {
                                                $dp = $row['sid']  . '.jpg';
                                            } else {

                                                $dp = "default.jpg";
                                            }
                                            echo '<tr> 
                                                        <td hidden>' . $row['gradereq_ID'] . '</td>
                                                        <td hidden>' . $row['sid'] . '</td>
                                                        <td> <img src="../student/uploads/users/' . $dp . '" class="img-profile rounded-circle" height="80" width="80"></td> 
                                                        <td>' . $row['snum'] . '</td>
                                                        <td>' . $row['fullname'] . '</td>
                                                  
                                                        <td>' . $row['yrlevel'] . '</td>
                                                        <td>' . $row['course'] . '</td>
                                                       
                                                        
                                                        <td hidden>' . $row['email'] . '</td>

                                                        <td> 
                                                    
                                                        <button type="button"  title="Send Grades" class="btn btn-success sendgrades" >
                                                        <i class="fas fa-paper-plane"></i>
                                                        </button>


                                                        
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


    <!-- Send grades status Modal -->

    <div class="modal fade" id="SendGrades" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-gray-900" id="exampleModalLabel"> <i class="far fa-envelope"></i><strong> Send Grades</strong> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="sendgrades.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">



                        <div class="form-group">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">To:</label>
                                    <input type="hidden" name="gradereq_id" id="gradereq_id" class="form-control">
                                    <input type="hidden" name="sid" id="sid" class="form-control">
                                    <input type="text" name="name" id="name" class="form-control" disabled>

                                </div><br>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900" for="attachment">Grades:</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control" required>

                                </div><br>
                            </div>



                            <div class="form-group row" hidden>
                                <div class="col-lg-12">
                                    <label class="font-weight-bold text-gray-900">Notes (Optional):</label>
                                    <textarea class="form-control" id="assessnotes" name="assessnotes" rows="3"></textarea>
                                </div><br>
                            </div>

                        </div>

                        <div class="modal-footer">



                            <button type="submit" class="btn btn-success" id="send" name="submit"><i class="fas fa-paper-plane"></i> Send</button>
                        </div>
                </form>
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
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/datatables-demo.js"></script>





    <script>
        //open assessment modal
        $(document).ready(function() {
            $('.sendgrades').on('click', function() {
                $('#SendGrades').modal('show');


                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                //fetch data from enrollment datatable
                $('#gradereq_id').val(data[0]);
                $('#sid').val(data[1]);
                $('#name').val(data[4]);

            });
        });

        //close assessment modal
        $(document).ready(function() {
            $('.close').on('click', function() {
                $('#SendGrades').modal('hide');

            });
        });
    </script>




    <?php
    require_once 'includes/scripts.php';

    ?>

    <!-- scripts -->
    <script src="js/pending-payments.js"></script>
    <script src="js/requests-counter.js"></script>
    <script src="js/sweetalert.min.js"></script>


</body>

</html>