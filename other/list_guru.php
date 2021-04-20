<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flash School</title>
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


  <?php
  //koneksi ke database
  include 'connect.php';

  //ambil data dari tabel
  $result = mysqli_query($db, "SELECT * FROM tambah_guru");

  //ambil data mhs dari objek result (fetch)






  ?>
  <div class="container">
    <div class="btn-trial"><a href="admin.php">Back</a></div>
    <section id="faculity-member" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="header-section text-center">
            <h2>Tenaga Pengajar</h2>
            <p>Tenaga Pengajar kami adalah tenaga pengajar
              profesional dan terbaik lulusan atau mahasiswa universitas terkemuka Indonesia.</p>
            <hr class="bottom-line">
          </div>
          <?php
          while ($row = mysqli_fetch_assoc($result)) :


          ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
              <div class="pm-staff-profile-container">
                <div class="pm-staff-profile-image-wrapper text-center">
                  <div class="pm-staff-profile-image">
                    <img src="img/<?php echo $row["gambar"] ?>" alt="" class="img-thumbnail img-circle" />
                  </div>
                </div>


                <div class="pm-staff-profile-details text-center">

                  <p class="pm-staff-profile-name"><?php echo $row["nama"]; ?></p>
                  <p class="pm-staff-profile-bios"><?php echo $row["mapel_krs"]; ?></p>
                  <button class="btn btn-success"><a href="detail.php?id=<?php echo $row["id"]; ?>"> Detail </a></button>
                  <button class="btn btn-primary"><a href="edit.php?id=<?php echo $row["id"]; ?>"> Edit </a></button>
                  <button class="btn btn-danger"><a href="hapus.php?id=<?php echo $row["id"]; ?>"> Hapus </a></button>
                  <!-- <p class="pm-staff-profile-title"> echo $row["mapel_krs"]; ?> </p>
              <p class="pm-staff-profile-title"> echo $row["latar_belakang"]; ?> </p>
              <p class="pm-staff-profile-title"><p echo $row["cv_krs"]; ?> </p>
              <p class="pm-staff-profile-title">< echo $row["no_tlp"]; ?> </p> -->
                </div>
              </div>
            </div>


          <?php

          endwhile;
          ?>

        </div>
      </div>

    </section>
  </div>

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