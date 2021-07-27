<?php  ?>
<div class="row">
	<div class="col-sm-12">
		<div>
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<a href="#" data-toggle="modal" class="btn btn-info m-b-30" data-target="#tambahmapel" title="Tambah data Alumni"><i class="fa fa-plus-circle"></i> Tambah Mapel</a>
		<div class="white-box">
			<p class="text-muted m-b-30">Excel, PDF & Print</p>
			<div class="table-responsive">
				<table class="example23 display nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>kode Mapel</th>
							<th>Nama Mapel</th>
							<th>Jumlah pengajar</th>
							<th class="text-nowrap">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datamapel as $m) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $m['id_mapel'] ?></td>
								<td><?= $m['nama_mapel'] ?></td>
								<td><?= $m['jumlah'] ?></td>
								<td class="text-nowrap">
									<a href="<?= base_url('Admin/hapusmapel/'.$m['id_mapel']) ?>" onclick="return confirm('Yakin hapus mapel <?= $m['nama_mapel'] ?> ?');" title="Hapus"> <i class="fa fa-trash text-inverse fa-fw"></i> </a>
									<a href="#" data-toggle="modal" title="Edit" data-target="#editmapel<?=$m['id_mapel'] ?>"> <i class="fa fa-pencil text-inverse"></i> </a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="tambahmapel" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Mapel</h4> </div>
				<div class="modal-body">
					<div class="white-box">
						<form action="<?= base_url('Admin/tambahmapel') ?>" enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="form-group col-sm-12">
									Tambah Mapel
									<input type="text" name="namamapel" class="form-control" placeholder="Tambah Mata Pelajaran Baru" required>
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
<?php foreach ($datamapel as $m) { ?>
	<div id="editmapel<?=$m['id_mapel'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Edit Jurusan</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<form action="<?= base_url('Admin/editmapel') ?>" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="form-group col-sm-12">
										Edit Jurusan
										<input type="hidden" name="idmapel" value="<?=$m['id_mapel'] ?>">
										<input type="text" name="namamapel" class="form-control" placeholder="Masukan mata pelajaran" required value="<?= $m['nama_mapel'] ?>">
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