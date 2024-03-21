<?php 
include 'koneksi.php';   
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../asset/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../asset/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../asset/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form action="cek_login.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						User Login
					</span>
					<div class="wrap-input100 validate-input">
					<span class="focus-input100">username</span><br>
						<input class="input100" type="text" name="username">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<span class="focus-input100">username</span><br>
						<input class="input100" type="password" name="password">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Login
							</button>
						</div>
                        <span class="txt1">
						<br>	
                        Login Siswa ? &nbsp; 
						</span>
                        <a class="txt2" href="../loginsiswa/index.php">
						<br>	
                        Sign In
						</a>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="register.php">
							Sign Up
						</a><br>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="asset/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/bootstrap/js/popper.js"></script>
	<script src="asset/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="asset/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="asset/login/js/main.js"></script>

</body>
</html>