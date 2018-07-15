<?php 
include ('../config/koneksi.php');
include ('../config/sistem.php');
session_start();
  if (empty($_SESSION['nama'])){
    header("location: $base_url");
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home | Kedai Coffe</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="../logo.png" />
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-coffee"></i> <span>Kedai Coffe</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><?php echo $_SESSION['nama'] ; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard </a>
                  </li>
                  <?php 
                  if ($_SESSION['status'] == 'SuperAdmin' or $_SESSION['status'] == 'Admin') {
                    ?>
                  <li><a><i class="fa fa-edit"></i> Daftar Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="menumakanan.php">Makanan</a></li>
                      <li><a href="menuminuman.php">Minuman</a></li>
                      <li><a href="menupaket.php">Paket</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="user.php?nama=superadmin">Superadmin</a></li>
                      <li><a href="user.php?nama=admin">Admin</a></li>
                      <li><a href="user.php?nama=kasir">Kasir</a></li>
                      <li><a href="user.php?nama=dapur">Dapur</a></li>
                      <li><a href="user.php?nama=waiters">Waiters</a></li>
                      <li><a href="user.php?nama=pelanggan">Meja Pelanggan</a></li>
                    </ul>
                  </li>
                  <li><a href="pemesanan.php"><i class="fa fa-clone"></i> Pemesanan </a>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Laporan </a></li>
                  <?php }
                  elseif ($_SESSION['status'] == 'Kasir') { ?>
                  <li><a href="pembayaran.php"><i class="fa fa-table"></i> Pembayaran </a>
                  </li>
                  <li><a href="pemesanan.php"><i class="fa fa-clone"></i> Pemesanan </a>
                  </li>
                  <?php } 
                  elseif ($_SESSION['status'] == 'Dapur') { ?>                  
                  <li><a href="pemesanan.php"><i class="fa fa-clone"></i> Pemesanan </a>
                  </li>
                  <?php } 
                  elseif ($_SESSION['status'] == 'Waiters') { ?> 
                  <li><a href="pemesanan.php"><i class="fa fa-clone"></i> Pemesanan </a>
                  </li>                 
                  <li><a><i class="fa fa-check-square-o"></i> Konfirmasi Pemesanan </a>
                  </li>
                  <?php } ?>
                  
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>