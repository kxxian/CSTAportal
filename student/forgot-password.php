<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    header('location:index.php');
}
$msg = "";
if (isset($_GET['login'])) {
    $msg = "Invalid Username or Password!";
    $color="red";
}
?>

<?php
if (isset($_GET['reset'])) {
    if ($_GET['reset'] == "success") {
        $msg="Password reset link sent! Please check your email.";
        $color="green";
    }elseif($_GET['reset'] == "notfound"){
        $msg="Email address not found";
        $color="red";
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- [if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->

</head>

<body>
    <div class="main-form-box">
        <div class="md-form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="panel panel-login">
                            <div class="logo-top">
                                <a href="login.php"><img src="img/logologo.png" alt="" /></a><br><br>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form id="login-form" action="codes/reset-request.php" method="post" role="form" style="display: block;">
                                            <div class="form-group">

                                                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Enter your email address..." value="" required="">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">

                                                    <div class="col-sm-12">
                                                        <input type="submit" name="reset-request-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="reset password via email">

                                                        <p style="color:<?=$color?>; font-weight:bold; text-align:center;padding-top:10px;"><?= $msg ?></p>
                
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class="footer-company-name">All Rights Reserved. </p>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/index.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });

        $('.form-group input').focus(function() {
            $(this).parent().addClass('addcolor');
        }).blur(function() {
            $(this).parent().removeClass('addcolor');
        });
    </script>

    <?php
    require_once('includes/scripts.php');

    ?>
</body>

</html>