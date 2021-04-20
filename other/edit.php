<?php

include 'connect.php';

//cek apakah tombol sumbit sudah ditekan atau belum
//ambil data di URL


if (!isset($_GET['id'])) {
  // kalau tidak ada id di query string
  header('Location: list_guru.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tambah_guru WHERE id=$id";
$query = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($query);

//tambpil gambar berdasarkan id


// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
  die("data tidak ditemukan...");
}



?>




<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <title>Update Data Guru</title>
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

    <form action="update.php" method="POST" name="form-input-data" enctype="multipart/form-data">
      <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr height="46">
          <td width="10%"> </td>
          <td width="25%"> </td>
          <td width="65%">
            <font color="orange" size="2">Ubah Data Guru</font>
          </td>
        </tr>
        <tr height="46">
          <td><input type="hidden" name="id" size="35" value="<?php echo $data["id"]; ?>" /></td>
          <td><input type="hidden" name="gambarLama" size="35" value="<?php echo $data["gambar"]; ?>" /></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Nama </td>
          <td><input type="text" name="nama" size="35" value="<?php echo $data["nama"]; ?>" required /></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Kursus yang ditawarkan</td>
          <td>
            <input type="checkbox" name="jenis_krs[]" value="dirumah" /> dirumah
            <input type="checkbox" name="jenis_krs[]" value="dilembaga" /> dilembaga


        <tr height="46">
          <td> </td>
          <td>Kursus yang diajarkan</td>
          <td><select name="mapel_krs" required>
              <option value="-">- Pilih kursus -
              <option value="SD" <?php if ($data['mapel_krs'] == 'SD') {
                                    echo 'selected';
                                  } ?>>SD
              <option value="SMP" <?php if ($data['mapel_krs'] == 'SMP') {
                                    echo 'selected';
                                  } ?>>SMP
              <option value="SMA" <?php if ($data['mapel_krs'] == 'SMA') {
                                    echo 'selected';
                                  } ?>>SMA
              <option value="Bahasa Inggris" <?php if ($data['mapel_krs'] == 'Bahasa Inggris') {
                                                echo 'selected';
                                              } ?>>Bahasa Inggris
              <option value="Bahasa Jepang" <?php if ($data['mapel_krs'] == 'Bahasa Jepang') {
                                              echo 'selected';
                                            } ?>>Bahasa Jepang
              <option value="Menggambar" <?php if ($data['mapel_krs'] == 'Menggambar') {
                                            echo 'selected';
                                          } ?>>Menggambar
              <option value="Mengaji" <?php if ($data['mapel_krs'] == 'Mengaji') {
                                        echo 'selected';
                                      } ?>>Mengaji
              <option value="Mewarnai" <?php if ($data['mapel_krs'] == 'Mewarnai') {
                                          echo 'selected';
                                        } ?>>Mewarnai



            </select></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Latar Belakang</td>
          <td><textarea type="komentar" name="latar_belakang" size="200" value="Latar Belakang :" required style="margin: 0px; height: 113px; width: 303px"><?= $data['latar_belakang'] ?></textarea></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>Daftar Riwayat Hidup</td>
          <td><textarea type="komentar" name="cv_krs" size="" required style="margin: 0px; height: 113px; width: 303px"><?= $data['cv_krs'] ?></textarea></td>
        </tr>
        <tr height="46">
          <td> </td>
          <td>No. Telp</td>
          <td><input type="text" name="no_tlp" size="20" value="<?php echo $data["no_tlp"]; ?>" required /></td>
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
              <option value="JAWA TIMUR" <?php if ($data['prov'] == 'JAWA TIMUR') {
                                            echo 'selected';
                                          } ?>>JAWA TIMUR
            </select></td>
          </td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Kabupaten</td>
          <td><select name="kota" required>
              <option value="-">- Pilih Kabupaten -
              <option value="KABUPATEN PASURUAN" <?php if ($data['kota'] == 'KABUPATEN PASURUAN') {
                                                    echo 'selected';
                                                  } ?>>KABUPATEN PASURUAN
              <option value="KOTA PASURUAN" <?php if ($data['kota'] == 'KOTA PASURUAN') {
                                              echo 'selected';
                                            } ?>>KOTA PASURUAN
            </select></td>
          </td>
        </tr>

        <tr height="46">
          <td> </td>
          <td>Kecamatan</td>
          <td><select name="kec" required>
              <option value="-">- Pilih kecamatan -
              <option value="BANGIL" <?php if ($data['kec'] == 'BANGIL PASURUAN') {
                                        echo 'selected';
                                      } ?>>BANGIL PASURUAN
              <option value="BEJI" <?php if ($data['kec'] == 'BEJI PASURUAN') {
                                      echo 'selected';
                                    } ?>>BEJI PASURUAN
              <option value="GEMPOL" <?php if ($data['kec'] == 'GEMPOL PASURUAN') {
                                        echo 'selected';
                                      } ?>>GEMPOL PASURUAN
              <option value="KEJAYAN" <?php if ($data['kec'] == 'KEJAYAN PASURUAN') {
                                        echo 'selected';
                                      } ?>>KEJAYAN PASURUAN
              <option value="GRATI" <?php if ($data['kec'] == 'GRATI') {
                                      echo 'selected';
                                    } ?>>GRATI
              <option value="PANDAAN" <?php if ($data['kec'] == 'PANDAAN') {
                                        echo 'selected';
                                      } ?>>PANDAAN
              <option value="KAROTON" <?php if ($data['kec'] == 'KAROTON') {
                                        echo 'selected';
                                      } ?>>KRATON
              <option value="PRIGEN" <?php if ($data['kec'] == 'PRIGEN') {
                                        echo 'selected';
                                      } ?>>PRIGEN
              <option value="REMBANG" <?php if ($data['kec'] == 'REMBANG') {
                                        echo 'selected';
                                      } ?>>REMBANG
              <option value="WINONGAN" <?php if ($data['kec'] == 'WINONGAN') {
                                          echo 'selected';
                                        } ?>>WINONGAN
            </select></td>
          </td>
        </tr>






        <tr height="46">
          <td> </td>
          <td>Masukan Foto</td>

          <td><input type="file" name="gambar" size="20" />
            <br><img src="img/<?php echo $data['gambar']  ?>" width="100" alt="">
          </td>

        </tr>


        <tr height="100">
          <td> </td>
          <td> </td>
          <td><button type="submit" name="submit" class="btn btn-primary"> Ubah
              <button class="btn btn-light"><a href="list_guru.php"> Cancel </a></button>
          </td>
          </td>
        </tr>

      </table>

    </form>

  </div>
</body>

</html>