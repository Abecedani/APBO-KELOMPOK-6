<?php
if(!isset($authPage)) {
  $authPage = FALSE;
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$pageTitle;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/daterangepicker/css/datepicker.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/daterangepicker/css/datepicker-bs4.min.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/pace-style.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/dropify/css/dropify.min.css">


    <link rel="stylesheet" href="<?=base_url();?>assets/sufee/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <style>
      #dataTable_filter input {
        margin-left: -17px;
      }
    </style>

</head>

<body<?php if($authPage) { echo " class='bg-dark'"; } ?>>

  <script src="<?=base_url();?>assets/jquery.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?=base_url();?>assets/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?=base_url();?>assets/daterangepicker/js/datepicker-full.min.js"></script>
  <script src="<?=base_url();?>assets/sufee/vendors/chart.js/dist/Chart.min.js"></script>
  <script src="<?=base_url();?>assets/dropify/js/dropify.min.js"></script>
  <script>
      paceOptions = {
      restartOnRequestAfter: 5,
      ajax: {
        trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE']
      }
    }
  </script>
  <script src="<?=base_url();?>assets/pace.min.js"></script>

<?php
if(!$authPage) {
?>

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?=base_url();?>">CV. Gaspol Rem Blong</a>
                <a class="navbar-brand hidden" href="<?=base_url();?>">B</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <!-- Ambil Role dari Session -->
                <?php $user_role = $this->session->userdata('auth')['role']; ?>
                
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?=base_url("dashboard");?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                  <!-- MENU TRANSAKSI: Di-hide dari Owner -->
                  <?php if($user_role != 'owner'): ?>
                  <h3 class="menu-title">Transaksi</h3>
                    <li>
                        <a href="<?=base_url("transaction");?>"> <i class="menu-icon fa fa-plus-square"></i>Tambah Transaksi</a>
                    </li>
                    <li>
                        <a href="<?=base_url("sparepart_sales");?>"> <i class="menu-icon fa fa-list"></i>Riwayat Penjualan</a>
                    </li>
                    <li>
                        <a href="<?=base_url("service_sales");?>"> <i class="menu-icon fa fa-list"></i>Riwayat Service</a>
                    </li>
                  <?php endif; ?>

                  <!-- MENU DATA MASTER: Hanya untuk Admin dan Owner -->
                  <?php if($user_role == 'admin' || $user_role == 'owner'): ?>
                  <h3 class="menu-title">Data & Laporan</h3>
                    <li>
                        <a href="<?=base_url("sparepart");?>"> <i class="menu-icon fa fa-archive"></i>Data Sparepart </a>
                    </li>
                    <li>
                        <a href="<?=base_url("services");?>"> <i class="menu-icon fa fa-cogs"></i>Data Services </a>
                    </li>
                    <li>
                        <a href="<?=base_url("supplier");?>"> <i class="menu-icon fa fa-users"></i>Data Supplier </a>
                    </li>
                    <li>
                        <a href="<?=base_url("purchase");?>"> <i class="menu-icon fa fa-shopping-cart"></i>Data Pembelian Stock </a>
                    </li>
                  <?php endif; ?>

                  <!-- MENU LAPORAN: Hanya untuk Owner dan Admin -->
                  <?php if($user_role == 'owner' || $user_role == 'admin'): ?>
                    <h3 class="menu-title">Laporan</h3>
                    <li>
                        <a href="<?=base_url("report/sales");?>"> <i class="menu-icon fa fa-bar-chart-o"></i>Laporan Penjualan</a>
                    </li>
                    <li>
                        <a href="<?=base_url("report/service");?>"> <i class="menu-icon fa fa-bar-chart-o"></i>Laporan Service</a>
                    </li>
                    <li>
                        <a href="<?=base_url("report/purchase");?>"> <i class="menu-icon fa fa-bar-chart-o"></i>Laporan Pembelian</a>
                    </li>
                  <?php endif; ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <div class="header-left">
                        <div style="height:41px"></div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        
                        <!-- Query Langsung ke Database untuk Tarik Nama User -->
                        <?php 
                            $user_id = $this->session->userdata('auth')['id'];
                            $user_data = $this->db->get_where('users', ['id' => $user_id])->row();
                            // Ngecek ada kolom 'name' ga, kalau gaada pakai 'username'
                            $display_name = isset($user_data->name) ? $user_data->name : (isset($user_data->username) ? $user_data->username : 'User');
                        ?>
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="display:flex; align-items:center; gap:10px; text-decoration:none;">
                            <span style="font-weight: 600; color: #6c757d;">Hi, <?= ucfirst($display_name); ?></span>
                            <img class="user-avatar rounded-circle" src="<?=base_url("assets/avatar-1.png");?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?=base_url("setting/change_password");?>"><i class="fa fa-key"></i> Ganti Password</a>
                            <a class="nav-link" href="<?=base_url("auth/logout");?>"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

<?php } ?>