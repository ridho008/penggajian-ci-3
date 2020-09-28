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
          Input Data Absensi Pegawai
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
            <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Generate Form</button>
          </form>
        </div>
      </div>

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

      <!-- Info Tanggal & Tahun -->
      <div class="alert alert-info mt-4" role="alert">Menampilkan Data Kehadiran Pegawai Bulan: <strong><?= $bulan; ?></strong> Tahun: <strong><?= $tahun; ?></strong></div>

      <!-- Table -->
      <form action="<?= base_url('admin/absensi/aksi_input_kehadiran'); ?>" method="post">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama Pegawai</th>
            <th>Kelamin</th>
            <th>Jabatan</th>
            <th width="8%">Hadir</th>
            <th width="8%">Sakit</th>
            <th width="8%">Alpa</th>
          </tr>
          <?php $no = 1; foreach($inputAbsensi as $a) : ?>
            <tr>
              <input type="text" name="bulan[]" class="form-control" value="<?= $bulanTahun; ?>">
              <input type="text" name="nik[]" class="form-control" value="<?= $a['nik']; ?>">
              <input type="text" name="id_pegawai[]" class="form-control" value="<?= $a['id_pegawai']; ?>">
              <input type="text" name="jk_pegawai[]" class="form-control" value="<?= $a['jk_pegawai']; ?>">
              <input type="text" name="id_jabatan[]" class="form-control" value="<?= $a['id_jabatan']; ?>">
              <td><?= $no++; ?></td>
              <td><?= $a['nik']; ?></td>
              <td><?= $a['nama_pegawai']; ?></td>
              <td><?= $a['jk_pegawai'] == 'L' ? 'Pria' : 'Perempuan'; ?></td>
              <td><?= $a['nama_jabatan']; ?></td>
              <td>
                <input type="number" name="hadir[]" class="form-control" value="0">
              </td>
              <td>
                <input type="number" name="sakit[]" class="form-control" value="0">
              </td>
              <td>
                <input type="number" name="alpa[]" class="form-control" value="0">
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
          <?php if(empty($inputAbsensi)) : ?>
            <div class="alert alert-danger text-center" role="alert">Data tidak ditemukan.</div>
          <?php endif; ?>
      </div>
      <div class="row">
        <div class="col-md-2 offset-md-10">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
      </form>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





      
