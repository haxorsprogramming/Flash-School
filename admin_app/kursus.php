<?php
include('../config/db.php');
?>
<div id='divKursus'>
    <div id='divListKursus'>
        <div style='margin-bottom:15px;'>
            <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahKursusAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Kursus</a>
        </div>
        <div class="row" id='' style="padding-left:20px;margin-right:10px;">
            <table id='tbl_kursus' class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>Nama Kursus</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $qKursus = $link -> query("SELECT * FROM tbl_kursus;");
                        while($fKursus = $qKursus -> fetch_assoc())
                        {
                            $kdKursus = $fKursus['kd_kursus'];
                            $namaKursus= $fKursus['nama_kursus'];
                            $kategori = $fKursus['kategori'];
                        ?>
                        <tr>
                            <td><?=$namaKursus; ?></td>
                            <td><?=$kategori; ?></td>
                            <td><a href="#!" @click="hapusKursusAtc('<?=$kdKursus; ?>')" class="btn btn-warning">Hapus</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id='divTambahKursus'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i> Kembali
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Kursus</label>
                <input type="text" class="form-control" id="txtNamaKursus">
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" id="txtKategori">
                    <option value="Akademik">Akademik</option>
                    <option value="Bahasa">Bahasa</option>
                    <option value="Seni">Seni</option>
                </select>
            </div>
            
            <div>
                <a href="#!" class="btn btn-primary btn-icon icon-left" @click="simpanAtc()">
                    <i class='fas fa-save'></i> Simpan
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        </div>
    </div>
</div>

<script>

var divKursus = new Vue({
    el : '#divKursus',
    data : {

    },
    methods : {
        tambahKursusAtc : function()
        {
            $('#divTambahKursus').show();
            $('#divListKursus').hide();
        },
        simpanAtc : function()
        {
            let namaKursus = document.querySelector("#txtNamaKursus").value;
            let kategori = document.querySelector("#txtKategori").value;
            let ds = {'namaKursus':namaKursus, 'kategori':kategori}
            $.post('proses-tambah-kursus.php', ds, function(data){
                console.log(data);
            });
            pesanUmumApp('success', 'Sukses', 'Sukses menambahkan kategori');
            renderMenu('kursus.php');
        },
        kembaliAtc : function()
        {
            renderMenu('kursus.php');
        },
        hapusKursusAtc : function(kdKursus)
        {
            konfirmasiHapus(kdKursus);
        }
    }
});

$('#divTambahKursus').hide();
$('#tbl_kursus').dataTable();

function konfirmasiHapus(kdKursus)
{
    Swal.fire({
        title: "Hapus kursus?",
        text: "Yakin menghapus ini kursus ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
           $.post('proses-hapus-kursus.php', {'kdKursus':kdKursus}, function(data){
                pesanUmumApp('success', 'Sukses', 'Berhasil menghapus kursus..');
                renderMenu('kursus.php');
           });
        }
      });
}

</script>