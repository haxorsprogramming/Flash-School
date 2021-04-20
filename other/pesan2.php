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
        <a href="dashboard.php" class="navbar-brand"><img src="img/logo.png" height="80px"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#feature">Tentang Kami</a></li>
          <li><a href="#work-shop">Layanan Kami</a></li>
          <li><a href="chekout.php">keranjang</a></li>
          <li><a href="bayar.php" name="keranjang">Chekout <span class="sr-only">(current)</span></a></li>
          <li class="btn-trial"><a href="index.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>



  <section class="kontent">

    <?php
    $id     = $_GET["id"];
    $query  = mysqli_query($db, "SELECT * FROM tambah_guru WHERE id='$id'");

    while ($data = mysqli_fetch_assoc($query)) {
    ?>
      <div class="container">
        <div class="row">
          <div class="col-md-3">

            <img src="img/<?php echo $data["gambar"]; ?>" class="img-responsive img-thumbnail img-circle" style="width:300px" alt="">
          </div>


          <div class="col-md-5">
            <br>
            <h2 style="color: black; font-size: 28px"><?php echo $data["nama"]; ?></h2>
            <h4> <?php echo $data["prov"]; ?></h4>
            <h4> <?php echo $data["kota"]; ?></h4>
            <h4> <?php echo $data["kec"]; ?></h4>
            <br>

          <?php }; ?>


          </div>
        </div>

  </section>
  <hr style="height:2px;border-width:0;width:auto;color:black;background-color:gray">
  </section>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4>Pilih Jenis Kursus : <br><br> </h4>
          <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="jenis" value="option1">
            <label class="form-check-label" for="inlineRadio1">Individu</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jenis" value="option2">
            <label class="form-check-label" for="inlineRadio2">Berkelompok</label>
          </div><br>

          <h4>Pilih Tempat Kursus : <br><br> </h4>

          <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="tempat" value="option1">
            <label class="form-check-label" for="inlineRadio1">Dirumah</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="tempat" value="option2">
            <label class="form-check-label" for="inlineRadio2">Di Lembaga</label>
          </div>
          <br>

          <h4>Masukkan Nomer Hp/Whatsapp : <br> <br>
            <input class="form-control" type="number" name="Nomor" size="20" required style="width: 300px;" />
          </h4><br>
          <h4>Masukkan Alamat : <br> <br>
            <input class="form-control" type="text" name="alamat" size="20" required style="width: 500px;height:100px" />
          </h4><br>
        </div>


        <div class="col-md-6">
          <h4>Pilih Paket Kursus : <br><br> </h4>
          <div class="form-check-inline">
            <input class="form-check-input" type="radio" name="paket" value="option1">
            <label class="form-check-label" for="inlineRadio1">Paket Normal (8x Pertemuan/Bulan)</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paket" value="option2">
            <label class="form-check-label" for="inlineRadio2">Paket Intensif (12x Pertemuan/Bulan)</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paket" value="option2">
            <label class="form-check-label" for="inlineRadio2">Paket Extra Intensif (16x Pertemuan/Bulan)</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paket" value="option2">
            <label class="form-check-label" for="inlineRadio2">Paket Premium (30x Pertemuan/Bulan)</label>
          </div><br>

        </div>
      </div>
    </div>






  </section>

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