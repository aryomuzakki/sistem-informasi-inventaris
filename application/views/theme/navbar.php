<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="<?= base_url() ?>" class="nav-link">Home</a>
    </li> -->
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a href="<?= base_url('logout') ?>" class="nav-link d-inline-block">
        Logout
        <i class="nav-icon fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>

</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link d-flex justify-content-center">
    <img src="<?= base_url() ?>public/assets/img/logo-dilo-medan.png" alt="Logo Digital Innovation Lounge" class="brand-image" style="max-height: unset; width: 80%;">
    <!-- <span class="brand-text font-weight-light">Admin</span> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="<? // base_url() 
                        ?>public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="Muhammad Aryo Muzakki"> -->

      </div>
      <div class="info">
        <p class="d-block m-0" style="color: #c2c7d0;">
          <?= $this->session->userdata('name'); ?>
        </p>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link <?= ($this->uri->segment(1) == '') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('barang') ?>" class="nav-link <?= ($this->uri->segment(1) == 'barang') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Barang
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url('kategori') ?>" class="nav-link <?= ($this->uri->segment(1) == 'kategori') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Data Kategori
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>