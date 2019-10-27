<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title?></title>
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
			<div class="wrap-login200 p-l-50 p-r-50 p-t-77 p-b-30">

				<form class="" method="post" action="<?php echo base_url('auth/register') ?>">
					<span class="login100-form-title p-b-55">
						Registrasi
					</span>
					
					<div class="row">
						<div class="col-md-6">
							<div class="wrap-input100 validate-input m-b-16">
								<input class="input100" type="text" name="nama_depan" placeholder="Nama Depan" autofocus="" value="<?php echo set_value('nama_depan') ?>">
								<?php echo form_error('nama_depan', '<small class="text-danger">', '</small>') ?>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<span class="lnr lnr-user"></span>
								</span>
							</div>
						</div>		

						<div class="col-md-6">
							<div class="wrap-input100 validate-input m-b-16">
								<input class="input100" type="text" name="nama_belakang" placeholder="Nama Belakang" autofocus="" value="<?php echo set_value('nama_belakang') ?>">
								<?php echo form_error('nama_belakang', '<small class="text-danger">', '</small>') ?>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<span class="lnr lnr-user"></span>
								</span>
								<?php echo form_error('nama_belakang', '<small class="text-danger">', '</small>' ) ?>
							</div>
						</div>	
					</div>

					
					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="text" name="email" placeholder="Email" autocomplete="off" autofocus="" value="<?php echo set_value('email') ?>">
						<?php echo form_error('email', '<small class="text-danger">', '</small>') ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password1" placeholder="Password" autocomplete="off">
						<?php echo form_error('password1', '<small class="text-danger">', '</small>' ) ?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16">
						<input class="input100" type="password" name="password2" placeholder="Konfirmasi Password" autocomplete="off">
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
						Sudah Punya Akun? <a href="<?php echo base_url('auth/login') ?>"> Login di sini!</a>
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