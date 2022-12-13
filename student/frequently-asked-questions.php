<?php
require_once("includes/connect.php");
require_once("codes/fetchuserdetails.php");
require_once("codes/fetchcurrentsyandsem.php");
require_once ('codes/fetchuser_session.php');

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('location:login.php');
}

//Prohibits the user to be logged in more than one
if ($user_token!=$_SESSION['user_token']) {
    header('location:logout.php');
}



?>
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
		.accordion-style .card {
			background: transparent;
			box-shadow: none;
			margin-bottom: 15px;
			margin-top: 0 !important;
			border: none;
		}

		.accordion-style .card:last-child {
			margin-bottom: 0;
		}

		.accordion-style .card-header {
			border: 0;
			background: none;
			padding: 0;
			border-bottom: none;
		}

		.accordion-style .btn-link {
			color: #ffffff;
			position: relative;
			background: #2e1503;
			border: 1px solid #2e1503;
			display: block;
			width: 100%;
			font-size: 18px;
			border-radius: 3px;
			border-bottom-left-radius: 0;
			border-bottom-right-radius: 0;
			text-align: left;
			white-space: normal;
			box-shadow: none;
			padding: 15px 55px;
			text-decoration: none;
		}

		.accordion-style .btn-link:hover {
			text-decoration: none;
		}

		.accordion-style .btn-link.collapsed {
			background: #ffffff;
			border: 1px solid #15395a;
			color: #1e2022;
			border-radius: 3px;
		}

		.accordion-style .btn-link.collapsed:after {
			background: none;
			border-radius: 3px;
			content: "+";
			left: 16px;
			right: inherit;
			font-size: 20px;
			font-weight: 600;
			line-height: 26px;
			height: 26px;
			transform: none;
			width: 26px;
			top: 15px;
			text-align: center;
			background-color: #15395a;
			color: #fff;
		}

		.accordion-style .btn-link:after {
			background: #fff;
			border: none;
			border-radius: 3px;
			content: "-";
			left: 16px;
			right: inherit;
			font-size: 20px;
			font-weight: 600;
			height: 26px;
			line-height: 26px;
			transform: none;
			width: 26px;
			top: 15px;
			position: absolute;
			color: #15395a;
			text-align: center;
		}

		.accordion-style .card-body {
			padding: 20px;
			border-top: none;
			border-bottom-right-radius: 3px;
			border-bottom-left-radius: 3px;
			border-left: 1px solid #15395a;
			border-right: 1px solid #15395a;
			border-bottom: 1px solid #15395a;
		}

		@media screen and (max-width: 767px) {
			.accordion-style .btn-link {
				padding: 15px 40px 15px 55px;
			}
		}

		@media screen and (max-width: 575px) {
			.accordion-style .btn-link {
				padding: 15px 20px 15px 55px;
			}
		}

		.card-style1 {
			box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
		}

		.border-0 {
			border: 0 !important;
		}

		.card {
			position: relative;
			display: flex;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #fff;
			background-clip: border-box;
			border: 1px solid rgba(0, 0, 0, .125);
			border-radius: 0.25rem;
		}

		section {
			padding-top: 0;
			padding-bottom: 40px;
			overflow: hidden;
			background: #fff;
		}

		.mb-2-3,
		.my-2-3 {
			margin-bottom: 2.3rem;
		}

		.section-title {
			font-weight: 600;
			letter-spacing: 2px;
			text-transform: uppercase;
			margin-bottom: 10px;
			position: relative;
			display: inline-block;
		}

		.text-primary {
			color: #ceaa4d !important;
		}
	</style>
</head>

<body id="page-top">
	<!-- Page Wrapper -->
	<div id="wrapper">
		<!-- Sidebar -->
		<?php
		$pageValue=6;
		require_once("includes/sidebar.php");
		?>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">
			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php
				require('includes/header.php');
				?>
				<!-- End of Topbar -->
				<!-- Begin Page Content -->

				<section class="bg-light">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-10">

								<div class="text-center mb-2-3 mb-lg-6">
									<span class="section-title text-gray-900">FAQ's</span>
									<h2 class="h1 mb-0 text-gray-900">Frequently Asked Questions</h2>
								</div>
								<div id="accordion" class="accordion-style">


									<?php
									$sql = "SELECT * from `faq`";
									$stmt = $con->prepare($sql);
									$stmt->execute();
									$strfaq = '';
									while ($row = $stmt->fetch()) {
										$strfaq .= '<div class="card mb-3">';
										$strfaq .= '<div class="card-header" id="headingOne">';
										$strfaq .= '<h5 class="mb-0">';
										$strfaq .= '<button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#item'.$row['faq_ID'].'" aria-expanded="true" aria-controls="item'.$row['faq_ID'].'"><span class="text-theme-secondary me-2">Q.</span> '.$row['question'].'</button>';
										$strfaq .= '</h5>';
										$strfaq .= '</div>';
										$strfaq .= '<div id="item'.$row['faq_ID'].'" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">';
										$strfaq .= '	<div class="card-body text-gray-900">';
										$strfaq .= '		'.$row['ans'].'';
										$strfaq .= '	</div>';
										$strfaq .= '</div>';
										$strfaq .= '</div>';
									}

									echo $strfaq;

									?>



								</div>
							</div>
						</div>
					</div>
				</section>


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

	<!-- Jquery -->
	<script src="plugins/jquery/jquery.min.js"></script>

	<!-- Owl Carousel -->
	<script src="plugins/owl_carousel/owl.carousel.min.js"></script>
	<script>

	</script>
</body>


<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="js/header.js"></script>
<script src="js/enrollment.js"></script>
<script src="js/counter.js"></script>
<script src="js/notifications.js"></script>


</html>