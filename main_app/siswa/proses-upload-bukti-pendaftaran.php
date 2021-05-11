<?php
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];

class dataRespon{}
$dr = new dataRespon();

// {'dataImg':dataImg}
$dataImg = $_POST['dataImg'];

if($dataImg  === ""){

}else{
    $output_file = "../../file/bukti_pendaftaran/".$usernameLogin.".png";
    unlink($output_file);
    file_put_contents($output_file, file_get_contents($dataImg));
}

$dr -> status = 'sukses';

echo json_encode($dr);

?>