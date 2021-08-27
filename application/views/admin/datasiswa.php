<div class="row">
	<div class="col-sm-12">
		<div>
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<div class="white-box">
			<p class="text-muted m-b-30">Excel, PDF & Print</p>
			<div class="table-responsive">
				<table class="example23 display nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nis</th>
							<th>Nama</th>
							<th>Tempat Tgl Lahir</th>
							<th>Email</th>
							<th>Kelas</th>
							<th class="text-nowrap">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datasiswa as $s) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $s['nis'] ?></td>
								<td><?= $s['nama'] ?></td>
								<td><?= $s['tlahir'].', '.$s['ttl'] ?></td>
								<td><?= $s['email'] ?></td>
								<td><?= $s['kelas'].' '.$s['kd_jurusan'].' '.$s['detail_kelas'] ?></td>
								<td class="text-nowrap">
									<a href="<?= base_url('Admin/hapussiswa/'.$s['nis'].'/'.$s['id_jurusan'].'/'.$s['kelas'].'/'.$s['detail_kelas']) ?>" onclick="return confirm('Yakin hapus data <?= $s['nama'] ?> ?');" title="Hapus"> <i class="fa fa-trash text-inverse fa-fw"></i> </a>
									<a href="#" data-toggle="modal" title="Edit" data-target="#edit<?= $s['nis'] ?>"> <i class="fa fa-pencil text-inverse fa-fw"></i> </a>
									<a href="<?= base_url('Admin/datanilai/'.$s['nis']) ?>" title="Lihat nilai"> <i class="fa fa-eye text-inverse"></i> </a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php foreach($datasiswa as $s){ ?>
	<div id="edit<?= $s['nis'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Edit Alumni</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<form action="<?= base_url('Admin/editsiswa') ?>" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="form-group col-sm-12">
										<input type="hidden" name="nis" value="<?= $s['nis'] ?>">
										<label for="nama">Nama :</label>
										<input type="text" class="form-control" id="nama" name="nama" value="<?= $s['nama'] ?>" >
									</div>
									<div class="form-group col-sm-6">
										<label class="m-t-5">Tempat Lahir :</label>
										<input type="text" class="form-control" id="email" name="tlahir" value="<?= $s['tlahir'] ?>">
									</div>
									<div class="form-group col-sm-6">
										<label class="m-t-5">Tanggal Lahir :</label>
										<input type="date" class="form-control" id="email" name="ttl" value="<?= $s['ttl'] ?>">
									</div>
									<div class="form-group col-sm-12">
										<label class="m-t-5">Email :</label>
										<input type="text" class="form-control" id="email" name="email" value="<?= $s['email'] ?>">
									</div>
									<div class="form-group col-sm-4">
										<label class="m-t-5" for="kelas">Kelas :</label>
										<select class="form-control" name="kelas" >
											<option value="<?= $s['kelas'] ?>"><?= $s['kelas'] ?></option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label for="exampleInputEmail1">Jurusan :</label>
										<select class="form-control" name="jurusan" >
											<option value="<?= $s['id_jurusan'] ?>"><?= $s['kd_jurusan'] ?></option>
											<?php foreach ($datajurusan as $j) {?>
												<option value="<?=$j['id_jurusan']?>"><?=$j['kd_jurusan']?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label class="m-t-5" for="kelas">Detail Kelas :</label>
										<input type="text" class="form-control" name="detailkelas" value="<?= $s['detail_kelas'] ?>">
									</div>
									<div class="col-sm-12 col-xs-12">
										<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
									</form>
									<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>