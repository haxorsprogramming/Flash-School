<?php 
include('../config/db.php');
$qPemesanan = $link -> query("SELECT * FROM tbl_pemesanan;");
?>
<div id="divPemesanan">

    <div id="divListPemesanan">
        <div style='margin-bottom:15px;'>
            <!-- <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahKursusAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Kursus</a> -->
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListPemesanan" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Kd Pemesanan</th>
                        <th>Siswa Pemesan</th>
                        <th>Mentor - Kursus</th>
                        <th>Paket</th>
                        <th>Waktu Pemesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($fPemesanan = $qPemesanan -> fetch_assoc()) { ?>
                <?php 
                    $kdPemesanan = $fPemesanan['kd_pemesanan'];
                    $kdSiswa = $fPemesanan['kd_siswa'];
                    $kdTentor = $fPemesanan['kd_tentor'];
                    
                    $waktuPemesanan = $fPemesanan['waktu_pemesanan'];
                    $statusPembayaran = $fPemesanan['status_pembayaran'];
                    // query siswa 
                    $qSiswa = $link -> query("SELECT * FROM tbl_siswa WHERE username='$kdSiswa' LIMIT 0,1;");
                    $fSiswa = $qSiswa -> fetch_assoc();
                    $namaSiswa = $fSiswa['nama_lengkap'];
                    // query mentor 
                    $qMentor = $link -> query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
                    $fTentor = $qMentor -> fetch_assoc();
                    $usernameMentor = $fTentor['username'];
                    $kdKursus = $fTentor['kd_kursus'];
                    
                    // query guru 
                    $qGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$usernameMentor' LIMIT 0,1;");
                    $fGuru = $qGuru -> fetch_assoc();
                    $namaGuru = $fGuru['nama_lengkap'];
                    // query kursus 
                    $qKursus = $link->query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
                    $fKursus = $qKursus->fetch_assoc();
                    $namaKursus = $fKursus['nama_kursus'];
                    // paket 
                    $kdPaket = $fPemesanan['kd_paket'];
                    $qPaket = $link -> query("SELECT * FROM tbl_paket WHERE kd_paket='$kdPaket';");
                    $fPaket = $qPaket -> fetch_assoc();
                    $namaPaket = $fPaket['nama_paket'];
                    $harga = $fPaket['harga'];
                ?>
                <tr>
                    <td><?=$kdPemesanan; ?></td>
                    <td><?=$namaSiswa; ?></td>
                    <td><?=$namaGuru; ?> - <?=$namaKursus; ?></td>
                    <td><?=$namaPaket; ?><br/>(Rp. <?=number_format($harga); ?>)</td>
                    <td><?=$waktuPemesanan; ?></td>
                    <td><?=$statusPembayaran; ?></td>
                    <td>
                        <a href="#!" class="btn btn-primary" @click="detailAtc('<?=$kdPemesanan; ?>')">Detail</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<script>

$('#tblListPemesanan').dataTable();

var divPemesanan = new Vue({
    el : '#divPemesanan',
    data : {

    },
    methods : {
        detailAtc : function(kdPemesanan)
        {
            divMain.titleApps = "Detail Pemesanan";
            renderMenu('detail-pemesanan.php?kd_pesanan='+kdPemesanan);
        }
    }
});

</script>