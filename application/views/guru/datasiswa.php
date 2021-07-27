<style type="text/css" media="screen">
	input.input{
		border-bottom: none;
		border-left: none;
		border-right: none;
		border-top: none;
		width: 40px;
		background-color: transparent;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<div>
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<div class="white-box">
			<p class="text-muted m-b-30">Nilai untuk Mata pelajaran <?= $mapel['nama_mapel'] ?> kelas <?= $kelas['kelas'].' '.$kelas['kd_jurusan'].' '.$kelas['detail_kelas'] ?></p>
			<form action="<?= base_url('Guru/tambahnilai') ?>" enctype="multipart/form-data" method="post">
				<div class="table-responsive">
					<table class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th colspan="6" class="text-center">Data kelas <?= $kelas['kelas'].' '.$kelas['kd_jurusan'].' '.$kelas['detail_kelas'] ?></th>
								<th colspan="3" class="text-center">Nilai</th>
							</tr>
							<tr>
								<th>No</th>
								<th>Nis</th>
								<th>Nama</th>
								<th>Tempat Tgl Lahir</th>
								<th>Email</th>
								<th>Kelas</th>
								<th>Satuan</th>
								<th>Grade</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$n=0;
							$no=1;
							foreach ($datasiswa as $s) { ?>
								<tr for="nilai">
									<td><?= $no++ ?></td>
									<td><?= $s['nis'] ?></td>
									<td><?= $s['nama'] ?></td>
									<td><?= $s['ttl'] ?></td>
									<td><?= $s['email'] ?></td>
									<td><?= $s['kelas'].' '.$s['kd_jurusan'].' '.$s['detail_kelas'] ?></td>
									<td >
										<?php if($nilai==null){ ?>
											<input type="text" class="input" id="nilai" <?= 'name="nilai['.$n.']" '?> value="" placeholder="Nilai" title="Edit nilai <?= $s['nama'] ?>">
										<?php }else{ ?>	
											<input type="text" class="input" id="nilai" <?= 'name="nilai['.$n.']" '?> value="<?= $s['nilai'] ?>" placeholder="Nilai" title="Edit nilai <?= $s['nama'] ?>">
										<?php } ?>
									</td>
									<td>
										<?php if($nilai==null){ ?>
											-
										<?php }else{
											echo $s['grade'];
										} ?>	
									</td>
									<td>
										<?php if($nilai==null){ ?>
											-
										<?php }else{
											echo $s['keterangan'];
										} ?>	
									</td>
								</tr>
								<input type="hidden" <?= 'name="nis['.$n.']" '?> value="<?= $s['nis'] ?>">
								<input type="hidden" name="kelas" value="<?= $s['kelas'] ?>">
								<input type="hidden" name="jurusan" value="<?= $s['id_jurusan'] ?>">
								<input type="hidden" name="detailkelas" value="<?= $s['detail_kelas'] ?>">
								<?php $n++;} ?>
							</tbody>
						</table>
						<input type="submit" name="simpan" value="Simpan" class="btn btn-success pull-right">
					</div>
				</form>
			</div>
		</div>
	</div>