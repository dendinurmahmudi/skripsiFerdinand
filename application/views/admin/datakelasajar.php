<?php  ?>
<div class="row">
	<div class="col-sm-12">
		<div>			
			<?= $this->session->flashdata('pesan'); ?>
		</div>
		<a href="#" data-toggle="modal" class="btn btn-info m-b-30" data-target="#tambahkelas" title="Tambah data Alumni"><i class="fa fa-plus-circle"></i> Tambah kelas ajar</a>
		<div class="white-box">
			<p class="text-muted m-b-30">Excel, PDF & Print</p>
			<div class="table-responsive">
				<table class="example23 display nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>nama Mapel</th>
							<th>Kelas Ajar</th>
							<th class="text-center">Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						foreach ($dataklsajar as $g) { ?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $g['nama_mapel'] ?></td>
								<td><?= $g['kelas'].' '.$g['kd_jurusan'].' '.$g['detail_kelas'] ?></td>
								<td class="text-center">
									<a href="<?= base_url('Admin/hapusklsajar/'.$g['nip']).'/'.$g['id_mapel'].'/'.$g['kelas'].'/'.$g['id_jurusan'].'/'.$g['detail_kelas'] ?>" onclick="return confirm('Yakin hapus kelas <?= $g['kelas'].' '.$g['kd_jurusan'].' '.$g['detail_kelas'] ?> ?');" title="Hapus"> <i class="fa fa-trash text-inverse fa-fw"></i> </a>
								</td>
							</tr>
							<?php $no++; } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div id="tambahkelas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="myModalLabel">Tambah Kelas Ajar</h4> </div>
					<div class="modal-body">
						<div class="white-box">
							<form action="<?= base_url('Admin/tambahklsajar') ?>" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nip" value="<?= $detp['nip'] ?>" placeholder="">
								<input type="hidden" name="idmapel" value="<?= $detp['id_mapel'] ?>" placeholder="">
								
								<div class="row">
									<div class="form-group col-sm-12">
										<label for="kdmapel">Mengajar kelas :</label>
									</div>
									<div class="form-group col-sm-4">
										<label for="email">Kelas</label>
										<select class="form-control" name="kelas" >
											<option value="0">Pilih kelas</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label for="kdmapel">Jurusan :</label>
										<select class="form-control" name="jurusan" >
											<option value="0">Pilih Jurusan</option>
											<?php foreach ($datajurusan as $j) { ?> 
												<option value="<?= $j['id_jurusan'] ?>"><?= $j['kd_jurusan'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group col-sm-4">
										<label for="email">Detail Kelas</label>
										<input type="text" name="detailkelas" class="form-control" placeholder="Contoh : 1/2/3" required>
									</div>
								</div>
								<div class="col-sm-12 col-xs-12">
									<button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Simpan</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	