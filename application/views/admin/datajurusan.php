<div class="row">
	<div class="col-sm-12">
		<?= $this->session->flashdata('pesan'); ?>

		<div class="col-sm-12">
			<a href="#" data-toggle="modal" data-target="#datajurusan" title="Data Jurusan" class="btn btn-info m-b-30 m-r-20"><i class="fa fa-sitemap"></i> Data Jurusan</a>
		</div>
		<?php foreach ($jumlahjurusan as $j) { ?>
			<a href="<?= base_url('Admin/datasiswa/'.$j['id_jurusan'].'/0/0') ?>">
				<div class="col-sm-3">
					<div class="white-box">
						<?php 
						if($j['id_jurusan'] == '1'){
							$namajurusan = 'TKJ';
							?>
							<h3 class="box-title"><?= $namajurusan ?></h3>
						<?php }else{ ?>
							<h3 class="box-title"><?= $j['nama_jurusan'] ?></h3>
						<?php } ?>
						<ul class="list-inline m-t-30 p-t-10 two-part">
							<li><i class="icon-people text-info"></i></li>
							<li class="text-right"><span class="counter"><?= $j['jumlah'] ?></span></li>
						</ul>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
	<div id="datajurusan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Data Jurusan</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<a href="#" data-toggle="modal" data-target="#tambahjurusan" title="Tambah data Jurusan"><i class="fa fa-plus-circle m-b-10"></i> Tambah Jurusan</a>
							<div class="table-responsive" id="table">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Jurusan</th>
											<th>Kode Jurusan</th>
											<th class="text-nowrap">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$no=1;
										foreach($datajurusan as $j){ ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $j['nama_jurusan'] ?></td>
												<td><?= $j['kd_jurusan'] ?></td>
												<td class="text-nowrap">
													<a href="<?= base_url('Admin/hapusjurusan/').$j['id_jurusan'] ?>" onclick="return confirm('Yakin hapus jurusan <?= $j['nama_jurusan'] ?> ?');" title="Hapus"> <i class="fa fa-trash text-inverse fa-fw"></i> </a>
													<a href="#" data-toggle="modal" title="Edit" data-target="#editjurusan<?=$j['id_jurusan'] ?>"> <i class="fa fa-pencil text-inverse"></i> </a>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="tambahjurusan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Jurusan</h4> </div>
				<div class="modal-body">
					<div class="white-box">
						<form action="<?= base_url('Admin/tambahjurusan') ?>" enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="form-group col-sm-12">
									<input type="text" name="namajurusan" class="form-control" placeholder="Nama Jurusan" required>
								</div>
								<div class="form-group col-sm-12">
									<input type="text" name="kodejurusan" class="form-control" placeholder="Kode Jurusan" required>
								</div>
							</div>
							<div class="col-sm-12 col-xs-12">
								<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php foreach ($datajurusan as $j) { ?>
	<div id="editjurusan<?=$j['id_jurusan'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Edit Jurusan</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<form action="<?= base_url('Admin/editjurusan') ?>" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="form-group col-sm-12">
										<input type="hidden" name="idjurusan" value="<?=$j['id_jurusan'] ?>">
										<input type="text" name="namajurusan" class="form-control" placeholder="Masukan nama jurusan" required value="<?= $j['nama_jurusan'] ?>">
									</div>
									<div class="form-group col-sm-12">
										<input type="hidden" name="idjurusan" value="<?=$j['id_jurusan'] ?>">
										<input type="text" name="kodejurusan" class="form-control" placeholder="Masukan nama jurusan" required value="<?= $j['kd_jurusan'] ?>">
									</div>
								</div>
								<div class="col-sm-12 col-xs-12">
									<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>