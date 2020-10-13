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
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Data User</h6>
        </div>
        <div class="card-body">
          <?= form_open(); ?>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= set_value('username'); ?>">
            <small class="muted text-danger"><?= form_error('username'); ?></small>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="<?= set_value('password'); ?>">
            <small class="muted text-danger"><?= form_error('password'); ?></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          <?php form_close(); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



      
