<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $id       = $_POST["id"];
  $nama     = $_POST["nama"];
  $jenis    = $_POST["jenis"];
  $tempat   = $_POST["tempat"];
  $nomor    = $_POST["Nomor"];
  $alamat   = $_POST["alamat"];
  $paket    = $_POST["paket"];
  $hari     = implode(', ', $_POST['hari']);
  $jam      = $_POST["jam"];

  $query    = mysqli_query($db, "INSERT INTO pesanan VALUES ('$id','$nama','$jenis','$tempat','$nomor','$alamat','$paket','$hari','$jam')");

  if ($query > 0) {
    header('location: chekout.php');
  }
}
