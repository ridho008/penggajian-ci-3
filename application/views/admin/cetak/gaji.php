<?php 
if((isset($_GET['bulan']) && $_GET['bulan'] != null) && (isset($_GET['tahun']) && $_GET['tahun'] != null)) {
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $bulanTahun = $bulan.$tahun;
  } else {
    $bulan = date('m');
    $tahun = date('Y');
    $bulanTahun = $bulan.$tahun;
  }
?>
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
										<th>Bulan</th>
										<td><?= $bulan; ?></td>
									</tr>
									<tr>
										<th>Tahun</th>
										<td><?= $tahun; ?></td>
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
							      <th>NIK</th>
							      <th>Nama Pegawai</th>
							      <th>Kelamin</th>
							      <th>Jabatan</th>
							      <th>Gaji Pokok</th>
							      <th>Tj.Transport</th>
							      <th>Uang Makan</th>
							      <th>Potongan</th>
							      <th>Total Gaji</th>
							    </tr>
							    <?php foreach($potongan as $p) { ?>
							      <?php $alpa = $p['jml_potongan']; ?>
							    <?php } ?>
							    <?php $no = 1; foreach($cetakGaji as $g) : ?>
							    <?php $potongan = $g['alpa'] * $alpa; ?>
							      <tr>
							        <td><?= $no++; ?></td>
							        <td><?= $g['nik']; ?></td>
							        <td><?= $g['nama_pegawai']; ?></td>
							        <td><?= $g['jk_pegawai'] == 'L' ? 'Pria' : 'Perempuan'; ?></td>
							        <td><?= $g['nama_jabatan']; ?></td>
							        <td><?= number_format($g['gaji_pokok'], 0, ',', '.'); ?></td>
							        <td><?= number_format($g['tj_transport'], 0, ',', '.'); ?></td>
							        <td><?= number_format($g['uang_makan'], 0, ',', '.'); ?></td>
							        <td><?= number_format($potongan, 0, ',', '.'); ?></td>
							        <td><?= number_format($g['gaji_pokok'] + $g['tj_transport'] + $g['uang_makan'] - $potongan, 0, ',', '.'); ?></td>
							      </tr>
							    <?php endforeach; ?>
							  </table>
							  <?php if(empty($cetakGaji)) : ?>
							    <div class="alert alert-danger text-center" role="alert">Bulan : <?= $bulan; ?> Tahun : <?= $tahun; ?> Data Belum Di Inputkan.</div>
							  <?php endif; ?>  
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

<script>
	window.print();
</script>