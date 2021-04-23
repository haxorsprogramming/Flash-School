<?php
session_start();
include "../config/db.php";

$kdPemesanan = $_GET['kd_pesanan'];
// query pemesanan 
$qPemesanan = $link->query("SELECT * FROM tbl_pemesanan WHERE kd_pemesanan='$kdPemesanan';");
$fPesan = $qPemesanan->fetch_assoc();
$kdTentor = $fPesan['kd_tentor'];
$statusPemesanan = $fPesan['status_pembayaran'];
// query tentor 
$qTentor = $link->query("SELECT * FROM tbl_tentor WHERE kd_tentor='$kdTentor' LIMIT 0,1;");
$fTentor = $qTentor->fetch_assoc();
$usernameTentor = $fTentor['username'];
$kdKursus = $fTentor['kd_kursus'];
$hargaPerJam = $fTentor['harga'];
// query guru 
$qGuru = $link->query("SELECT * FROM tbl_guru WHERE username='$usernameTentor' LIMIT 0,1;");
$fGuru = $qGuru->fetch_assoc();
$namaGuru = $fGuru['nama_lengkap'];
// query kursus 
$qKursus = $link->query("SELECT * FROM tbl_kursus WHERE kd_kursus='$kdKursus';");
$fKursus = $qKursus->fetch_assoc();
$namaKursus = $fKursus['nama_kursus'];

// total jam 
$totalJam = $fPesan['total_biaya'] / $hargaPerJam;
?>
<div class="container" id="divDetailPemesanan">
    <div style="margin-top:40px;text-align:left;">
        Detail pesanan
        <hr />
        <table class="table">
            <tr>
                <td>Kd Pemesanan</td>
                <td><?= $kdPemesanan; ?></td>
            </tr>
            <tr>
                <td>Tentor</td>
                <td><?= $namaGuru; ?></td>
            </tr>
            <tr>
                <td>Kursus</td>
                <td><?= $namaKursus; ?></td>
            </tr>
            <tr>
                <td>Harga per Jam</td>
                <td>Rp. <?= number_format($hargaPerJam); ?></td>
            </tr>
            <tr>
                <td>Total Jam - Total Harga</td>
                <td><?= $totalJam; ?> - Rp. <?= number_format($fPesan['total_biaya']); ?></td>
            </tr>
            <tr>
                <td>Bukti Pembayaran</td>
                <td>
                    <img src="../file/bukti_pembayaran/<?= $kdPemesanan; ?>.png" id="txtFoto" style="width: 200px;">
                    <br />
                </td>
            </tr>
            <tr>
                <td><b>Detail waktu mentoring</b></td>
                <td>
                    <?php
                    $kdAwal = 1;
                    $hari = array('senin', 'selasa', 'rabu', 'kamis', 'jumat');
                    for ($x = 0; $x < 5; $x++) { ?>
            <tr>
                <td><?= $hari[$x]; ?></td>
                <td>
                    <?php
                        $jam = array("08:00", "09:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00",);
                        for ($j = 0; $j < 9; $j++) { ?>
                        <?php
                            $qPemesanan = $link->query("SELECT * FROM tbl_item_pesanan WHERE kd_pemesanan='$kdPemesanan' AND kd_jadwal='$kdAwal';");
                            $tPemesanan = mysqli_num_rows($qPemesanan);
                            if ($tPemesanan < 1) { ?>

                        <?php } else { ?>
                            <a href="#!" class="btn btn-success disabled" id="<?= $kdAwal; ?>"><?= $jam[$j]; ?></a>
                        <?php } ?>

                    <?php $kdAwal++;
                        } ?>
                </td>
            </tr>
        <?php } ?>
        </td>
        </tr>
        <tr>
            <td>Status pembayaran</td>
            <td><?= $statusPemesanan; ?></td>
        </tr>
        </table>
        <a href="#!" class="btn btn-primary" @click="simpanAtc()">Verifikasi Pembayaran</a>
        <hr />

    </div>
</div>

<script>

var divDetailPemesanan = new Vue({
    el : '#divDetailPemesanan',
    data : {
        
    },
    methods : {
        simpanAtc : function()
        {
            let kdPemesanan = "<?=$kdPemesanan; ?>";
            let ds = {'kdPemesanan':kdPemesanan}
            $.post('proses-vefifikasi-pembayaran.php', ds, function(data){
                pesanUmumApp('success', 'sukses', 'Berhasil memverifikasi pembayaran');
                divMain.titleApps = "Data Pemesanan";
                renderMenu('data-pemesanan.php');
            });
        }
    }
});

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}
  

</script>