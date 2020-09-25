<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jabatan</th>
                  <th>Gaji Pokok</th>
                  <th>Tj.Transport</th>
                  <th>Uang Makan</th>
                  <th>Total</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($jabatan as $j) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $j['nama_jabatan']; ?></td>
                    <td><?= number_format($j['gaji_pokok'], 0, ',', '.'); ?></td>
                    <td><?= number_format($j['tj_transport'], 0, ',', '.'); ?></td>
                    <td><?= number_format($j['uang_makan'], 0, ',', '.'); ?></td>
                    <td><?= number_format($j['gaji_pokok'] + $j['tj_transport'] + $j['uang_makan'], 0 , ',', '.'); ?></td>
                    <td>
                      <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                      <a href="<?= base_url('/admin/jabatan/hapus/') . $j['id_jabatan']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>21:47
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
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





      
