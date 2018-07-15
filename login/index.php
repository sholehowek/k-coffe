<?php 
include ('../config/koneksi.php');
include ('../config/sistem.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Kedai Coffe</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../logo.png" />
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="">
              <h1>Login Form</h1>
              <?php
              include ('../config/login_proses.php');
              if(isset($_SESSION['status'])){
                if ($_SESSION['status']=='SuperAdmin') {
                  header("location: $base_url/superadmin");
                }
                elseif ($_SESSION['status']=='Admin') {
                header("location: $base_url/admin");
                }
                elseif ($_SESSION['status']=='Kasir') {
                  header("location: $base_url/kasir");
                }
                elseif ($_SESSION['status']=='Waiters') {
                  header("location: $base_url/waiters");
                }
                elseif ($_SESSION['status']=='Dapur') {
                  header("location: $base_url/dapur");
                }
                elseif ($_SESSION['status']=='Pelanggan') {
                  header("location: $base_url/pelanggan");
                }
              }
              else {

              }
              ?>
              <?php echo $error; ?>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" autofocus="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="login">Login</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-coffee"></i> Kedai Coffe SI</h1>
                  <p>©2017 Template Gentelella Alela! by Colorlib<br/> Project by Kedai Coffe</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery custom content scroller -->
    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
