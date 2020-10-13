<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary mb-2 tombolTambahPegawai" data-toggle="modal" data-target="#formModalPegawai"><i class="fas fa-plus-circle"></i> Tambah Data Pegawai</button>
      <a href="<?= base_url('admin/pegawai/tambahUser'); ?>" class="btn btn-info mb-2"><i class="fas fa-user-plus"></i> Tambah Data User</a>
      <?= $this->session->flashdata('pesan'); ?>
    </div>
  </div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-md">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>NIK</th>
                  <th>Nama Pegawai</th>
                  <th>Kelamin</th>
                  <th>Jabatan</th>
                  <th>Tanggal Masuk</th>
                  <th>Status</th>
                  <th><i class="fas fa-cogs"></i></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach($pegawai as $p) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td>
                      <img src="<?= base_url('/assets/img/user/') . $p['photo']; ?>" class="tampilFotoPegawai  ">
                    </td>
                    <td><?= $p['nik']; ?></td>
                    <td><?= $p['nama_pegawai']; ?></td>
                    <td><?= $p['jk_pegawai'] == 'L' ? 'Pria' : 'Perempuan'; ?></td>
                    <td><?= $p['nama_jabatan']; ?></td>
                    <td><?= date('d-m-Y', strtotime($p['tgl_masuk'])); ?></td>
                    <td>
                      <?php if($p['status'] == 0) : ?>
                        <div class="badge badge-danger" role="alert">Nonaktif</div>
                        <?php else : ?>
                          <div class="badge badge-success" role="alert">Aktif</div>
                      <?php endif; ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary tombolUbahPegawai" data-toggle="modal" data-target="#formModalPegawai" data-id="<?= $p['id_pegawai']; ?>"><i class="fas fa-edit"></i></button>
                      <a href="<?= base_url('/admin/pegawai/hapus/') . $p['id_pegawai']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="formModalPegawai" tabindex="-1" aria-labelledby="formModalLabelPegawai" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabelPegawai">Tambah Data Pegawai</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" id="id_pegawai" name="id_pegawai">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="number" name="nik" id="nik" class="form-control" value="<?= set_value('nik'); ?>">
            <small class="muted text-danger"><?= form_error('nik'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?= set_value('nama_pegawai'); ?>">
            <small class="muted text-danger"><?= form_error('nama_pegawai'); ?></small>
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
              <option value=""> -- Pilih Kelamin --</option>
              <option value="L">Pria</option>
              <option value="P">Perempuan</option>
            </select>
            <small class="muted text-danger"><?= form_error('jk'); ?></small>
          </div>
          <div class="form-group">
            <label for="nama_jabatan">Nama Jabatan</label>
            <select name="nama_jabatan" id="nama_jabatan" class="form-control">
              <option value="">-- Pilih Jabatan --</option>
              <?php foreach($jabatan as $j) : ?>
                <option value="<?= $j['id_jabatan']; ?>"><?= $j['nama_jabatan']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('nama_jabatan'); ?></small>
          </div>
          <div class="form-group">
            <label for="user">User</label>
            <select name="user" id="user" class="form-control">
              <option value="">-- Pilih User --</option>
              <?php foreach($users as $j) : ?>
                <option value="<?= $j['id_user']; ?>"><?= $j['username']; ?></option>
              <?php endforeach; ?>
            </select>
            <small class="muted text-danger"><?= form_error('nama_jabatan'); ?></small>
          </div>
          <div class="form-group">
            <label for="tgl_masuk">Tanggal Masuk</label>
            <input type="date" name="tgl_masuk" id="tgl_masuk" class="form-control" value="<?= date('Y-m-d'); ?>">
            <small class="muted text-danger"><?= form_error('tgl_masuk'); ?></small>
          </div>
          <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
              <option value=""> -- Pilih Status --</option>
              <option value="1">Pegawai Tetap</option>
              <option value="0">Pegawai Tidak Tetap</option>
            </select>
            <small class="muted text-danger"><?= form_error('status'); ?></small>
          </div>
          <div class="form-group">
            <label for="photo">Photo</label><br>
            <img src="" width="100" id="editTampilPhoto">
            <input type="file" name="photo" id="photo" class="form-control-file">
            <input type="hidden" name="photoLama" id="photoLama" class="form-control">
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


      
