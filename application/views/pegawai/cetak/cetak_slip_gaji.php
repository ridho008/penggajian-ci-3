<div class="container">
	<div class="row">
		<div class="col-md">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">PT.Pegawai Indonesia</h3>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-4">
							<div class="table-responsive">
								<table class="table">
									<tr>
										<th>Nama Pegawai</th>
										<td><?= $cetakSlipGaji['nama_pegawai']; ?></td>
									</tr>
									<tr>
										<th>NIK</th>
										<td><?= $cetakSlipGaji['nik']; ?></td>
									</tr>
									<tr>
										<th>Jabatan</th>
										<td><?= $cetakSlipGaji['nama_jabatan']; ?></td>
									</tr>
									<tr>
										<th>Bulan</th>
										<td><?= substr($cetakSlipGaji['bulan'], 0,2); ?></td>
									</tr>
									<tr>
										<th>Tahun</th>
										<td><?= substr($cetakSlipGaji['bulan'], 2,5); ?></td>
									</tr>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<div class="table-responsive">
								<table class="table table-bordered table-striped">
									<tr>
										<th>No</th>
										<th>Keterangan</th>
										<th>Jumlah</th>
									</tr>
									<tr>
										<td>1</td>
										<td>Gaji Pokok</td>
										<td>Rp.<?= number_format($cetakSlipGaji['gaji_pokok'], 0, ',', '.'); ?></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Tj.Transportasi</td>
										<td>Rp.<?= number_format($cetakSlipGaji['tj_transport'], 0, ',', '.'); ?></td>
									</tr>
									<tr>
										<td>3</td>
										<td>Tj.Uang Makan</td>
										<td>Rp.<?= number_format($cetakSlipGaji['uang_makan'], 0, ',', '.'); ?></td>
									</tr>
									<tr>
										<?php foreach($potongan as $p) : ?>
											<?php $alpa = $p['jml_potongan'] * $cetakSlipGaji['alpa']; ?>
										<?php endforeach; ?>
										<td>4</td>
										<td>Potongan / Alpa</td>
										<td>Rp.<?= number_format($alpa, 0, ',', '.'); ?></td>
									</tr>
									<tr class="text-center font-weight-bold">
										<td></td>
										<td>Total Gaji</td>
										<td>Rp.<?= number_format($cetakSlipGaji['uang_makan'] + $cetakSlipGaji['tj_transport'] + $cetakSlipGaji['gaji_pokok'] - $alpa, 0, ',', '.'); ?></td>
									</tr>
								</table>
						    </div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 offset-md-9">
							<table>
								<tr>
									<td></td>
									<td>
										<p>Pekanbaru, <?= date('d M Y'); ?><br>Finance
	                                      <br><br>
	                                      <p>_______________________</p>
										</p>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	window.print();
</script>