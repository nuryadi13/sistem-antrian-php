<?php 
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title p-b-26">
						Create Account
					</span>

					<div class="wrap-input100 validate-input" data-validate="Enter Name">
					<span class="focus-input100">name</span><br>
						<input class="input100" type="text" name="nama">
					</div>

					<div class="wrap-input100 validate-input">
					<span class="focus-input100">username</span><br>
						<input class="input100" type="text" name="username">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<span class="focus-input100">password</span><br>
						<input class="input100" type="password" name="password">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter Phone Number">
					<span class="focus-input100">handphone</span><br>
						<input class="input100" type="tel" name="hp">
                        <input class="input100" type="hidden" name="akses" value="orang tua">
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="submit">
								Sign Up
							</button>
						</div>
					</div>
					<div class="text-center p-t-115">
						<span class="txt1">
							 have an account?
						</span>

						<a class="txt2" href="index.php">
							Sign In
						</a><br>
					</div>
				</form>
				<?php 
				if (isset($_POST['submit'])) {
					$nama = mysqli_escape_string($conn,$_POST['nama']);
					$username = mysqli_escape_string($conn,$_POST['username']);
					$password = mysqli_escape_string($conn,$_POST['password']);
					$hp = mysqli_escape_string($conn,$_POST['hp']);
					$akses = mysqli_escape_string($conn,$_POST['akses']);

					$password = md5($password);
					$validasi=$conn->query("SELECT * FROM tb_login WHERE username='$username'");
					$q_validasi=$validasi->fetch_assoc();
					if ($nama == '' || $username == '' || $password == '' || $hp == '' || $akses == '') {
						echo "<script>alert('Harap isi semua data');</script>";
					}
					else if ($q_validasi==TRUE) {
						echo "<script>alert('Email telah terdaftar');</script>";
					}
					else if ($q_validasi != TRUE){
						$query=$conn->query("INSERT INTO tb_login(nama,username,password,hp,akses) VALUES('$nama','$username','$password','$hp','$akses')");
						if ($query) {
							echo "<br>";
							echo "<div class='alert alert-info'>Sign Up Succeeded</div>";
							echo "<meta http-equiv='refresh' content='1;url=index.php'>";
							// echo "<script>alert('Registrasi Sukses');</script>";
							// header("refresh: 0.1, url=login.php");
						}
						else{
							// echo "<script>alert('Registrasi Gagal');</script>";
							// header("refresh: 0.1, url=login.php");
							echo "<br>";
							echo "<div class='alert alert-danger'>Sign Up Failed</div>";
							echo "<meta http-equiv='refresh' content='1;url=index.php'>";
						}
					}
				}
				?>
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