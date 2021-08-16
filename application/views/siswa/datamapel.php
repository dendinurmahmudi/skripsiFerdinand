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
							<th>Nama Mapel</th>
							<th>Pengajar</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datamapel as $m) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $m['nama_mapel'] ?></td>
								<td><?= $m['nama'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>