<?php
session_start();
include "config/db.php";

class dataRespon{}
$dr = new dataRespon();

$username = $_POST['username'];
$password = $_POST['password'];
$tipeUser = $_POST['tipeUser'];
$namaLengkap = $_POST['namaLengkap'];
$waktu = date("Y-m-d H:i:s");

// cek apakah username sudah terdaftar 
$qCekUser = $link -> query("SELECT * FROM tbl_user WHERE username='$username';");
$jlhUser = mysqli_num_rows($qCekUser);

if($jlhUser == 0){
    $link -> query("INSERT INTO tbl_user VALUES(null, '$username','$password','$tipeUser','$waktu');");
    if($tipeUser == 'siswa'){
        // data registrasi siswa 
        $bahanRegistrasi = "qwertyuioplkjhgfdsazxcvbnm";
        $acak = str_shuffle($bahanRegistrasi);
        $kdRegistrasi = substr($acak, 0, 10);
        $link -> query("INSERT INTO tbl_registrasi_siswa VALUES(null, '$kdRegistrasi','$username','$waktu','pending');");
        
        $link -> query("INSERT INTO tbl_siswa VALUES(null, '$username','$namaLengkap','','-','-','-');");
        // copy foto profile
        copy("file/img_siswa/default.png", "file/img_siswa/".$username.".png");
        // copy bukti pendaftaran
        copy("file/bukti_pendaftaran/default.png", "file/bukti_pendaftaran/".$username.".png");
    }elseif($tipeUser == 'guru'){
        $link -> query("INSERT INTO tbl_guru VALUES(null, '$username','$namaLengkap','-','-','-','-','-','-');");
        copy("file/img_guru/default.png", "file/img_guru/".$username.".png");
    }else{

    }
    $dr -> status = 'sukses';
}else{
    $dr -> status = 'user_ada';
}

echo json_encode($dr);

?>