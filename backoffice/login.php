<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->



<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	header('location:index.php');
}elseif (isset($_SESSION['username_admin']) && isset($_SESSION['password_admin'])) {
	header('location:backoffice/index.php');
}
$msg = "";

if (isset($_GET['login'])) {
	$_SESSION['status'] = "Oops!";
	$_SESSION['msg'] = "Invalid username or password!";
	$_SESSION['status_code'] = "warning";
}if (isset($_GET['new'])) {
	$_SESSION['status'] = "Oops!";
	$_SESSION['msg'] = "Account is not yet validated.";
	$_SESSION['status_code'] = "info";
}

if (isset($_GET['pwdreset'])) {
	if ($_GET['pwdreset'] == "expired") {


		$_SESSION['status'] = "Oops!";
		$_SESSION['msg'] = "Link Not Found!";
		$_SESSION['status_code'] = "warning";
	}
}

if (isset($_GET['newpwd'])) {
	if ($_GET['newpwd'] == "passwordupdated") {


		$_SESSION['status'] = "Success!";
		$_SESSION['msg'] = "Password reset successful!";
		$_SESSION['status_code'] = "success";
	}
}


if (isset($_GET['newpwd'])) {
	if ($_GET['newpwd'] == "passwordset") {


		$_SESSION['status'] = "Success!";
		$_SESSION['msg'] = "Username and password is set successfully!";
		$_SESSION['status_code'] = "success";
	}
}

if (isset($_GET['reset'])) {
	if ($_GET['reset'] == "success") {
		$_SESSION['status'] = "Success!";
		$_SESSION['msg'] = "Password reset link sent to your email.";
		$_SESSION['status_code'] = "success";
	} elseif ($_GET['reset'] == "notfound") {
		$_SESSION['status'] = "Oops!";
		$_SESSION['msg'] = "Email address not found.";
		$_SESSION['status_code'] = "warning";
	}
}
?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>CSTA Student Portal</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
	<meta charset="UTF-8" />
	<!-- <meta n	ame="keywords" content="Triple Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" /> -->
	<script>
		// addEventListener("load", function () {
		// 	setTimeout(hideURLbar, 0);
		// }, false);

		// function hideURLbar() {
		// 	window.scrollTo(0, 1);
		// }
	</script>
	<!-- Meta tag Keywords -->

	<!-- css files -->
	<link rel="stylesheet" href="login_css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<!-- jquery -->
	<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext" rel="stylesheet">
	<!-- //web-fonts -->
</head>
<style>
	.vertical-tab input[name="sections"]:checked+label {
		background: #824d1b;
		border-right: 1px solid #000;
		color: #fff;
	}

	.sub-main-w3 {
		max-width: 800px;
	}

	a.bottom-text-w3ls {
		color: #757474;
		font-size: 14px;
		display: inherit;
		letter-spacing: 1px;
		text-align: center;
		margin-top: 1em;
	}

	.legend1 {
		color: #000;
		font-size: 18px;
		text-align: center;
		margin-bottom: .8em;
		font-weight: 400;
		font-weight: bold;
	}

	.legend {
		color: #000;
		font-size: 18px;
		text-align: center;
		margin-bottom: 2em;
		font-weight: 400;
		font-weight: bold;
	}
</style>

<body>
	<div class="main-bg">
		<!-- title -->
		<center><img src="img/big.png" alt="" width="190"></center>

		<!-- //title -->
		<div class="sub-main-w3" style="margin-top:0;">
			<!-- vertical tabs -->
			<div class="vertical-tab">
				<div id="section1" class="section-w3ls">
					<input type="radio" name="sections" id="option1" checked>
					<label for="option1" class="icon-left-w3pvt"><span class="fa fa-user-circle" aria-hidden="true"></span>Login</label>
					<article>
						<form action="validate_login.php" method="post">
							<h5 class="legend1">Login</h5>

							<div class="input">
								<span class="fa fa-user" aria-hidden="true"></span>
								<input type="text" placeholder="Username" name="username" id="username" required />
							</div>
							<div class="input">
								<span class="fa fa-key" aria-hidden="true"></span>
								<input type="password" placeholder="Password" name="password" id="password" required />


							</div>

							<button type="submit" class="btn submit" style="background-color:#824d1b; margin-bottom:10px">Login</button>

							

							
						</form>
					</article>
				</div>

				<div id="section2" class="section-w3ls">
					<input type="radio" name="sections" id="option3">
					<label for="option3" class="icon-left-w3pvt"><span class="fa fa-lock" aria-hidden="true"></span>Forgot Password?</label>
					<article>
						<form action="codes/reset-request.php" method="post">
							<h3 class="legend last">Reset Password</h3>
							<p class="para-style">Enter your email address below and we'll send you an email with instructions.</p>
							<p class="para-style-2"><strong>Note:</strong> Use the email address you used to register your account.</p>

							<div class="input">
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<input type="email" placeholder="Email" name="email" id="email" required />
							</div>
							<!-- <span style="float:left;font-weight:bold; font-size:15px;margin-bottom:3px;"><input type="checkbox" name="isAdminpw" id="isAdminpw" value="admin" /> <small>Admin</small></span> -->
							<input type="submit"  class="btn submit last-btn" style="background-color: #824d1b;" value="Reset" required>
						</form>
					</article>
				</div>


			</div>
			<!-- //vertical tabs -->
			<!-- <div class="clear"></div> -->
		</div>
		<!-- copyright -->
		<div class="copyright" hidden>
			<h2>&copy; 2019 Triple Forms. All rights reserved | Design by
				<a href="http://w3layouts.com" target="_blank">W3layouts</a>
			</h2>
		</div>


		<!-- //copyright -->
	</div>

<!-- 
	<script type="text/javascript">
		var val=$("#isAdmin").val();
		$("#isAdmin").click(function() {
			alert(val);
		});
	</script> -->



	<?php
	require_once('includes/scripts.php');

	?>
</body>

</html>