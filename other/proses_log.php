<?php
@SESSION_START();

include "connect.php";

if (isset($_GET['username'])) {
  $username = @$_GET['username'];
  $password = @$_GET['password'];
  $level = @$_POST['level'];
  $isi_form = "username=$username";
}

if ($username != '' && $password != '') {
  $sql_user = mysqli_query($db, "select*from users");
  $data_user = mysqli_fetch_array($sql_user);


  $sql = mysqli_query($db, "select*from users, pendaftar where username='$username' and password='$password' and kode_pendaftar=id_pendaftar");
  $data = mysqli_fetch_array($sql);
  $cek = mysqli_num_rows($sql);


  if ($cek >= 1) {
?>
    <?php

    if ($data['level'] == "admin") {

      @$_SESSION['admin'] = $data['kode_pendaftar'];
    ?>
      <script language="javascript">
        alert("Selamat Datang <?= $data['nama'] ?> \n Anda Login sebagai Admin.");
        window.location = "admin.php";
      </script>;
    <?php
    } else if ($data['level'] == "guru") {

      @$_SESSION['guru'] = $data['kode_pendaftar'];
    ?>
      <script language="javascript">
        alert("Selamat Datang <?= $data['nama'] ?> \n Anda Login sebagai Guru.");
        window.location = "guru.php";
      </script>;
    <?php
    } else {
      @$_SESSION['siswa'] = $data['kode_pendaftar'];
    ?>
      <script language="javascript">
        alert("Selamat Datang <?= $data['nama'] ?> \n Anda Login sebagai Siswa.");
        window.location = "dashboard.php";
      </script>;
    <?php
    }
  } else {
    if ($username != $data_user['username']) {

    ?>
      <script type="text/javascript">
        window.location = "index.php?notif=username&<?php echo $isi_form; ?>";
      </script>

    <?php
    } else if ($password != $data_user['password']) {
    ?>
      <script type="text/javascript">
        window.location = "index.php?notif=password&<?php echo $isi_form; ?>";
      </script>
    <?php
    } else {
    ?>
      <script type="text/javascript">
        window.location = "index.php?notif=password&<?php echo $isi_form; ?>";
      </script>
<?php
    }
  }
}



?>