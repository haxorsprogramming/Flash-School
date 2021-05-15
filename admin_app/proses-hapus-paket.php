<?php 
include('../config/db.php');

class dataRespon{}
$dr = new dataRespon();

// {'kdPaket':kdPaket}
$kdPaket = $_POST['kdPaket'];

$dr -> status = 'sukses';

echo json_encode($dr);

?>