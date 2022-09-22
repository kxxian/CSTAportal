<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location:index.php');
}
$msg = "";

if (isset($_GET['login'])) {
    $_SESSION['status'] = "Oops!";
    $_SESSION['msg'] = "Invalid username or password!";
    $_SESSION['status_code'] = "warning";
}

if (isset($_GET['newpwd'])) {
    if ($_GET['newpwd'] == "passwordupdated") {


        $_SESSION['status'] = "Success!";
        $_SESSION['msg'] = "Password reset successful!";
        $_SESSION['status_code'] = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Site Metas -->
    <title>CSTA Student Portal</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Bootstrap CSS -->
    <!-- CSS only -->
    <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="css/custom.css"> -->


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


</head>

<body>
    <div class="main-form-box">

        <div class="container-fluid" width="100%">
            <div class="logo-top float-left">
                <a href="#"><img width="390" src="img/logologo.png" alt="" /></a><br><br>
            </div>
            <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color:#65350f">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Admission
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Courses</a>
                                <a class="dropdown-item" href="#">Requirements</a>

                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vision&Mission</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tracker
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">Assessment</a>
                                <a class="dropdown-item" href="#">Payment</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </nav>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-login float-left ml-0">

                        <div class="panel-body">
                            <h2 class="h4 text-center" style="color:#65350f"><i class="fas fa-lock"></i> Log In</h2><br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="validate_login.php" method="post" role="form" style="display: block;">
                                        <div class="form-group">
                                            <label class="icon-lp"><i class="fas fa-user"></i></label>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required="" autofocus>
                                        </div><br>
                                        <div class="form-group">
                                            <div class="row">

                                            </div>
                                            <label class="icon-lp"><i class="fas fa-key"></i></label>
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required="">
                                        </div><br>


                                        <div class="form-group">
                                            <div class="col-sm-6 offset-sm-3">
                                                <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In" style="background-color: #65350f;">
                                                <p style="color:<?= $color ?>; font-weight:bold; text-align:center;padding-top:10px;"><?= $msg ?></p>

                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <span style="color:black"> Not a Member?</span> <a href="register.php" tabindex="5" class="forgot-password text-primary">Sign Up</a>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="text-center text-success">
                                                    <a href="forgot-password.php" tabindex="5" class="forgot-password text-gray-900">Forgot Password?</a>
                                                </div>
                                            </div>



                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <p class="footer-company-name">All Rights Reserved. </p> -->

                </div>
                <div class="col-md-8">
                    <div class="panel panel-login" style="height:398px">

                        <div class="panel-body" style="height:398px">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 style="color:#65350f" class="h4">Announcements</h4>
                                </div>
                                <div class=" col-md-12">
                                    <p style="overflow-y:auto; height:300px; color:black">
                                        <b>CSTA Registrar</b><br>
                                        <small> Sept. 19, 2022 <span>5:12 PM</span></small>
                                        <br><br>

                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora cum odit, ab possimus esse, fuga neque dolorem illum iusto minus nemo quibusdam tempore, ipsa vero vitae nostrum eius suscipit nisi.
                                        Debitis, aperiam quaerat corrupti cum quasi architecto natus facere quidem praesentium iste voluptatibus. Eveniet, aliquam quos! Error provident ea totam, aut odio dignissimos odit quam repellendus dolorum modi vel mollitia!
                                        Voluptatibus iure pariatur cupiditate exercitationem nulla officiis doloremque? Odio explicabo quod repellat beatae commodi facilis. Nisi quasi sed error tenetur commodi fugit alias? Numquam, laboriosam? Voluptas similique excepturi maxime fugit!
                                        Sit amet atque rem, excepturi pariatur nisi sed sunt nemo delectus vitae at doloremque eligendi consectetur quod ducimus hic velit accusamus eius! Quibusdam, iusto? Blanditiis odio dolore vel ut tenetur.
                                        Molestias laborum corrupti unde in. Provident quam illo quia consequatur vero accusantium voluptatibus voluptas minus rem voluptates vitae, fugiat libero, placeat sapiente vel omnis magnam harum, velit modi. Amet, reprehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut fugit et voluptas quibusdam animi iusto aperiam. Ex distinctio voluptates odio obcaecati omnis, beatae quia nihil, aperiam dignissimos quas tempore tempora?
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum, vero quisquam fugit deserunt cum exercitationem, iusto nesciunt doloremque, amet laudantium repellat. Quisquam recusandae deserunt pariatur eos ab repellat sint dicta.
                                        Impedit alias porro earum inventore officiis natus, aliquam architecto culpa iusto sequi nam atque voluptatum voluptas tempore ut placeat consectetur modi. Neque repellendus qui, nesciunt nemo suscipit tenetur iusto quam!
                                        Eius, id quaerat magnam blanditiis eos est perspiciatis tenetur nam nesciunt corporis totam eligendi consequatur! Perspiciatis aliquid suscipit tempora ut neque, aspernatur officiis consequatur sint, odio commodi illo modi. Quo!
                                        Inventore eveniet veniam reiciendis soluta nam eum incidunt aliquam possimus culpa debitis iure, laudantium illum dolorem consequatur. Quibusdam, iste adipisci. Nobis cumque accusamus quae. Aliquam quaerat hic iste repudiandae sint.
                                        Iure praesentium dolores magni corporis eum deserunt quos explicabo autem quas non aliquid suscipit beatae qui id temporibus ratione, dolor voluptate distinctio? Rem enim accusamus illum officia vel dignissimos ipsam!
                                        Exercitationem ad dignissimos quam vero sapiente consequatur provident neque explicabo harum laudantium amet nulla pariatur, repellat, iure accusantium voluptatem id? Excepturi aliquam a consectetur vel natus, iusto quidem maxime ipsum.
                                        Incidunt qui, numquam dicta laudantium nesciunt quae quis, molestias odit accusamus minima provident aliquam hic. Aliquam praesentium fugiat itaque maxime quibusdam nostrum eum asperiores quam cumque illum! Aliquid, sapiente soluta.
                                        Velit recusandae illo quos dicta iste eos eum autem alias quidem harum incidunt aut unde repellat ipsum, excepturi perferendis, voluptate animi vero provident sunt. Natus omnis consequuntur optio doloremque eius.
                                        Fuga magni repellendus incidunt sint laboriosam beatae voluptatum temporibus optio labore, ad, velit aliquid iure, corrupti fugit nemo aut. Consequuntur est natus tempora placeat! Fugit omnis aliquam neque atque ducimus!
                                        Provident rerum enim similique non explicabo amet deleniti omnis quia adipisci accusamus laborum ut veritatis, vitae earum dolor ullam neque dolorum deserunt doloremque assumenda? Temporibus perferendis facere praesentium repellat incidunt.
                                        Quos, mollitia dicta placeat quod sunt fugit, incidunt voluptate sed excepturi pariatur laudantium dolores, laboriosam ipsum esse obcaecati cum molestias in eius quam rerum aliquid. Architecto saepe laborum placeat illo!
                                        Hic nemo, voluptates, error cupiditate ratione odit nihil dignissimos provident minima facere blanditiis eius expedita, fugit culpa ut sequi magni earum placeat tempora velit iure obcaecati! At sapiente aspernatur rerum?
                                        Voluptas deserunt alias soluta. Ipsa culpa praesentium natus delectus nulla iure, quos incidunt, officia rerum debitis tenetur repellat aliquam voluptatibus ad quibusdam est animi, eos eveniet qui. Tenetur, enim minus?
                                        
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <p class="footer-company-name">All Rights Reserved. </p> -->

                </div>

            </div>
        </div>


    </div>

    <footer class="sticky-footer" style="background-color:#2E1503;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto text-gray-100">
                <span>Copyright &copy; CSTA 2022</span>
            </div>
        </div>
    </footer>

    <?php
    require_once('includes/scripts.php');

    ?>
</body>

</html>