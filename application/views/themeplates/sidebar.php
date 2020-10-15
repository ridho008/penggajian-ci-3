<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon rotate-n-10">
        <i class="fas fa-money-bill-alt"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Penggajian</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if($this->session->userdata('role') == 2) : ?>
      <li class="nav-item<?= $this->uri->segment(2) == 'dashboard' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('pegawai/dashboard'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item<?= $this->uri->segment(2) == 'gaji' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= base_url('pegawai/gaji'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Gaji</span></a>
      </li>
    <?php endif; ?>

    <?php if($this->session->userdata('role') == 1) : ?>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item<?= $this->uri->segment(2) == 'dashboard' ? ' active' : ''; ?>">
      <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item<?= $this->uri->segment(2) == 'pegawai' || $this->uri->segment(2) == 'jabatan' ? ' active' : ''; ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-database"></i>
        <span>Master Data</span>
      </a>
      <div id="collapseTwo" class="collapse<?= $this->uri->segment(2) == 'pegawai' || $this->uri->segment(2) == 'jabatan' ? ' show' : ''; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item<?= $this->uri->segment(2) == 'pegawai' ? ' active' : ''; ?>" href="<?= base_url('admin/pegawai'); ?>">Data Pegawai</a>
          <a class="collapse-item<?= $this->uri->segment(2) == 'jabatan' ? ' active' : ''; ?>" href="<?= base_url('admin/jabatan'); ?>">Data Jabatan</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item<?= $this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'gaji' || $this->uri->segment(2) == 'potongangaji' ? ' active' : ''; ?>">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-money-check-alt"></i>
        <span>Transaksi</span>
      </a>
      <div id="collapseUtilities" class="collapse<?= $this->uri->segment(2) == 'absensi' || $this->uri->segment(2) == 'gaji' || $this->uri->segment(2) == 'potongangaji' ? ' show' : ''; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item<?= $this->uri->segment(2) == 'absensi' ? ' active' : ''; ?>" href="<?= base_url('admin/absensi'); ?>">Data Absensi</a>
          <a class="collapse-item<?= $this->uri->segment(2) == 'potongangaji' ? ' active' : ''; ?>" href="<?= base_url('admin/potongangaji'); ?>">Setting Potongan Gaji</a>
          <a class="collapse-item<?= $this->uri->segment(2) == 'gaji' ? ' active' : ''; ?>" href="<?= base_url('admin/gaji'); ?>">Data Gaji</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item<?= $this->uri->segment(3) == 'laporan_gaji' || $this->uri->segment(3) == 'laporan_absensi' ? ' active' : ''; ?>">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-copy"></i>
        <span>Laporan</span>
      </a>
      <div id="collapsePages" class="collapse<?= $this->uri->segment(3) == 'laporan_gaji' || $this->uri->segment(3) == 'laporan_absensi' ? ' show' : ''; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <a class="collapse-item<?= $this->uri->segment(3) == 'laporan_gaji' ? ' active' : ''; ?>" href="<?= base_url('admin/gaji/laporan_gaji'); ?>">Laporan Gaji</a>
          <a class="collapse-item<?= $this->uri->segment(3) == 'laporan_absensi' ? ' active' : ''; ?>" href="<?= base_url('admin/absensi/laporan_absensi'); ?>">Laporan Absensi</a>
          <a class="collapse-item<?= $this->uri->segment(3) == 'slip_gaji' ? ' active' : ''; ?>" href="<?= base_url('admin/gaji/slip_gaji'); ?>">Slip Gaji</a>
        </div>
      </div>
    </li>
    <?php endif; ?>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <h1 class="h3 text-gray-800">Programmer Indonesia</h1>
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <!-- <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-search fa-fw"></i>
            </a> -->
            <!-- Dropdown - Messages -->
            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
              <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> -->

          <!-- Nav Item - Alerts -->
          

          <!-- Nav Item - Messages -->
          

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama_pegawai']; ?></span>
              <img class="img-profile rounded-circle" src="<?= base_url('/assets/img/user/') . $user['photo']; ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="<?= base_url('auth/profile'); ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
              </a>
              <a class="dropdown-item" href="<?= base_url('auth/ganti_password'); ?>">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Ganti Password
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->