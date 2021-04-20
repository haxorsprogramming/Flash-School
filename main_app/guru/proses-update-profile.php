<?php 
session_start();
include('../config/db.php');
$usernameLogin = $_SESSION['user_login'];

// {'nama':namaLengkap, 'nip':nip, 'tempatLahir':tempatLahir, 
    // 'tanggalLahir':tanggalLahir, 'noHp':noHp, 'tentangSaya':tentangSaya, 'imgProfil':imgProfil}

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$noHp = $_POST['noHp'];
$tentangSaya = $_POST['tentangSaya'];
$imgProfil = $_POST['imgProfil'];
$output_file = "../../file/img_guru/".$usernameLogin.".png";
unlink($output_file);
file_put_contents($output_file, file_get_contents($imgProfil));
?>