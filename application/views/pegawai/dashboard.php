<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-8">
      <div class="alert alert-info" role="alert"><i class="fas fa-info-circle"></i> Selamat Datang, Anda sedang login sebagai pegawai.</div>
      <div class="card">
        <div class="card-header bg-primary">
          <h5 class="text-center font-weight-bold text-white">Data Pegawai <?= $user['nama_pegawai']; ?></h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <img src="<?= base_url('assets/img/user/') . $user['photo']; ?>" alt="<?= $user['photo']; ?>" class="img-thumbnail">
            </div>
            <div class="col-md-6">
              <table class="table mt-4">
                <tr>
                  <th>Nama Pegawai</th>
                  <td><?= $user['nama_pegawai']; ?></td>
                </tr>
                <tr>
                  <th>Jabatan</th>
                  <td><?= $user['nama_jabatan']; ?></td>
                </tr>
                <tr>
                  <th>Tanggal Masuk</th>
                  <?php $tlgMasuk = date_create($user['tgl_masuk']); ?>
                  <td><?= date_format($tlgMasuk, 'd F Y'); ?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td><?= $user['status'] == 1 ? 'Pegawai Tetap' : 'Pegawai Tidak Tetap'; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->





      
