<?php
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
$qGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$usernameLogin' LIMIT 0,1;");
$fGuru = $qGuru -> fetch_assoc();
$tanggalLahir = $fGuru['tanggal_lahir'];
$tanggalBaru = date("Y-m-d", strtotime($tanggalLahir));
?>
<div id="divProfil">
    <div class="card profile-widget" id="divDataProfil">
        <div class="profile-widget-header">
            <img alt="image" src="../../file/img_guru/<?=$usernameLogin; ?>.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Jam Mengajar</div>
                    <div class="profile-widget-item-value"></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Pesanan</div>
                    <div class="profile-widget-item-value"></div>
                </div>
            </div>
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name"><?=$fGuru['nama_lengkap']; ?> (<?=$usernameLogin; ?>) <div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> Web Developer
                </div>
            </div>
            <?=$fGuru['tentang_saya']; ?>
            <br/><a href="#!" class="btn btn-primary" @click="editProfileAtc()">Edit Profil</a>
        </div>
        <hr />
    </div>
    <div class="container" id="divEditProfil">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="txtNamaLengkap" placeholder="Nama Lengkap" value="<?=$fGuru['nama_lengkap']; ?>">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control" id="txtNip" placeholder="NIP" value="<?=$fGuru['nip']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="txtTempatLahir" placeholder="Tempat Lahir" value="<?=$fGuru['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="txtTanggalLahir">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" class="form-control" id="txtNoHp" placeholder="Nomor Handphone" value="<?=$fGuru['no_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" style="resize: none;height:100px;" id="txtAlamat"><?=$fGuru['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tentang Saya</label>
                        <textarea class="form-control" style="resize: none;height:100px;" id="txtTentangSaya"><?=$fGuru['tentang_saya']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <a href="#!" class="btn btn-primary btn-lg" @click="simpanProfileAtc()">Simpan Profile</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="text-align: center;">
                    <span>Ubah foto profile</span><br/><br/>
                    <img alt="image" src="../../file/img_guru/<?=$_SESSION['user_login']; ?>.png" id="txtFoto" style="width: 300px;" class="rounded-circle profile-widget-picture">
                    <br/>
                    <input type="file" class="form-control" onchange="getImg()" id="txtInputFoto">
                </div>
            </div>
        </div>
</div>

<script>

var username = "<?=$usernameLogin; ?>";

var divProfil = new Vue({
    el : '#divProfil',
    data : {
        statusGantiFoto : false,
    },
    methods : {
        editProfileAtc : function()
        {
            document.querySelector("#txtNamaLengkap").focus();
            $('#divDataProfil').hide();
            $('#divEditProfil').show();
        },
        simpanProfileAtc : function()
        {
            var namaLengkap = document.querySelector("#txtNamaLengkap").value;
            var nip = document.querySelector("#txtNip").value;
            var tempatLahir = document.querySelector("#txtTempatLahir").value;;
            var tanggalLahir = document.querySelector("#txtTanggalLahir").value;
            var noHp = document.querySelector("#txtNoHp").value;
            var alamat = document.querySelector("#txtAlamat").value;
            var tentangSaya = document.querySelector("#txtTentangSaya").value;
            if(divProfil.statusGantiFoto === false){
                var imgProfil = "";
            }else{
                var imgProfil = document.querySelector("#txtFoto").getAttribute("src");
            }
            var ds = {'nama':namaLengkap, 'alamat':alamat, 'nip':nip, 'tempatLahir':tempatLahir, 'tanggalLahir':tanggalLahir, 'noHp':noHp, 'tentangSaya':tentangSaya, 'imgProfil':imgProfil}
            console.log(ds);
            $.post('proses-update-profile.php', ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate profil');
                renderMenu('profil-guru.php');
            });
        }
    }
});

function getImg()
{
    var fileGambar = new FileReader();
    var inImg = document.querySelector('#txtInputFoto');
    var sampulImg = document.querySelector('#txtFoto');
    fileGambar.readAsDataURL(inImg.files[0]);
    fileGambar.onload = function(e){
        let hasil = e.target.result;
        sampulImg.src = hasil;
        divProfil.statusGantiFoto = true;
    }
}

$('#divEditProfil').hide();

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  

</script>