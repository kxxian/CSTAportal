<?php
require_once("includes/connect.php");
require_once("codes/fetchcurrentsyandsem.php");
require_once("codes/fetchuserdetails.php");
require_once ('codes/fetchuser_session.php');



if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}

//Prohibits the user to be logged in more than one
if ($user_token!=$_SESSION['user_token']) {
    header('location:logout.php');
}



// // if not enrolled, limit access
// require_once("codes/fetchenrollmentdetails.php");


#if student doesn't have student number
// if ($snum=="NA"){
//     $reqdocu_menu = "hidden";
//     $payverif_menu = "hidden";
//     $reqgrade_menu = "hidden";
//     //sidebar
//     $sidebar_schedule = "hidden";
//     $sidebar_calendar="hidden";


// }else{
//     $reqdocu_menu = "";
//     $payverif_menu = "";
//     $reqgrade_menu = "";
//     //sidebar
//     $sidebar_schedule = "";
//     $sidebar_calendar="";
// }





?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        ::-webkit-scrollbar {
            width: .5em;
        }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        $pageValue = 1;
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

                    <br>
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    <div class="text-center mb-4">
                        <h1 class="h2 mb-0 text-gray-900 text-center"><strong>Welcome to CSTA Student Portal!</strong></h1>
                    </div>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-900 text-center" style="text-decoration: underline;text-decoration-color:  #ffbb33; text-decoration-thickness: 3px;"><strong>Main Menu</strong></h4>
                    </div>


                    <!-- Enrollment Button -->
                    <?php
                    //check if enrollment is open
                    $sqlquery = "select * from enrollment_switch";
                    $statement = $con->prepare($sqlquery);
                    $statement->execute();
                    $item = $statement->fetch();

                    $status = $item['enrollment_status'];

                    if ($status == 'OPEN') { // enable button if enrollment is open
                        $link = "'enrollment.php'";
                        $note = '';
                        echo '
                        <div class="row">
                        <div class="col-sm-3 mb-4" ">
                            <div class="row no-gutters align-items-center">
                                <div type="button" onclick="location.href=' . $link . ';" class="card" >
                                    <img class="card-img-top" src="img/menu/enroll.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="h5 card-text text-center text-gray-900 text-center"><strong>Online Enrollment</strong></h5>
                                    </div>
                                </div>
                            </div>
                    </div>';
                    } else { // disable button if enrollment is closed
                        $note = '<p style="color:red; font-weight:bold;"> ***  Online Enrollment is CLOSED</p>';
                        $link = "#";
                        echo '
                        <div class="row">
                        <div class="col-sm-3 mb-4" style="opacity:0.8" ">
                            <div class="row no-gutters align-items-center">
                                <div type="button" onclick="location.href=' . $link . ';" class="card" >
                                    <img class="card-img-top" src="img/menu/enroll.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="h5 card-text text-center"><strong>Online Enrollment</strong></h5>
                                    </div>
                                </div>
                            </div>
                    </div>';
                    }
                    ?>
                    <!--Payment Verification -->
                    <div class="col-sm-3 mb-4" <?= $payverif_menu ?>>
                        <div class="row no-gutters align-items-center">
                            <div type="button" onclick="location.href='payverif.php';" class="card">
                                <img class="card-img-top" src="img/menu/payment.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="h5 card-text text-center text-gray-900"><strong>Payment Verification</strong></h5>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Request Document -->
                    <div class="col-sm-3 mb-4">

                        <div class="row no-gutters align-items-center" <?= $reqdocu_menu ?>>
                            <div type="button" onclick="location.href='requestdocument.php';" class="card">
                                <img class="card-img-top" src="img/menu/documents.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="h5 card-text text-center text-gray-900"><strong>Document Request</strong></h5>
                                </div>
                            </div>
                        </div>

                    </div>





                    <!-- Grades Request Button -->
                    <?php
                    //check if open
                    $sqlquery1 = "select * from requestgrade_switch";
                    $statement1 = $con->prepare($sqlquery1);
                    $statement1->execute();
                    $item1 = $statement1->fetch();

                    $status1 = $item1['gstatus'];

                    if ($status1 == 'OPEN') { // enable button  open
                        $link1 = "'gradesrequest.php'";
                        $note1 = '';
                        echo '
                        
                        <div class="col-sm-3 mb-4" ' . $reqgrade_menu . '>
                            <div class="row no-gutters align-items-center">
                                <div type="button" onclick="location.href=' . $link1 . ';" class="card">
                                    <img class="card-img-top" src="img/menu/grades.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="h5 card-text text-center text-gray-900"><strong>Request of Grades</strong></h5>
                                    </div>
                                </div>
                            </div>
                    </div>';
                    } else { // disable button if grade request is closed
                        $note1 = '<p style="color:red; font-weight:bold;"> ***  Reqesting of Grades is CLOSED</p>';
                        $link1 = "#";
                        echo '
                      
                        <div class="col-sm-3 mb-4" style="opacity:0.8" ' . $reqgrade_menu . '>
                            <div class="row no-gutters align-items-center">
                                <div type="button" onclick="location.href=' . $link1 . ';" class="card">
                                    <img class="card-img-top" src="img/menu/grades.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="h5 card-text"><strong>Request of Grades</strong></h5>
                                    </div>
                                </div>
                            </div>
                    </div>';
                    }
                    ?>




                </div>
                <!-- Content Row -->
                <div class="row">
                    <?php echo $note ?>
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


    <?php
    include_once("includes/scripts.php");
    ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
<script src="js/header.js"></script>
<script src="js/notifications.js"></script>

</html>