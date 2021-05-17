<?php 
session_start();
include('../../config/db.php');
// {'kdTentor':kdTentor}
$kdTentor = $_POST['kdTentor'];

$link -> query("DELETE FROM tbl_tentor WHERE kd_tentor='$kdTentor';");

echo "success";
?>