<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card">
        <div class="card-header bg-primary text-center text-light">
          Filter Slip Gaji Pegawai
        </div>
        <form action="<?= base_url('admin/gaji/cetakSlipGaji'); ?>" method="post" target="_blank">
        <div class="card-body">
          <div class="form-group">
            <select name="bulan" id="bulan" class="form-control">
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
            <small class="muted text-danger"><?= form_error('bulan'); ?></small>
          </div>
          <div class="form-group">
            <select name="tahun" id="tahun" class="form-control">
              <option value="">-- Pilih Tahun --</option>
              <?php $thn = date('Y'); 
                for($i = 2020; $i < $thn + 5; $i++) { ?>
                <option value="<?= $i; ?>"><?= $i; ?></option>
              <?php
                }
              ?>
            </select>
            <small class="muted text-danger"><?= form_error('tahun'); ?></small>
          </div>
          <div class="form-group">
            <select name="pegawai" id="pegawai" class="form-control">
              <option value="">-- Pilih Pegawai --</option>
              <?php foreach($pegawai as $p) : ?>
                <option value="<?= $p['id_pegawai']; ?>"><?= $p['nama_pegawai']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('pegawai'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Laporan Absensi</button>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





      
