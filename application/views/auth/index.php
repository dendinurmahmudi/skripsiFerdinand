<?php  ?>
<!DOCTYPE html>  
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/templates/plugins/images/favicon.png') ?>">
	<title>Login</title>
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('assets/templates/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
	<!-- animation CSS -->
	<link href="<?= base_url('assets/templates/css/animate.css') ?>" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/templates/css/style.css') ?>" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?= base_url('assets/templates/css/colors/default.css') ?>" id="theme"  rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<!-- Preloader -->
	<div class="preloader">
		<div class="cssload-speeding-wheel"></div>
	</div>
	<section id="wrapper" class="new-login-register">
		<div class="lg-info-panel">
			<div class="inner-panel">
				<a href="javascript:void(0)" class="p-20 di"><img src="<?= base_url('assets/templates/plugins/images/admin-logo.png') ?>"></a>
			</div>
		</div>
		<div class="new-login-box">
			<div class="white-box">
				<h3 class="box-title m-b-0">Login</h3>
				<form class="form-horizontal new-lg-form" id="loginform" action="<?= base_url('Auth') ?>" method="post">
					<div >
					<?= $this->session->flashdata('pesan'); ?>
					</div>
					<div class="form-group  m-t-20">
						<div class="col-xs-12">
							<label>NIS/NIP</label>
							<input class="form-control" type="text" placeholder="NIS/NIP" name="nis">
						</div>
						<?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="col-xs-12">
							<label>Password</label>
							<input class="form-control" type="password" placeholder="Password" name="password">
						</div>
						<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
					</div>
					<div class="form-group">
						<div class="col-md-12">
							<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
						</div>
						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
							</div>
						</div>
					</form>
					<form class="form-horizontal" id="recoverform" action="index.html">
						<div class="form-group ">
							<div class="col-xs-12">
								<h3>Recover Password</h3>
								<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
							</div>
						</div>
						<div class="form-group ">
							<div class="col-xs-12">
								<input class="form-control" type="text" required="" placeholder="Email">
							</div>
						</div>
						<div class="form-group text-center m-t-20">
							<div class="col-xs-12">
								<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
							</div>
						</div>
					</form>
				</div>
			</div>            


		</section>
		<!-- jQuery -->
		<script src="<?= base_url('assets/templates/plugins/bower_components/jquery/dist/jquery.min.js') ?>"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?= base_url('assets/templates/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
		<!-- Menu Plugin JavaScript -->
		<script src="<?= base_url('assets/templates/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>

		<!--slimscroll JavaScript -->
		<script src="<?= base_url('assets/templates/js/jquery.slimscroll.js') ?>"></script>
		<!--Wave Effects -->
		<script src="<?= base_url('assets/templates/js/waves.js') ?>"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?= base_url('assets/templates/js/custom.min.js') ?>"></script>
		<!--Style Switcher -->
		<script src="<?= base_url('assets/templates/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') ?>"></script>
	</body>
	</html>
