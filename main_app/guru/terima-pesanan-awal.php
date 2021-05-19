<?php 
// {'kdPesanan':kdPemesanan}
session_start();
include('../../config/db.php');
$kdPemesanan = $_POST['kdPesanan'];
copy("../../file/bukti_pembayaran/default.png", "../../file/bukti_pembayaran/".$kdPemesanan.".png");
$link -> query("UPDATE tbl_pemesanan SET status_mentoring='waiting_payment' WHERE kd_pemesanan='$kdPemesanan';");
echo 'success';
?>