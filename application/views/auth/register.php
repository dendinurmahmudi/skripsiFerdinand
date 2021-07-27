<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Form Login</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/images/favicon.ico"/>
	<link rel="stylesheet" href="<?= base_url('Assets/plugins/fontawesome-free/css/all.min.css')  ?>">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url('Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url('Assets/dist/css/adminlte.min.css') ?>">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>SI Akademik</a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<p class="login-box-msg">Silahkan Registrasi</p>

				<form action="<?= base_url('Auth/pendaftaran') ?>" method="post">
					<div >
					<?= $this->session->flashdata('pesan'); ?>
					</div>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="NIS" name="id" value="<?= set_value('id'); ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('id', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?= set_value('nama'); ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Tempat dan Tanggal Lahir" name="ttl" value="<?= set_value('ttl'); ?>">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password1">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Register</button>
						</div>
						<!-- /.col -->
					</div>
				</form>

				<!-- <div class="social-auth-links text-center mb-3">
					<p>- OR -</p>
					<a href="#" class="btn btn-block btn-primary">
						<i class="fab fa-facebook mr-2"></i> Sign in using Facebook
					</a>
					<a href="#" class="btn btn-block btn-danger">
						<i class="fab fa-google-plus mr-2"></i> Sign in using Google+
					</a>
				</div>
				<!-- /.social-auth-links -->

				<!-- <p class="mb-1">
					<a href="forgot-password.html">I forgot my password</a>
				</p>
				<p class="mb-0">
					<a href="register.html" class="text-center">Register a new membership</a>
				</p>
			</div> --> 
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?= base_url('Assets/plugins/jquery/jquery.min.js') ?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?= base_url('Assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url('Assets/dist/js/adminlte.min.js') ?>"></script>
</body>
</html>
