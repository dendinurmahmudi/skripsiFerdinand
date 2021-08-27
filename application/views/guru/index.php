<div class="row">
	<div class="col-sm-12">
		<?= $this->session->flashdata('pesan'); ?>

		<?php foreach ($datakelas as $j) { ?>
			<a href="<?= base_url('Guru/datasiswa/'.$j['kelas'].'/'.$j['id_jurusan'].'/'.$j['detail_kelas']) ?>">
				<div class="col-sm-3">
					<div class="white-box">
						<h3 class="box-title"><?= $j['kelas'].' '.$j['kd_jurusan'].' '.$j['detail_kelas'] ?></h3>
						<ul class="list-inline m-t-30 p-t-10 two-part">
							<li><i class="icon-people text-info"></i></li>
						</ul>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
</div>