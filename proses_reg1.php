<?php
@session_start();

include "connect.php";

$nama = $_POST['nama'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$username = $_POST['username'];
$level = $_POST['level'];


$user = mysqli_query($db, "select id_pendaftar from pendaftar where id_pendaftar='$username'");

//menampilkan jumlah id pendaftar
$jlh_user = mysqli_num_rows($user);


if ($jlh_user > 1) {

?>
  <script type="text/javascript">
    alert("Maaf username sudah ada");
    window.location = "daftar.php";
  </script>

<?php
} else {
  if ($password1 == $password2) {
    $sql = "insert into pendaftar(id_pendaftar,nama) values('" . $username . "','" . $nama . "')";
    $sql2 = "insert into users(username,password,level,kode_pendaftar) values('" . $username . "','" . $password1 . "','" . $level . "','" . $username . "')";
    mysqli_query($db, $sql);
    mysqli_query($db, $sql2);
    echo '<script language="javascript">  
 window.location="login.php?page=simpan";
 </script>';
  } else {
    echo '<script type="text/javascript">
		    alert("Maaf Password yang Anda Ulang tidak sama");
		    window.location="daftar.php";
	    </script>';
  }
}
?>