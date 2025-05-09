<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= SITE_NAME ?> | <?= isset($title) ? esc($title) : 'Dashboard' ?></title>

  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <?php if (!empty($plugin) && in_array('dataTables', $plugin)) { ?>
    <!-- dataTables css -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <?php } ?>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>public/assets/adminlte/lte/css/adminlte.min.css">
</head>
<body class="dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
<!--       <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto ">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- User nav-item -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Option</span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url('change-password') ?>" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url() ?>logout" class="dropdown-item">
            <i class="fa fa-sign-out-alt mr-2" aria-hidden="true"></i> Logout
          </a>
        </div>
      </li> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url() ?>public/assets/adminlte/lte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
<!--       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>public/assets/adminlte/lte/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url() ?>dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('lead') ?>" class="nav-link">
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>Leads</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url() ?>users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('services') ?>" class="nav-link">
                  <i class="nav-icon fas fa-concierge-bell"></i>
                  <p>Services</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('pages') ?>" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>Pages</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('seo-meta') ?>" class="nav-link">
                  <i class="nav-icon fas fa-search"></i>
                  <p>SEO's</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="<?= base_url('blog') ?>" class="nav-link">
                  <i class="nav-icon fas fa-blog"></i>
                  <p>Blogs</p>
              </a>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
             <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Masters
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a href="<?= base_url('homeBanner') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('homeTextSlider') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home Text Slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('partners') ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partners</p>
                </a>
              </li>

            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

