<?php  ?>
<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav slimscrollsidebar">
		<div class="sidebar-head">
			<h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
			<ul class="nav" id="side-menu">
				<li> <a href="/admin" class="waves-effect m-l-10"><i class="fa fa-dashboard fa-fw" data-icon="v"></i> Dashboard</a> </li>
				<li> <a href="<?= base_url('Admin/index') ?>" class="m-l-10 m-t-10"><i class="fa fa-dashboard fa-fw" data-icon="v"></i> Beranda</a> </li>
				<li> <a href="<?= base_url('Admin/datajurusan') ?>" class="m-l-10"><i class="fa fa-arrows fa-fw" data-icon="v"></i> Data Jurusan</a> </li>
				<li> <a href="<?= base_url('Admin/datamapel') ?>" class="m-l-10"><i class="fa fa-clipboard fa-fw" data-icon="v"></i> Data Mapel</a> </li>
				<li><a href="#" class="m-l-10 m-t-10"><i class="fa fa-group fa-fw" data-icon="v"></i> <span class="hide-menu"> Data Siswa <span class="fa arrow"></span> <span class="label label-rouded label-inverse pull-right">5</span></span></a>

					<ul class="nav nav-second-level" aria-expanded="true">
						<li>
							<a href="<?= base_url('Admin/kelolasiswa') ?>"><i class="ti-user fa-fw">
							</i><span class="hide-menu">Kelola siswa</span></a>
						</li>
						<li>
							<a href="<?= base_url('Admin/datakelas/10') ?>"><i class="ti-user fa-fw">
							</i><span class="hide-menu">Kelas X</span></a>
						</li>
						<li>
							<a href="<?= base_url('Admin/datakelas/11') ?>"><i class="ti-user fa-fw">
							</i><span class="hide-menu">Kelas XI</span></a>
						</li>
						<li>
							<a href="<?= base_url('Admin/datakelas/12') ?>"><i class="ti-user fa-fw">
							</i><span class="hide-menu">Kelas XII</span></a>
						</li>
						<li>
							<a href="<?= base_url('Admin/datathnlulus') ?>"><i class="ti-user fa-fw">
							</i><span class="hide-menu">Lulusan</span></a>
						</li>
					</ul>
				</li>
				<li> <a href="<?= base_url('Admin/datapegawai') ?>" class="m-l-10"><i class="fa fa-user fa-fw" data-icon="v"></i> Data Pegawai</a> </li>
				<li> <a href="<?= base_url('Auth/logout') ?>" class="m-l-10"><i class="fa fa-sign-out fa-fw" data-icon="v"></i> Logout</a> </li>
			</ul>
		</div>
	</div>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row bg-title">
				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
					<h4 class="page-title"><?= $judul ?></h4> </div>
					<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
						<ol class="breadcrumb">
							<li><a href="<?= base_url('Admin/index') ?>">Dashboard</a></li>
							<li class="active"><?= $judul ?></li>
						</ol>
					</div>
					<!-- /.col-lg-12 -->
				</div>