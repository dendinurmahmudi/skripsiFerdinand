<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/templates/') ?>plugins/images/favicon.png">
	<title><?= $judul ?></title>
	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('assets/templates/') ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Menu CSS -->
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<!-- moris -->
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- chartist CSS -->
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
	<!-- Vector CSS -->
	<link href="<?= base_url('assets/templates/') ?>plugins/bower_components/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<!-- animation CSS -->
	<link href="<?= base_url('assets/templates/') ?>css/animate.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?= base_url('assets/templates/') ?>css/style.css" rel="stylesheet">
	<!-- color CSS -->
	<link href="<?= base_url('assets/templates/') ?>css/colors/default.css" id="theme" rel="stylesheet">
	<link href="<?= base_url('assets/templates/') ?>mystyle.css" id="theme" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
	<!-- ============================================================== -->
	<!-- Preloader -->
	<!-- ============================================================== -->
	<div class="preloader">
		<svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
		</svg>
	</div>
	<!-- ============================================================== -->
	<!-- Wrapper -->
	<!-- ============================================================== -->
	<div id="wrapper">
		<!-- ============================================================== -->
		<!-- Topbar header - style you can find in pages.scss -->
		<!-- ============================================================== -->
		<nav class="navbar navbar-default navbar-static-top m-b-0">
			<div class="navbar-header">
				<div class="top-left-part">
					<!-- Logo -->
					<a class="logo" href="#">
						<!-- Logo icon image, you can use font-icon also --><b>
							<!--This is dark logo icon--><img src="<?= base_url('assets/templates/') ?>plugins/images/admin-logo.png" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="<?= base_url('assets/templates/') ?>plugins/images/admin-logo-dark.png" alt="home" class="light-logo" />
						</b>
						<span class="hidden-xs">
								<h4 class="dark-logo"><marquee scrolldelay="200">SMK P Teknologi</marquee></h4>
							<h4 alt="home" class="light-logo"><marquee scrolldelay="200">SMK P Teknologi</marquee></h4>
						</span> </a>
						
					</div>
					<!-- /Logo -->
					<!-- Search input and Toggle icon -->
					<ul class="nav navbar-top-links navbar-left">
						<li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
						<li class="dropdown">
							<a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
								<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
							</a>
							<ul class="dropdown-menu mailbox animated bounceInDown">
								<li>
									<div class="drop-title">You have 4 new messages</div>
								</li>
								<li>
									<div class="message-center">
										<a href="#">
											<div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
											<div class="mail-contnet">
												<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
											</a>
											<a href="#">
												<div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
												<div class="mail-contnet">
													<h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
												</a>
												<a href="#">
													<div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
													<div class="mail-contnet">
														<h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
													</a>
													<a href="#">
														<div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
														<div class="mail-contnet">
															<h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
														</a>
													</div>
												</li>
												<li>
													<a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
												</li>
											</ul>
										</li>
									</ul>
									<ul class="nav navbar-top-links navbar-right pull-right">
										<li>
											<form role="search" class="app-search hidden-sm hidden-xs m-r-10">
												<input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
											</li>
											<li class="dropdown">
												<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?= base_url('assets/data_file/foto_profile/'.$foto) ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= $nama ?></b><span class="caret"></span> </a>
												<ul class="dropdown-menu dropdown-user animated flipInY">
													<li>
														<div class="dw-user-box">
															<div class="u-img"><img src="<?= base_url('assets/data_file/foto_profile/'.$foto) ?>" alt="user" /></div>
															<div class="u-text">
																<h4><?= $nama ?></h4>
																<p class="text-muted"><?= $email ?></p><a href="<?= base_url('Auth/viewgantipass/'.$nama.'/'.$id) ?>" title="Ganti Password"class="btn btn-rounded btn-danger btn-sm">Ganti Password</a></div>
															</div>
														</li>
													</ul>
													<!-- /.dropdown-user -->
												</li>
												<!-- /.dropdown -->
											</ul>
										</div>
										<!-- /.navbar-header -->
										<!-- /.navbar-top-links -->
										<!-- /.navbar-static-side -->
									</nav>
									