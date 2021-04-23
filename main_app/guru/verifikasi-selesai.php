<?php
session_start();
include('../../config/db.php');
$kdPemesanan = $_POST['kdPemesanan'];

$link -> query("UPDATE tbl_pemesanan SET status_mentoring='selesai' WHERE kd_pemesanan='$kdPemesanan';");
$link -> query("UPDATE tbl_item_pesanan SET status='0' WHERE kd_pemesanan='$kdPemesanan';");

?>