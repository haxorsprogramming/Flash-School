<?php 
session_start();
include('../../config/db.php');

$usernameLogin = $_SESSION['user_login'];
$qPemesanan = $link -> query("SELECT * FROM tbl_pemesanan WHERE kd_siswa='$usernameLogin';");
?>
<div id="divPemesanan">

    <div id="divListPemesanan">
        <div style='margin-bottom:15px;'>
        </div>
        <div class="row" style="padding-left:20px;margin-right:10px;">
            <table id="tblListPemesanan" class="table table-hover table-bordered table-stripped">
                <thead>
                    <tr>
                        <th>Kd Pemesanan</th>
                        <th>Siswa Pemesan</th>
                        <th>Mentor - Kursus</th>
                        <th>Total Jam</th>
                        <th>Total harga</th>
                        <th>Waktu Pemesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Status Mentoring</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($fPemesanan = $qPemesanan -> fetch_assoc()) { ?>
                <?php 
                    $kdPemesanan = $fPemesanan['kd_pemesanan'];
                    $kdSiswa = $fPemesanan['kd_siswa'];
                    $kdTentor = $fPemesanan['kd_tentor'];
                    $totalBiaya = $fPemesanan['total_biaya'];
                    $waktuPemesanan = $fPemesanan['waktu_pemesanan'];
                    $statusPembayaran = $fPemesanan['status_pembayaran'];
                    $statusMentoring = $fPemesanan['status_mentoring'];
                    // query siswa 
                    $qSiswa = $link -> query("SELECT * FROM tbl_siswa WHERE username='$kdSiswa' LIMIT 0,1;");
                    $fSiswa = $qSiswa -> fetch_assoc();
                    $namaSiswa = $fSiswa['nama_lengkap'];
                    // query mentor 
                    $qMentor = $link -> query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
                    $fTentor = $qMentor -> fetch_assoc();
                    $usernameMentor = $fTentor['username'];
                    $kdKursus = $fTentor['kd_kursus'];
                    $harga = $fTentor['harga'];
                    $totalJam = $totalBiaya / $harga;
                    // query guru 
                    $qGuru = $link -> query("SELECT * FROM tbl_guru WHERE username='$usernameMentor' LIMIT 0,1;");
                    $fGuru = $qGuru -> fetch_assoc();
                    $namaGuru = $fGuru['nama_lengkap'];
                    // query kursus 
                    $qKursus = $link->query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
                    $fKursus = $qKursus->fetch_assoc();
                    $namaKursus = $fKursus['nama_kursus'];
                ?>
                <tr>
                        <td><?=$kdPemesanan; ?></td>
                        <td><?=$namaSiswa; ?></td>
                        <td><?=$namaGuru; ?> - <?=$namaKursus; ?></td>
                        <td><?=$totalJam; ?></td>
                        <td>Rp. <?=number_format($totalBiaya); ?></td>
                        <td><?=$waktuPemesanan; ?></td>
                        <td><?=$statusPembayaran; ?></td>
                        <td><?=$statusMentoring; ?></td>
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