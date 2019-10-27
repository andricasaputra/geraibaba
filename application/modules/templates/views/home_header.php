<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="busana masa kini, baju gamis masa kini, model baju gamis masa kini, baju gamis trend masa kini, baju gamis masa kini 2019, pakaian gamis masa kini, baju gamis murah, baju gamis berkualitas"/>
  <meta name="description" content="Busana Gamis Masa Kini"> 
  
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
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">

  <style type="text/css">
    html,
    body,
    header,
    .carousel {
      height: 60vh;
    }

    #iconapk{
      animation-duration: 1s;
      animation-delay: 2s;
      animation-iteration-count: infinite;
    }

    #keyword::-webkit-input-placeholder{
      color: white;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .carousel {
        height: 100vh;
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
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-150294072-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-150294072-1');
  </script> -->
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar mt-0 mb-0">
    <div class="container">

      <!-- Brand -->
      <a class="navbar-brand waves-effect" href="<?php echo base_url() ?>">
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
            <a class="nav-link waves-effect" style="font-weight: 500" href="<?php echo base_url('home') ?>">Home
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
            <a class="nav-link waves-effect" style="font-weight: 500" href="<?php echo base_url('home/carapembelian') ?>">Cara Pembelian</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-2">
          <li class="nav-item text-center" >
            <a href="<?php echo base_url('auth/login') ?>" class="nav-link border border-light rounded waves-effect btn-outline-dark">
              <i class="fa fa-key mr-2"></i>Login
            </a>
          </li>
        </ul>

        <!-- Right -->
        <ul class="navbar-nav nav-flex-icons">
          <li class="nav-item">
            <a href="<?php echo base_url('auth/register') ?>" class="nav-link border border-light rounded waves-effect btn-outline-dark">
              <i class="fa fa-envelope mr-2"></i>Register
            </a>
          </li>
          <li class="nav-item" id="cart-nav">
            <a class="nav-link waves-effect" href="#">
              <span class="badge red z-depth-1 mr-1"></span>
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