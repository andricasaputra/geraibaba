<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?= $title ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/css/app.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/logo.jpg" rel="icon">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- icon mdi staradmin -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/template/staradmin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">

  <!-- datatable bootstrap 4 online-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/1.10.19/css/dataTables.bootstrap4.min.css">

  <!-- jquery 3.3.1 offline -->
  <script src="<?php echo base_url() ?>assets/jquery/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- jquery datables offline -->
  <script src="<?php echo base_url() ?>assets/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

  <!-- datatables bootstrap 4 offline -->
  <script src="<?php echo base_url() ?>assets/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <!-- mode sandbox -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zLPQZLDT1AklFh9R"></script>

  <!-- mode production -->
  <!-- <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Your Client Key"></script> -->

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="">
          <img src="<?php echo base_url() ?>assets/img/logo.jpg" alt="logo" style="height: 90px; width: 90px; margin-top: -20px"/>
        </a>
        <a class="navbar-brand brand-logo-mini" href="">
          <img src="<?php echo base_url() ?>assets/img/logo.jpg" alt="logo" style="height: 90px; width: 90px; margin-top: -20px"/>
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Admin</span>
              <img class="img-xs rounded-circle" src="<?php echo base_url('assets/img/default.jpg') ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>
              <a class="dropdown-item" href="<?= base_url('admin/auth/logout') ?>">
                Sign Out
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?php echo base_url('assets/img/default.jpg') ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"></p>
                  <div>
                    <small class="designation text-muted"></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/home') ?>">
              <i class="menu-icon mdi mdi-view-dashboard"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/report') ?>">
              <i class="menu-icon mdi mdi-chart-pie"></i>
              <span class="menu-title">Report</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/member') ?>">
              <i class="menu-icon mdi mdi-account-circle"></i>
              <span class="menu-title">Member</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/order') ?>">
              <i class="menu-icon mdi mdi-cash"></i>
              <span class="menu-title">Order</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/product') ?>">
              <i class="menu-icon mdi mdi-cube"></i>
              <span class="menu-title">Product</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/kategori') ?>">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Kategori</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('upload/manual/admin.pdf') ?>" target="_blank">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title">Manual</span>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/kurir') ?>">
              <i class="menu-icon mdi mdi-cube"></i>
              <span class="menu-title">Kurir</span>
            </a>
          </li> -->

          <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/database/index') ?>">
              <i class="menu-icon mdi mdi-settings"></i>
              <span class="menu-title">Database</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/auth/logout') ?>">
              <i class="menu-icon mdi mdi-power"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-panel">
      <div class="content-wrapper" style="background: #eee;">