<?php 
include('../config/db.php');

class dataRespon{}
$dr = new dataRespon();
// {'namaPaket':namaPaket, 'keterangan':keterangan, 'jenjang':jenjang, 'harga':harga}
$namaPaket = $_POST['namaPaket'];
$keterangan = $_POST['keterangan'];
$jenjang = $_POST['jenjang'];
$harga = $_POST['harga'];

$bahanKode = "1234567890poiuytreewqasdfghjklmnbvcxz";
$acak = str_shuffle($bahanKode);

$kdPaket = substr($acak, 0, 10);

$link -> query("INSERT INTO tbl_paket VALUES(null, '$kdPaket','$namaPaket','$keterangan','$jenjang','$harga')");

$dr -> status = 'sukses';

echo json_encode($dr);
?>