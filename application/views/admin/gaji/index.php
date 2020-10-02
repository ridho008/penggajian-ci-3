<?php 
if((isset($_POST['bulan']) && $_POST['bulan'] != null) && (isset($_POST['tahun']) && $_POST['tahun'] != null)) {
  $bulan = $this->input->post('bulan');
  $tahun = $this->input->post('tahun');
  $bulanTahun = $bulan.$tahun;
} else {
  $bulan = date('m');
  $tahun = date('Y');
  $bulanTahun = $bulan.$tahun;
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Filter Data <?= $title; ?>
        </div>
        <div class="card-body">
          <form class="form-inline" method="post" action="">
            <div class="form-group mb-2">
              <label for="bulan">Bulan</label>
              <select name="bulan" id="bulan" class="form-control ml-2">
                <option value="">-- Pilih Bulan --</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="form-group mx-sm-3 mb-2">
              <label for="tahun">Tahun</label>
              <select name="tahun" id="tahun" class="form-control ml-2">
                <option value="">-- Pilih Tahun --</option>
                <?php $thn = date('Y'); 
                  for($i = 2020; $i < $thn + 5; $i++) { ?>
                  <option value="<?= $i; ?>"><?= $i; ?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data</button>
            <?php if(empty($gaji)) : ?>
              <button type="button" class="btn btn-success mb-2 ml-2" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-print"></i> Cetak Daftar Gaji</button>
            <?php else : ?>
            <a href="<?= base_url('admin/gaji/cetak?bulan=') . $bulan . '&tahun=' . $tahun; ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-print"></i> Cetak Daftar Gaji</a>
            <?php endif; ?>
          </form>
        </div>
      </div>

      

      <!-- Info Tanggal & Tahun -->
      <div class="alert alert-info mt-4" role="alert">Menampilkan Data Gaji Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

      <!-- Table -->
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
          <?php $no = 1; foreach($gaji as $g) : ?>
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
          <?php if(empty($gaji)) : ?>
            <div class="alert alert-danger text-center" role="alert">Bulan : <?= $bulan; ?> Tahun : <?= $tahun; ?> Data Belum Di Inputkan.</div>
          <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning" role=""><i class="fas fa-info"></i> Data gaji bulan <?= $bulan; ?> dan tahun <?= $tahun; ?> masih kosong. silahkan input absensi terlebih dahulu pada bulan dan tahun yang anda pilih.</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


      
