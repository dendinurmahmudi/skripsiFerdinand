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
							<th>Pengajar</th>
							<th>Nama Mapel</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($datamapel as $m) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $m['nama'] ?></td>
								<td><?= $m['nama_mapel'] ?></td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>