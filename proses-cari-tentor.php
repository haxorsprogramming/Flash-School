<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

$daerah = $_POST['daerah'];
$kdKursus = $_POST['kursus'];
$qDaerah = $link -> query("SELECT * FROM tbl_tentor WHERE daerah_layanan LIKE '%$daerah%' AND kd_kursus='$kdKursus';");
$totalDaerah = mysqli_num_rows($qDaerah);

if($totalDaerah == "0"){
    $dr -> status = "no_area";
}else{
    $dr -> status = $daerah;
}

echo json_encode($dr);

?>