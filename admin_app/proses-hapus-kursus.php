<?php
include('../config/db.php');
$kdKursus = $_POST['kdKursus'];
$link -> query("DELETE FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
?>