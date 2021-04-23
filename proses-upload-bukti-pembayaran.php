<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

$dataImg = $_POST['dataImg'];
$kdPemesanan = $_POST['kdPemesanan'];

$output_file = "file/bukti_pembayaran/".$kdPemesanan.".png";
unlink($output_file);
file_put_contents($output_file, file_get_contents($dataImg));

?>