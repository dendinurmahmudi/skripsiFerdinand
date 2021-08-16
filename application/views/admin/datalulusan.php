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
							<th>Lulusan</th>
							<th>Jurusan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datalulusan as $s) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $s['nis'] ?></td>
								<td><?= $s['nama'] ?></td>
								<td><?= $s['ttl'] ?></td>
								<td><?= $s['email'] ?></td>
								<td><?= $s['ket_lulus'] ?></td>
								<td><?= $s['kd_jurusan'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>