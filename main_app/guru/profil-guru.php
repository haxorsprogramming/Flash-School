<?php
session_start();
?>
<div id="divProfil">
    <div class="card profile-widget" id="divDataProfil">
        <div class="profile-widget-header">
            <img alt="image" src="../../file/img_guru/<?= $_SESSION['user_login']; ?>.jpg" class="rounded-circle profile-widget-picture">
            <div class="profile-widget-items">
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Jam Mengajar</div>
                    <div class="profile-widget-item-value"></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Pesanan</div>
                    <div class="profile-widget-item-value"></div>
                </div>
                <div class="profile-widget-item">
                    <div class="profile-widget-item-label">Followers</div>
                    <div class="profile-widget-item-value"></div>
                </div>
            </div>
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal">
                    <div class="slash"></div> Web Developer
                </div>
            </div>
            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
        </div>
        <div class="container">
            <a href="#!" class="btn btn-primary" @click="editProfileAtc()">Edit Profil</a>
        </div>
        <hr />
        
    </div>
    <div class="container" id="divEditProfil">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Hp</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tentang Saya</label>
                        <textarea class="form-control" style="resize: none;height:100px;"></textarea>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12" style="text-align: center;">
                    <span>Ubah foto profile</span><br/><br/>
                    <img alt="image" src="../../file/img_guru/<?= $_SESSION['user_login']; ?>.jpg" id="txtFoto" style="width: 300px;" class="rounded-circle profile-widget-picture">
                    <br/>
                    <input type="file" class="form-control" onchange="getImg()" id="txtInputFoto">
                </div>
            </div>
        </div>
</div>

<script>

var divProfil = new Vue({
    el : '#divProfil',
    data : {

    },
    methods : {
        editProfileAtc : function()
        {
            $('#divDataProfil').hide();
            $('#divEditProfil').show();
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
    }
}

$('#divEditProfil').hide();

</script>