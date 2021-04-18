<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

$username = $_POST['username'];
$password = $_POST['password'];
$waktu = date("Y-m-d H:i:s");

$qCekUser = $link -> query("SELECT * FROM tbl_user WHERE username='$username';");
$jlhUser = mysqli_num_rows($qCekUser);

if($jlhUser == 0){
    $dr -> status = 'user_tidak_ada';
    $dr -> tipe_user = 'none';
}else{
    $qUser = $link -> query("SELECT * FROM tbl_user WHERE username='$username' LIMIT 0, 1;");
    $fUser = $qUser -> fetch_assoc();
    $tipe_user = $fUser['tipe_user'];
    $dr -> tipe_user = $tipe_user;
    $dr -> status = 'user_ada';
    $update = $link -> query("UPDATE tbl_user SET last_login='$waktu' WHERE username='$username';");
}

echo json_encode($dr);

?>