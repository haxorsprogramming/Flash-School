<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

// {'kdPesanan':kdPesanan, 'kdJadwal':dataJam[i]}
$kdPesanan = $_POST['kdPesanan'];
$kdJadwal = $_POST['kdJadwal'];
$kdTentor = $_POST['kdTentor'];

$qSimpan = "INSERT INTO tbl_item_pesanan VALUES(null, '$kdPesanan','$kdJadwal','$kdTentor','1');";
$link -> query($qSimpan);

$dr -> kdPesanan = $kdPesanan;
$dr -> kdJadwal = $kdJadwal;

echo json_encode($dr);

?>