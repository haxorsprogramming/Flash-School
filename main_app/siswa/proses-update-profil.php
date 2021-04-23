<?php 
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
// {'nama':namaLengkap, 'username':username, 'tempatLahir':tempatLahir, 'tanggalLahir':tanggalLahir, 'noHp':noHp, 'alamat':alamat}
$nama = $_POST['nama'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$noHp = $_POST['noHp'];
$alamat = $_POST['alamat'];

$qUpdate = "UPDATE tbl_siswa SET nama_lengkap='$nama', tanggal_lahir='$tanggalLahir', tempat_lahir='$tempatLahir', alamat='$alamat', no_hp='$noHp' WHERE username='$usernameLogin';";
$link -> query($qUpdate);
?>