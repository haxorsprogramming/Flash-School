<?php 
include('../config/db.php');
class dataRespon{}
$dr = new dataRespon();

// {'kdSetting':kdSetting, 'nilai':nilai}
$kdSetting = $_POST['kdSetting'];
$nilai = $_POST['nilai'];

$link -> query("UPDATE tbl_setting_bimbel SET nilai='$nilai' WHERE kd_setting='$kdSetting';");

$dr -> status = 'sukses';

echo json_encode($dr);
?>