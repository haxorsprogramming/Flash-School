<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

$daerah = $_POST['daerah'];
$qDaerah = $link -> query("SELECT * FROM tbl_tentor WHERE daerah_layanan LIKE '%$daerah%'");
$totalDaerah = mysqli_num_rows($qDaerah);

if($totalDaerah == "0"){
    $dr -> status = 'no_area';
}else{

}

echo json_encode($dr);

?>