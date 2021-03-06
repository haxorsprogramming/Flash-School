<?php
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
// query siswa 
$qSiswa = $link -> query("SELECT * FROM tbl_siswa WHERE username='$usernameLogin' LIMIT 0,1;");
$fSiswa = $qSiswa -> fetch_object();
$namaSiswa = $fSiswa -> nama_lengkap;
$tempatLahir = $fSiswa -> tempat_lahir;
$tanggalLahir = $fSiswa -> tanggal_lahir;
$alamat = $fSiswa -> alamat;
$noHp = $fSiswa -> no_hp;
// cari jumlah pesanan 
$qPesanan = $link -> query("SELECT * FROM tbl_pemesanan WHERE kd_siswa='$usernameLogin';");
$jlhPesanan = mysqli_num_rows($qPesanan);
// cari jadwal belajar 
$totalJadwal = 0;
while($fPesanan = $qPesanan -> fetch_object()){
    $kdPemesanan = $fPesanan -> kd_pemesanan;
    // query total jam di tabel item pesanan 
    $qTotalPesanan = $link -> query("SELECT id FROM tbl_item_pesanan WHERE kd_pemesanan='$kdPemesanan';");
    $totalJam = mysqli_num_rows($qTotalPesanan);
    $totalJadwal = $totalJadwal + $totalJam;
}
?>
<div id="divProfil">
    <div class="card profile-widget" id="divDataProfil">
        <div class="profile-widget-header" style="width: 45%;">
            <img alt="image" src="../../file/img_siswa/<?=$usernameLogin; ?>.png" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Jam Belajar</div>
                    <div class="profile-widget-item-value"><?=$totalJadwal; ?></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Pesanan</div>
                    <div class="profile-widget-item-value"><?=$jlhPesanan; ?></div>
                </div>
            </div>
            <hr />
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name"> <?=$namaSiswa; ?> - (<?=$usernameLogin; ?>) <div class="text-muted d-inline font-weight-normal">
                </div>
            </div>
            
            <br/><a href="#!" class="btn btn-primary" @click="editProfileAtc()">Edit Profil</a>
        </div>
        
    </div>
    <div class="container" id="divEditProfil">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="txtNamaLengkap" placeholder="Nama Lengkap" value="<?=$namaSiswa; ?>">
                    </div>
                   
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="txtTempatLahir" placeholder="Tempat Lahir" value="<?=$tempatLahir; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" id="txtTanggalLahir" value="">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" class="form-control" id="txtNoHp" placeholder="Nomor Handphone" value="<?=$noHp; ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" style="resize: none;height:100px;" id="txtAlamat"><?=$alamat; ?></textarea>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="text-align: center;">
                    <span>Ubah foto profile</span><br/><br/>
                    <img alt="image" src="../../file/img_siswa/<?=$_SESSION['user_login']; ?>.png" id="txtFoto" style="width: 300px;" class="rounded-circle profile-widget-picture">
                    <br/>
                    <input type="file" class="form-control" onchange="getImg()" id="txtInputFoto">
                </div>
            </div>
            <div>
                <a href="#!" class="btn btn-primary" @click="updateAtc()">Update data siswa</a>
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
            $('#divDataProfil').hide();
            $('#divEditProfil').show();
        },
        updateAtc : function()
        {
            var namaLengkap = document.querySelector("#txtNamaLengkap").value;
            var tempatLahir = document.querySelector("#txtTempatLahir").value;;
            var tanggalLahir = document.querySelector("#txtTanggalLahir").value;
            var noHp = document.querySelector("#txtNoHp").value;
            var alamat = document.querySelector("#txtAlamat").value;
            if(divProfil.statusGantiFoto === false){
                var imgProfil = "";
            }else{
                var imgProfil = document.querySelector("#txtFoto").getAttribute("src");
            }
            let ds = {'nama':namaLengkap, 'username':username, 'tempatLahir':tempatLahir, 'tanggalLahir':tanggalLahir, 'noHp':noHp, 'alamat':alamat}
            $.post('proses-update-profil.php', ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate profil');
                renderMenu('profil-siswa.php');
            });
        }
    }
});



$('#divEditProfil').hide();

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

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  

</script>