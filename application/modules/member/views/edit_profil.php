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
<style>
	select{
		border:none;
	}
</style>
<body>

	<div class="limiter">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8 mt-5">

					<span class="login100-form-title p-b-55">
						Update Profile
					</span>

					<div class="row">
						<div class="col-md-12">
							<?php $this->load->view('layouts/message'); ?>
						</div>
					</div>
					<form class="" method="post" action="<?php echo base_url('member/profile/update/'. $member['id']) ?>">	
						
						<div class="row">
							<div class="col-md-12">
								<div class="wrap-input100 validate-input m-b-16">
									<input type="hidden" name="id" value="<?php echo $member['id'] ?>">
									<input class="input100" type="text" name="nama_depan" placeholder="Nama Depan" autofocus="" value="<?php echo $member['nama_depan'] ?>" required>
									<?php echo form_error('nama_depan', '<small class="text-danger">', '</small>' ) ?>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<span class="lnr lnr-user"></span>
									</span>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="wrap-input100 validate-input m-b-16">
									<input class="input100" type="text" name="nama_belakang" placeholder="Nama Belakang" autofocus="" value="<?php echo $member['nama_belakang'] ?>">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<span class="lnr lnr-user"></span>
									</span>
								</div>
							</div>		
						</div>
						
						<div class="row mb-3">
							<div class="col-md-12">
								<select class="input100" name="provinsi" id="propinsi_asal" required>

									<?php if (empty($user_province)) { ?>
										<option disabled selected value="">Pilih Provinsi</option>
									<?php } ?>
									
									<?php foreach ($user_province as $key => $value) { ?>
										<option value="<?php echo $value['province_id'] ?>"><?php echo $value['province'] ?></option>
									<?php } ?>

									<?php foreach ($province as $key => $value) {
										echo $value;
									} ?>
									
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<span class="lnr lnr-home"></span>
								</span>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-md-12">
								<select class="input100" name="kabupaten" id="kabupaten" required>
									<option value="<?php echo $user_kabupaten[0]['city_id'] ?>"><?php echo $user_kabupaten[0]['city_name'] ?></option>
								</select>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<span class="lnr lnr-home"></span>
								</span>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-md-12">
								<input class="input100" type="text" name="kecamatan" placeholder="Tulis Kecamatan Anda" value="<?php echo $member['kecamatan'] ?>" required>
								<?php echo form_error('alamat', '<small class="text-danger">', '</small>') ?>
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<span class="lnr lnr-home"></span>
								</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="wrap-input100 validate-input m-b-16">
									<input class="input100" type="text" name="alamat" placeholder="Alamat Pengiriman" value="<?php echo $member['alamat'] ?>" required>
									<?php echo form_error('alamat', '<small class="text-danger">', '</small>') ?>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<span class="lnr lnr-home"></span>
									</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="wrap-input100 validate-input m-b-16">
									<input class="input100" type="text" name="telp" placeholder="Nomor Telephone"  value="<?php echo $member['telp'] ?>" required>
									<?php echo form_error('telp', '<small class="text-danger">', '</small>' ) ?>
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<span class="lnr lnr-phone-handset"></span>
									</span>
								</div>
							</div>			
						</div>

						<div class="container-login100-form-btn p-t-25">
							<button class="login100-form-btn" type="submit">
								Ubah Profil
							</button>
						</div>
						<div class="text-center p-t-25">
							<a href="<?php echo base_url('member') ?>">Back to Home Page</a>
						</div>

					</form>
				</div>
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

	<script>
		$("#propinsi_asal").change(function(){
			//console.log($('#propinsi_asal').val())
			$.post("<?php echo base_url(); ?>member/profile/getKabupaten/" + $('#propinsi_asal').val(),function(res){

				$('#kabupaten').empty();
				$('#kabupaten').prepend(res);
			});
				
		});

	</script>

</body>
</html>