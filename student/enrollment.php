<?php
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
require_once("codes/fetchcurrentsyandsem.php");

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}


?>
<?php
// check if enrollment is open
$sqlquery = "select * from enrollment_switch";
$statement = $con->prepare($sqlquery);
$statement->execute();
$item = $statement->fetch();
$status = $item['enrollment_status'];


if ($status == 'CLOSED') { // display enrollment page if open

    header("location:index.php");
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

    <title>CSTA Portal | Enrollment</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .progress {
            /* height: 120px;*/
            background-color: white;
            margin-left: 10px auto;
            position: sticky;
        }

        .proglabel {
            margin-top: 9px;
        }

        .progress img {
            width: 50px;
            margin: 10px auto;
        }

        .line {
            text-align: center;
            font-weight: bold;

        }

        .line #icons {
            display: inline-block;
            width: 162px;
            position: relative;

        }

        .line #icons .fa {
            background: #ccc;
            color: white;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            padding: 3px;
        }
        .line #icons .fa::after {
            content: '';
            background: #ccc;
            height: 5px;
            width: 166px;
            display: block;
            position: absolute;
            left: 0;
            top: 77px;
            z-index: -1;
        }


        <?php
        require_once("includes/connect.php");
        require_once("codes/fetchuserdetails.php");
        require_once("codes/fetchstudentdetails.php");

        
        $sql = "SELECT * FROM vwforenrollment_students where sid=? and schoolyr=? and semester=? ";
        $data = array($sid,$currentsyval,$currentsemval);#sid of current student user, current sy and sem
        $stmt = $con->prepare($sql);
        $stmt->execute($data);
        $row = $stmt->fetch();

        $counter = $stmt->rowCount();

        $e_status=$row['enrollment_status'];

        if ($e_status == 'Pending') {
            echo '
                            .line #icons:nth-child(1) .fa {
                                background: #28a745;
                            }
                    
                            .line #icons:nth-child(2) .fa{
                                background: #28a745 ;
                            }
                            .line #icons:nth-child(3) .fa{
                                background: #ffc107  ;
                            }
                            
                            .line #icons:nth-child(2) .fa::after{
                                background:  #28a745;
                            }
                            .line #icons:nth-child(3) .fa::after{
                                background: #ffc107 ;
                            }
                            ';

            $addscript = '        
                            <script>
                            $("#enrolldiv").css("pointer-events","none");
                            $("#enrolldiv").css("opacity","0.6");
                            
                            </script>';
        } else if ($e_status == 'Assessed') {

            echo '
            .line #icons:nth-child(1) .fa {
                background: #28a745;
            }
    
            .line #icons:nth-child(2) .fa{
                background: #28a745 ;
            }
            .line #icons:nth-child(3) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(4) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(5) .fa{
                background: #ffc107;
            }
            
            .line #icons:nth-child(2) .fa::after{
                background:  #28a745;
            }
            .line #icons:nth-child(3) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(4) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(5) .fa::after{
                background:#ffc107;
            }
            ';

            $addscript = '        
            <script>
            $("#enrolldiv").css("pointer-events","none");
            $("#enrolldiv").css("opacity","0.6");

            $("#enrolledit").css("pointer-events","none");
            $("#enrolledit").css("opacity","0.6");


            
            </script>';
        } else if ($e_status == 'Payment Verified') {

            echo '
            .line #icons:nth-child(1) .fa {
                background: #28a745;
            }
    
            .line #icons:nth-child(2) .fa{
                background: #28a745 ;
            }
            .line #icons:nth-child(3) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(4) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(5) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(6) .fa{
                background:#ffc107;
            }
            
            .line #icons:nth-child(2) .fa::after{
                background:  #28a745;
            }
            .line #icons:nth-child(3) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(4) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(5) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(6) .fa::after{
                background:#ffc107;
            }
            ';

            $addscript = '        
            <script>
            $("#enrolldiv").css("pointer-events","none");
            $("#enrolldiv").css("opacity","0.6");

            $("#enrolledit").css("pointer-events","none");
            $("#enrolledit").css("opacity","0.6");

            
            </script>';
        }else if ($e_status == 'Enrolled') {

            echo '
            .line #icons:nth-child(1) .fa {
                background: #28a745;
            }
    
            .line #icons:nth-child(2) .fa{
                background: #28a745 ;
            }
            .line #icons:nth-child(3) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(4) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(5) .fa{
                background: #28a745;
            }
            .line #icons:nth-child(6) .fa{
                background:#28a745;
            }
            
            .line #icons:nth-child(2) .fa::after{
                background:  #28a745;
            }
            .line #icons:nth-child(3) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(4) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(5) .fa::after{
                background:#28a745;
            }
            .line #icons:nth-child(6) .fa::after{
                background:#28a745;
            }
            ';

            $addscript = '        
            <script>
            $("#enrolldiv").css("pointer-events","none");
            $("#enrolldiv").css("opacity","0.6");

            $("#enrolledit").css("pointer-events","none");
            $("#enrolledit").css("opacity","0.6");

            
            </script>';
        }else {

            echo '
            .line #icons:nth-child(1) .fa {
                background: #28a745;
            }
    
            .line #icons:nth-child(2) .fa{
                background: #ccc;
            }
            .line #icons:nth-child(3) .fa{
                background: #ccc  ;
            }
            
            .line #icons:nth-child(2) .fa::after{
                background:  #ccc;
            }
            .line #icons:nth-child(3) .fa::after{
                background: #ccc ;
            }
            ';
            $addscript = ' ';
        }

        ?>

        /* icons */
        .line #icons:nth-child(1) .fa {
            background: #28a745;
        }


    
        /* line */
        .line #icons:nth-child(1) .fa::after {
            background: #28a745;
        }
            /*
            #28a745 success
            #ffc107 warning
            #dc3545 danger
            */
       
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        $pageValue = 0;
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
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Basic Card Example -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-gray-900 text-center"><i class="fas fa-shoe-prints"></i> Enrollment Progress</h6>
                                    </div>
                                    <!--Step Progress-->
                                    <?php 

                                        #display enrollment details if existing
                                        #show div
                                    if ($counter >= 1) {
                                        $icon = 'check';
                                        $validateicon = 'sync';

                                        

                                        $enrolldate = $row['date_enrolled'];
                                        $assessdate=$row['date_assessed'];
                                        $datevalidated=$row['date_validated'];
                                        $pv=$row['date_pverif'];
                                        $dateoffenrolled=$row['date_or'];

                                        $showhidedetails = '        
                                        <script>
                                        $("#enrolldetailsdiv").show();   
                                        </script>';
                                        
                                    } else {#hide enroll details div
                                        $enrolldate = '';
                                        $assessdate='';
                                        $datevalidated='';
                                        $pv='';
                                        $dateoffenrolled='';
                                      
                                        $icon = 'times';
                                        $validateicon = 'times';

                                        $showhidedetails = '        
                                        <script>
                                        $("#enrolldetailsdiv").hide();   
                                        </script>';
                                    }
                                        #icons and colors changing based on enrollment status
                                    if ($e_status == 'Pending') {
                                        $regicon = 'check';
                                        $reqvalid = 'sync';
                                        $assess = 'times';
                                        $payv='times';
                                        $regform='times';

                                        #assessed
                                    } elseif ($e_status == 'Assessed') {
                                        $regicon = 'check';
                                        $reqvalid = 'check';
                                        $assess = 'check';
                                        $payv='sync';
                                        $regform='times';

                                        #payment verified
                                    }elseif ($e_status == 'Payment Verified') {
                                        $regicon = 'check';
                                        $reqvalid = 'check';
                                        $assess = 'check';
                                        $payv='check';
                                        $regform='sync';
                                    }

                                         #enrolled
                                    elseif ($e_status == 'Enrolled') {
                                        $regicon = 'check';
                                        $reqvalid = 'check';
                                        $assess = 'check';
                                        $payv='check';
                                        $regform='check';

                                        #not enrolled
                                    }else{
                                        $regicon = 'times';
                                        $reqvalid = 'times';
                                        $assess = 'times';
                                        $payv='times';
                                        $regform='times';

                                    }
                                    ?>

                                            <!-- progress tracker -->
                                    <div class="progress" style="height:165px;">
                                        <ul class="line" id="progstep" role="tablist">

                                            <!-- Upload Requirements -->
                                            <li id="icons">
                                                <img src="img/icons/checklist.png"><br>
                                                <i class="fa fa-check"></i>
                                                <a class="text-info" href="requirements.php">
                                                    <p class="proglabel">Upload Requirements</p>
                                                </a><br>
                                                <p class="proglabel"> <br></p>
                                               
                                            </li>

                                            <!-- Enroll -->
                                            <li id="icons">
                                                <img src="img/icons/list.png"><br>
                                                <i class="fa fa-<?= $regicon ?>"></i>
                                                <a class="text-info" data-toggle="tab" href="#enroll">
                                                    <p class="proglabel">Registration</p>
                                                </a><br>
                                                <p class="proglabel"><span style="color:white">.</span> <i><?= $enrolldate ?></i></p>
                                               

                                            </li>
                                            <!-- Requirements Validation -->
                                            <li id="icons">
                                                <img src="img/icons/checked.png"><br>
                                                <i class="fa fa-<?= $reqvalid ?>"></i>
                                                <div class="text-info" data-toggle="tab" href="#uloadreq">
                                                    <p class="proglabel">Requirements Validation</p>
                                                </div><br><br>
                                                <p class="proglabel" ><span style="color:white">.</span > <i><?=$datevalidated?></i></p>
                                                
                                                
                                            </li>
                                            <!-- Assessment Form Sent -->
                                            <li id="icons">
                                                <img src="img/icons/bill.png"><br>
                                                <i class="fa fa-<?= $assess ?>"></i>
                                                <div class="text-info" data-toggle="tab" href="#subreq">
                                                    <p class="proglabel">Assessment</p>
                                                </div><br>
                                                <p class="proglabel"><span style="color:white">.</span> <i><?=$assessdate?></i></p>
                                            </li>

                                            
                                            <!-- Payment Validation -->
                                            <li id="icons">
                                                <img src="img/icons/debit-card.png"><br>
                                                <i class="fa fa-<?=$payv?>"></i>
                                                <a class="text-info" href="payverif.php">
                                                    <p class="proglabel">Payment Verification</p>
                                                </a><br>
                                                <p class="proglabel"><span style="color:white">.</span><i><?=$pv?></i></p>
                                            </li>

                                            <!-- Issuance of RegForm -->
                                            <li id="icons">
                                                <img src="img/icons/register.png"><br>
                                                <i class="fa fa-<?=$regform?>"></i>
                                               
                                                    <p class="proglabel text-info">Issuance of Registration</p>
                                                <br>
                                                <p class="proglabel"><span style="color:white">.</span> <i><?=$dateoffenrolled?></i></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--TAB MENU-->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="enroll" role="tabpanel">
                                <?php
                                if ($status == 'OPEN') { // display enrollment page if open

                                    include("enrollmentpage.php");
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Page Wrapper -->

            <!-- Footer -->
            <?php
            require_once("includes/footer.php");
            ?>
            <!-- End of Footer -->

            <?php
            include_once("includes/scripts.php");

            echo $addscript;
            echo $showhidedetails;
            ?>
</body>

</html>
