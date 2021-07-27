<?php  ?>
<div class="row">
	<div class="col-sm-12">
		<?= $this->session->flashdata('pesan'); ?>

		<?php foreach ($datathnlulus as $j) { ?>
			<a href="<?= base_url('Admin/datajrsnlulus/'.$j['ket_lulus']) ?>">
				<div class="col-sm-3">
					<div class="white-box">
						<h3 class="box-title"><?= $j['ket_lulus'] ?></h3>
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