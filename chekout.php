<?php
@session_start();
include 'connect.php';
//mendapatkan id produk dari url
//query ambil data
if (!isset($_SESSION["keranjang"])) {
  echo "<script>alert('Silahkan Pilih Produk Lebih Dahulu');</script>";
  echo "<script>location='dashboard.php';</script>";
}

if (empty($_SESSION["keranjang"])) {
  echo "<script>alert('Silahkan Pilih Produk Lebih Dahulu');</script>";
  echo "<script>location='dashboard.php';</script>";
}

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
          <li><a href="chekout.php">Keranjang</a></li>
          <li><a href="bayar.php">Chekout</a></li>
          <li class="btn-trial"><a href="index.php">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <!--Modal box-->
  <br><br>

  <section class="kontent">
    <div class="container">
      <h1 style="color: black;"><b>Informasi!</b> </h1>
      <p style="border: solid 1px #eceff5; background: 	#DCDCDC; padding: 15px; margin: 0; width: 430px; line-height: 23px; color: black; font-size: 14px; border-radius: 20px">- Belum Termasuk Biaya Registrasi(biaya ini di luar biaya kursus) <br>
        - Anda tidak membayar apapun sampai guru pilihan Anda menerima permintaan kursus Anda</p> <br><br>
      <table class="table">

        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Tentor yang dipilih</th>
            <th scope="col">Bidang Kursus :</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Aksi</th>


          </tr>
        </thead>

        <?php
        $no = 1;
        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) :  ?>

          <?php

          $ambil = $db->query("SELECT * FROM tambah_guru WHERE id='$id_produk'");
          $pecah = $ambil->fetch_assoc();
          ?>

          <tbody>
            <tr>
              <th scope="row"><?= $no; ?></th>
              <td><img src="img/<?php echo $pecah["gambar"]; ?>" style="width: 100px;" alt=""></td>
              <td><?php echo $pecah["nama"]; ?></td>
              <td><?php echo $pecah["mapel_krs"]; ?></td>
              <td><?php echo $pecah["harga"]; ?></td>
              <td><a class="btn btn-danger" href="hapus3.php?id=<?php echo $pecah["id"]; ?>">Hapus</td>
            </tr>
          </tbody>
          <?php $no++; ?>
        <?php endforeach ?>
      </table>
      <a class="btn btn-primary" href="dashboard.php">Kembali</a>
      <a class="btn btn-success" href="bayar.php">CheckOut</a>
    </div>


  </section><br><br><br><br><br><br><br><br>



  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>
</body>

</html>