<?php
require_once("includes/fetchuserdetails.php");

date_default_timezone_set('Asia/Manila');
include 'class/user.php';

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

    <title>CSTA Portal | Home</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../student/img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../student/img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/msgstyle.css">
    <script type="text/javascript" src="function.js"></script>

    <style>
        /* #content{
            background-color: #e9e7e5;
        } */
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
                    <!-- Announcement card -->
                    <div class="card shadow h-100 py-0" hidden>
                        <h4 class="card-header text-center text-gray-100" style="background-color:#4f4539 ;">
                            Announcement
                            <i class="fas fa-bell  text-gray-100"></i>
                        </h4>
                        <div class="card-body" style="background-color:#3a3122;">
                            <h4 class="card-title text-gray-100">Title</h4>
                            <p class="card-text text-gray-100">Sample Content</p>
                        </div>
                    </div>
                    <br>
                    <!-- Content Row With card -->
                    <!-- Page Heading -->

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4 class="h4 mb-0 text-gray-900 text-center" style="text-decoration: underline;text-decoration-color:  #ffbb33; text-decoration-thickness: 3px;"><strong>Messages</strong></h4>
                    </div>

                    <?php
                    $username = $_SESSION['username'];
                    $user_id = $sid;

                    $db = new config();
                    $pdo = $db->db();

                    $user = new user();


                    ## MGA KACHAT
                    $sql = "SELECT * FROM students WHERE username!=:username";
                    $query = $user->runQuery($sql);
                    $query->bindParam(':username', $username, PDO::PARAM_STR);
                    $query->execute();
                    $results = $query->fetchAll(PDO::FETCH_OBJ); ?>


                    <main class="content">
                        <div class="container p-0">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-12 col-lg-5 col-xl-3 border-right">

                                        <div class="px-4 d-none d-md-block">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <input type="text" class="form-control my-3" placeholder="Search...">
                                                </div>
                                            </div>
                                        </div>

                                        <?php foreach ($results as $row) {
                                            $status = '';
                                            $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                                            $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                                            $user_last_activity = $user->fetch_last_activity($row->id);
                                            if ($user_last_activity > $current_timestamp) {
                                                $status = '<span class="fas fa-circle chat-online"></span> Online';
                                            } else {
                                                $status = '<span class="fas fa-circle chat-offline"></span> Offline';
                                            }
                                        ?>

                                            <a href="#" class="list-group-item list-group-item-action border-0">
                                                <!-- check if no messages -->
                                                <?php
                                                    if($user->count_unseen_message($row->id,$user_id)>0){

                                                        $hide="";

                                                    }else{
                                                        $hide="hidden";
                                                    }
                                                
                                                
                                                ?>


                                                <div class="badge bg-danger float-right" style="color:white;" <?=$hide?>> <?= $user->count_unseen_message($row->id,$user_id)?></div>
                                                <div class="d-flex align-items-start">

                                                    <!-- check if picture exists -->
                                                    <?php
                                                        if (file_exists("uploads/users/"."$row->id".".jpg")){
                                                            $dp="uploads/users/"."$row->id".".jpg";
                                                        }else{
                                                            $dp="uploads/users/default.jpg";
                                                        }
                                                    
                                                    ?>



                                                    <img src="<?=$dp?>" class="rounded-circle mr-1" width="40" height="40">
                                                    <div class="flex-grow-1 ml-3">
                                                        <?=$row->fname.' '. $row->lname?>
                                                       
                                                        <div class="small"><?=$status?></div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php     }     ?>



                                    <hr class="d-block d-lg-none mt-1 mb-0">
                                    </div>

                                    <!-- <div id="user_model_details"></div> -->
                                    <div class="col-12 col-lg-7 col-xl-9">
                                        <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                            <div class="d-flex align-items-center py-1">
                                                <div class="position-relative">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                </div>
                                                <div class="flex-grow-1 pl-3">
                                                    <strong>Sharon Lessman</strong>
                                                    <div class="text-muted small"><em>Typing...</em></div>
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="position-relative">
                                            <div class="chat-messages p-4">
                                                <div class="chat-message-left pb-4">
                                                    <div>
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                        <div class="text-muted small text-nowrap mt-2">2:37 am</div>
                                                    </div>
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                        <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                        Cras pulvinar, sapien id vehicula aliquet, diam velit elementum orci.
                                                    </div>
                                                </div>

                                                <div class="chat-message-right mb-4">
                                                    <div>
                                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                        <div class="text-muted small text-nowrap mt-2">2:38 am</div>
                                                    </div>
                                                    <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                        <div class="font-weight-bold mb-1">You</div>
                                                        Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="flex-grow-0 py-3 px-4 border-top">
                                            <div class="input-group">
                                                <button class="btn btn-info btn-md mr-1 px-2 d-none d-md-inline-block"><i class="fa fa-paperclip fa-fw"></i></button>
                                                <input type="text" class="form-control" placeholder="Type your message">
                                                <button class="btn btn-primary">Send</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>



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

</body>

</html>