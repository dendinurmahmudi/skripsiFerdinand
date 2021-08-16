<div class="row">
	<div class="col-sm-12">
		<div class="white-box">
			<p class="text-muted m-b-30">Nilai <?= $kelas['nama'] ?> kelas <?= $kelas['kelas'].' '.$kelas['kd_jurusan'].' '.$kelas['detail_kelas'] ?></p>
			<ul class="nav customtab nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#b" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Nilai kelas 10</span></a></li>
				<li role="presentation" class=""><a href="#c" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Nilai kelas 11</span></a></li>
				<li role="presentation" class=""><a href="#d" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Nilai kelas 12</span></a></li>
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="b">
					<?php if ($rata210['rata_rata'] == null) { ?>
						<h3 class="text-center">Nilai belum tersedia</h3>
					<?php } else{?>
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
									foreach ($nilai10 as $s) { ?>
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
										<td><?= $rata210['rata_rata'] ?></td>
										<td><?= $this->admin_models->grade($rata210['rata_rata']) ?></td>
										<td><?= $this->admin_models->keterangan($rata210['rata_rata']) ?></td>
									</tr>
								</table>
							</div>
						<?php } ?>
					</div>
					<div role="tabpanel" class="tab-pane fade" id="c">
						<?php if ($rata211['rata_rata'] == null) { ?>
							<h3 class="text-center">Nilai belum tersedia</h3>
						<?php }else{ ?>
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
										foreach ($nilai11 as $s) { ?>
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
											<td><?= $rata211['rata_rata'] ?></td>
											<td><?= $this->admin_models->grade( $rata211['rata_rata']) ?></td>
											<td><?= $this->admin_models->keterangan($rata211['rata_rata']) ?></td>
										</tr>
									</table>
								</div>
							<?php } ?>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="d">
							<?php if ($rata212['rata_rata'] == null) { ?>
								<h3 class="text-center">Nilai belum tersedia</h3>
							<?php } else{?>
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
											foreach ($nilai12 as $s) { ?>
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
												<td><?= $rata212['rata_rata'] ?></td>
												<td><?= $this->admin_models->grade( $rata212['rata_rata']) ?></td>
												<td><?= $this->admin_models->keterangan($rata212['rata_rata']) ?></td>
											</tr>
										</table>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>