<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ganti Password | Member</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/img/logo.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/img/logo.png" rel="apple-touch-icon"><!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/template/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">

				<form class="login100-form" method="post" action="<?php echo base_url('auth/forgotpassword/changePassword') ?>">
					<span class="login100-form-title p-b-55">
						Change Password?
					</span>
					<div class="wrap-input100">
						<?php $this->load->view('layouts/message'); ?>	
					</div>


					<div class="wrap-input100 m-b-16">
						<input class="input100" type="Password" name="password1" placeholder="Masukkan Password Baru" autofocus="">
						<?php echo form_error('password1', '<small class="text-danger">', '</small>' ) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="wrap-input100 m-b-16">
						<input class="input100" type="Password" name="password2" placeholder="Ulangi Password Baru" autofocus="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Ubah Password
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	

<!--===============================================================================================-->	
	<script src="<?php echo base_url() ?>assets/template/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url() ?>assets/template/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/template/login/js/main.js"></script>

</body>
</html>