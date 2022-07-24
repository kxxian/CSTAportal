<?php

$msg = "";
if (isset($_GET['pwdreset'])=="expired") {
    $error_code="401";
    $err_title="Unauthorized";
    $msg = "Request Expired. Please resubmit your request.";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <title><?="Error ".$error_code." | ".$err_title?></title>

  <style>
    body {
      background: url("img/BG_REGFORM.jpg");
      background-size: cover;
      background-repeat: no-repeat;
      height: 100%;
      overflow: visible;
      position: fixed;
      background-position: center;
      display: table;
      width: 100%;
    }
  </style>
</head>

<body>
 
  <!-- Begin Page Content -->
  <div class="container-fluid">
 

    <!-- 404 Error Text -->
    <div class="text-center">
      <div class="error mx-auto"><?=$error_code?></div>
      <p class="lead text-gray-100 mb-5"><?=$err_title?></p>
      <p class="text-gray-100 mb-0"><?=$msg?></p>
      <a href="index.php" class="h5 font-weight-bold">&larr; Go Back </a>
    </div>

  </div>
  <!-- /.container-fluid -->

</body>

</html>