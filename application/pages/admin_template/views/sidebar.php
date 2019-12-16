  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url() ?>assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo APP_TITLE_SHORT; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url('dashboard')?>" class="nav-link <?php if ($this->uri->uri_string() === 'dashboard') echo 'active';?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if ($this->uri->uri_string() === 'masterdusun' || $this->uri->uri_string() === 'masterrw' ||  $this->uri->uri_string() === 'masterhalaman') echo 'menu-open';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('masterhalaman')?>" class="nav-link <?php if ($this->uri->uri_string() === 'masterhalaman') echo 'active';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Halaman</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('masterdusun')?>" class="nav-link <?php if ($this->uri->uri_string() === 'masterdusun') echo 'active';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dusun</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('masterrw')?>" class="nav-link <?php if ($this->uri->uri_string() === 'masterrw') echo 'active';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>RT - RW</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a href="<?= site_url('pendataan')?>" class="nav-link <?php if ($this->uri->uri_string() === 'pendataan') echo 'active';?>">
              <i class="nav-icon far fa-image"></i>
              <p>
                Pendataan
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview <?php if ($this->uri->uri_string() === 'masterdatajiwa' || $this->uri->uri_string() === 'masterdatakeluarga') echo 'menu-open';?>"">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Pencarian Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('masterdatajiwa')?>" class="nav-link <?php if ($this->uri->uri_string() === 'masterdatajiwa') echo 'active';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Jiwa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('masterdatakeluarga')?>" class="nav-link <?php if ($this->uri->uri_string() === 'masterdatakeluarga') echo 'active';?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Keluarga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">PAGES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content py-2">