<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail</title>
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

      <!--Banner-->

      <!--/ Banner-->

      <!--/ feature-->
      <!--Organisations-->

      <!--/ Cta-->
      <!--work-shop-->

      <!--/ work-shop-->
      <!--Faculity member-->


      <?php

      include 'connect.php';
      $id = $_GET["id"];
      //query ambil data
      function query($query)
      {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
          $rows[] = $row;
        }
        return $rows;
      }


      $ambil = $db->query("SELECT * FROM tambah_guru WHERE id='$id'");
      $detail = $ambil->fetch_assoc();


      ?>

      <section id="faculity-member" class="section-padding">
        <div class="container">
          <div class="row">
            <div class="header-section text-center">
              <h2>Detail Tenaga Pengajar</h2>
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="pm-staff-profile-container">
                  <div class="pm-staff-profile-image-wrapper text-center">
                    <div class="pm-staff-profile-image">
                      <img src="img/<?php echo $detail["gambar"] ?>" alt="" class="img-thumbnail img-circle" />

                    </div>


                    <p class="pm-staff-profile-name"><?php echo $detail["nama"]; ?></p>

                    <div class="pm-staff-profile-details">
                      <p class="pm-staff-profile-bios">Jenis Kursus : <?php echo $detail["jenis_krs"]; ?> </p>

                      <p class="pm-staff-profile-bios"> <?php echo $detail["tempat_krs"]; ?> </p>
                      <p class="pm-staff-profile-bios"><?php echo $detail["mapel_krs"]; ?> </p>
                      <p class="pm-staff-profile-bios">Latar Belakang : <br> <?php echo $detail["latar_belakang"]; ?> </p>
                      <p class="pm-staff-profile-bios">Daftar Riwayat Hidup : <br> <?php echo $detail["cv_krs"]; ?> </p>
                      <p class="pm-staff-profile-bios">Provinsi : <?php echo $detail["prov"]; ?> </p>
                      <p class="pm-staff-profile-bios">Kabupaten : <?php echo $detail["kota"]; ?> </p>
                      <p class="pm-staff-profile-bios">kecamatan : <?php echo $detail["kec"]; ?> </p>
                      <p class="pm-staff-profile-bios">No. Hp : <?php echo $detail["no_tlp"]; ?> </p>

                      <br><br>
                      <button class="btn btn-primary"><a href="list_guru.php"> Kembali </a></button>

                    </div>
                    <hr class="bottom-line">
                  </div>


      </section>
      <!--/ Faculity member-->
      <!--Testimonial-->

      <!--/ Testimonial-->
      <!--Courses-->

      <!--/ Courses-->
      <!--Pricing-->

      <!--/ Pricing-->
      <!--Contact-->

      <!--/ Contact-->
      <!--Footer-->
      <footer id="footer" class="footer">
        <div class="container text-center">


          <!-- End newsletter-form -->
          <ul class="social-links">
            <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
            <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
          </ul>
          ©2020 Iis Rokhmatul Khasanah
          <div class="credits">
            <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Mentor
        -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade.com</a>
          </div>
        </div>
      </footer>
      <!--/ Footer-->

      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="contactform/contactform.js"></script>

</body>

</html>