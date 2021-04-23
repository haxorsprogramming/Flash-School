<?php 
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];

$nama = $_POST['nama'];

?>