<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $title ?></title>
  <!-- icon -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/img/logo.jpg" rel="icon">
  <!-- Font Awesome online-->
  <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css">
  
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/datatables/1.10.19/css/dataTables.bootstrap4.min.css">

  <!-- jquery 3.3.1 offline -->
  <script src="<?php echo base_url() ?>assets/jquery/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- jquery datables offline -->
  <script src="<?php echo base_url() ?>assets/datatables/1.10.19/js/jquery.dataTables.min.js"></script>

  <!-- datatables bootstrap 4 online -->
  <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> -->

  <!-- datatables bootstrap 4 offline -->
  <script src="<?php echo base_url() ?>assets/datatables/1.10.19/js/dataTables.bootstrap4.min.js"></script>

  <script src="<?php echo base_url() ?>assets/js/app.js"></script>

  <!-- mode production -->
    <!-- <script type="text/javascript"
            src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Your Client Key"></script> -->

<!-- mode sandbox -->
  <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zLPQZLDT1AklFh9R"></script>

  <!-- Start of  Zendesk Widget script -->
<script id="ze-snippet" src="https://static.zdassets.com/ekr/snippet.js?key=c47eec70-ccc3-4db3-aebd-3ff1b8af4da0"> </script>
<!-- End of  Zendesk Widget script -->

  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }

      #beli{
        width: 100%;
        margin-top: 20px;
        padding: 15px;
      }

      #btn-detail{
        width: 100% !important;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

  </style>

</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar mt-0 mb-0">
    <div class="container">
      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?php echo base_url('member') ?>">
       <img src="<?php echo base_url()?>assets/img/geraibaba.png" id="logo" style="width:140px;">
      </a>

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Left -->
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link waves-effect" style="font-weight: 500" href="<?php echo base_url('member') ?>">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link waves-effect" style="font-weight: 500" href="#product">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" style="font-weight: 500" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" style="font-weight: 500" href="<?php echo base_url('member/order/transaksi') ?>">Check Order</a>
          </li>
          <li class="nav-item">
            <a class="nav-link waves-effect" style="font-weight: 500" href="<?php echo base_url('member/order/instruction') ?>">Cara Pembelian</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item dropdown dropdown text-center">
            <a href="#" class="nav-link border border-light rounded waves-effect dropdown-toggle btn-outline-dark" data-toggle="dropdown">
              <i class="fa fa-user mr-2"></i>
              <?php echo ucfirst($this->session->userdata('nama_depan')); ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url('member/order/transaksi') ?>">Check Order</a>
              <a class="dropdown-item" href="<?php echo base_url('member/profile/edit/'. $member['id']) ?>">Edit Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>">Logout</a>
            </div>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item" id="cart-nav">
            <a class="nav-link waves-effect" href="<?php echo base_url('member/order/checkout') ?>">
              <span class="badge red z-depth-1 mr-1"> <?php echo count($this->cart->contents()) ?> </span>
              <i class="fas fa-shopping-cart"></i>
              <span class="clearfix d-none d-sm-inline-block"> Cart </span>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.facebook.com/geraibabaofficial/" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://www.instagram.com/gerai_baba/" class="nav-link waves-effect" target="_blank">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->