<div class="row">
	<div class="col-sm-12">
		<div>
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<div class="white-box">
			<p class="text-muted m-b-30">Nilai <?= $nama ?> kelas <?= $kelas['kelas'].' '.$kelas['kd_jurusan'].' '.$kelas['detail_kelas'] ?></p>
			
			<div class="table-responsive">
				<table class="example23 table table-bordered table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th rowspan="2" class="text-center">No</th>
							<th rowspan="2" class="text-center">Nama Pelajaran</th>
							<th colspan="3" class="text-center">Nilai</th>
						</tr>
						<tr>
							<th>Satuan</th>
							<th>Grade</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$n=0;
						$no=1;
						foreach ($datanilai as $s) { ?>
							<tr for="nilai">
								<td><?= $no++ ?></td>
								<td><?= $s['nama_mapel'] ?></td>
								<td><?= $s['nilai'] ?></td>
								<td><?= $s['grade'] ?></td>
								<td><?= $s['keterangan'] ?></td>
							</tr>
							<?php $n++;} ?>
						</tbody>
						<tr>
							<td></td>
							<td></td>
							<td colspan="3" class="text-center"><b>Nilai Rata-rata</b></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><?= $rata2nilai['rata_rata'] ?></td>
							<td><?= $this->siswa_models->grade( $rata2nilai['rata_rata']) ?></td>
							<td><?= $this->siswa_models->keterangan($rata2nilai['rata_rata']) ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>