<?php
include 'connect.php';
?>




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
  <!--Navigation bar-->
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="admin.php" class="navbar-brand"><img src="img/logo.png" height="80px"></a>
      </div>

    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->

  <!-- Main content -->
  <section class="content">
    <div class="container">
      <h2 class="text-center" style="color: black;">Data pemesan</h2>


      <?php
      $ambil = mysqli_query($db, "SELECT * FROM pesanan");
      ?>
      <?php
      while ($data = mysqli_fetch_assoc($ambil)) :
      ?>
        <p> <b> Nama Pemesan : </b> <?php echo $data["nama"]; ?> </p>
        <p> <b> Jenis Pesanan : </b> <?php echo $data["jenis"]; ?> </p>
        <p> <b> Tempat Kursus : </b> <?php echo $data["tempat"]; ?> </p>
        <p> <b> No. Hp : </b> <?php echo $data["Nomor"]; ?> </p>
        <p> <b> Alamat : </b> <?php echo $data["alamat"]; ?> </p>
        <p> <b> Paket kursus : </b> <?php echo $data["paket"]; ?> </p>
        <p> <b> Hari Kursus : </b> <?php echo $data["hari"]; ?> </p>
        <p> <b> Jam Kursus : </b> <?php echo $data["jam"]; ?> </p>

        <?php $result = mysqli_query($db, "SELECT * FROM tambah_guru"); ?>
        <button class="btn btn-primary"><a href="edit.php?id=<?php echo $row["id"]; ?>"> Konfirmasi Pesanan </a></button>
        <button class="btn btn-danger"><a href="hapus2.php?id=<?php echo $data["id"]; ?>"> Hapus </a></button>
        <hr style="border: solid 1px; background: 	#0000; width: 1100px">

        <br>
        <br>
        <br>
        <br>
      <?php endwhile; ?>
    </div>

  </section>

  <!-- /.content -->






























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
  <!--/ Footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
</body>

</html>