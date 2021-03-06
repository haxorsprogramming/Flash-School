<?php
session_start();
include('../../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Flash School - Halaman Siswa</title>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <!-- General CSS Files -->
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/iziToast.min.css">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/jqvmap.min.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/summernote-bs4.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/datatables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/style.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/nadharesto.css">
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/stisla/css/components.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>
  <script src='https://unpkg.com/nprogress@0.2.0/nprogress.js'></script>
  <link rel="stylesheet" href="<?=$base_url; ?>ladun/dasbor/nProg/nprogress.css" />

</head>

<body style="font-family: 'Nunito Sans';">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg" style="background-color:#2c3e50;"></div>
      <nav class="navbar navbar-expand-lg main-navbar" id="divNavbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="<?=$base_url; ?>ladun/dasbor/img/avatar-1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">Hi, <?=$_SESSION["user_login"]; ?> - Siswa</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="#!" id='btnLogOutTop' class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar" id="divMenu">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="#!" style="height:30px;">
              <img src="<?=$base_url; ?>img/logo.png" style="width: 140px;">
            </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#!"></a>
          </div>
          <ul class="sidebar-menu" style="margin-top:20px;">
            <li><a class="nav-link" @click="berandaAtc()" href="#!"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
            <li><a class="nav-link" @click="profileAtc()" href="#!"><i class="fas fa-home"></i><span>Profil</span></a></li>
            <li><a class="nav-link" href="<?=$base_url; ?>pesanan-saya.php"><i class="fas fa-home"></i><span>Data Pemesanan</span></a></li>
            <li><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> <span>LogOut</span></a></li>
          </ul>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content" id="divMain">
        <section class="section">
          <div class="section-header">
            <h1 id="capUtama"> Flash School - {{ titleApps }}</h1>
          </div>

          <div id="divUtama"></div>
        </section>

      </div>
    </div>
    <footer class="main-footer" id='divFooter'>Copyright &copy; Iis Rokhmatul Khasanah</footer>
    <!-- General JS Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/popper.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/bootstrap.min.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/jquery.nicescroll.min.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/moment.min.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/stisla.js"></script>

    <!-- JS Libraries -->
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/datatables.min.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/iziToast.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://s3-id-jkt-1.kilatstorage.id/ebunga/ebunga-cdn/js-lib/axios/axios.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://s3-id-jkt-1.kilatstorage.id/ebunga/ebunga-cdn/js-lib/lottie/lottie-player.js"></script>
    <script src="<?=$base_url; ?>ladun/dasbor/stisla/js/scripts.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places"></script>

    <!-- Page Specific JS File -->
    <script>
      const server = "<?=$base_url; ?>";
    </script>
    <script src="<?=$base_url; ?>ladun/dasbor/siswa_dashboard.js"></script>
</body>

</html>