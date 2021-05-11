<?php
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
?>
<div id="divKonfirmasiBiayaPendaftaran" class="container">
    <div class="card card-primary">
        <div class="card-header">Upload bukti pembayaran</div>
        <div class="card-body">
            <div class="form-group">
                <label>Bukti pembayaran</label><br/>
                <img src="<?=$base_url; ?>/file/bukti_pendaftaran/<?=$usernameLogin; ?>.png" id="imgPreview" style="width:400px;"><br/><br/>
                <a href="#!" class="btn btn-lg btn-primary"><i class="far fa-images"></i><input type="file" id="txtInputImg" onchange="getImg()"></a>
            </div>
            <div class="">
                <a href="#!" class="btn btn-primary" @click="uploadAtc()">Upload bukti pendaftaran</a>
            </div>
        </div>
    </div>
</div>

<script>
var rToUpload = "<?=$base_url; ?>" + "main_app/siswa/proses-upload-bukti-pendaftaran.php";

var divKonfirmasiBiayaPendaftaran = new Vue({
    el : '#divKonfirmasiBiayaPendaftaran',
    data : {
        statusGantiFoto : false
    },
    methods : {
        uploadAtc : function()
        {
            let dataImg = document.querySelector("#imgPreview").getAttribute("src");
            let ds = {'dataImg':dataImg}
            $.post(rToUpload, ds, function(data){
                let obj = JSON.parse(data);
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupload bukti pembayaran, silahkan tunggu verifikasi dari admin ..');
                divMain.titleApps = "Beranda";
                renderMenu('beranda.php');
            });
        }
    }
});

function getImg()
{
    var fileGambar = new FileReader();
    var inImg = document.querySelector('#txtInputImg');
    var sampulImg = document.querySelector('#imgPreview');
    fileGambar.readAsDataURL(inImg.files[0]);
    fileGambar.onload = function(e){
        let hasil = e.target.result;
        sampulImg.src = hasil;
        divKonfirmasiBiayaPendaftaran.statusGantiFoto = true;
    }
}
</script>