<?php 
include('../config/db.php');
$qPaketKursus = $link -> query("SELECT * FROM tbl_paket;");
?>
<div id="divPaketKursus">
    <div id="divListKursus">
        <div style="margin-bottom:15px;">
            <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" @click="tambahKursusAtc">
            <i class="fas fa-plus-circle"></i> Tambah Paket Kursus</a>
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblPaketKursus" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Nama Paket</th>
                        <th>Keterangan</th>
                        <th>Jenjang</th>
                        <th>Harga / Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($fPaket = $qPaketKursus -> fetch_assoc()){ ?>
                <tr>
                    <td><?=$fPaket['nama_paket']; ?></td>
                    <td><?=$fPaket['keterangan']; ?></td>
                    <td><?=$fPaket['jenjang']; ?></td>
                    <td>Rp. <?=number_format($fPaket['harga']); ?></td>
                    <td>
                        <a href="#!" class="btn btn-warning" @click="hapusAtc('<?=$fPaket['kd_paket']; ?>')"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="divTambahPaketKursus" style="display: none;">
        <div>
            <a href="#!" class="btn btn-primary btn-icon icon-left" @click="kembaliAtc">
                <i class="fas fa-reply"></i> Kembali
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" class="form-control" id="txtNamaPaket">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" style="resize: none;" id="txtKeterangan"></textarea>
            </div>
            <div class="form-group">
                <label>Jenjang</label>
                <select class="form-control" id="txtJenjang">
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                </select>
            </div>
            <div class="form-group">
                <label>Harga / Jam</label>
                <input type="number" class="form-control" id="txtHarga">
            </div>
            <div>
                <a href="#!" class="btn btn-primary btn-icon icon-left" @click="simpanAtc">
                    <i class="fas fa-save"></i> Simpan
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        </div>
    </div>
</div>

<script>

var rToTambahPaket = "<?=$base_url; ?>admin_app/proses-tambah-paket.php";
var rToHapusPaket = "<?=$base_url; ?>admin_app/proses-hapus-paket.php";

$("#tblPaketKursus").dataTable();

var divListKursus = new Vue({
    el : '#divListKursus',
    data : {

    },
    methods : {
        tambahKursusAtc : function()
        {
            $("#divListKursus").hide();
            $("#divTambahPaketKursus").show();
            document.querySelector("#txtNamaPaket").focus();
        },
        hapusAtc : function(kdPaket)
        {
            let konfirmasi = window.confirm("Yakin menghapus paket ini? ...");
            if(konfirmasi === true){
                let ds = {'kdPaket':kdPaket}
                $.post(rToHapusPaket, ds, function(data){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menghapus paket kursus ... ');
                    divMenu.paketKursusAtc();
                });
            }else{

            }
            
        }
    }
});

var divTambahPaketKursus = new Vue({
     el : '#divTambahPaketKursus',
     data : {

     },
     methods : {
        simpanAtc : function()
        {
            let namaPaket = document.querySelector("#txtNamaPaket").value;
            let keterangan = document.querySelector("#txtKeterangan").value;
            let jenjang = document.querySelector("#txtJenjang").value;
            let harga = document.querySelector("#txtHarga").value;
            let ds = {'namaPaket':namaPaket, 'keterangan':keterangan, 'jenjang':jenjang, 'harga':harga}
            $.post(rToTambahPaket, ds, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan paket kursus ... ');
                divMenu.paketKursusAtc();
            });
        },
        kembaliAtc : function()
        {

        }
     }
});

</script>