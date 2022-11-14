<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
	header('location:index.php');
}
$msg = "";
if (isset($_GET['login'])) {
	$msg = "Invalid Username or Password!";
}

if (isset($_GET['newpwd'])) {
    if ($_GET['newpwd'] == "empty") {
        $_SESSION['status'] = "Oops!";
        $_SESSION['msg'] = "Insufficient Data!";
        $_SESSION['status_code'] = "warning";

    } elseif ($_GET['newpwd'] == "mismatched") {
        $_SESSION['status'] = "Oops!";
        $_SESSION['msg'] = "Passwords did not match.";
        $_SESSION['status_code'] = "warning";
    }
}



?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
	<title>Reset Password</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<!-- <meta n	ame="keywords" content="Triple Forms Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" /> -->
	
	 <!-- jquery -->
	 <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
	 <!-- ajax -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script>
		// addEventListener("load", function () {
		// 	setTimeout(hideURLbar, 0);
		// }, false);

		// function hideURLbar() {
		// 	window.scrollTo(0, 1);
		// }
	</script>
	
	<!-- Meta tag Keywords -->
	<link rel="shortcut icon" href="img/CSTA_SMALL.png" type="image/x-icon">
	<!-- css files -->
	<link rel="stylesheet" href="login_css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

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
		<h1>CSTA Student Portal</h1>
		<!-- //title -->
		<div class="sub-main-w3">
			<div class="image-style" hidden>

			</div>
			<!-- vertical tabs -->
			<?php
			$selector = $_GET['selector'];
			$validator = $_GET['validator'];
			$isAd= $_GET['ad'];

			if (empty($selector) || empty($validator)) {
				header("location:login.php");
			} else {
				if (ctype_digit($selector) !== false && ctype_digit($validator) !== false) {
				}


			?>


				<article>
					<form action="codes/reset-password.php" method="post">
						<h3 class="legend">Create your new password</h3>

						<input type="hidden" name="selector" value="<?php echo $selector ?>">
						<input type="hidden" name="validator" value="<?php echo $validator ?>">
						<input type="hidden" name="isAdm" value="<?php echo $isAd ?>">

						<div class="input">
							<span class="fa fa-key" aria-hidden="true"></span>
							<input type="password" placeholder="Password" name="pwd" id="pwd" required />
						</div>
						<div class="input">
							<span class="fa fa-key" aria-hidden="true"></span>
							<input type="password" placeholder="Confirm Password" name="pwd-repeat" id="pwd-repeat" required />
						</div>
						<center><span><p id="length" ></p><p id="message" ></p></span></center>
						
						<input type="submit" id ="btn" class="btn submit" style="background-color: #824d1b;" value="Reset Password">
					</form>
				</article>

			<?php
			}
			?>

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

</body>



</html>
<script type="text/javascript">
	   //PASSWORD VALIDATION
	   
$('#pwd, #pwd-repeat').on('keyup', function() {

if ($('#pwd').val() == "" && $('#pwd-repeat').val() == "") {
	$('#message').html('');
	$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
} else {

	if ($('#pwd').val().length <= 7) {
		$('#length').html('Weak Password').css('color', 'red');
		$('#length').html('Weak Password').css('font-weight', 'bold');
		$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
	} else if ($('#pwd').val().length = 0) {
		$('#length').html('');
		$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
	} else {
		$('#length').html('Great!').css('color', 'green');
		$('#length').html('Great!').css('font-weight', 'bold');
	}
}

if ($('#pwd').val() == "" && ($('#pwd-repeat').val() == "")) {
	$('#length').html('');
	$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
} else if ($('#pwd-repeat').val() == "") {
	$('#message').html('');
	$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
} else if ($('#pwd').val() == $('#pwd-repeat').val()) {
	$('#message').html('Passwords Matched!').css('color', 'green');
	$('#message').html('Passwords Matched!').css('font-weight', 'bold');
	$('#btn').css({'opacity':'1', 'pointer-events':'auto'});
} else {
	$('#message').html("Passwords did not Match!").css('color', 'red');
	$('#message').html("Passwords did not Match!").css('font-weight', 'bold');
	$('#btn').css({'opacity':'0.5', 'pointer-events':'none'});
}
});

</script>