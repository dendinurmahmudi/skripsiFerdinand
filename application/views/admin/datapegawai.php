<?php  ?>
<div class="row">
	<div class="col-sm-12">
		<div>			
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<a href="#" data-toggle="modal" class="btn btn-info m-b-30" data-target="#tambahguru" title="Tambah data Pegawai"><i class="fa fa-plus-circle"></i> Tambah Pegawai</a>
		<div class="white-box">
			<p class="text-muted m-b-30">Excel, PDF & Print</p>
			<div class="table-responsive">
				<table class="example23 display nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Nip</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Status</th>
							<th>Pengajar</th>
							<th class="text-nowrap">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datapegawai as $g) { ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $g['nip'] ?></td>
								<td><?= $g['nama'] ?></td>
								<td><?= $g['email'] ?></td>
								<?php if($g['status'] == 1){
									$status = 'Guru';
								}else{
									$status = 'Admin';
								} ?>
								<td><?= $status ?></td>
								<td><?= $g['nama_mapel'] ?></td>
								<td class="text-nowrap">
									<a href="<?= base_url('Admin/hapuspegawai/'.$g['nip']) ?>" onclick="return confirm('Yakin hapus data <?= $g['nama'] ?> ?');" title="Hapus"> <i class="fa fa-trash text-inverse fa-fw"></i> </a>
									<a href="#" data-toggle="modal" title="Edit" data-target="#edit<?= $g['nip'] ?>"> <i class="fa fa-pencil text-inverse fa-fw"></i> </a>
									<a href="<?= base_url('Admin/datakelasajar/'.$g['nip']) ?>" title="Kelas Ajar"> <i class="fa fa-eye text-inverse"></i> </a>
								</td>
							</tr>
						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div id="tambahguru" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Tambah Guru</h4> </div>
				<div class="modal-body">
					<div class="white-box">
						<form action="<?= base_url('Admin/tambahpegawai') ?>" enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="form-group col-sm-12">
									<label for="nisn">Nip</label>
									<input type="text" name="nip" class="form-control" placeholder="Nip" required>
								</div>
								<div class="form-group col-sm-12">
									<label for="namalengkap">Nama Lengkap</label>
									<input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" required>
								</div>
								<div class="form-group col-sm-12">
									<label for="email">Email</label>
									<input type="text" name="email" class="form-control" placeholder="Email@contoh.com" required>
								</div>
								<div class="form-group col-sm-12">
									<label for="exampleInputEmail1">Status :</label>
									<select class="form-control" name="status1" >
										<option value="1">Guru</option>
										<option value="2">Admin</option>
									</select>
								</div>
								<div class="form-group col-sm-12">
									<label for="kdmapel">Pengajar :</label>
									<select class="form-control" name="kdmapel" >
										<option value="0">Pilih pelajaran</option>
										<?php foreach ($datapelajaran as $p) { ?> 
											<option value="<?= $p['id_mapel'] ?>"><?= $p['nama_mapel'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-sm-12">
									<label for="kdmapel">Mengajar kelas :</label>
								</div>
								<div class="form-group col-sm-4">
									<label for="email">Kelas</label>
									<select class="form-control" name="kelas" >
										<option value="0">Pilih kelas</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label for="kdmapel">Jurusan :</label>
									<select class="form-control" name="jurusan" >
										<option value="0">Pilih Jurusan</option>
										<?php foreach ($datajurusan as $j) { ?> 
											<option value="<?= $j['id_jurusan'] ?>"><?= $j['kd_jurusan'] ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="form-group col-sm-4">
									<label for="email">Detail Kelas</label>
									<input type="text" name="detailkelas" class="form-control" placeholder="Contoh : 1/2/3" required>
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
<?php foreach($datapegawai as $g){ ?>
	<div id="edit<?= $g['nip'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Edit Pegawai</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<form action="<?= base_url('Admin/editpegawai') ?>" enctype="multipart/form-data" method="post">
								<div class="row">
									<div class="form-group col-sm-12">
										<input type="hidden" name="nip" value="<?= $g['nip'] ?>">
										<label for="nama">Nama :</label>
										<input type="text" class="form-control" id="nama" name="nama" value="<?= $g['nama'] ?>" >

										<label class="m-t-5" for="email">Email :</label>
										<input type="text" class="form-control" id="email" name="email" value="<?= $g['email'] ?>">

										<label for="exampleInputEmail1">Pengajar :</label>
										<select class="form-control" name="kdmapel" >
											<option value="<?= $g['id_mapel'] ?>"><?= $g['nama_mapel'] ?></option>
											<?php foreach ($datapelajaran as $p) { ?> 
												<option value="<?= $p['id_mapel'] ?>"><?= $p['nama_mapel'] ?></option>
											<?php } ?>
										</select>

										<label for="exampleInputEmail1">Status :</label>
										<select class="form-control" name="status1" >
											<?php if($g['status'] == 1){
												$status = 'Guru';
											}else{
												$status = 'Admin';
											} ?>
											<option value="<?= $g['status'] ?>"><?= $status ?></option>
											<option value="1">Guru</option>
											<option value="2">Admin</option>
										</select>
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
	