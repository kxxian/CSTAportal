<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CSTA Portal Guest | Requirements</title>

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/cstalogonew.png">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="plugins/bootstrap.min.css">    
    
	<!-- Animate CSS -->
	<link rel="stylesheet" href="plugins/animate_css/animate.min.css">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
      
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


   
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php
        require_once("includes/guest_sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php 
                    require('includes/guest_header.php');
                ?>
                
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Announcement card -->
                    <!-- Content Row With card -->
                    <!-- Page Heading -->
                    
				<div class="row">
					<div class="col-md-6">
						<form id="formFreshmen">
							<div class="card shadow mb-4">
								<h5 class="card-header text-gray-900">
								<i class="fas fa-user"></i>
									&nbsp;
									Requirements Freshmen
								</h5>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<label for="studName" class="text-gray-900">Student Name:</label>						
											<input type="text" id="studName" name="studName" class="form-control" placeholder="e.g John Doe" required>
										</div>
										<div class="col-md-6">
											<label for="studType" class="text-gray-900">Student Type:</label>						
											<input type="text" id="studType" name="studType" class="form-control" value="Freshmen" style="pointer-events: none" readonly>
										</div>
										<div class="col-md-12 mt-3">
											<label for="email" class="text-gray-900">Email:</label>						
											<input type="email" id="email" name="email" class="form-control" placeholder="e.g mail@mail.com" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="form138" class="text-gray-900">Form 138:</label>						
											<input type="file" id="form138" name="form138" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="form137a" class="text-gray-900">Form 137A:</label>						
											<input type="file" id="form137a" name="form137a" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="gmc" class="text-gray-900">Good Moral Certificate:</label>						
											<input type="file" id="gmc" name="gmc" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="psa" class="text-gray-900">Birth Certificate (PSA):</label>						
											<input type="file" id="psa" name="psa" class="form-control" required>
										</div>
										<div class="col-md-12">
											<button class="btn btn-success mt-3" id="btnSubmit">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>

					<div class="col-md-6">
						<form id="formTransferee">
							<div class="card shadow mb-4">
								<h5 class="card-header text-gray-900">
									<i class="fas fa-exchange-alt"></i>
									&nbsp;
									Requirements Transferee
								</h5>
								<div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<label for="studName" class="text-gray-900">Student Name:</label>						
											<input type="text" id="studName2" name="studName2" class="form-control" placeholder="e.g John Doe" required>
										</div>
										<div class="col-md-6">
											<label for="studType" class="text-gray-900">Student Type:</label>						
											<input type="text" id="studType2" name="studType2" class="form-control" value="Transferee" style="pointer-events: none" readonly>
										</div>
										<div class="col-md-12 mt-3">
											<label for="email" class="text-gray-900">Email:</label>						
											<input type="email" id="email2" name="email2" class="form-control" placeholder="e.g mail@mail.com" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="tor" class="text-gray-900">Transcript of Record (TOR):</label>						
											<input type="file" id="tor" name="tor" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="honorDismiss" class="text-gray-900">Honorable Dismissal:</label>						
											<input type="file" id="honorDismiss" name="honorDismiss" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="gmc" class="text-gray-900">Good Moral Certificate:</label>						
											<input type="file" id="gmc2" name="gmc2" class="form-control" required>
										</div>
										<div class="col-md-6 mt-3">
											<label for="psa" class="text-gray-900">Birth Certificate (PSA):</label>						
											<input type="file" id="psa2" name="psa2" class="form-control" required>
										</div>
										<div class="col-md-12">
											<button class="btn btn-success mt-3" id="btnSubmit2">Submit</button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>


                    
                <!-- Content Row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <?php
        require_once("includes/guest_footer.php");
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

	<!-- Bootstrap Bundle -->
	<script src="plugins/bootstrap/bootstrap.bundle.min.js"></script>
	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- SweetAlert2 -->
	<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
	<script src="js/g_freshmen.js"></script>
	<script src="js/g_transferee.js"></script>
</body>

</html>
