<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>CSTA Portal Guest | Home</title>

	<!-- Site Icons -->
	<link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
	
	<!-- Announcement CSS Style -->
	<!-- <link rel="stylesheet" href="../announcements/css/style.css"> -->
	<link rel="stylesheet" href="css/announcements.css" type="text/css">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="plugins/owl_carousel/owl.carousel.min.css">

	<!-- Owl Carousel Theme -->
	<link rel="stylesheet" href="plugins/owl_carousel/owl.theme.default.min.css">

	<!-- Custom fonts for this template-->
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="css/sb-admin-2.min.css" rel="stylesheet">

	<!-- ajax -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- datatable css -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

	<!-- jquery validation -->
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

	<!-- datatables -->
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

	<!-- sweet alert 2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- popper js -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

	<!-- Bootstrap JS bundle -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


	<!-- Google Recaptcha-->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
						<div class="content">
							<h1>Announcements</h1>
							<div class="row">
								<div class="owl-carousel owl-theme">
									<div class="item">
										<div class="time">
											<h2>5 <span>November</span></h2>
											<h5>Admin</h5>
										</div>
										<div class="details">
											<h3>Put Title Here</h3>
											<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="time">
											<h2>4 <span>November</span></h2>
											<h5>Registrar</h5>
										</div>
										<div class="details">
											<h3>Put Title Here</h3>
											<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="time">
											<h2>2 <span>November</span></h2>
											<h5>IT Dept</h5>
										</div>
										<div class="details">
											<h3>Put Title Here</h3>
											<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="time">
											<h2>1 <span>November</span></h2>
											<h5>Tourism Dept</h5>
										</div>
										<div class="details">
											<h3>Put Title Here</h3>
											<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="time">
											<h2>29 <span>October</span></h2>
											<h5>Accounting</h5>
										</div>
										<div class="details">
											<h3>Put Title Here</h3>
											<p>
											Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
											</p>
										</div>
									</div>
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


<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</html>
