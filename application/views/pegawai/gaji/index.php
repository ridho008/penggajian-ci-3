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
      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <tr>
            <th>Bulan/Tahun</th>
            <th>Gaji Pokok</th>
            <th>Tj.Transport</th>
            <th>Uang Makan</th>
            <th>Potongan</th>
            <th>Total Gaji</th>
            <th>Cetak Slip</th>
          </tr>
          <?php foreach($pot_gaji as $pg) : ?>
            <?php $potongan = $pg['jml_potongan']; ?>
          <?php endforeach; ?>
          <?php foreach($gaji as $g) : ?>
            <?php $potGaji = $g['alpa'] * $potongan; ?>
            <tr>
              <td><?= $g['bulan']; ?></td>
              <td><?= number_format($g['gaji_pokok'], 0, ',', '.'); ?></td>
              <td><?= number_format($g['tj_transport'], 0, ',', '.'); ?></td>
              <td><?= number_format($g['uang_makan'], 0, ',', '.'); ?></td>
              <td><?= number_format($potGaji, 0, ',', '.'); ?></td>
              <td><?= number_format($g['uang_makan'] + $g['tj_transport'] + $g['gaji_pokok'] - $potGaji, 0, ',', '.'); ?></td>
              <td>
                <a href="<?= base_url('pegawai/gaji/cetakGaji/') . $g['id_kehadiran']; ?>" class="btn btn-secondary"><i class="fas fa-print"></i></a>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </div>
  </div>

  <!-- Content Row -->

</div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
