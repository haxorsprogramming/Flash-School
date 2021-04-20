<?php
@session_start();
include 'connect.php';
if (@$_SESSION['guru']) {
?>
  <!DOCTYPE html>
  <html>

  <head>
    <title>guru</title>

  </head>

  <body class="theme-red">
    <?php
    $guru = mysqli_query($db, "select*from pendaftar where id_pendaftar='$_SESSION[guru]'");
    $da = mysqli_fetch_array($guru);
    ?>
    Selamat datang <?php echo $da['nama']; ?><br />
    Anda sekarang berada di Halaman guru <br /><br />
    <a href="logout.php?page=guru" onclick="return confirm('Apakah anda ingin keluar dari halaman guru?')">Log Out</a>
  </body>

  </html>

<?php
} else {
  header('location: index.php');
}
?>