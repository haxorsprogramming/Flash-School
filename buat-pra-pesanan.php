<?php
session_start();
include "config/db.php";
$usernameLogin = $_SESSION['user_login'];

class dataRespon{}
$dr = new dataRespon();

// {'kdTentor':kdTentor, 'totalJam':totalJam}
$kdTentor = $_POST['kdTentor'];
$totalJam = $_POST['totalJam'];

$waktu = date("Y-m-d H:i:s");

// buat kode pesanan 
$bahanKode = "1234567890987654321234567890";
$acak = str_shuffle($bahanKode);
$kd_pemesanan = substr($acak, 0, 10);

// query data tentor 
$qTentor = $link -> query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0, 1;");
$fTentor = $qTentor -> fetch_assoc();
$harga = $fTentor['harga'];

$totalHarga = $harga * $totalJam;

copy("file/bukti_pembayaran/default.png", "file/bukti_pembayaran/".$kd_pemesanan.".png");

$qSimpan = "INSERT INTO tbl_pemesanan VALUES(null, '$kd_pemesanan', '$kdTentor', '$usernameLogin', '$totalHarga', '$waktu', '', 'pending', 'pending');";
$link -> query($qSimpan);

$dr -> kd_pemesanan = $kd_pemesanan;
$dr -> kd_tentor = $kdTentor;

echo json_encode($dr);

?>