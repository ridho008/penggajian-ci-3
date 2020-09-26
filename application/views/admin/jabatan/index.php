<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary mb-2 tombolTambahJabatan" data-toggle="modal" data-target="#formModalJabatan"><i class="fas fa-plus-circle"></i> Tambah Data Jabatan</button>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
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
                      <button type="button" class="btn btn-primary tombolUbahJabatan" data-toggle="modal" data-target="#formModalJabatan" data-id="<?= $j['id_jabatan']; ?>"><i class="fas fa-edit"></i></button>
                      <a href="<?= base_url('/admin/jabatan/hapus/') . $j['id_jabatan']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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



<!-- Modal -->
<div class="modal fade" id="formModalJabatan" tabindex="-1" aria-labelledby="formModalLabelJabatan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelJabatan">Tambah Data Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" id="id_jabatan" name="id_jabatan">
          <div class="form-group">
            <label for="jabatan">Nama Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="<?= set_value('jabatan'); ?>">
            <small class="muted text-danger"><?= form_error('jabatan'); ?></small>
          </div>
          <div class="form-group">
            <label for="gapok">Gaji Pokok</label>
            <input type="number" name="gapok" id="gapok" class="form-control" value="<?= set_value('gapok'); ?>">
            <small class="muted text-danger"><?= form_error('gapok'); ?></small>
          </div>
          <div class="form-group">
            <label for="tj_transport">Tunjangan Transport</label>
            <input type="number" name="tj_transport" id="tj_transport" class="form-control" value="<?= set_value('tj_transport'); ?>">
            <small class="muted text-danger"><?= form_error('tj_transport'); ?></small>
          </div>
          <div class="form-group">
            <label for="uang_makan">Uang Makan</label>
            <input type="number" name="uang_makan" id="uang_makan" class="form-control" value="<?= set_value('uang_makan'); ?>">
            <small class="muted text-danger"><?= form_error('uang_makan'); ?></small>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


      
