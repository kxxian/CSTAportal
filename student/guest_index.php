<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>CSTA Portal Guest | Home</title>

	<!-- Site Icons -->
	<link rel="shortcut icon" href="img/cstalogonew.png">

	<!-- Site Icons -->
	<link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
	<link rel="apple-touch-icon" href="img/CSTA_SMALL.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="plugins/bootstrap.min.css">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="plugins/owl_carousel/owl.carousel.min.css">
	<!-- Owl Carousel Theme -->
	<link rel="stylesheet" href="plugins/owl_carousel/owl.theme.default.min.css">

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

	<style>
		.item img {
			height: 280px;
		}

		.row a {
			text-decoration: none;
		}
	</style>
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
					<section>
						<div class="container-fluid my-5">
							
						<h4 class="h4 mb-0 text-gray-900" style="text-decoration: underline;text-decoration-color:  #ffbb33; text-decoration-thickness: 3px;"><strong>Main Menu</strong></h4>
							<div class="row mt-3">
								<div class="owl-carousel owl-theme">
									<a href="guest_register.php">
										<div class="item mb-4">
											<div class="card border-0 shadow">
												<img class="card-img-top" src="img/enrollment3.jpg" alt="Online Enrollment">
												<div class="card-body" style="background-color: #11D6D7;">
													<h4 style="color: #fff; font-weight: bold;">Online Enrollment</h4>
												</div>
											</div>
										</div>
									</a>
									<!-- item ends -->
									<a href="guest_requirements.php">
										<div class="item mb-4">
											<div class="card border-0 shadow">
												<img class="card-img-top" src="img/requirements2.jpg" alt="Online Enrollment">
												<div class="card-body" style="background-color: #08082C;">
													<h4 style="color: #fff; font-weight: bold;">Requirements</h4>
												</div>
											</div>
										</div>
									</a>
									<!-- item ends -->
									<a href="guest_payments_insert.php">
										<div class="item mb-4">
											<div class="card border-0 shadow">
												<img class="card-img-top" src="img/payverif.png" alt="Online Enrollment">
												<div class="card-body" style="background-color: #FDDF5A;">
													<h4 style="color: #FFFAFA; font-weight: bold;">Payment Verification</h4>
												</div>
											</div>
										</div>
									</a>
									<a href="#">
										<div class="item mb-4">
											<div class="card border-0 shadow">
												<img class="card-img-top" src="img/request_of_docu.jpg" alt="Online Enrollment">
												<div class="card-body" style="background-color: #4FC2F8;">
													<h4 style="color: #fff; font-weight: bold;">Request of Documents</h4>
												</div>
											</div>
										</div>
									</a>
									<!-- item ends -->
									<!-- item ends -->
									<a href="guest_check_payment.php">
										<div class="item mb-4">
											<div class="card border-0 shadow">
												<img class="card-img-top" src="img/check_payment.jpg" alt="Online Enrollment">
												<div class="card-body" style="background-color: #84DD81;">
													<h4 style="color: #fff; font-weight: bold;">Check Payment Status</h4>
												</div>
											</div>
										</div>
									</a>
									<!-- item ends -->
								</div>
							</div>
						</div>
					</section>
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

	<!-- Jquery -->
	<script src="plugins/jquery/jquery.min.js"></script>

	<!-- Owl Carousel -->
	<script src="plugins/owl_carousel/owl.carousel.min.js"></script>
	<script>
		$('.owl-carousel').owlCarousel({
			/* loop:true, */
			margin: 10,
			nav: true,
			responsive: {
				0: {
					items: 1
				},
				600: {
					items: 2
				},
				1000: {
					items: 3
				}
			}
		})
	</script>
</body>

</html>