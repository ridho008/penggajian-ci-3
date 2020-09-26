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
          Filter Data Absensi Pegawai
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
            <a href="" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"></i> Input Kehadiran</a>
          </form>
        </div>
      </div>

      <!-- Info Tanggal & Tahun -->
      <div class="alert alert-info mt-4" role="alert">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= set_value('bulan'); ?></strong> Tahun: <strong><?= set_value('tahun'); ?></strong></div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Kelamin</th>
            <th>Jabatan</th>
            <th>Hadir</th>
            <th>Sakit</th>
            <th>Alpa</th>
          </tr>
          <?php $no = 1; foreach($absensi as $a) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $a['nik']; ?></td>
              <td><?= $a['nama_pegawai']; ?></td>
              <td><?= $a['jk_kehadiran'] == 'L' ? 'Pria' : 'Perempuan'; ?></td>
              <td><?= $a['nama_jabatan']; ?></td>
              <td><?= $a['hadir']; ?></td>
              <td><?= $a['sakit']; ?></td>
              <td><?= $a['alpa']; ?></td>
            </tr>
          <?php endforeach; ?>
        </table>
          <?php if(empty($absensi)) : ?>
            <div class="alert alert-danger text-center" role="alert">Data tidak ditemukan.</div>
          <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





      
