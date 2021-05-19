<?php
session_start();
include "../config/db.php";

$kdPemesanan = $_POST['kdPemesanan'];

$link -> query("UPDATE tbl_pemesanan SET status_pembayaran='sukses', status_mentoring='active' WHERE kd_pemesanan='$kdPemesanan';");

?>