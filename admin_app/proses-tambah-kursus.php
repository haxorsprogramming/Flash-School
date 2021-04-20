<?php
include('../config/db.php');
class dataRespon{}
$dr = new dataRespon();

// {'namaKursus':namaKursus, 'kategori':kategori}
$kdKursus = rand(1,1000);
$namaKursus = $_POST['namaKursus'];
$kategori = $_POST['kategori'];
$link -> query("INSERT INTO tbl_kursus VALUES(null, '$kdKursus','$namaKursus','-','$kategori');");

?>