<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flash School - Cari Tentor</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/imagehover.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand"><img src="img/logo.png" height="80px"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Tentang Kami</a></li>
          <li><a href="#work-shop">Layanan Kami</a></li>
          <li class="btn-trial"><a href="login.php">Sign in</a></li>
          <!-- <li class="btn-trial"><a href="daftar.php">Sign Up</a></li> -->
        </ul>
      </div>
    </div>
  </nav>


  <div class="container">
    <div style="margin-top:40px;text-align:center;">
      <h6>Masukkan nama wilayah</h6>
      <?php
      if (isset($_GET['kata_cari'])) {
        $kota_temp = $_GET['kata_cari'];
      } else {
        $kota_temp = "";
      }
      ?>
      <input id="pac-input" class="form-control" type="text" value="<?= $kota_temp; ?>" placeholder="cth (sidorejo)" onchange="getArea()" />
    </div>
  </div> <br><br><br>

  <!-- pencarian tentor -->
  <?php
  //untuk meinclude kan koneksi
  include('connect.php');
  //jika kita klik cari, maka yang tampil query cari ini
  if (isset($_GET['kata_cari'])) {
    //menampung variabel kata_cari dari form pencarian
    $kata_cari = $_GET['kata_cari'];

    //jika hanya ingin mencari berdasarkan kode_produk, silahkan hapus dari awal OR
    //jika ingin mencari 1 ketentuan saja query nya ini : SELECT * FROM produk WHERE kode_produk like '%".$kata_cari."%' 
    //$semuadata = array();
    $ambil = mysqli_query($db, "SELECT * FROM tambah_guru WHERE kec LIKE '%" . $kata_cari . "%' ORDER BY id ASC");

    //   while ($pecah = $ambil->fetch_assoc()) {
    //     $semuadata[] = $pecah;
    //   }
    // }
  ?>

    <div class="container">
      <section id="faculity-member" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="header-section text-center">
              <h1>Tenaga Pengajar</h1>
              <p>Pengajar yang terdekat dengan Anda (<?= $_GET['kata_cari']; ?>)</p>
              <hr class="bottom-line">
            </div>

            <?php

            while ($value = mysqli_fetch_assoc($ambil)) {
            ?>
              <!-- <?php //foreach ($semuadata as $value) : 
                    ?> -->

              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="pm-staff-profile-container">
                  <div class="pm-staff-profile-image-wrapper text-center">

                    <div class="pm-staff-profile-image">
                      <img src="img/<?php echo $value['gambar']; ?>" alt="" class="img-thumbnail img-circle" />
                    </div>
                  </div>

                  <div class="pm-staff-profile-details text-center">
                    <p class="pm-staff-profile-name"><?php echo $value["nama"]; ?> </p>
                    <p class="pm-staff-profile-bios"><?php echo $value["mapel_krs"]; ?></p>
                    <p class="pm-staff-profile-bios"><?php echo $value["kota"]; ?></p>
                    <p class="pm-staff-profile-bios"><?php echo $value["kec"]; ?></p>
                    <button class="btn btn-success" name="pesan"> <a href="pesan.php?id=<?php echo $value["id"]; ?>"> Reservasi </a></button>

                    <!-- <p class="pm-staff-profile-title"> echo $row["mapel_krs"]; ?> </p>
              <p class="pm-staff-profile-title"> echo $row["latar_belakang"]; ?> </p>
              <p class="pm-staff-profile-title"><p echo $row["cv_krs"]; ?> </p>
              <p class="pm-staff-profile-title">< echo $row["no_tlp"]; ?> </p> -->
                  </div>
                </div>
              </div>
              <!-- tampilkan data  -->

              <!--  <?php //endforeach 
                    ?>-->
          <?php }
          } ?>


          </div>
        </div>

      </section>
    </div>



    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
    <script src="js/search.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&libraries=places&callback=initialize"></script>
</body>

</html>