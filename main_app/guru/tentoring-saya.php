<?php 
session_start();
include('../../config/db.php');
$usernameLogin = $_SESSION['user_login'];
$qKursus = $link -> query("SELECT * FROM tbl_kursus;");
$qTentor = $link -> query("SELECT * FROM tbl_tentor WHERE username='$usernameLogin';");
?>
<div id="divTentoring">
    <div id="divListTentoring">
        <div style="margin-bottom:15px;">
            <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" @click="tambahTentoringAtc()">
            <i class="fas fa-plus-circle"></i> Daftarkan Tentoring Saya</a>
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListTentoring" class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>Kd Tentor</th>
                        <th>Kursus</th>
                        <th>Tempat</th>
                        <th>Harga</th>
                        <th>Daerah Layanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while($fTentor = $qTentor -> fetch_assoc()){ ?>
                        <?php 
                            $kdKursus = $fTentor['kd_kursus'];
                            $qNamaKursus = $link -> query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus' LIMIT 0, 1;");
                            $fNamaKursus = $qNamaKursus -> fetch_assoc();
                            $namaKursus = $fNamaKursus['nama_kursus'];
                        ?>
                            <tr>
                                <td><?=$fTentor['kd_tentor']; ?></td>
                                <td><?=$namaKursus; ?></td>
                                <td><?=$fTentor['tempat']; ?></td>
                                <td>Rp. <?=number_format($fTentor['harga']); ?></td>
                                <td><?=$fTentor['daerah_layanan']; ?></td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="divTambahMentoring">
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left">
                <i class='fas fa-reply'></i> Kembali
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Jenis Tempat Kursus</label>
                <select class="form-control" id="txtTempat">
                    <option value="rumah">Rumah</option>
                    <option value="tempat_bimbel">Tempat Bimbel</option>
                </select>
            </div>
            <div class="form-group">
                <label>Kursus</label>
                <select class="form-control" id="txtKursus">
                    <?php while($fKursus = $qKursus -> fetch_assoc()){ ?> 
                        <option value="<?=$fKursus['kd_kursus']; ?>"><?=$fKursus['nama_kursus']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label>Harga / jam</label>
                <input type="number" class="form-control" id="txtHarga">
            </div>
            <div class="form-group">
                <label>Latar Belakang (Untuk mempromokan diri anda)</label>
                <textarea style="resize: none;" id="txtLatarBelakang" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Daerah Layanan (Kota / Kabupaten)</label>
                <input id="pac-input" class="form-control" type="text" placeholder="Masukkan Kota / Kabupaten"/>
            </div>
            <div class="form-group">
            <a href="#!" class="btn btn-primary" @click="simpanAtc()">Simpan</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">

            

        </div>
    </div>
</div>

<script>

var mentoring = new Vue({
    el : '#divTentoring',
    data : {

    },
    methods : {
        tambahTentoringAtc : function()
        {
            divMain.titleApps = "Tambah Tentoring Saya";
            $("#divListTentoring").hide();
            $("#divTambahMentoring").show();
        },
        simpanAtc : function()
        {
            let tempat = document.querySelector("#txtTempat").value;
            let kursus = document.querySelector("#txtKursus").value;
            let harga = document.querySelector("#txtHarga").value;
            let latarBelakang = document.querySelector("#txtLatarBelakang").value;
            let daerah = document.querySelector("#pac-input").value;
            let ds = {'tempat':tempat, 'kursus':kursus, 'harga':harga, 'latarBelakang':latarBelakang, 'daerah':daerah}
            console.log(ds);
            $.post('proses-tambah-tentoring.php', ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil mendaftarkan tentor ...');
                divMain.titleApps = "Tentoring Saya";
                renderMenu('tentoring-saya.php');
            });
        }
    }
});

$("#divTambahMentoring").hide();
var input = document.getElementById("pac-input");
var searchBox = new google.maps.places.SearchBox(input);
$("#tblListTentoring").dataTable();


function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  

</script>