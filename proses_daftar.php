<?php
session_start();
include "config/db.php";

class dataRespon{}

$dr = new dataRespon();
// {'username':username, 'password':password, 'tipeUser':tipeUser}
$username = $_POST['username'];
$password = $_POST['password'];
$tipeUser = $_POST['tipeUser'];
$waktu = date("Y-m-d H:i:s");

// cek apakah username sudah terdaftar 
$qCekUser = $link -> query("SELECT * FROM tbl_user WHERE username='$username';");
$jlhUser = mysqli_num_rows($qCekUser);

if($jlhUser == 0){
    $link -> query("INSERT INTO tbl_user VALUES(null, '$username','$password','$tipeUser','$waktu');");
    $dr -> status = 'sukses';
}else{
    $dr -> status = 'user_ada';
}

echo json_encode($dr);

?>