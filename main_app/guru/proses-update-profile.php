<?php 
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];

// {'nama':namaLengkap, 'nip':nip, 'tempatLahir':tempatLahir, 
    // 'tanggalLahir':tanggalLahir, 'noHp':noHp, 'tentangSaya':tentangSaya, 'imgProfil':imgProfil}

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$tempatLahir = $_POST['tempatLahir'];
$tanggalLahir = $_POST['tanggalLahir'];
$noHp = $_POST['noHp'];
$alamat = $_POST['alamat'];
$tentangSaya = $_POST['tentangSaya'];
$imgProfil = $_POST['imgProfil'];
if($imgProfil === ""){

}else{
    $output_file = "../../file/img_guru/".$usernameLogin.".png";
    unlink($output_file);
    file_put_contents($output_file, file_get_contents($imgProfil));
}
// update data 
$qs = "UPDATE tbl_guru SET nama_lengkap='$nama', nip='$nip', tempat_lahir='$tempatLahir', tanggal_lahir='$tanggalLahir', alamat='$alamat', tentang_saya='$tentangSaya', no_hp='$noHp' WHERE username='$usernameLogin';";
$link -> query($qs);
?>