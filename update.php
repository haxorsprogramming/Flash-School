<?php

include 'connect.php';

if (isset($_POST['submit'])) {

  $jenis_krs = implode(', ', $_POST['jenis_krs']);
  // ambil data dari formulir
  $id             = $_POST["id"];
  $nama           = $_POST["nama"];
  $tempat_krs     = $_POST["tempat_krs"];
  $mapel_krs      = $_POST["mapel_krs"];
  $latar_belakang = $_POST["latar_belakang"];
  $cv_krs         = $_POST["cv_krs"];
  $no_tlp         = $_POST["no_tlp"];
  $prov         = $_POST["prov"];
  $kota         = $_POST["kota"];
  $kec         = $_POST["kec"];
  $gambarLama     = $_POST['gambarLama'];
  $gambar         = $_FILES["gambar"];

  function upload()
  {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yg diupload
    if ($error === 4) {
      echo "<script>
   alert('pilih gambar');
   </script>";
      return false;
    }

    //cek yang diupload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
    alert('yang anda upload bukan gambar');
     document.location.href = 'tambah_guru.php';
    </script>";
      return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
      echo "<script>
    alert('Ukuran Gambar Terlalu Besar');
    </script>";
    }
    //lolos pengecekan, gambar siap upload
    //generate nama gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
  }


  //cek apakah user pilih gmbr baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }





  // buat query update
  $sql = "UPDATE tambah_guru SET
            nama ='$nama',
            jenis_krs='$jenis_krs',
            tempat_krs='$tempat_krs',
            mapel_krs='$mapel_krs',
            latar_belakang='$latar_belakang',
            cv_krs='$cv_krs',
            no_tlp='$no_tlp',
            prov='$prov',
            kota='$kota',
            kec='$kec',
            gambar='$gambar'
            WHERE id=$id";

  $query = mysqli_query($db, $sql);

  $tampil = $_GET['submit'];
  $query_tampil = mysqli_query($db, "SELECT * FROM tambah_guru WHERE id = '$tampil' ");

  $edit = mysqli_fetch_array($query_tampil);

  $checked = explode(', ', $edit['jenis_krs']);


  $query = mysqli_query($db, "SELECT * FROM tambah_guru ORDER BY id DESC");

  // apakah query update berhasil?
  if ($query) {
    // kalau berhasil alihkan ke halaman list-siswa.php
    header('Location: list_guru.php');
  } else {
    // kalau gagal tampilkan pesan
    die("Gagal menyimpan perubahan...");
  }
} else {
  die("Akses dilarang...");
}
