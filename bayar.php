<?php
session_start();
include 'connect.php';
if (@$_SESSION['siswa']) {

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
    <br>



    <!-- KONTEN -->

    <div class="container">
      <table class="table">

        <thead class="thead-light">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tentor yang dipilih</th>
            <th scope="col">Bidang Kursus :</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Sub Harga</th>

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
              <td><?= $pecah['nama']; ?></td>
              <td><?php echo $pecah["mapel_krs"]; ?></td>
              <td><?= $jumlah ?></td>
              <?php $subtotal = $pecah['harga_produk'] * $jumlah ?>
              <td><?php echo $pecah["harga"]; ?></td>

            </tr>
          </tbody>
          <?php $no++; ?>
        <?php endforeach ?>
      </table>
      <a class="btn btn-primary" href="dashboard.php">Kembali</a>
      <button class="btn btn-success" name="checkout">Lanjutkan ke Pembayaran</button>
    </div>

    <?php

    if (isset($_POST["checkout"])) {
      $id = $_SESSION["siswa"]["id"];

      //MENYIMPAN KETABEL PEMBELIAN
      $sql = $db->query("INSERT INTO tb_pembelian (id_pelanggan, id_prov, tanggal_pembelian, total_pembelian, tarif, alamat,status)  VALUES ('$id_pelanggan', '$id_ongkir', '$tanggal_pembelian', '$total_pembelian', '$tarif', '$alamat','Pending')");

      //MENDAPATKAN ID_PEMBELIAN YANG BARUSAN TERJADI
      $id_pembelian_barusan = $koneksi->insert_id;

      foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
        $sql2 = $koneksi->query("INSERT INTO tb_pembelian_produk (id_pembelian, id_produk, jumlah) 
                    VALUES ('$id_pembelian_barusan', '$id_produk', '$jumlah')");
      }

      //MENGOSONGKAN KERANJANG
      unset($_SESSION['keranjang']);

      if ($sql2 === true) {
        echo "<script>alert('PEMBELIAN SUKSES');</script> ";
        echo "<script>location='nota.php?id=$id_pembelian_barusan';</script> ";
      } else {
        echo "Gagal: " . $koneksi->error;
      }
    }

    ?>








    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>
  </body>

  </html>
<?php
} else {
  header('location:login.php');
}
?>