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
                
            </table>
        </div>
    </div>
    <div id="divTambahPaketKursus" style="display: none;">
        <div>
            <a href="#!" class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class="fas fa-reply"></i> Kembali
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Paket</label>
                <input type="text" class="form-control" id="txtNamaKursus">
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <textarea class="form-control" style="resize: none;" id="txtKeterangan"></textarea>
            </div>
            <div class="form-group">
                <label>Jenjang</label>
                <select class="form-control" id="txtKategori">
                    <option value="Akademik">Akademik</option>
                    <option value="Bahasa">Bahasa</option>
                    <option value="Seni">Seni</option>
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
            document.querySelector("#txtNamaKursus").focus();
        }
    }
});

</script>