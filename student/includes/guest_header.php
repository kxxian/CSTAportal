<?php 
    require('includes/connect.php');
    require('codes/fetchcurrentsyandsem.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: #2e1503;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <span class="mr-2 d-none d-lg-inline text-gray-100 medium"><b>SY: <?php echo $currentsyval ?>  <?php echo $currentsemval ?></b></span>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-gray-100 medium">
                Good Day Teresian!
            </li>
        </ul>
    </nav>    
</body>
</html>