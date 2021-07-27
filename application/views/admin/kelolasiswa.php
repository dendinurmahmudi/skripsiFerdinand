<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<?= $this->session->flashdata('pesan'); ?>
			<!-- Nav tabs -->
			<ul class="nav customtab nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#a" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> Tambah siswa</span></a></li>
				<li role="presentation" class=""><a href="#b" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Kenaikan kelas 10</span></a></li>
				<li role="presentation" class=""><a href="#c" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Kenaikan kelas 11</span></a></li>
				<li role="presentation" class=""><a href="#d" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Kelulusan kelas 12</span></a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="a">
					<form action="<?= base_url('Admin/tambahsiswa') ?>" enctype="multipart/form-data" method="post">
						<div class="row">
							<div class="form-group col-sm-12">
								<label for="nis">Nis</label>
								<input type="text" name="nis" class="form-control" placeholder="Nisn" required value="<?= set_value('nis'); ?>">
								<?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group col-sm-12">
								<label for="namalengkap">Nama Lengkap</label>
								<input type="text" name="namalengkap" class="form-control" placeholder="Nama Lengkap" required value="<?= set_value('namalengkap'); ?>">
								<?= form_error('namalengkap', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group col-sm-12">
								<label for="namalengkap">Tempat Tgl Lahir</label>
								<input type="text" name="ttl" class="form-control" placeholder="Tempat Tgl Lahir" required value="<?= set_value('ttl'); ?>">
								<?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group col-sm-12">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" placeholder="Email@contoh.com" required value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							
							<div class="form-group col-sm-4">
								<label for="email">Kelas</label>
								<select class="form-control" name="kelas">
									<option value="0">Pilih kelas</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
								<?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group col-sm-4">
								<label for="kdmapel">Jurusan :</label>
								<select class="form-control" name="jurusan" >
									<option value="0">Pilih Jurusan</option>
									<?php foreach ($datajurusan as $j) { ?> 
										<option value="<?= $j['id_jurusan'] ?>"><?= $j['nama_jurusan'] ?></option>
									<?php } ?>
								</select>
								<?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group col-sm-4">
								<label for="email">Detail Kelas</label>
								<input type="text" name="detailkelas" class="form-control" placeholder="Contoh : 1/2/3" required value="<?= set_value('detailkelas'); ?>">
								<?= form_error('detailkelas', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						</div>
						<input type="submit" class="btn btn-success" name="simpan" value="Simpan">
					</form>
				</div>

				<div role="tabpanel" class="tab-pane fade" id="b">
					<div class="table-responsive">
						<form action="<?= base_url('Admin/updatekelas') ?>" enctype="multipart/form-data" method="post">
							<table class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="6" class="text-center">Data kelas X</th>
										<th colspan="2" class="text-center">Status</th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nis</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Naik Kelas</th>
										<th>Tinggal Kelas</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i=0;
									$no=1;
									foreach ($datasiswakelas10 as $d10) {
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $d10['nis'] ?></td>
											<td><?= $d10['nama'] ?></td>
											<td><?= $d10['email'] ?></td>
											<td><?= $d10['kelas'] ?></td>
											<td><?= $d10['nama_jurusan'] ?></td>
											<td>
												<div class='radio radio-success'>
													<input type="radio" id="A<?= $i ?>" <?= 'name="status['.$i.']" '?> value="1" placeholder="" checked> <label for="A<?= $i ?>"> Naik Kelas</label>
												</div>
											</td>
											<td><div class='radio radio-danger'>
												<input type="radio" id="B<?= $i ?>" <?= 'name="status['.$i.']" '?> value="0" placeholder=""> <label for="B<?= $i ?>"> Tidak Naik</label>
											</div>
										</td>
										<input type="hidden" <?= 'name="nis['.$i.']" '?> value="<?= $d10['nis'] ?>">
										<input type="hidden" name="lulus" value="belum lulus">
									</tr>
									<?php $i++; } ?>
								</tbody>
							</table>
							<input type="submit" class="btn btn-success pull-right" name="simpan" value="Simpan">
						</form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="c">
					<div class="table-responsive">
						<form action="<?= base_url('Admin/updatekelas') ?>" enctype="multipart/form-data" method="post">
							<table class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="6" class="text-center">Data kelas XI</th>
										<th colspan="2" class="text-center">Status</th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nis</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Naik Kelas</th>
										<th>Tinggal Kelas</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$j=0;
									$no=1;
									foreach ($datasiswakelas11 as $d11) {
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $d11['nis'] ?></td>
											<td><?= $d11['nama'] ?></td>
											<td><?= $d11['email'] ?></td>
											<td><?= $d11['kelas'] ?></td>
											<td><?= $d11['nama_jurusan'] ?></td>
											<td>
												<div class='radio radio-success'>
													<input type="radio" id="C<?= $j ?>" <?= 'name="status['.$j.']" '?> value="1" placeholder="" checked> <label for="C<?= $j ?>"> Naik Kelas</label>
												</div>
											</td>
											<td><div class='radio radio-danger'>
												<input type="radio" id="D<?= $j ?>" <?= 'name="status['.$j.']" '?> value="0" placeholder=""> <label for="D<?= $j ?>"> Tidak Naik</label>
											</div>
										</td>
										<input type="hidden" <?= 'name="nis['.$j.']" '?> value="<?= $d11['nis'] ?>">
										<input type="hidden" name="lulus" value="belum lulus">
									</tr>
									<?php $j++; } ?>
								</tbody>
							</table>
							<input type="submit" class="btn btn-success pull-right" name="simpan" value="Simpan">
						</form>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="d">
					<div class="table-responsive">
						<form action="<?= base_url('Admin/updatekelas') ?>" enctype="multipart/form-data" method="post">
							<table class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th colspan="6" class="text-center">Data kelas XII</th>
										<th colspan="2" class="text-center">Status</th>
									</tr>
									<tr>
										<th>No</th>
										<th>Nis</th>
										<th>Nama</th>
										<th>Email</th>
										<th>Kelas</th>
										<th>Jurusan</th>
										<th>Lulus</th>
										<th>Tidak Lulus</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$k=0;
									$no=1;
									foreach ($datasiswakelas12 as $d12) {
										?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $d12['nis'] ?></td>
											<td><?= $d12['nama'] ?></td>
											<td><?= $d12['email'] ?></td>
											<td><?= $d12['kelas'] ?></td>
											<td><?= $d12['nama_jurusan'] ?></td>
											<td>
												<div class='radio radio-success'>
													<input type="radio" id="E<?= $k ?>" <?= 'name="status['.$k.']" '?> value="1" placeholder="" checked> <label for="E<?= $k ?>"> Lulus</label>
												</div>
											</td>
											<td><div class='radio radio-danger'>
												<input type="radio" id="F<?= $k ?>" <?= 'name="status['.$k.']" '?> value="0" placeholder=""> <label for="F<?= $k ?>"> Tidak lulus</label>
											</div>
										</td>
										<input type="hidden" <?= 'name="nis['.$k.']" '?> value="<?= $d12['nis'] ?>">
										<input type="hidden" name="lulus" value="lulus">
									</tr>
									<?php $k++; } ?>
								</tbody>
							</table>
							<input type="submit" class="btn btn-success pull-right" name="simpan" value="Simpan">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>