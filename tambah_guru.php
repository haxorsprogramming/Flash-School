<?php
//koneksi database
include 'connect.php';
//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  $jenis_krs = implode(', ', $_POST['jenis_krs']);
  //ambil data dari tiap elemen dalam form
  $nama           = htmlspecialchars($_POST["nama"]);
  $mapel_krs      = htmlspecialchars($_POST["mapel_krs"]);
  $harga          = htmlspecialchars($_POST["harga"]);
  $latar_belakang = htmlspecialchars($_POST["latar_belakang"]);
  $cv_krs         = htmlspecialchars($_POST["cv_krs"]);
  $no_tlp         = $_POST["no_tlp"];
  $prov           = $_POST["prov"];
  $kota           = $_POST["kota"];
  $kec            = $_POST["kec"];
  // upload gambar

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  //query insert data
  $query = "INSERT INTO tambah_guru
            VALUES 
            ('', '$nama', '$jenis_krs', '$tempat_krs','$mapel_krs', '$harga', '$latar_belakang','$cv_krs','$no_tlp','$prov','$kota','$kec','$gambar')
            ";
  mysqli_query($db, $query);



  //cek apakah berhasil atau tidak
  if (mysqli_affected_rows($db) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'tambah_guru.php';
          </script>";
  } else {
    echo "<script>
            alert('Gagal Ditambahkan');
          </script>";
  }
}

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
?>




<html>

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
  <script src="js/jquery-3.5.1.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

  <!-- =======================================================
    Theme Name: Mentor
    Theme URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->

  <title>Tambah Data Guru</title>
  <style type="text/css" media="screen">
    table {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
    }

    input {
      font-family: Verdana, Arial, Helvetica, sans-serif;
      font-size: 11px;
      height: 20px;
    }
  </style>
</head>

<body>
  <div style="border:0; padding:10px; width:760px; height:auto;">

    <form action="" method="POST" name="form-input-data" enctype="multipart/form-data">
      <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="46">
          <td width="10%"> </td>
          <td width="25%"> </td>
          <td width="65%">
            <font color="orange" size="2">Tambah Data Guru</font>
          </td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Nama </td>
          <td><input type="text" name="nama" size="35" maxlength="" required /></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Kursus yang ditawarkan</td>
          <td><input type="checkbox" name="jenis_krs[]" value="dirumah" /> dirumah
            <input type="checkbox" name="jenis_krs[]" value="dilembaga" /> dilembaga

          </td>
        </tr>



        <tr height="46">
          <td> </td>
          <td>Kursus yang diajarkan</td>
          <td><select name="mapel_krs" required>
              <option value="-">- Pilih kursus -
              <option value="SD">SD
              <option value="SMP">SMP
              <option value="SMA">SMA
              <option value="Bahasa Inggris">Bahasa Inggris
              <option value="Bahasa Jepang">Bahasa Jepang
              <option value="Menggambar">Menggamba
              <option value="Mengaji">Mengaji
              <option value="Mewarnai">Mewarnai
            </select></td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Kursus yang diajarkan</td>
          <td><select name="harga" required>
              <option value="-">- Pilih kursus -
              <option value="Rp. 200.000 sd 500.000">SD, (Rp. 200.000 - Rp. 500.000)
              <option value="Rp. 250.000 sd 600.000">SMP (Rp. 250.000 - Rp. 600.000)
              <option value="Rp. 320.000 sd 800.000">SMA (Rp. 320.000 - Rp. 800.000)
              <option value="Rp. 100.000 sd 300.000">Bahasa Inggris (Rp 400.000)
              <option value="Rp. 100.000 sd 300.000">Bahasa Jepang (Rp 400.000)
              <option value="Rp. 100.000 sd 300.000"> Menggambar (Rp. 100.000 - 300.000)
              <option value="Rp. 100.000 sd 300.000">Mengaji (Rp. 100.000 - 300.000)
              <option value="Rp. 100.000 sd 300.000">Mewarnai (Rp. 100.000 - 300.000)
            </select></td>
        </tr>



        <tr height="46">
          <td> </td>
          <td>Latar Belakang</td>
          <td><textarea type="komentar" name="latar_belakang" size="200" value="Latar Belakang :" required style="margin: 0px; height: 113px; width: 303px"></textarea></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Daftar Riwayat Hidup</td>
          <td><textarea type="komentar" name="cv_krs" size="50" required style="margin: 0px; height: 113px; width: 303px"></textarea></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>No. Telp</td>
          <td><input type="text" name="no_tlp" size="20" required /></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Masukan Alamat</td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Provinsi</td>
          <td><select name="prov" required>
              <option value="-">- Pilih Provinsi -
              <option value="JAWA TIMUR">JAWA TIMUR
            </select></td>
          </td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Kabupaten</td>
          <td><select name="kota" required>
              <option value="-">- Pilih Kabupaten -
              <option value="KABUPATEN PASURUAN">KABUPATEN PASURUAN
              <option value="KOTA PASURUAN">KOTA PASURUAN
            </select></td>
          </td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Kecamatan</td>
          <td><select name="kec" required>
              <option value="-">- Pilih kecamatan -
              <option value="BANGIL PASURUAN">BANGIL PASURUAN
              <option value="BEJI PASURUAN">BEJI PASURUAN
              <option value="GEMPOL PASURUAN">GEMPOL PASURUAN
              <option value="KEJAYAN PASURUAN">KEJAYAN PASURUAN
              <option value="GRATI PASURUAN">GRATI PASURUAN
              <option value="PANDAAN PASURUAN">PANDAAN PASURUAN
              <option value="KAROTN PASURUAN">KRATON PASURUAN
              <option value="PRIGEN PASURUAN">PRIGEN PASURUAN
              <option value="REMBANG PASURUAN">REMBANG PASURUAN
              <option value="WINONGAN PASURUAN">WINONGAN PASURUAN
            </select></td>
          </td>
        </tr>


        <tr height="46">
          <td> </td>
          <td>Masukan Foto</td>
          <td><input type="file" name="gambar" size="20" /></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td> </td>
          <td><button type="submit" name="submit" class="btn btn-primary"> Submit
              <button class="btn btn-secondary"><a href="admin.php"> Cancel </a></button>
          </td>
        </tr>
      </table>
    </form>

  </div>
</body>

</html>