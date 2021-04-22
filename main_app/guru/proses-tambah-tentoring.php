<?php 
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
// {'tempat':tempat, 'kursus':kursus, 'harga':harga, 'latarBelakang':latarBelakang}
$tempat = $_POST['tempat'];
$kursus = $_POST['kursus'];
$harga = $_POST['harga'];
$latarBelakang = $_POST['latarBelakang'];
$daerah = $_POST['daerah'];
$bahanKode = "1234567890qwertyuioplkjhgfdsazxcvbnm";
$acak = str_shuffle($bahanKode);

$kdTentor = substr($acak, 0, 10);

$qSave = "INSERT INTO tbl_tentor VALUES(null, '$usernameLogin', '$kdTentor', '$tempat', '$kursus', '$harga', '$latarBelakang', '$daerah');";
$link -> query($qSave);

?>