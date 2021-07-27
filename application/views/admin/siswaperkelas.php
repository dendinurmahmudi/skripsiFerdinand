<?php  ?>
<div class="row">
	<div class="col-sm-12">
		<?= $this->session->flashdata('pesan'); ?>

		<?php foreach ($jurusankelas as $j) { ?>
			<a href="<?= base_url('Admin/datasiswa/'.$j['id_jurusan'].'/'.$j['kelas'].'/'.$j['detail_kelas']) ?>">
				<div class="col-sm-3">
					<div class="white-box">
						<h3 class="box-title"><?= $j['kelas'].' '.$j['kd_jurusan'].' '.$j['detail_kelas'] ?></h3>
						<ul class="list-inline m-t-30 p-t-10 two-part">
							<li><i class="icon-people text-info"></i></li>
							<li class="text-right"><span class="counter"><?= $j['jumlah'] ?></span></li>
						</ul>
					</div>
				</div>
			</a>
		<?php } ?>
	</div>
</div>