<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!-- Favicons -->
    <link href="<?php echo base_url() ?>assets/images/logo.png" rel="icon">
    <link href="<?php echo base_url() ?>assets/images/logo.png" rel="apple-touch-icon"><!--===============================================================================================-->
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
				<!-- action="<?php echo base_url('admin/auth/register') ?>" -->
				<form method="post">
					<span class="login100-form-title p-b-55">
						Register User
					</span>
					
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="nama" placeholder="Nama" autofocus="" value="<?php echo set_value('nama') ?>">
						<?php echo form_error('nama', '<small class="text-danger">', '</small>') ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
						<?php echo form_error('name', '<small class="text-danger">', '</small>' ) ?>
					</div>
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="email" placeholder="Email" autofocus="" value="<?php echo set_value('email') ?>">
						<?php echo form_error('email', '<small class="text-danger">', '</small>') ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password1" placeholder="Password">
						<?php echo form_error('password1', '<small class="text-danger">', '</small>' ) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					
					<div class="container-login100-form-btn p-t-25">
						<button class="login100-form-btn" type="submit">
							Registrasi
						</button>
					</div>
					<div class="text-center p-t-25">
						Sudah Punya Akun? Login di <a href="<?php echo base_url('admin/auth/login') ?>">sini!</a>
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