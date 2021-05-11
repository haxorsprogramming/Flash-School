<?php 
include('../config/db.php');
class dataRespon{}
$dr = new dataRespon();

$dr -> status = 'sukses';

echo json_encode($dr);
?>