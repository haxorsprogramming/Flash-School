<?php 
include('../config/db.php');
class dataRespon{}
$dr = new dataRespon();

$username = $_POST['username'];

// query update pembayaran 
$link -> query("UPDATE tbl_registrasi_siswa SET status_pembayaran='sukses' WHERE username='$username';");

$dr -> status = 'sukses';

echo json_encode($dr);
?>