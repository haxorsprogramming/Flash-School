<?php 
include('../config/db.php');
$kdSetting = $_GET['kd_setting'];
// query setting 
$qSetting = $link -> query("SELECT * FROM tbl_setting_bimbel WHERE kd_setting='$kdSetting';");
$fSetting = $qSetting -> fetch_assoc();
$namaSetting = $fSetting['nama_setting'];
$nilai = $fSetting['nilai'];
?>
<div id="divEdit">
    <div class="container">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Edit setting bimbel</div>
            <div class="card-body">
                <div class="form-group">
                    <label><?=$namaSetting; ?></label>
                    <input type="text" class="form-control" value="<?=$nilai; ?>" id="txtNilai">
                </div>
                <a @click="simpanAtc" href="#!" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> Simpan</a>
            </div>
        </div>
        </div>
    </div>
</div>

<script>

document.querySelector("#txtNilai").focus();
var rToUpdateSetting = "<?=$base_url; ?>admin_app/proses-edit-setting.php";

var divEdit = new Vue({
    el : '#divEdit',
    data : {

    },
    methods : {
        simpanAtc : function()
        {
            let kdSetting = "<?=$kdSetting; ?>";
            let nilai = document.querySelector("#txtNilai").value;
            let ds = {'kdSetting':kdSetting, 'nilai':nilai}
            $.post(rToUpdateSetting, ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate setting bimbel ...');
                divMain.titleApps = "Setting Bimbel";
                renderMenu('setting-bimbel.php');
            });
        }
    }
});

</script>